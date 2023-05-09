<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::prefix('/')->controller(OrderController::class)->group(function() {
    Route::get('','index');
    Route::post('order-submit','orderSubmit')->name('order-submit');
});

Route::resource('category', CategoryController::class);
Route::get('category/datatables/ssd', [CategoryController::class,'ssd'])->name('getDatatable');

Route::resource('dish', DishController::class);
