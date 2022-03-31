<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Carbon\Carbon;
// use Faker\Provider\Image;
use Intervention\Image\Facades\Image;



class SliderController extends Controller
{
    public function view()
    {
        $slider = Slider::latest()->get();
        return view('backend.slider.view_slider',compact('slider'));
    }

    public function store(Request $request)
    {
        
    
        //  $name_gen = hexdec(uniqid());
        //  $img_ext = strtolower($image->getClientMimeType());
        //  $img_name = $name_gen . '.' . $img_ext;
        //  $up_location = "upload/slider/";
        //  $last_img = $up_location.$img_name;
        //  $image->move($up_location,$img_name); 
        
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
        $save_url = 'upload/brand/'.$name_gen;

        Slider::insert([
            'title' => $request->slider_title,
            'desc' => $request->slider_desc,
            'image' => $save_url,
            'created_at' => Carbon::now(), 
            // 'brand_slug_en' => strtolower(str_replace('','-',$request->brand_name_en)),
            // 'brand_slug_hin' => str_replace('','-',$request->brand_name_en),

        ]);


        $notification = array( 
            'message' => 'Slider Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $slider = Slider::findorfail($id);
        return view('backend.slider.edit_slider',compact('slider'));
    }

    public function update(Request $request,$id)
    {
        $slider = $request->id; 

        // $image = $request->file('image');
        //  $name_gen = hexdec(uniqid());
        //  $img_ext = strtolower($image->getClientMimeType());
        //  $img_name = $name_gen . '.' . $img_ext;
        //  $up_location = "upload/slider/";
        //  $latest_img = $up_location.$img_name;
        //  $image->move($up_location,$img_name);

        Slider::findorfail($slider)->update([

            'title' => $request->slider_title,
            'desc' => $request->slider_desc,
            // 'image' => $latest_img,
            // 'created_at' => Carbon::now(),


        ]);

        $notification = array( 
            'message' => 'Slider Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('manage.slider')->with($notification);

    }

    public function delete($id)
    {
        Slider::findorFail($id)->delete();

        $notification = array( 
            'message' => 'Slider Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('manage.slider')->with($notification);

    }

    public function inactive($id)
    {
        Slider::findorfail($id)->update(['status' => 0]);

        $notification = array( 
            'message' => 'Slider Inactive Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('manage.slider')->with($notification);
    }

    public function active($id)
    {
        Slider::findorfail($id)->update(['status' => 1]);

        $notification = array( 
            'message' => 'Slider active Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('manage.slider')->with($notification);
    }

}
