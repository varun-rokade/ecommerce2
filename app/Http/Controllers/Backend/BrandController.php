<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brands;
use Faker\Provider\Image;
use PhpParser\Node\Expr\FuncCall;

class BrandController extends Controller
{
    public function ViewBrand()
    {
        $brands = Brands::get();
        return view('backend.brands.brand_view',compact('brands'));
    }


    public function BrandStore(Request $request)
    {
        $request->validate([
            'brand_name_en' => 'required',
            'brand_name_hin' => 'required',
            'brand_image' => 'required',

        ],[

            'brand_name_en.required' => 'Input Brand Name in English',    
            'brand_name_hin.required' => 'Input Brand Name in hindi'    
        ]);

         $image = $request->file('brand_image');
    
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $image->store('upload/brand/'.$name_gen);
        $save_url = 'upload/brand/'.$name_gen;

        // $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        // Image::make($image)->resize(300,200)->save('upload/brand/'.$name_gen);
        // $save_url = 'upload/brand/'.$name_gen;

        Brands::insert([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_hin' => $request->brand_name_hin,
            'brand_slug_en' => strtolower(str_replace('','-',$request->brand_name_en)),
            'brand_slug_hin' => str_replace('','-',$request->brand_name_en),
            'brand_image' => $save_url,

        ]);


        $notification = array( 
            'message' => 'Admin Brand Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

        // return redirect()->route('admin.profile')->with($notification);

    }

    public function EditBrand($id)
    {
        $brand = Brands::findorfail($id);
        return view('backend.brands.edit_brands',compact('brand'));


    }

    public function UpdateBrand(request $request)
    {

        $brand_id = $request->id;
        $old_image = $request->old_image;

        if($request ->file('brand_image'))
        {

         unlink($old_image);   
        $image = $request->file('brand_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,200)->save('upload/brand/'.$name_gen);
        $save_url = 'upload/brand/'.$name_gen;

        Brands::findorfail($brand_id)->update([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_hin' => $request->brand_name_hin,
            'brand_slug_en' => strtolower(str_replace('','-',$request->brand_name_en)),
            'brand_slug_hin' => str_replace('','-',$request->brand_name_en),
            'brand_image' => $request->brand_image,

        ]);


        $notification = array( 
            'message' => 'Admin Brand Added Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.brands')->with($notification);


        }
        else
        {
            Brands::findorfail($brand_id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_hin' => $request->brand_name_hin,
                'brand_slug_en' => strtolower(str_replace('','-',$request->brand_name_en)),
                'brand_slug_hin' => str_replace('','-',$request->brand_name_en),
                'brand_image' => $request->brand_image,
    
            ]);
    
    
            $notification = array( 
                'message' => 'Admin Brand Updated Successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('all.brands')->with($notification);
        }

        // return view('');
    }

    public function DeleteBrand($id)
    {

        // $brand = Brands::findorfail($id);
        // $img = $brand->brand_image;
        // unlink($img);

        Brands::findorfail($id)->delete();

        $notification = array( 
            'message' => 'Admin Brand Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('all.brands')->with($notification);


    }



}
