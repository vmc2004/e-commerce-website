<?php

use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\ProductController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('page.home');
Route::get('/shop', [HomeController::class, 'shop'])->name('page.shop');
Route::get('/cart', [CartController::class, 'index'])->name('page.cart');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('page.home');
Route::post('/addtocart', [CartController::class, 'addToCart'])->name('page.addToCart');
Route::get('/category/{category}', [ProductController::class, 'list'])->name('page.category.list');
Route::get('product/{slug}', [ProductController::class, 'detail'])->name('page.detail-product');