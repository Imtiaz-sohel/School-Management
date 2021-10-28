<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentYearController extends Controller{
    function studentYearView(){
        return view('Backend.setup.year.year-view',[
            'years'=>StudentYear::latest()->get(),
            'yearCount'=>StudentYear::count(),
        ]);
    }

    function addYear(){
        return view('Backend.setup.year.year-add');
    }

    function addYearPost(Request $request){
        $request->validate([
            'student_year'=>'required|unique:student_years,student_year'
        ],[
            'student_year.required'=>'Enter Year Name',
            'student_year.unique'=>'Year Already Exists',
        ]);
        $year = new StudentYear;
        $year->student_year=$request->student_year;
        $year->save();
        $notification=array(
            'message'=>'Year Added Successfully',
            'alert-type'=>'success',
        );
        return back()->with($notification);
    }

    function yearEdit($id){
        return view('Backend.setup.year.year-edit',[
            'editYear'=>StudentYear::findOrFail($id),
        ]);
    }

    function yearUpdate(Request $request, $id){
        $yearUpdate = StudentYear::findOrFail($id);
        $yearUpdate->student_year=$request->student_year;
        $yearUpdate->save();
        $notification=array(
            'message'=>'Year Updated Successfully',
            'alert-type'=>'success',
        );
        return redirect()->route('studentYearView')->with($notification);
    }

    function yearDelete($id){
        StudentYear::findOrFail($id)->delete();
        $notification=array(
            'message'=>'Year Deleted Successfully',
            'alert-type'=>'success',
        );
        return back()->with($notification);
    }




















}
