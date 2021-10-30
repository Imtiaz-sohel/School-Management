<?php

use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('Backend.index');
})->name('dashboard');

// USERCONTROLLER STARTS
Route::group(['prefix'=>'user','auth'], function(){
    Route::get('/view',[UserController::class,'allUser'])->name('allUser');
    Route::get('/add',[UserController::class,'addUser'])->name('addUser');
    Route::post('/add-post',[UserController::class,'addUserPost'])->name('addUserPost');
    Route::get('/edit/{user_id}',[UserController::class,'userEdit'])->name('userEdit');
    Route::post('/update-post',[UserController::class,'userUpdate'])->name('userUpdate');
    Route::get('/delete/{user_id}',[UserController::class,'userDelete'])->name('userDelete');
});

// PROFILE CONTROLLER STARTS
Route::group(['prefix'=>'profile','auth'], function(){
    Route::get('/view',[ProfileController::class,'profile'])->name('profile');
    Route::get('/edit',[ProfileController::class,'profileEdit'])->name('profileEdit');
    Route::post('/update',[ProfileController::class,'profileUpdate'])->name('profileUpdate');
    Route::get('/password-view',[ProfileController::class,'passwordView'])->name('passwordView');
    Route::post('/password-update',[ProfileController::class,'passwordUpdate'])->name('passwordUpdate');
});
// SETUP CONTROLLER STARTS
Route::group(['prefix'=>'student','auth'], function(){
    Route::get('/setup',[StudentClassController::class,'studentClass'])->name('studentClass');
    Route::get('/add-class',[StudentClassController::class,'addClass'])->name('addClass');
    Route::post('/add-class-post',[StudentClassController::class,'addClassPost'])->name('addClassPost');
    Route::get('/add-class-edit/{id}',[StudentClassController::class,'classEdit'])->name('classEdit');
    Route::post('/add-class-update/{id}',[StudentClassController::class,'updateClass'])->name('updateClass');
    Route::get('/delete-class/{id}',[StudentClassController::class,'classDelete'])->name('classDelete');
});

// STUDENT YEAR CONTROLLER
Route::group(['prefix'=>'year','auth'], function(){
    Route::get('/view',[StudentYearController::class,'studentYearView'])->name('studentYearView');
    Route::get('/add',[StudentYearController::class,'addYear'])->name('addYear');
    Route::post('/add-post',[StudentYearController::class,'addYearPost'])->name('addYearPost');
    Route::get('/edit/{id}',[StudentYearController::class,'yearEdit'])->name('yearEdit');
    Route::post('/update/{id}',[StudentYearController::class,'yearUpdate'])->name('yearUpdate');
    Route::get('/delete/{id}',[StudentYearController::class,'yearDelete'])->name('yearDelete');
});

// STUDENT GROUP CONTROLLER
Route::group(['prefix'=>'group','auth'],function(){
    Route::get('/view',[StudentGroupController::class,'studentGroupView'])->name('studentGroupView');
    Route::get('/add',[StudentGroupController::class,'groupAdd'])->name('groupAdd');
    Route::post('/add-post',[StudentGroupController::class,'addGroupPost'])->name('addGroupPost');
    Route::get('/edit/{id}',[StudentGroupController::class,'groupEdit'])->name('groupEdit');
    Route::post('/update/{id}',[StudentGroupController::class,'updateGroup'])->name('updateGroup');
    Route::get('/delete/{id}',[StudentGroupController::class,'groupDelete'])->name('groupDelete');
});

// STDENT SHIFT CONTROLLER STARTS
Route::group(['prefix'=>'shift','auth'],function(){
    Route::get('/view',[StudentShiftController::class,'shiftView'])->name('shiftView');
    Route::get('/add',[StudentShiftController::class,'shiftAdd'])->name('shiftAdd');
    Route::post('/post',[StudentShiftController::class,'addShiftPost'])->name('addShiftPost');
    Route::get('/edit/{id}',[StudentShiftController::class,'shiftEdit'])->name('shiftEdit');
    Route::post('/update/{id}',[StudentShiftController::class,'updateShift'])->name('updateShift');
    Route::get('/delete/{id}',[StudentShiftController::class,'shiftDelete'])->name('shiftDelete');
});

// STUDENT FEE CATEGORY CONTROLLER STARTS
Route::group(['prefix'=>'fee-category','auth'],function(){
    Route::get('/view',[FeeCategoryController::class,'feeView'])->name('feeView');
    Route::get('/add',[FeeCategoryController::class,'feeAdd'])->name('feeAdd');
    Route::post('/post',[FeeCategoryController::class,'addFeePost'])->name('addFeePost');
    Route::get('/edit/{id}',[FeeCategoryController::class,'feeEdit'])->name('feeEdit');
    Route::post('/update-post/{id}',[FeeCategoryController::class,'updateFee'])->name('updateFee');
    Route::get('/delete/{id}',[FeeCategoryController::class,'feeDelete'])->name('feeDelete');
});
// FEE AMOUNT CONTROLLER STARTS
Route::group(['prefix'=>'fee-amount','auth'],function(){
    Route::get('/view',[FeeAmountController::class,'feeAmountView'])->name('feeAmountView');
    Route::get('/add',[FeeAmountController::class,'feeAmountAdd'])->name('feeAmountAdd');
    Route::post('/add-post',[FeeAmountController::class,'feeAmountPost'])->name('feeAmountPost');
    Route::get('/delete/{id}',[FeeAmountController::class,'feeDelete'])->name('feeDelete');
    Route::get('/edit/{id}',[FeeAmountController::class,'feeAmountEdit'])->name('feeAmountEdit');
});



