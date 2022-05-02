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
    return view('welcome');
});

Route::resource('/productos', App\Http\Controllers\ProductsController::class, ['names' => 'products']);

Route::get('/ventas', [App\Http\Controllers\ShopsController::class, 'index'])->name('shop.index');

Route::get('/ventas/create', [App\Http\Controllers\ShopsController::class, 'create'])->name('shop.create');

Route::patch('/ventas/create', [App\Http\Controllers\ShopsController::class, 'store'])->name('shop.store');

Route::get('/query/product', [App\Http\Controllers\QueryController::class, 'stock'])->name('query.stock');

Route::get('/query/product-shop', [App\Http\Controllers\QueryController::class, 'product_shop'])->name('query.product_shop');
