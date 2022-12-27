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

Route::get('admin', function () {
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
Route::get('/products/all', [App\Http\Controllers\ProductController::class, 'allProduct'])->middleware('auth');
Route::get('/products/deactivate/{id}', [App\Http\Controllers\ProductController::class, 'productDeactivate'])->middleware('auth');
Route::get('/products/activate/{id}', [App\Http\Controllers\ProductController::class, 'productActivate'])->middleware('auth');
Route::get('/products/edit/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->middleware('auth');
Route::post('/products/update/{id}', [App\Http\Controllers\ProductController::class, 'update'])->middleware('auth');

Route::get('/orders/all-orders', [App\Http\Controllers\OrderController::class, 'allOrdrs'])->middleware('auth');
Route::get('/order-confirm/{id}', [App\Http\Controllers\OrderController::class, 'orderConfime'])->middleware('auth');
Route::post('/add-comment/{id}', [App\Http\Controllers\OrderController::class, 'orderComment'])->middleware('auth');

Route::get('/orders/handover', [App\Http\Controllers\OrderController::class, 'orderHandover'])->middleware('auth');
Route::get('/order-invoice/{id}', [App\Http\Controllers\OrderController::class, 'orderInvoice'])->middleware('auth');
Route::get('/order-handover/{id}', [App\Http\Controllers\OrderController::class, 'orderHandoverConfirm'])->middleware('auth');
Route::get('/orders/status', [App\Http\Controllers\OrderController::class, 'orderStatus'])->middleware('auth');
Route::get('/orders-status-mark/{id}', [App\Http\Controllers\OrderController::class, 'orderStatusMark'])->middleware('auth');

//site urls
Route::get('/', [App\Http\Controllers\SiteController::class, 'index']);
Route::get('/view-single-item/{id}', [App\Http\Controllers\SiteController::class, 'viewSingleItem']);
Route::get('/items-all', [App\Http\Controllers\SiteController::class, 'viewAllItem']);
Route::get('/items-category/{id}', [App\Http\Controllers\SiteController::class, 'viewCategoryItem']);
Route::get('/contact-us', [App\Http\Controllers\SiteController::class, 'contactUs']);
Route::post('/add-to-cart', [App\Http\Controllers\SiteController::class, 'addToCart']);
Route::get('/view-cart', [App\Http\Controllers\SiteController::class, 'viewCart']);
Route::post('/update-cart', [App\Http\Controllers\SiteController::class, 'updateCart']);
Route::get('/remove-cart/{id}', [App\Http\Controllers\SiteController::class, 'removeCart']);
Route::get('/order-checkout', [App\Http\Controllers\SiteController::class, 'checkout']);
Route::post('/order-confirm', [App\Http\Controllers\SiteController::class, 'orderConfirm']);
Route::get('/search-city', [App\Http\Controllers\SiteController::class, 'Searchcity']);
Route::get('/search-rate', [App\Http\Controllers\SiteController::class, 'Searchrate']);


