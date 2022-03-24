<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function Index()
    {
        $slider = Slider::where('status',1)->order_by('id','DESC')->limit(3)->get() ;

        $category = Category::orderBy('category_name_en','ASC')->get();
        return view('frontend.index',compact('category'));
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

}
