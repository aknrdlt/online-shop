<?php

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

Route::middleware('auth:sanctum')->group(function () {
    // Protected routes
    // Route::get('/your-endpoint', [YourController::class, 'yourMethod']);
    Route::get('/me', function(Request $request) {
        return auth()->user();
    });
});
