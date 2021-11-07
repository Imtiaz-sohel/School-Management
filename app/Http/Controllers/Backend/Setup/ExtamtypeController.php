<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use Illuminate\Http\Request;

class ExtamtypeController extends Controller{
    function examTypeView(){
        return view('Backend.setup.exam-type.view-exam-type',[
            'examTypes'=>ExamType::latest()->get(),
            'examCount'=>ExamType::count(),
        ]);
    }

    function examTypeAdd(){
        return view('Backend.setup.exam-type.add-exam-type');
    }

    function addExamPost(Request $request){
        $request->validate([
            'exam_type'=>['required|unique:exam_types,exam_type'],
        ],[
            'exam_type.required'=>'Enter Exam Type',
            'exam_type.unique'=>'Exam Type Already Exists',
        ]);
        $examType = new ExamType;
        $examType->exam_type=$request->exam_type;
        $examType->save();
        $notification=array(
            'message'=>'Exam Type Added Successfully',
            'alert-type'=>'success',
        );
        return back()->with($notification);
    }

    function examTypeDelete($exam_id){
        ExamType::findOrFail($exam_id)->delete();
        $notification=array(
            'message'=>'Exam Type Deleted Successfully',
            'alert-type'=>'error',
        );
        return back()->with($notification);
    }

    function examTypeEdit($exam_id){
        $examEdit = ExamType::findOrFail($exam_id);
        return view('Backend.setup.exam-type.edit-exam-type',[
            'examEdit'=>$examEdit,
        ]);
    }

    function ExamUpdatePost(Request $request,$exam_id){
        $request->validate([
            'exam_type'=>['required'],
        ],[
            'exam_type.required'=>'Enter Exam Type',
        ]);
        $examTypeUpdate = ExamType::findOrFail($exam_id);
        $examTypeUpdate->exam_type=$request->exam_type;
        $examTypeUpdate->save();
        $notification=array(
            'message'=>'Exam Type Updayted Successfully',
            'alert-type'=>'success',
        );
        return redirect()->route('examTypeView')->with($notification);
    }
    
}
