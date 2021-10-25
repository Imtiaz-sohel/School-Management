<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

use function Symfony\Component\String\b;

class ProfileController extends Controller {

    function profile(){
        return view('Backend.User.view-profile',[
            'profile'=>User::where('id',Auth::id())->first(),
        ]);
    }

    function profileEdit(){
        $user_id = Auth::id();
        $profileEdit = User::findOrFail($user_id);
        return view('Backend.User.edit-profile',[
            'profileEdit'=>$profileEdit,
        ]);
    }

    function profileUpdate(Request $request){
        $request->validate([
            'mobile'=>['required'],
            'address'=>['required'],
            'gender'=>['required'],
        ],[
            'mobile.required'=>'Enter Mobile Number',
            'address.required'=>'Enter Address',
            'gender.required'=>'Enter Gender',
        ]);
        $profileUpdate = User::findOrFail(Auth::id());
        $profileUpdate->name=$request->name;
        $profileUpdate->email =$request->email;
        $profileUpdate->mobile=$request->mobile;
        $profileUpdate->address=$request->address;
        $profileUpdate->gender=$request->gender;
        $profileUpdate->save();
        if ($request->hasFile('image')) {
            $thumbnail = $request->file('image');
            $fileName=$profileUpdate->id.'_'.Str::slug($profileUpdate->name).'.'.$thumbnail->getClientOriginalExtension();
            $oldPath=public_path('upload/user_img/'.$profileUpdate->image);
            @unlink($oldPath);
            Image::make($thumbnail)->save(public_path('upload/user_img/'.$fileName));
            $profileUpdate->image=$fileName;
            $profileUpdate->save();           
        }
        $notication=array(
            'message'=>'Profile Updated Successfully',
            'alert-type'=>'success',
        );
        return redirect()->route('profile')->with($notication);
    }

    function passwordView(){
        return view('Backend.User.password-view');
    }

    function passwordUpdate(Request $request){
        $request->validate([
            'current_password'=>'required',
            'password'=>'required|confirmed',
        ]);

        $oldPassword = Auth::user()->password;
        if (Hash::check($request->current_password,$oldPassword)) {
            $id = Auth::id();
            $passwordUpdate = User::findOrFail($id);
            $passwordUpdate->password=Hash::make($request->password);
            $passwordUpdate->save();
            Auth::logout();
            return redirect()->route('login');
        }
        else{
            return back();
        }
    }
}
