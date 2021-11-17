<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentRegController extends Controller{
    function viewregistration(){
        return view('Backend.student.view-register');
    }

    function addStudent(){
        return view('Backend.student.add-register');
    }

    function addStudentPost(Request $request){
        return $request->all();
    }
    
}
