<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUSerController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;



Route::controller(Jobcontroller::class)->group(function() {
    Route::get('/',  'index' );
    Route::get('/jobs/create',  'create')->middleware('auth');
    Route::get('/jobs/{job}', 'show');
    Route::post('/jobs',  'store' )->middleware('auth');
    
    Route::get('/jobs/{job}/edit', 'edit')
    ->middleware('auth')
    ->can('edit', 'job');
    
    Route::patch('/jobs/{job}',  'update');
    Route::delete('/jobs/{job}','destroy');
});


Route::get('/search', SearchController::class);
Route::get('/tags/{tag:name}', TagController::class);

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUSerController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);    
    Route::get('/login', [SessionController::class, 'create']);
    Route::post('/login', [SessionController::class, 'store']);
});

Route::delete('/logout', [SessionController::class, 'destroy'])->middleware('auth');