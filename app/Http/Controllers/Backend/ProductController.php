<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Brands;
use App\Models\MultiImg;
use App\Models\Product;
use Carbon\Carbon;
use Faker\Provider\Image;



class ProductController extends Controller
{
    
    public function AddProduct()
    {

        $category = Category::get();
        $brands = Brands::get();
        return view('backend.product.add_product',compact('category','brands'));
    }

    public function ProductStore(Request $request)
    {


         $image = $request->file('product_thumbnail');
         $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $image->store('upload/product/thumbnail/'.$name_gen);
        $save_url = 'upload/product/thumbnail/'.$name_gen;

            $product_id =  Product::insert([

                'brand_id' => $request->brand_id,
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'subsubcategory_id' => $request->subsubcategory_id,
                'product_name_en' => $request->product_name_en,
                'product_name_hin' => $request->product_name_hin,
                'product_slug_en' => strtolower(str_replace(' ','-',$request->product_name_en)),
                'product_slug_hin' => strtolower(str_replace(' ','-',$request->product_name_hin)),
                'product_code' => $request->product_code,
                'product_qty' => $request->product_qty,
                'product_tags_en' => $request->product_tags_en,
                'product_tags_hin' => $request->product_tags_hin,
                'product_size_en' => $request->product_size_en,
                'product_size_hin' => $request->product_size_hin,
                'product_color_en' => $request->product_color_en,
                'product_color_hin' => $request->product_color_hin,
                'selling_price' => $request->selling_price,
                'discount_price' => $request->discount_price,
                'short_desc_en' => $request->short_desc_en,
                'short_desc_hin' => $request->short_desc_hin,
                'long_desc_en' => $request->long_desc_en,
                'long_desc_hin' => $request->long_desc_hin,
                // 'multi_img' => $request->multi_img,
                'hot_deals' => $request->hot_deals,
                'featured' => $request->featured,
                'special_offer' => $request->special_offer,
                'special_deals' => $request->special_deals,
                'product_thumbnail' => $save_url,
                'status' => 1,
                'created_at' => Carbon::now(),
                'brand_id' => $request->brand_id,

            ]);
    

            $images = $request->file('multi_img');
        foreach($images as $img)
        {
        $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        $image->store('upload/product/multi-img'.$make_name);
        $upload_path = 'upload/product/multi-img'.$make_name;
        
            MultiImg::insert([
// 
                'product_id' => $product_id,
                'photo_name' => $upload_path,
                'created_at' => Carbon::now(),
            ]);
        }    
            $notification = array( 
                'message' => 'Product Added Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->route('manage.product')->with($notification);
    
    }

    public function manage()
    {
        $products = Product::get();
        return view('backend.product.view_products',compact('products'));

    }





}
