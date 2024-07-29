<?php

use App\Http\Controllers\AdminController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\Item_groupController;

// Route::get('/', function () {
//     return view('item');
// }); 


Route::group(['prefix'=>'/admin'], function () {

    Route::get('/admin/login', [AdminController::class, 'loginform'])->name('loginadmin');
    Route::post('/admin/login', [AdminController::class, 'adminlogin'])->name('admin.login');
    Route::post('/logout', [AdminController::class, 'logout'])->name('adminlogout');

    Route::middleware('admin')->group(function () {
        Route::get('/admin', [AdminController::class,'adminindex'])->name('index');

        Route::get('/item',[ItemController::class,'index'] )->name('item.index');
        Route::post('/item/store',[ItemController::class,'store'] )->name('item.store');
        Route::get('/item/delete/{id}',[ItemController::class,'delete'] )->name('item.delete');
        Route::post('/item/update',[ItemController::class,'update'] )->name('item.update');
        Route::get('/item/edit/{id}',[ItemController::class,'edit'] )->name('item.edit');

        Route::get('/itemgroup',[Item_groupController::class,'index'] )->name('itemgroup.index');
        Route::post('/itemgroup/store',[Item_groupController::class,'store'] )->name('itemgroup.store');
        Route::get('/itemgroup/edit/{id}',[Item_groupController::class,'edit'] )->name('itemgroup.edit');
        Route::post('/itemgroup/update',[Item_groupController::class,'update'] )->name('itemgroup.update');
        Route::get('/itemgroup/delete/{id}',[Item_groupController::class,'delete'] )->name('itemgroup.delete');
       
        Route::get('/party/list',[PartyController::class,'index'] )->name('party.index');
        Route::get('/party/create',[PartyController::class,'create'] )->name('party.create');
        Route::post('/party/store',[PartyController::class,'store'] )->name('party.store');
        Route::get('/party/edit/{id}',[PartyController::class,'edit'] )->name('party.edit');
        Route::post('/party/update',[PartyController::class,'update'] )->name('party.update');
        Route::get('/party/delete/{id}',[PartyController::class,'delete'] )->name('party.delete');

        Route::get('/user/list',[UserController::class,'index'] )->name('user.index');
        Route::get('/user/create',[UserController::class,'create'] )->name('user.create');
        Route::post('/user/store',[UserController::class,'store'] )->name('user.store');
        Route::get('/user/edit/{id}',[UserController::class,'edit'] )->name('user.edit');
        Route::post('/user/update',[UserController::class,'update'] )->name('user.update');
        Route::get('/user/delete/{id}',[UserController::class,'delete'] )->name('user.delete');
    });


});