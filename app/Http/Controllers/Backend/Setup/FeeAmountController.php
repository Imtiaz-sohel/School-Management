<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeAmount;
use App\Models\FeeCategory;
use App\Models\StudentClasss;
use Illuminate\Http\Request;

class FeeAmountController extends Controller{
    function feeAmountView(){
        return view('Backend.setup.fee-amount.fee-amount-view',[
            'fees'=>FeeAmount::with(['feeCategory','studentClass'])->latest()->get(),
            'feeCount'=>FeeAmount::count(),
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

    function feeDelete($id){
        FeeAmount::findOrFail($id)->delete();
        $nofify=array(
            'message'=>'Fee Inserted Successfully',
            'alert-type'=>'success',
        );
        return back()->with($nofify);
    }

    function feeAmountEdit($id){
        $amountEdit = FeeAmount::findOrFail($id);
        $feeCategories = FeeCategory::latest()->get();
        $classes = StudentClasss::latest()->get();
        return view('Backend.setup.fee-amount.edit-fee-amount',[
            'amountEdit'=>$amountEdit,
            'feeCategories'=>$feeCategories,
            'classes'=>$classes,
        ]);
    }

















}
