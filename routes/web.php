<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\Item_groupController;

Route::get('/', function () {
    return view('item');
}); 

Route::get('/item/list',[ItemController::class,'index'] )->name('item.index');
Route::get('/item/create',[ItemController::class,'create'] )->name('item.create');
Route::post('/item/store',[ItemController::class,'store'] )->name('item.store');
Route::get('/item/delete{id}',[ItemController::class,'delete'] )->name('item.delete');
Route::post('/item/update',[ItemController::class,'update'] )->name('item.update');
Route::get('/item/edit/{id}',[ItemController::class,'edit'] )->name('item.edit');

Route::get('/itemgroup/list',[Item_groupController::class,'index'] )->name('itemgroup.index');
Route::get('/itemgroup/create',[Item_groupController::class,'create'] )->name('itemgroup.create');
Route::post('/itemgroup/store',[Item_groupController::class,'store'] )->name('itemgroup.store');
Route::get('/itemgroup/edit/{id}',[Item_groupController::class,'edit'] )->name('itemgroup.edit');
Route::post('/itemgroup/update',[Item_groupController::class,'update'] )->name('itemgroup.update');
Route::get('/itemgroup/delete{id}',[Item_groupController::class,'delete'] )->name('itemgroup.delete');

