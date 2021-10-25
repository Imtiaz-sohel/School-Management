<?php

use App\Http\Controllers\Backend\ProfileController;
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

