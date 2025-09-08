<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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



Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/search', [ProductController::class, 'search'])->name('products.search'); //検索

Route::get('/products/register', [ProductController::class, 'register'])->name('products.register'); // 商品登録
Route::post('/products/register', [ProductController::class, 'store'])->name('products.store'); //処理

Route::get('/products/{productId}', [ProductController::class, 'show'])->name('products.show'); //詳細
Route::post('/products/{productId}/update', [ProductController::class, 'update'])->name('products.update'); //更新
