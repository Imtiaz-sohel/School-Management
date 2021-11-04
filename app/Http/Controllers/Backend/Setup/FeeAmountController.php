<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeAmount;
use App\Models\FeeCategory;
use App\Models\StudentClasss;
use Illuminate\Http\Request;

class FeeAmountController extends Controller{
    function feeAmountView(){
        $fees = FeeAmount::with(['feeCategory','studentClass'])->select('fee_categories_id')->groupBy('fee_categories_id')->get();
        // '$fees'=FeeAmount::with(['feeCategory','studentClass'])->latest()->get();
        return view('Backend.setup.fee-amount.fee-amount-view',[
            'fees'=>$fees,
        ]);
    }

    function feeAmountAdd(){
        $feeCategories = FeeCategory::latest()->get();
        $classes = StudentClasss::latest()->get();
        return view('Backend.setup.fee-amount.fee-amount-add',[
            'feeCategories'=>$feeCategories,
            'classes'=>$classes,
        ]);
    }

    function feeAmountPost(Request $request){
        $request->validate([
            'fee_categories_id'=>'required',
            'student_classses_id'=>'required',
            'amount'=>'required',            
        ],[
            'fee_categories_id.required'=>'Select Fee Category',
            'student_classses_id.required'=>'Select Class',
            'amount.required'=>'Enter Amount',            
        ]);
        $classIds = $request->student_classses_id;
        foreach ($classIds as $key => $classId) {
            $feeAmount = new FeeAmount;
            $feeAmount->fee_categories_id=$request->fee_categories_id;
            $feeAmount->student_classses_id=$classId;
            $feeAmount->amount=$request->amount[$key];
            $feeAmount->save();
            $nofify=array(
                'message'=>'Fee Inserted Successfully',
                'alert-type'=>'success',
            );
        }
        return back()->with($nofify);
    }


    function feeAmountEdit($fee_categories_id){
       $feeEdit = FeeAmount::where('fee_categories_id',$fee_categories_id)->orderBy('student_classses_id','ASC')->get();
       $feeCategories = FeeCategory::latest()->get();
       $classes = StudentClasss::latest()->get();
       return view('Backend.setup.fee-amount.edit-fee-amount',[
           'feeEdit'=>$feeEdit,
           'feeCategories'=>$feeCategories,
           'classes'=>$classes,
       ]);
    }

    function updateAmountPost(Request $request,$fee_categories_id){
        $classIds = $request->student_classses_id;
        FeeAmount::where('fee_categories_id',$fee_categories_id)->delete();
        foreach ($classIds as $key => $classId) {
            $feeAmount = new FeeAmount;
            $feeAmount->fee_categories_id=$request->fee_categories_id;
            $feeAmount->student_classses_id=$classId;
            $feeAmount->amount=$request->amount[$key];
            $feeAmount->save();
            $nofify=array(
                'message'=>'Fee Updated Successfully',
                'alert-type'=>'success',
            );
        }
        return back()->with($nofify);

    }

    function feeDetails($fee_categories_id){
      $feeDetails = FeeAmount::where('fee_categories_id',$fee_categories_id)->orderBy('student_classses_id','ASC')->get();
      return view('Backend.setup.fee-amount.fee-amount-details',[
          'feeDetails'=>$feeDetails,
      ]);

    }






















}
