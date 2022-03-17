<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AdminProfileController extends Controller
{

        public function AdminProfile()
        {
            $admindata = Admin::find(1);
            return view('admin.admin_profile_view',compact('admindata'));
        }

        public function EditAdminProfile()
        {
            $editdata = Admin::find(1);
            return view('admin.admin_profile_edit',compact('editdata'));
        }


        public function AdminProfileStore(Request $request)
        {
            $data = Admin::find(1);
            $data->name = $request->name;
            $data->email =$request->email;
        
            if($request->file('profile_photo_path'))
            {
                $file = $request->file('profile_photo_path');
                @unlink(\public_path('upload/admin_photo/'.$data->profile_photo_path));
                $filename = date('YmdHi').$file->getClientOriginalExtension();
                $file->move(public_path('upload/admin_photo'),$filename);
                $data['profile_photo_path'] = $filename;
            }
            $data->save();

            $notification = array( 
                'message' => 'Admin Profile Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.profile')->with($notification);
        
        
        }

        public function AdminCpassword()
        {
            return view('admin.admin_changepassword');
        }


        public function AdminUpdatePassword(Request $request)
        {
            $validatedata   = $request->validate([
                'old_password' => 'required',
                'password' => 'required|confirmed',
                // 'password_confirmation' => 'required'
            ]);


            $hashed = Admin::find(1)->password;
            if(Hash::check($request->old_password,$hashed))
            {
                $admin = Admin::find(1);
                $admin->password = Hash::make($request->password);
                $admin->save(); 
                Auth::logout(); 
                return redirect()->route('admin.logout');
            }
            else
            {
                return redirect()->back();
            }
        }



}
