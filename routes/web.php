<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin_UserController;
use App\Http\Controllers\Admin_HomeController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(['verify' => true]);

Route::middleware(['auth'])->group(function () {
    Route::get('/approval',  [HomeController::class, 'approval'])->name('approval');
});

Route::middleware(['approved'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/files', [FileController::class, 'index'])->name('files.index');
});

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [Admin_HomeController::class, 'index'])->name('admin.home_dashboard');
    Route::get('/pending_approval_requests', [Admin_UserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/{user_id}/approve', [Admin_UserController::class, 'approve'])->name('admin.users.approve');
    Route::get('/delete_requests/{id}', [Admin_UserController::class, 'delete_requests']);
    Route::get('/files/index', [FileController::class, 'index'])->name('admin.files.index');
});
