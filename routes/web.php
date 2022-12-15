<?php

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth');
Route::get('/products/category', [App\Http\Controllers\ProductController::class, 'categoryUI'])->middleware('auth');
Route::post('/products/category-save', [App\Http\Controllers\ProductController::class, 'categorySave'])->middleware('auth');
Route::get('/products/category-deactivate/{id}', [App\Http\Controllers\ProductController::class, 'categoryDeactivate'])->middleware('auth');
Route::get('/products/category-activate/{id}', [App\Http\Controllers\ProductController::class, 'categoryActivate'])->middleware('auth');
Route::get('/products/create-new', [App\Http\Controllers\ProductController::class, 'createUI'])->middleware('auth');
Route::post('/products/save', [App\Http\Controllers\ProductController::class, 'saveProduct'])->middleware('auth');
