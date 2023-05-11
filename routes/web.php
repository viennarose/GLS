<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactInformationController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResourcesController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\Admin_FileController;
use App\Http\Controllers\Admin_HomeController;
use App\Http\Controllers\Admin_UserController;
use App\Http\Controllers\Admin_ProfileController;
use App\Http\Controllers\Admin_ChangePasswordController;



Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(['verify' => true]);

Route::middleware(['auth'])->group(function () {
    Route::get('/approval',  [HomeController::class, 'approval'])->name('approval');
    Route::get('/user/{user_id}/resend-approval-notification', [Admin_UserController::class, 'resendApprovalNotification'])->name('user.resend_approval_notification');

});

Route::middleware(['auth','approved'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    // Route::get('/files', [FileController::class, 'index'])->name('files.index');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/contact_information', [ContactInformationController::class, 'index'])->name('contact_information');
    Route::get('/about_us', [AboutUsController::class, 'index'])->name('about_us');
    Route::put('/update-profile/{id}', [ProfileController::class, 'update_profile'])->name('change_profile');
    Route::get('/change-password/{id}', [ChangePasswordController::class, 'index'])->name('change_password.index');
    Route::post('/change-password', [ChangePasswordController::class, 'change_password'])->name('change_password');

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
    Route::get('/profile', [Admin_ProfileController::class, 'index'])->name('admin.profile');
    Route::put('/update-profile/{id}', [Admin_ProfileController::class, 'update_profile'])->name('admin.change_profile');
    Route::get('/change-password/{id}', [Admin_ChangePasswordController::class, 'index'])->name('admin.change_password.index');
    Route::post('/change-password', [Admin_ChangePasswordController::class, 'change_password'])->name('admin.change_password');
    Route::put('/update-role/{id}', [Admin_UserController::class, 'updateRole'])->name('admin.updateRole');

});

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('admin/resources', [ResourcesController::class, 'index']);
    Route::get('admin/about', [AboutController::class, 'index']);
    Route::post('admin/about', [AboutController::class, 'store']);
    Route::get('admin/contact', [ContactController::class, 'index']);
    Route::post('admin/contact', [ContactController::class, 'store']);
});





