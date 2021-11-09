<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\AssignSubject;
use App\Models\StudentClasss;
use App\Models\StudentSubject;
use Illuminate\Http\Request;

class AssignSubjectController extends Controller{
    function assignsubjectView(){
        $assignSubjects = AssignSubject::with(['class'])->select('class_id')->groupBy('class_id')->get();
        return view('Backend.setup.assign-subject.view-assign-subject',[
            'assignSubjects'=>$assignSubjects,
        ]);
    }

    function assignsubjectAdd(){
        return view('Backend.setup.assign-subject.add-assign-subject',[
            'subjects'=>StudentSubject::latest()->get(),
            'classes'=>StudentClasss::latest()->get(),
        ]);
    }

    function assignSubjectPost(Request $request){
        $subjectIds=$request->subject_id;
        foreach ($subjectIds as $key => $subjectId) {
            $assignSubject = new AssignSubject;
            $assignSubject->class_id=$request->class_id;
            $assignSubject->subject_id=$subjectId;
            $assignSubject->full_mark=$request->full_mark[$key];
            $assignSubject->pass_mark=$request->pass_mark[$key];
            $assignSubject->subjective_mark=$request->subjective_mark[$key];
            $assignSubject->save();
        }
        $notify=array(
            'message'=>'Mark Assign Successfully',
            'alert-type'=>'success',
        );
        return back()->with($notify);

    }

    function assignSubjectDetails($class_id){
        $subjectDetails = AssignSubject::with(['subject'])->where('class_id',$class_id)->orderBy('subject_id','ASc')->get();
        return view('Backend.setup.assign-subject.subject-details',[
            'subjectDetails'=>$subjectDetails,
        ]);
    }

    function assignSubjectDelete($class_id){
        AssignSubject::where('class_id',$class_id)->delete();
        $notify=array(
            'message'=>'Assign Subject Deleted Successfully',
            'alert-type'=>'error',
        );
        return back()->with($notify);
    }

    function assignSubjectEdit($class_id){
        $subjects=StudentSubject::latest()->get();
        $classes=StudentClasss::latest()->get();
        $assignEdit=AssignSubject::where('class_id',$class_id)->orderBy('subject_id','ASC')->get();
        return view('Backend.setup.assign-subject.assign-subject-edit',[
            'subjects'=>$subjects,
            'classes'=>$classes,
            'assignEdit'=>$assignEdit,
        ]);
    }

    function assignSubjectUpdate(Request $request,$class_id){
        $request->validate([
            'class_id'=>'required',
            'subject_id'=>'required',
            'full_mark'=>'required',
            'pass_mark'=>'required',
            'subjective_mark'=>'required',
        ],[
            'class_id.required'=>'Select Class',
            'subject_id.required'=>'Select Subject',
            'full_mark.required'=>'Enter Full Mark',
            'pass_mark.required'=>'Enter Pass Mark',
            'subjective_mark.required'=>'Enter Subjective Mark',
        ]);
        $subjectIds=$request->subject_id;
        AssignSubject::where('class_id',$class_id)->delete();
        foreach ($subjectIds as $key => $subjectId) {
            $assignSubject = new AssignSubject;
            $assignSubject->class_id=$request->class_id;
            $assignSubject->subject_id=$subjectId;
            $assignSubject->full_mark=$request->full_mark[$key];
            $assignSubject->pass_mark=$request->pass_mark[$key];
            $assignSubject->subjective_mark=$request->subjective_mark[$key];
            $assignSubject->save();
        }
        $notify=array(
            'message'=>'Mark Updated Successfully',
            'alert-type'=>'success',
        );
        return redirect()->route('assignsubjectView')->with($notify);
    }
}
