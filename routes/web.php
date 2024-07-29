<?php

use App\Http\Controllers\AdminController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;



Route::get('/admin/login', [AdminController::class, 'loginform'])->name('loginadmin');
Route::post('/admin/login', [AdminController::class, 'adminlogin'])->name('admin.login');
Route::post('/logout', [AdminController::class, 'logout'])->name('adminlogout');
Route::middleware('admin')->group(function () {
    Route::get('/admin', [AdminController::class,'adminindex'])->name('index');
});