<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUSerController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [JobController::class, 'index'] );
Route::get('/search', SearchController::class);

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUSerController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);    
    Route::get('/login', [SessionController::class, 'create']);
    Route::post('/login', [SessionController::class, 'store']);
});

Route::delete('/logout', [SessionController::class, 'destroy'])->middleware('auth');