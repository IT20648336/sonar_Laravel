<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\userController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\InquiryController;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/Dashboard','Layout.Header');
Route::view('/CreateProject','Project.CreateProject');
Route::view('/Dashboard','Layout.Header');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::middleware(['auth', 'admin'])->group(function () {
   
//});

//Route::get('/user/dashboard', [AdminController::class, 'dashboard'])->name('user.dashboard');

Route::get('/admin/dashboard', [usercontroller::class, 'dashboard'])->name('admin.dashboard');
Route::get('/user/dashboard', [usercontroller::class, 'dashboard'])->name('user.dashboard');

//multi stepper form
Route::get('/form/step1', [usercontroller::class, 'step1'])->name('form.step1');
Route::post('/form/step1', [usercontroller::class, 'postStep1'])->name('form.step1.post');

Route::get('/form/step2/{id}', [usercontroller::class, 'step2'])->name('form.step2');
Route::post('/form/step2', [usercontroller::class, 'postStep2'])->name('form.step2.post');

Route::get('/form/step3/{id}', [usercontroller::class, 'step3'])->name('form.step3');
Route::post('/form/step3', [usercontroller::class, 'postStep3'])->name('form.step3.post');

Route::get('/form/step4/{id}', [usercontroller::class, 'step4'])->name('form.step4');
Route::post('/form/step4', [usercontroller::class, 'postStep4'])->name('form.step4.post');

Route::get('/user/dashboard', [usercontroller::class, 'FetchFormData'])->name('user.dashboard');

//View model
Route::get('/user/{id}', [usercontroller::class, 'getUserData']);
//Edit model
Route::get('/user/{id}/edit', [usercontroller::class, 'edit'])->name('user.edit');
Route::put('/user/{id}', [usercontroller::class, 'update'])->name('user.update');
//Delete model
Route::delete('/user/{id}', [usercontroller::class, 'delete'])->name('user.delete');

//approve or reject
Route::put('/user/{id}/status',[usercontroller::class, 'updateStatus']);

//inquiry 
Route::post('/inquiry/store', [InquiryController::class, 'store'])->name('inquiry.store');
Route::get('/inquiry/list', [InquiryController::class, 'retrieve'])->name('inquiry.list');
Route::post('/inquiries/update-action', [InquiryController::class, 'updateAction'])->name('inquiries.updateAction');