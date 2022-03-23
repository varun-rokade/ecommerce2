<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\SubSubCategory;

class SubCategoryController extends Controller
{
    public function ViewSubCategory()
    {
        $category = Category::orderby('category_name_en','ASC')->get();
        $subcategory = SubCategory::get();
        return view('backend.category.subcat_view',compact('subcategory','category'));
    }
    
    public function StoreSubCategory(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_name_en' => 'required',
            'subcategory_name_hin' => 'required',

        ],[
            'category_id.required' => 'Please Select Any One Category',
            'subcategory_name_en.required' => 'Input Category Name in English',    
            'subcategory_name_hin.required' => 'Input Category Name in Hindi',    
        ]);

        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_hin' => $request->subcategory_name_hin,
            'subcategory_slug_en' => strtolower(str_replace(' ','-',$request->subcategory_name_en)),
            'subcategory_slug_hin' =>str_replace(' ','-',$request->subcategory_name_hin), 

        ]);


        $notification = array( 
            'message' => 'SubCategory Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function EditSubCategory($id)
    {
        $category = Category::orderby('category_name_en','ASC')->get();
        $subcategory = SubCategory::findorfail($id);
        return view('backend.category.subedit',compact('subcategory','category'));
    }

    public function SubCatUpdate(request $request)
    {
        $subcategory_id = $request->id;
        SubCategory::findorfail($subcategory_id)->update([


            'category_id' =>  $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_hin' => $request->subcategory_name_hin,
            'subcategory_slug_en' => strtolower(str_replace(' ','-',$request->subcategory_name_en)),
            'subcategory_slug_hin' =>str_replace(' ','-',$request->subcategory_name_hin),
        
        ]);
        $notification = array( 
            'message' => 'SubCategory Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.subcategory')->with($notification);
    }

    public function delete($id)
    {
        SubCategory::findorfail($id)->delete();

        $notification = array( 
            'message' => 'SubCategory Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.subcategory')->with($notification);
    }
// ////////////////////////For Sub Category////////////////////////////// 

    public function ViewSubSub()
    {

        $category = Category::orderby('category_name_en','ASC')->get();
        $subsubcategory = SubSubCategory::get();
        return view('backend.category.sub_subcat_view',compact('subsubcategory','category'));

    }

    public function GetSubCategory($category_id)
    {
        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_en','ASC')->get();
        return json_encode($subcat);
    }

    public function GetSubSubCategory($subcategory_id)
    {
        $subsubcat = SubSubCategory::where('subcategory_id',$subcategory_id)->orderBy('subsubcategory_name_en','ASC')->get();
        return json_encode($subsubcat);
    }

    public function subsubcategory(request $request)
    {
        SubSubCategory::insert([

            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_hin' => $request->subsubcategory_name_hin,
            'subsubcategory_slug_en' => strtolower(str_replace(' ','-',$request->subsubcategory_name_en)),
            'subsubcategory_slug_hin' =>str_replace(' ','-',$request->subsubcategory_name_hin), 

        ]);

        $notification = array( 
            'message' => 'Sub-SubCategory Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function editsubsub($id)
    {
        $category = Category::orderby('category_name_en','ASC')->get();
        $subcategory = SubCategory::orderby('subcategory_name_en','ASC')->get();
        $subsubcategory = SubSubCategory::findorfail($id);
        return view('backend.category.sub_subcategory_edit',compact('category','subcategory','subsubcategory'));
    }

    public function update(Request $request)
    {
        $subsubedit = $request->id;
        SubSubCategory::findorfail($subsubedit)->update([

            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_hin' => $request->subsubcategory_name_hin,
            'subsubcategory_slug_en' => strtolower(str_replace(' ','-',$request->subsubcategory_name_en)),
            'subsubcategory_slug_hin' =>str_replace(' ','-',$request->subsubcategory_name_hin), 

        ]);

        $notification = array( 
            'message' => 'Sub-SubCategory Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.subsubcategory')->with($notification);


    }

    public function SubSubDelete($id)
    {
        SubSubCategory::findorfail($id)->delete();

        $notification = array( 
            'message' => 'Sub - SubCategory Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.subsubcategory')->with($notification);

    }

}
