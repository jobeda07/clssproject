<?php

use App\Http\Controllers\newcontrol;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\dashcontroller;
use App\Http\Controllers\ViralController;
use App\Http\Controllers\backandcontroller;


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



                                    #login
Route::get('/register',[AuthController::class,'register'])->name('register');
Route::post('/registerSubmit',[AuthController::class,'register_Submit'])->name('registerSubmit');

Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/loginSubmit',[AuthController::class,'login_Submit'])->name('loginSubmit');




Route::group(['middleware'=>['auth','isAdmin']],function(){


Route::get('/logout',[AuthController::class,'logout'])->name('logout');





Route::get('/main-dashboard',[backandcontroller::class,'dashboardsecond'])->name('dashboardsecond');
Route::get('/test',[backandcontroller::class, 'test']);





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



                                    #ViralController
Route::get('/virallist',[ViralController::class,'virallist'])->name('viral.list');
Route::get('/viralform',[ViralController::class,'viralform'])->name('viral.form');
Route::post('/viralcreate',[ViralController::class,'viralcreate'])->name('viral.create');
Route::get('/editviralform/{id}',[ViralController::class,'edit_viralform'])->name('viral.editform');
Route::put('/update-viralform/{id}',[ViralController::class,'viral_updated'])->name('viral.updated');
Route::get('/delete-viral/{id}',[ViralController::class,'viral_delete'])->name('viral.delete');


                                    #employee
Route::get('/employee-form',[newcontrol::class,'employee_form'])->name('employee.form');
Route::get('/employee-list',[newcontrol::class,'employee_list'])->name('employee.list');
Route::post('/employee-create',[newcontrol::class,'employee_create'])->name('employee.create');
Route::get('/employee-editform/{id}',[newcontrol::class,'employee_editform'])->name('employee.editform');
Route::put('/empoly_updete/{id}',[newcontrol::class,'employee_update'])->name('employee.update');
Route::get('/employee_delete/{id}',[newcontrol::class,'employee_delete'])->name('employee.delete');


});