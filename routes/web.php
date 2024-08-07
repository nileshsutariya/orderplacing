<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\dashboard;
use App\Http\Controllers\partydashboard;

use App\Http\Controllers\Item_groupController;
use App\Http\Controllers\LoginController;

Route::get('/', [LoginController::class, 'index'])->name('loginform');
Route::post('/abc', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('adminlogout');

Route::group(['prefix'=>'admin'], function () {

    // Route::get('/login', [AdminController::class, 'loginform'])->name('loginadmin');
    // Route::post('/login', [AdminController::class, 'adminlogin'])->name('admin.login');
    // // Route::post('/login', [AdminController::class, 'userlogin'])->name('user.login');
    // Route::post('/logout', [AdminController::class, 'logout'])->name('adminlogout');

    // // Route::middleware('admin')->group(function () {
    //     Route::get('/', [AdminController::class, 'adminindex'])->name('index');
        
        // Route::get('/party/dashboard', function () {
        //     return view('partydashboard');
        // }); 
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
       
        Route::get('/party/delete/{id}',[PartyController::class,'delete'] )->name('party.delete');

        Route::get('/user',[UserController::class,'index'] )->name('user.index');
        Route::post('/user/store',[UserController::class,'store'] )->name('user.store');
        Route::get('/user/edit/{id}',[UserController::class,'edit'] )->name('user.edit');
        Route::post('/user/update',[UserController::class,'update'] )->name('user.update');
        Route::get('/user/delete/{id}',[UserController::class,'delete'] )->name('user.delete');
    });

    Route::get('/partydashboard',[partydashboard::class,'index'] )->name('partydashboard.index');


    Route::get('/party',[PartyController::class,'index'] )->name('party.index');
    Route::post('/party/store',[PartyController::class,'store'] )->name('party.store');
    
    Route::get('/party/edit/{id}',[PartyController::class,'edit'] )->name('party.edit');
    Route::post('/party/update',[PartyController::class,'update'] )->name('party.update');

    Route::get('/cart/{id}',[partydashboard::class,'cart'])->name('cart');
    Route::get('/cart',[partydashboard::class,'cartview'])->name('cartview');
    Route::get('/cart/delete/{id}',[partydashboard::class,'delete'])->name('cart.delete');
    Route::post('/cart/update',[partydashboard::class,'cartqtyupdate'])->name('cart.qty.update');

    Route::post('/order/store',[OrderController::class,'store'] )->name('order.store');



    Route::get('/tax',[TaxController::class,'index'] )->name('tax.index');
    Route::post('/tax/store',[taxController::class,'store'] )->name('tax.store');
    Route::post('/tax/update',[taxController::class,'update'] )->name('tax.update');
    Route::get('/dashboard',[dashboard::class,'index'] )->name('dashboard.index');






