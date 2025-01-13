<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::middleware('setLocale')->group(function(){
    Route::middleware('auth:sanctum')->group(function(){
        Route::get('/user', [AuthController::class, 'findUser']);
        Route::get('/logout', [AuthController::class, 'logout']);
        Route::apiResource('/books', BookController::class);
    });
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/email-verify', [AuthController::class, 'verifyEmail']);
});
