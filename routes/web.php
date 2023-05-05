<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ResourcesController;
use App\Http\Controllers\Admin_FileController;
use App\Http\Controllers\Admin_HomeController;
use App\Http\Controllers\Admin_UserController;


Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(['verify' => true]);

Route::middleware(['auth'])->group(function () {
    Route::get('/approval',  [HomeController::class, 'approval'])->name('approval');
    Route::get('/user/{user_id}/resend-approval-notification', [Admin_UserController::class, 'resendApprovalNotification'])->name('user.resend_approval_notification');

});

Route::middleware(['approved'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    // Route::get('/files', [FileController::class, 'index'])->name('files.index');
});

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/resources', [ResourcesController::class, 'index'])->name('admin.resources');
    Route::get('/dashboard', [Admin_HomeController::class, 'index'])->name('admin.home_dashboard');
    Route::get('/files', [Admin_FileController::class, 'index'])->name('admin.files.index');
    Route::get('/pending_approval_requests', [Admin_UserController::class, 'index'])->name('admin.unapproved_users');
    Route::get('/users/{user_id}/approve', [Admin_UserController::class, 'approve'])->name('admin.users.approve');
    Route::delete('/delete_requests/{id}', [Admin_UserController::class, 'delete_requests'])->name('admin.delete_requests');

    Route::get('/users', [Admin_UserController::class, 'approvedIndex'])->name('admin.approved_users');
    Route::delete('/user/{id}', [Admin_UserController::class, 'delete_user'])->name('admin.delete_user');

});


