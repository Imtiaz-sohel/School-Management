<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentGroup;
use Illuminate\Http\Request;

class StudentGroupController extends Controller{
    function studentGroupView(){
        return view('Backend.setup.group.view-group',[
            'groups'=>StudentGroup::latest()->get(),
            'groupCount'=>StudentGroup::count(),
        ]);
    }
    function groupAdd(){
        return view('Backend.setup.group.add-group');
    }

    function addGroupPost(Request $request){
        $s_group = new StudentGroup;
        $s_group->group_name=$request->group_name;
        $s_group->save();
        $notify=array(
            'message'=>'Group Added Successfully',
            'alert-type'=>'success',
        );
        return back()->with($notify);
    }

    function groupEdit($id){
        return view('Backend.setup.group.edit-group',[
            'editGroup'=>StudentGroup::findOrFail($id),
        ]);
    }

    function updateGroup(Request $request,$id){
       $updateGroup = StudentGroup::findOrFail($id);
       $updateGroup->group_name=$request->group_name;
       $updateGroup->save();
       $notify=array(
        'message'=>'Group Updated Successfully',
        'alert-type'=>'success',
       );
       return redirect()->route('studentGroupView')->with($notify);
    }

    function groupDelete($id){
       StudentGroup::findOrFail($id)->delete();
       $notify=array(
        'message'=>'Group Updated Successfully',
        'alert-type'=>'success',
       );
       return back()->with($notify);
    }
}
