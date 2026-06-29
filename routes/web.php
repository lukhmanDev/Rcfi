<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\ApplicationController;

// Redirect root to login page
Route::get('/', function () {
    return redirect()->route('login');
});

// Authentication routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/doAdminLogin', [AuthController::class, 'doLogin'])->name('do.admin_login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected admin panel routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.home');
    Route::get('/admin/users', [UserController::class, 'index'])->name('users');
    Route::post('/doAddUser', [UserController::class, 'store'])->name('do.add_user');
    Route::put('/admin/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    // Donors / Partners routes
    Route::get('/admin/donors', [DonorController::class, 'index'])->name('donors.index');
    Route::post('/admin/donors', [DonorController::class, 'store'])->name('donors.store');
    Route::put('/admin/donors/{id}', [DonorController::class, 'update'])->name('donors.update');
    Route::delete('/admin/donors/{id}', [DonorController::class, 'destroy'])->name('donors.destroy');

    // Applications routes
    Route::get('/admin/applications', [ApplicationController::class, 'index'])->name('applications.index');
    Route::get('/admin/applications/category/{category}', [ApplicationController::class, 'showCategory'])->name('applications.category');
    Route::post('/admin/applications', [ApplicationController::class, 'store'])->name('applications.store');
    Route::put('/admin/applications/{id}', [ApplicationController::class, 'update'])->name('applications.update');
    Route::delete('/admin/applications/{id}', [ApplicationController::class, 'destroy'])->name('applications.destroy');
});
