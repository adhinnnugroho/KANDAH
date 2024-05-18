<?php

use App\Http\Controllers\Auth as AuthController;
use App\Http\Controllers\Welcome\WelcomeController;
use Illuminate\Support\Facades\Route;


Route::middleware(['guest'])->group(function () {
    Route::get('/', [AuthController\AuthenticatedSessionController::class, 'index']);
    Route::get('/login', [AuthController\AuthenticatedSessionController::class, 'index']);

    Route::name('google.')->prefix('google')->group(function () {
        Route::get('/', [AuthController\GoogleController::class, 'redirectToGoogle'])->name('actions');
        Route::get('/callback', [AuthController\GoogleController::class, 'Handlecallback'])->name('callback');
    });
});


Route::middleware(['auth'])->group(function () {
    Route::name('dashboard.')->prefix('dashboard')->group(function () {
        Route::get('/', [WelcomeController::class, 'index'])->name('index');
    });
});
