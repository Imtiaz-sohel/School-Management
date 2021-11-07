<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentSubject;
use Illuminate\Http\Request;

class StudentSubjectController extends Controller{
    function subjectView(){
        return view('Backend.setup.student-subject.view-subject',[
            'subjects'=>StudentSubject::latest()->get(),
            'subjectCount'=>StudentSubject::count(),
        ]);
    }

    function subjectAdd(){
        return view('Backend.setup.student-subject.add-subject');
    }

    function addSubjectPost(Request $request){
        $subject = new StudentSubject;
        $subject->subject_name=$request->subject_name;
        $subject->save();
        $notify=array(
            'message'=>'Subject Added Successfully',
            'alert-type'=>'success',
        );
        return back()->with($notify);
    }

    function subjectEdit($subject_id){
       $sujectEdit = StudentSubject::findOrFail($subject_id);
       return view('Backend.setup.student-subject.edit-subject',[
           'sujectEdit'=>$sujectEdit,
       ]);
    }

    function updateSubjectPost(Request $request,$subject_id){
       $studentUpdate = StudentSubject::findOrFail($subject_id);
       $studentUpdate->subject_name=$request->subject_name;
       $studentUpdate->save();
       $notify=array(
         'message'=>'Subject Updated Successfully',
         'alert-type'=>'success',
        );
      return redirect()->route('subjectView')->with($notify);
    }

    function subjectDelete($subject_id){
        StudentSubject::findOrFail($subject_id)->delete();
        $notify=array(
            'message'=>'Subject Deleted Successfully',
            'alert-type'=>'error',
        );
        return redirect()->route('subjectView')->with($notify);
    }
}
