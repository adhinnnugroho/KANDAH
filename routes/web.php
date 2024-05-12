<?php

use App\Http\Controllers\Auth as AuthController;
use Illuminate\Support\Facades\Route;


Route::get('/', [AuthController\AuthenticatedSessionController::class, 'index']);

Route::name('google.')->prefix('google')->group(function () {
    Route::get('/', [AuthController\GoogleController::class, 'redirectToGoogle'])->name('actions');
    Route::get('/callback', [AuthController\GoogleController::class, 'Handlecallback'])->name('callback');
});
