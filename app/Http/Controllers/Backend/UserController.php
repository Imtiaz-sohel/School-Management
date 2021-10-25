<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller{
    function allUser(){
        return view('Backend.User.view-user',[
            'users'=>User::latest()->get(),
            'userCount'=>User::count(),
        ]);
    }
    function addUser(){
        return view('Backend.User.add-user');
    }

    function addUserPost(Request $request){
        $request->validate([
            'name'=>['required'],
            'user_type'=>['required'],
            'email'=>['required','unique:users,email'],
            'password'=>['required'],
        ],[
            'name.required'=>'Enter Name',
            'user_type.required'=>'Select Role',
            'email.required'=>'Enter Email',           
            'email.unique'=>'Email Already Exists',
            'password.required'=>'Enter Password'           
        ]);
        $user = new User;
        $user->name=$request->name;
        $user->user_type=$request->user_type;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->save();
        $notication=array(
            'message'=>'User Added Successfully',
            'alert-type'=>'success',
        );
        return back()->with($notication);
    }

    function userEdit($user_id){
        return view('Backend.User.edit-user',[
            'userEdit'=>User::findOrFail($user_id),
            'users'=>User::latest()->get(),
        ]);
    }

    function userUpdate(Request $request){
        $request->validate([
            'name'=>['required'],
            'user_type'=>['required'],
            'email'=>['required'],
        ],[
            'name.required'=>'Enter Name',
            'user_type.required'=>'Select Role',
            'email.required'=>'Enter Email',           
        ]);
        $userUpdate = User::findOrFail($request->usr_id);
        $userUpdate->name=$request->name;
        $userUpdate->user_type=$request->user_type;
        $userUpdate->email=$request->email;
        $userUpdate->save();
        $notication=array(
            'message'=>'User Updated Successfully',
            'alert-type'=>'success',
        );
        return back()->with($notication);        
    }

    function userDelete($user_id){
        User::findOrFail($user_id)->delete();
        $notication=array(
            'message'=>'User Deleted Successfully',
            'alert-type'=>'error',
        );
        return back()->with($notication);  
    }

}
