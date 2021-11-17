<?php

use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\AssignSubjectController;
use App\Http\Controllers\Backend\Setup\DegisnationController;
use App\Http\Controllers\Backend\Setup\ExtamtypeController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Setup\StudentSubjectController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Student\StudentRegController;
use App\Http\Controllers\Backend\UserController;
use App\Models\Degisnation;
use App\Models\StudentSubject;
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
    Route::get('/edit/{fee_categories_id}',[FeeAmountController::class,'feeAmountEdit'])->name('feeAmountEdit');
    Route::post('/update-post/{fee_categories_id}',[FeeAmountController::class,'updateAmountPost'])->name('updateAmountPost');
    Route::get('/fee-details/{fee_categories_id}',[FeeAmountController::class,'feeDetails'])->name('feeDetails');
});

// EXAM TYPE CONTROLLER STARTS
Route::group(['prefix'=>'exam-type','auth'],function(){
    Route::get('/view',[ExtamtypeController::class,'examTypeView'])->name('examTypeView');
    Route::get('/add',[ExtamtypeController::class,'examTypeAdd'])->name('examTypeAdd');
    Route::post('/add-post',[ExtamtypeController::class,'addExamPost'])->name('addExamPost');
    Route::get('/delete/{exam_id}',[ExtamtypeController::class,'examTypeDelete'])->name('examTypeDelete');
    Route::get('/edit/{exam_id}',[ExtamtypeController::class,'examTypeEdit'])->name('examTypeEdit');
    Route::post('/update-post/{exam_id}',[ExtamtypeController::class,'ExamUpdatePost'])->name('ExamUpdatePost');
});

// STUDENT SUBJECT CONTROLLER STARTS
Route::group(['prefix'=>'subject','auth'],function(){
    Route::get('/view',[StudentSubjectController::class,'subjectView'])->name('subjectView');
    Route::get('/add',[StudentSubjectController::class,'subjectAdd'])->name('subjectAdd');
    Route::post('/add-post',[StudentSubjectController::class,'addSubjectPost'])->name('addSubjectPost');
    Route::get('/edit/{subject_id}',[StudentSubjectController::class,'subjectEdit'])->name('subjectEdit');
    Route::post('/update/{subject_id}',[StudentSubjectController::class,'updateSubjectPost'])->name('updateSubjectPost');
    Route::get('/delete/{subject_id}',[StudentSubjectController::class,'subjectDelete'])->name('subjectDelete');
});

// ASSIGN SUBJECTCONTROLLER STARTS
Route::group(['prefix'=>'assign-subject','auth'],function(){
    Route::get('/view',[AssignSubjectController::class,'assignsubjectView'])->name('assignsubjectView');
    Route::get('/add',[AssignSubjectController::class,'assignsubjectAdd'])->name('assignsubjectAdd');
    Route::post('/add-post',[AssignSubjectController::class,'assignSubjectPost'])->name('assignSubjectPost');
    Route::get('/details/{class_id}',[AssignSubjectController::class,'assignSubjectDetails'])->name('assignSubjectDetails');
    Route::get('/edit/{class_id}',[AssignSubjectController::class,'assignSubjectEdit'])->name('assignSubjectEdit');
    Route::get('/delete/{class_id}',[AssignSubjectController::class,'assignSubjectDelete'])->name('assignSubjectDelete');
    Route::post('/update/{class_id}',[AssignSubjectController::class,'assignSubjectUpdate'])->name('assignSubjectUpdate');
});
// DEGISNATION CONTROLLER STARTS
Route::group(['prefix'=>'degisnation','auth'],function(){
    Route::get('/view',[DegisnationController::class,'degisnationView'])->name('degisnationView');
    Route::get('/add',[DegisnationController::class,'degisnationAdd'])->name('degisnationAdd');
    Route::post('/post',[DegisnationController::class,'addDesignationPost'])->name('addDesignationPost');
    Route::get('/delete/{id}',[DegisnationController::class,'deleteDesignation'])->name('deleteDesignation');
    Route::get('/edit/{id}',[DegisnationController::class,'editDesignation'])->name('editDesignation');
    Route::post('/update/{id}',[DegisnationController::class,'designationUpdatePost'])->name('designationUpdatePost');
});
// STUDENT REGISTRTION CONTROLLER STARTS
Route::group(['prefix'=>'student','auth'],function(){
    Route::get('/view',[StudentRegController::class,'viewregistration'])->name('viewregistration');
    Route::get('/add',[StudentRegController::class,'addStudent'])->name('addStudent');
    Route::get('/add-post',[StudentRegController::class,'addStudentPost'])->name('addStudentPost');
});





