<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(['verify' => true]);


Route::middleware(['auth'])->group(function () {
    Route::get('/approval',  [App\Http\Controllers\HomeController::class,'approval'])->name('approval');

    Route::middleware(['approved'])->group(function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class,'index'])->name('home');
        Route::get('/files', [FileController::class,'index'])->name('files.index');
    });

    Route::middleware(['admin'])->group(function () {
        Route::get('/pending_approval_requests', [App\Http\Controllers\UserController::class,'index'])->name('admin.users.index');
        Route::get('/users/{user_id}/approve', [App\Http\Controllers\UserController::class,'approve'])->name('admin.users.approve');
        Route::get('/delete_requests/{id}', [UserController::class,'delete_requests']);
        Route::get('/files/index', [FileController::class,'index'])->name('admin.files.index');
    });


});
