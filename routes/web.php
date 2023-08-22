<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\User\ProfileController as UserProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\HomeCmsController;
use App\Http\Controllers\Admin\ManagerController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\User\InvoiceController;
use Illuminate\Support\Facades\Artisan;

// Clear cache
Route::get('clear', function () {
    Artisan::call('optimize:clear');
    return "Optimize clear has been successfully";
});

/* ----------------- Frontend Routes -----------------*/

Route::get('/', [Homecontroller::class, 'home'])->name('home');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register-store', [AuthController::class, 'registerStore'])->name('register.store');
Route::post('/user-login-check', [AuthController::class, 'loginCheck'])->name('login.check');
Route::get('/form',[Homecontroller::class, 'form'])->name('form');
Route::post('forget-password', [ForgotPasswordController::class, 'forgetPassword'])->name('forget.password');
Route::post('change-password', [ForgotPasswordController::class, 'changePassword'])->name('change.password');
Route::get('forget-password/show', [ForgotPasswordController::class, 'forgetPasswordShow'])->name('forget.password.show');
Route::get('reset-password/{id}/{token}', [ForgotPasswordController::class, 'resetPassword'])->name('reset.password');
/* ----------------- Admin Routes -----------------*/

Route::get('/admin', [AdminController::class, 'admin'])->name('admin');
Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'admin'], function () {
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/users',[UserController::class, 'list'])->name('user.list');
        Route::get('/all-users',[Usercontroller::class,'userList'])->name('user.ajax.list');
        Route::get('/status-change',[UserController::class, 'userStatusChange'])->name('user.status.change');
        Route::get('profile', [ProfileController::class, 'index'])->name('admin.profile');
        Route::post('profile/update', [ProfileController::class, 'profileUpdate'])->name('admin.profile.update');
        Route::get('/home-cms',[HomeCmsController::class, 'homeCms'])->name('home.cms');
        Route::post('/home-cms-update',[HomeCmsController::class, 'homeCmsUpdate'])->name('home.cms.update');
        
        Route::resources([
            'managers' => ManagerController::class,
        ]);
        
         Route::get('managers/edit/{id}', [ManagerController::class, 'editManager'])->name('edit.manager');
         Route::post('/updateManager',[ManagerController::class, 'updateManager'])->name('update.managers');
        Route::get('logout', [AuthController::class, 'logout'])->name('admin.logout');
        
    });
});

Route::group(['prefix' => 'user'], function () {
    Route::group(['middleware' => 'user'], function () {
        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('user.dashboard');
        Route::get('profile', [UserProfileController::class, 'index'])->name('user.profile');
        Route::post('profile/update', [UserProfileController::class, 'profileUpdate'])->name('user.profile.update');
        Route::get('logout', [UserProfileController::class, 'logout'])->name('user.logout');
        // Route::resource('invoice', 'InvoiceController');
        Route::resources([
            'invoice' => InvoiceController::class,
        ]); 
    });
    
    Route::get('download-invoice/{id}', [InvoiceController::class, 'downloadInvoice'])->name('download.invoice');
    Route::get('invoiceChangeStatus', [InvoiceController::class, 'invoiceChangeStatus'])->name('invoice.change-status');
    Route::get('numberCheck', [InvoiceController::class, 'numberCheck'])->name('invoice.number-check');
    
});


Route::get('/cronsStartToWorkEmailSend', function () {
    Artisan::call('send:mail');
    return true;
});
