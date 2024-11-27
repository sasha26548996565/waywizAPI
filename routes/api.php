<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('auth')->controller(AuthController::class)->group(function() {
    Route::post('/register', 'register');
    Route::post('/login', 'login');

    Route::middleware('auth:sanctum')->post('/logout', 'logout');
});

Route::namespace('App\Http\Controllers\Api')->middleware('auth:sanctum')->group(function () {
    Route::prefix('openai')->namespace('Openai')->group(function () {
        Route::get('/get-messages/{userId}', IndexController::class);
        Route::post('/send-message', StoreController::class);
    });

    Route::name('admin.')
        ->namespace('Admin')
        ->prefix('admin')->group(function () {
        Route::prefix('user')->namespace('User')->group(function () {
            Route::get('/', IndexController::class);
        });

        Route::name('message.')->prefix('message')->namespace('Message')->group(function () {
            Route::get('/', IndexController::class);
        });
    });
});

