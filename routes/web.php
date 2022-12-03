<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashcontroller;
use App\Http\Controllers\backandcontroller;
use App\Http\Controllers\newcontrol;


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

Route:: get('/', function () {
    return view ('welcome');
});



Route::get('/main-dashboard',[backandcontroller::class,'dashboardsecond']);
Route::get('/test',[backandcontroller::class, 'test']);
Route::get('/employee',[newcontrol::class,'employee'])->name('employee');
Route::get('/category',[newcontrol::class,'category'])->name('category');

Route::get('/createpage',[newcontrol::class,'createpage'])->name('createpage');
Route::post('/create',[newcontrol::class,'create'])->name('create');
Route::get('/deletecategory/{id}',[newcontrol::class,'deletecategory'])->name('deletecategory');
Route::get('/categorypage-edit/{id}',[newcontrol::class,'edit'])->name('category.edit');
Route::put('/updatecategory/{id}',[newcontrol::class,'updatecategory'])->name('updatecategory');

//user start
Route::get('/Users',[newcontrol::class,'users'])->name('users');
Route::post('/usercreate',[newcontrol::class,'usercreate'])->name('usercreate');
Route::get('/usershowpage',[newcontrol::class,'usershowpage'])->name('usershowpage');
Route::get('/deleteuser/{id}',[newcontrol::class,'deleteuser'])->name('deleteuser');
Route::get('/edituser/{id}',[newcontrol::class,'edituser'])->name('edituser');
Route::put('/updateduser/{id}',[newcontrol::class,'updateduser'])->name('updateduser');
