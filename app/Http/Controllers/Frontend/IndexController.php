<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function Index()
    {

        $product = Product::where('status',1)->orderby('id','DESC')->get() ;


        $slider = Slider::where('status',1)->limit(3)->get() ;

        $category = Category::orderBy('category_name_en','ASC')->get();

        $featured = Product::where('featured',1)->orderBy('id','DESC')->limit(6)->get(); 

        $skip_category = Category::skip(3)->first();
        $skip_products = Product::where('status',1)->where('category_id',$skip_category->id)->orderby('id','DESC')->get();    

        return view('frontend.index',compact('category','slider','product','featured','skip_category','skip_products'));
    }

    public function UserLogout()
    {
        Auth::logout();
        return Redirect()->route('login');
    }

    public function UserProfile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_profile',compact('user'));

    }

    public function UserProfileStore(Request $request)
    {
            $data = User::find(Auth::user()->id);
            $data->name = $request->name;
            $data->email =$request->email;
            $data->phone =$request->phone;

            if($request->file('profile_photo_path'))
            {
                $file = $request->file('profile_photo_path');

                @unlink(\public_path('upload/user_photo/'.$data->profile_photo_path));

                $filename = date('YmdHi').$file->getClientOriginalExtension();
                
                $file->move(public_path('upload/user_photo'),$filename);
                
                $data['profile_photo_path'] = $filename;
            }
            $data->save();

            $notification = array( 
                'message' => 'User Profile Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('dashboard')->with($notification);

    }

    public function UserChangePassword()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_cpassword',compact('user'));


    }

    public function UpdatePassword(Request $request)
    {
        $validatedata   = $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed',
            // 'password_confirmation' => 'required'
        ]);


        $hashed = Auth::user()->password;
        if(Hash::check($request->current_password,$hashed))
        {
            $user = User::find(1);
            $user->password = Hash::make($request->password);
            $user->save(); 
            Auth::logout(); 
            return redirect()->route('user.logout');
        }
        else
        {
            return redirect()->back();
        }
    }


    public function ProductDetails($id,$slug)
    {
        $product = Product::findorFail($id);

        $color_en = $product->product_color_en;
        $product_color_en = explode(',',$color_en);

        $color_hin = $product->product_color_hin;
        $product_color_hin = explode(',',$color_hin);

        $size_en = $product->product_size_en;
        $product_size_en = explode(',',$size_en);

        $size_hin = $product->product_size_hin;
        $product_size_hin = explode(',',$size_hin);

        $cat_id  = $product->category_id;
        $related_product = Product::where('category_id',$cat_id)->where('id','!-',$id)->orderby('id','DESC')->get();
        return view('frontend.product.product_details',compact('product','product_color_en','product_color_hin','product_size_en','product_size_hin','related_product'));
    }

    public function TagsWiseProducts($tags)
    {
        $product = Product::where('status',1)->where('product_tags_en',$tags)->where('product_tags_hin',$tags)->orderby('id','desc')->get();
        $category = Category::orderBy('category_name_en','ASC')->get();
        return view('frontend.tags.tags_view',compact('product','category'));
    }


    public function SubcatWiseProducts($slug,$subcat_id)
    {
        $product = Product::where('status',1)->where('subcategory_id',$subcat_id)->orderby('id','desc')->get();
        $category = Category::orderBy('category_name_en','ASC')->get();
        return view('frontend.product.subcat_view',compact('product','category'));
    }

    public function SubSubcatWiseProducts($subsubcat_id,$slug)
    {
        $product = Product::where('status',1)->where('subsubcategory_id',$subsubcat_id)->orderby('id','desc')->get();
        $category = Category::orderBy('category_name_en','ASC')->get();
        return view('frontend.product.sub_subcat_view',compact('product','category'));

    }

    public function productviewajax($id)
    {
        $product = Product::findorFail($id);

        $color_en = $product->product_color_en;
        $product_color_en = explode(',',$color_en);        
    }



}
