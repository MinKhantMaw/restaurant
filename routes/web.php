<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('category/')->controller(CategoryController::class)->group(function() {
    Route::get('', 'index')->name('category.index');
    Route::get('create', 'create')->name('category.create');
    Route::post('store', 'store')->name('category.store');
    Route::get('edit/{id}', 'edit')->name('category.edit');
    Route::put('update/{id}', 'update')->name('category.update');
    Route::delete('delete/{id}', 'delete')->name('category.delete');
});


Route::prefix('dishes')->controller(DishController::class)->group(function () {

});
