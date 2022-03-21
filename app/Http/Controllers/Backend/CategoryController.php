<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function ViewCategory()
    {
    
        $category = Category::get();
        return view('backend.category.cat_view',compact('category'));
    }

    public function CategoryStore(request $request)
    {
        $request->validate([
            'category_name_en' => 'required',
            'category_name_hin' => 'required',
            'category_icon' => 'required',

        ],[

            'category_name_en.required' => 'Input Category Name in English',    
            'category_name_hin.required' => 'Input Category Name in Hindi',    
        ]);
        // echo $request->category_name_en;
        // echo $request->category_name_hin;
        // echo $request->category_icon;
        // die();
        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_hin' => $request->category_name_hin,
            'category_slug_en' => strtolower(str_replace(' ','-',$request->category_name_en)),
            'category_slug_hin' => str_replace(' ','-',$request->category_name_en),
            'category_icon' => $request->category_icon,

        ]);


        $notification = array( 
            'message' => 'Category Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


    }

    public function EditCategory($id)
    {
        $category = Category::findorfail($id);
        return view('backend.category.edit_cat',compact('category'));
    }

    public function CategoryUpdate(Request $request)
    {
        $category_id = $request->id;
        Category::findorfail($category_id)->update([
            'category_name_en' =>$request->category_name_en,
            'category_name_hin' => $request->category_name_hin,
            'category_slug_en' => strtolower(str_replace(' ','-',$request->category_name_en)),
            'category_slug_hin' => str_replace(' ','-',$request->category_name_en),
            'category_icon' => $request->category_icon,
        ]);
        $notification = array( 
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.category')->with($notification);

    }

    public function DeleteCategory($id)
    {
        Category::findorfail($id)->delete();

        
            $notification = array( 
                'message' => 'Category Deleted Successfully',
                'alert-type' => 'info'
            );
        
            return redirect()->route('all.category')->with($notification);
    }


}
