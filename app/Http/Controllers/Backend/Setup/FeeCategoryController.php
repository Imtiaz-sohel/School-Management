<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeCategory;
use Illuminate\Http\Request;

class FeeCategoryController extends Controller{
    function feeView(){
        return view('Backend.setup.fee-category.view-fee-category',[
            'fees' => FeeCategory::latest()->get(),
            'feeCount'=>FeeCategory::count(),
        ]);
    }

    function feeAdd(){
        return view('Backend.setup.fee-category.add-fee-category');
    }

    function addFeePost(Request $request){
        $request->validate([
            'fee_name'=>'required|unique:fee_categories,fee_name',
        ],[
            'fee_name.required'=>'Enter Fee',
            'fee_name.unique'=>'Fee Already Exists',
        ]);
        $feeCategory = new FeeCategory;
        $feeCategory->fee_name=$request->fee_name;
        $feeCategory->save();
        $nofify=array(
            'message'=>'Fee Added Successfully',
            'alert-type'=>'success',
        );
        return back()->with($nofify);
    }

    function feeEdit($id){
        return view('Backend.setup.fee-category.edit-fee-category',[
            'fee_edit'=>FeeCategory::findOrFail($id),
        ]);
    }

    function updateFee(Request $request,$id){
        $request->validate([
            'fee_name'=>'required|unique:fee_categories,fee_name',
        ],[
            'fee_name.required'=>'Enter Fee',
            'fee_name.unique'=>'Fee Already Exists',
        ]);
        $feeUpdate = FeeCategory::findOrFail($id);
        $feeUpdate->fee_name=$request->fee_name;
        $feeUpdate->save();
        $nofify=array(
            'message'=>'Fee Updated Successfully',
            'alert-type'=>'success',
        );
        return redirect()->route('feeView')->with($nofify);
    }

    function feeDelete($id){
        FeeCategory::findOrFail($id)->delete();
        $nofify=array(
            'message'=>'Fee Deleted Successfully',
            'alert-type'=>'error',
        );
        return redirect()->route('feeView')->with($nofify);
    }














}
