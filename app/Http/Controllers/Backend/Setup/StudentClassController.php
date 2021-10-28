<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentClasss;
use Illuminate\Http\Request;

class StudentClassController extends Controller{
    function studentClass(){
        return view('Backend.setup.student_class.view-class',[
            'allClasses'=>StudentClasss::latest()->get(),
            'classCount'=>StudentClasss::count(),
        ]);
    }
    
    function addClass(){
        return view('Backend.setup.student_class.add-class');
    }

    function addClassPost(Request $request){
        $request->validate([
            'name'=>'required|unique:student_classses,name',
        ],[
            'name.required'=>'Enter Class Name',
            'name.unique'=>'Class Name Already Exists',
        ]);
        $studentClass = new StudentClasss;
        $studentClass->name=$request->name;
        $studentClass->save();
        $notification=array(
            'message'=>'Class Added Successfully',
            'alert-type'=>'success',
        );
        return back()->with($notification);
    }

    function classEdit($id){
        return view('Backend.setup.student_class.edit-class',[
            'editClass'=>StudentClasss::findOrFail($id),
        ]);
    }

    function updateClass(Request $request,$id){
        $request->validate([
            'name'=>'required',
        ],[
            'name.required'=>'Enter Class Name',
        ]);
        $classUpdate = StudentClasss::findOrFail($id);
        $classUpdate->name=$request->name;
        $classUpdate->save();
        $notification=array(
            'message'=>'Class Updated Successfully',
            'alert-type'=>'success',
        );
        return redirect()->route('studentClass')->with($notification);
    }

    function classDelete($id){
        StudentClasss::findOrFail($id)->delete();
        $notification=array(
            'message'=>'Class Deleted Successfully',
            'alert-type'=>'error',
        );
        return back()->with($notification);
    }
}
