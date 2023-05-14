<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TableController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::prefix('/')->controller(OrderController::class)->group(function() {
    Route::get('','index')->name('order-index');
    Route::post('order-submit','orderSubmit')->name('order-submit');
    Route::get('order-list','orderList')->name('order-list');
    Route::get('order/{order}/approve', 'approve')->name('order-approve');
    Route::get('order/{order}/cancel', 'cancel')->name('order-cancel');
    Route::get('order/{order}/ready', 'ready')->name('order-ready');
    Route::post('order/{order}/done', 'serve')->name('order-done');
});

Route::resource('category', CategoryController::class);
Route::get('category/datatables/ssd', [CategoryController::class,'ssd'])->name('getDatatable');

Route::resource('dish', DishController::class);
Route::resource('tables', TableController::class);
