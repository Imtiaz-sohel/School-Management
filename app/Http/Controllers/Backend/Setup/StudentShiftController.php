<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentShift;
use Illuminate\Http\Request;

use function Symfony\Component\String\b;

class StudentShiftController extends Controller{
    function shiftView(){
        return view('Backend.setup.shift.shift-view',[
            'shifts'=>StudentShift::latest()->get(),
            'shiftCount'=>StudentShift::count(),
        ]);
    }

    function shiftAdd(){
        return view('Backend.setup.shift.shift-add');
    }

    function addShiftPost(Request $request){
        $request->validate([
            'shift_name'=>'required|unique:student_shifts,shift_name',
        ],[
            'shift_name.required'=>'Enter Shift Name',
            'shift_name.unique'=>'Shift Name Already Exists',
        ]);
        $shift = new StudentShift;
        $shift->shift_name=$request->shift_name;
        $shift->save();
        $nofify=array(
            'message'=>'Shift Inserted Successfully',
            'alert-type'=>'success',
        );
        return back()->with($nofify);
    }

    function shiftEdit($id){
        return view('Backend.setup.shift.shift-edit',[
            'editShift'=>StudentShift::findOrFail($id),
        ]);
    }

    function updateShift(Request $request,$id){
        $shiftUpdate = StudentShift::findOrFail($id);
        $shiftUpdate->shift_name=$request->shift_name;
        $shiftUpdate->save();
        $nofify=array(
            'message'=>'Shift Updated Successfully',
            'alert-type'=>'success',
        );
        return redirect()->route('shiftView')->with($nofify);
    }

    function shiftDelete($id){
        StudentShift::findOrFail($id)->delete();
        $nofify=array(
            'message'=>'Shift Deleted Successfully',
            'alert-type'=>'error',
        );
        return redirect()->route('shiftView')->with($nofify);
    }
}
