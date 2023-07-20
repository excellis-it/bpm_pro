<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Homecontroller;


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

/* ----------------- Admin Routes -----------------*/

Route::get('/admin', [AdminAuthController::class, 'admin'])->name('admin');
Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'admin'], function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('users',[UserController::class, 'list'])->name('user.list');
        Route::get('profile', [ProfileController::class, 'index'])->name('admin.profile');
        Route::post('profile/update', [ProfileController::class, 'profileUpdate'])->name('admin.profile.update');
        Route::get('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
      
    });
});

Route::group(['prefix' => 'user'], function () {
    Route::group(['middleware' => 'user'], function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('user.dashboard');
        Route::get('profile', [ProfileController::class, 'index'])->name('admin.profile');
        Route::post('profile/update', [ProfileController::class, 'profileUpdate'])->name('admin.profile.update');
        Route::get('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
      
    });
});
