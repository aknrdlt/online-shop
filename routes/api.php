<?php

use App\Http\Controllers\Api\BasketController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/register', \App\Http\Controllers\Api\RegisterController::class)->name("register");
Route::post('/login', \App\Http\Controllers\Api\LoginController::class)->name("login");
Route::get('/products', [ProductController::class, 'index'])->name("product-list");
Route::get('/products/{slug}', [ProductController::class, 'showBySlug'])->name("product-by-slug");

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', function(Request $request) {
        return auth()->user();
    });
    Route::post('/cart/create', [CartController::class, 'store'])->name('store-cart');
    Route::put('/cart/{id}', [CartController::class, 'update'])->name('update-cart');
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('delete-product');
    Route::post('/orders/create', [OrderController::class, 'store'])->name('create-order');
    Route::get('/orders', [OrderController::class, 'index'])->name('order-list');

});
