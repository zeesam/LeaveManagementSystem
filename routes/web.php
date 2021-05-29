<?php

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
    return view('welcome');
});

Route::get('/super/department',[App\Http\Controllers\DepartmentController::class,'index'])->middleware('admin');
Route::post('/super/department/add',[App\Http\Controllers\DepartmentController::class,'store'])->middleware('admin');
Route::post('/super/department/update/{id}',[App\Http\Controllers\DepartmentController::class,'update'])->middleware('admin');

Route::post('/user/applynewleave',[App\Http\Controllers\AppliedLeaveController::class,'store'])->middleware('auth');

Route::get('/dashboard',[App\Http\Controllers\UserController::class,'index'])->middleware('auth');
Route::post('user/profile',[App\Http\Controllers\UserController::class,'store'])->middleware('auth');
Route::post('user/profileupdate/{id}',[App\Http\Controllers\UserController::class,'update'])->middleware('auth');

Route::get('head/dashboard',[App\Http\Controllers\HeadUserController::class,'index'])->middleware('head');
Route::get('/head/regusers',[App\Http\Controllers\HeadUserController::class,'regusers'])->middleware('head');
Route::get('/head/applied',[App\Http\Controllers\AppliedLeaveController::class,'applied'])->middleware('head');
Route::get('/head/admleaves',[App\Http\Controllers\AppliedLeaveController::class,'admleaves'])->middleware('head');
Route::post('/head/approve/{id}',[App\Http\Controllers\AppliedLeaveController::class,'approve'])->middleware('head');
Route::post('/head/disapprove/{id}',[App\Http\Controllers\AppliedLeaveController::class,'disapprove'])->middleware('head');

Route::get('/super/dashboard',[App\Http\Controllers\AdminUserController::class,'index'])->middleware('admin');
Route::get('/super/addleave',[App\Http\Controllers\AdminUserController::class,'addleave'])->middleware('admin');
Route::post('/super/addnewleave',[App\Http\Controllers\LeaveTypeController::class,'store'])->middleware('admin');
Route::post('/super/userpass/{id}',[App\Http\Controllers\AdminUserController::class,'userpass'])->middleware('admin');
Route::get('/super/regusers',[App\Http\Controllers\AdminUserController::class,'regusers'])->middleware('admin');
Route::post('/super/approveuser/{id}',[App\Http\Controllers\AdminUserController::class,'approveuser'])->middleware('admin');
Route::get('/super/deleteuser/{id}',[App\Http\Controllers\AdminUserController::class,'deleteuser'])->middleware('admin');
require __DIR__.'/auth.php';
