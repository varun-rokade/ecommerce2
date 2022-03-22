<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Brands;
use App\Models\Product;



class ProductController extends Controller
{
    
    public function AddProduct()
    {

        $category = Category::get();
        $brands = Brands::get();
        return view('backend.product.add_product',compact('category','brands'));


    }


}
