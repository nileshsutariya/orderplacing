<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDashboard;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\dashboard;
use App\Http\Controllers\partydashboard;

use App\Http\Controllers\Item_groupController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;

Route::get('/', [LoginController::class, 'index'])->name('loginform');
Route::post('/abc', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('adminlogout');

Route::get('/admin/dashboard', [AdminDashboard::class, 'dashboard'])->name('admindashboard');
Route::get('/orderview', [OrderController::class, 'orderview'])->name('orderview');
Route::get('/orderstatus', [OrderController::class, 'orderstatus'])->name('orderstatus');
Route::post('/statusupdate/{id}', [OrderController::class, 'statusupdate'])->name('statusupdate');

Route::get('/party',[PartyController::class,'index'] )->name('party.index');
Route::post('/party/store',[PartyController::class,'store'] )->name('party.store');

Route::get('/ordernow',[AdminDashboard::class,'ordernow'] )->name('party.ordernow');
Route::post('/orderconfirm',[partydashboard::class,'orderconfirm'] )->name('party.orderconfirm');
Route::get('/partydashboard',[partydashboard::class,'index'] )->name('partydashboard.index');

Route::post('/fileupload', [ItemController::class, 'upload']);

Route::group(['prefix'=>'admin'], function () {

    Route::get('/dashboard',[dashboard::class,'index'] )->name('dashboard.index');
    Route::get('/dashboard',[dashboard::class,'partyindex'] )->name('partydashboard.index');

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
    
    Route::get('/party/edit/{id}',[PartyController::class,'edit'] )->name('party.edit');
    Route::post('/party/update',[PartyController::class,'update'] )->name('party.update');
    Route::get('/party/delete/{id}',[PartyController::class,'delete'] )->name('party.delete');

    Route::get('/user',[UserController::class,'index'] )->name('user.index');
    Route::post('/user/store',[UserController::class,'store'] )->name('user.store');
    Route::get('/user/edit/{id}',[UserController::class,'edit'] )->name('user.edit');
    Route::post('/user/update',[UserController::class,'update'] )->name('user.update');
    Route::get('/user/delete/{id}',[UserController::class,'delete'] )->name('user.delete');

    Route::get('/dashboard',[dashboard::class,'index'] )->name('dashboard.index');
    Route::get('/cart',[dashboard::class,'index'])->name('party.cart');

});