<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\Degisnation;
use Illuminate\Http\Request;

class DegisnationController extends Controller{
    function degisnationView(){
        return view('Backend.setup.degisnation.degisnation-view',[
            'designations'=>Degisnation::latest()->get(),
        ]);
    }

    function degisnationAdd(){
        return view('Backend.setup.degisnation.degisnation-add');
    }

    function addDesignationPost(Request $request){
        $request->validate([
            'name'=>'required',
        ],[
            'name.required'=>'Enter Designation Name',
        ]);
        $designations = new Degisnation;
        $designations->name=$request->name;
        $designations->save();
        $notify=array(
            'message'=>'Designation Added Successfully',
            'alert-type'=>'success',
        );
        return back()->with($notify);
    }

    function deleteDesignation($id){
        Degisnation::findOrFail($id)->delete();
        $notify=array(
            'message'=>'Designation Deleted Successfully',
            'alert-type'=>'error',
        );
        return back()->with($notify);
    }

    function editDesignation($id){
        return view('Backend.setup.degisnation.degisnation-edit',[
            'editDesignation'=>Degisnation::findOrFail($id),
        ]);
    }

    function designationUpdatePost(Request $request,$id){
         $updateDesignation = Degisnation::findOrFail($id);
         $updateDesignation->name=$request->name;
         $updateDesignation->save();
         $notify=array(
            'message'=>'Designation Updated Successfully',
            'alert-type'=>'success',
        );
        return redirect()->route('degisnationView')->with($notify);
    }
}
