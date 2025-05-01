<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Booking\Auth\AuthenticationController;


Route::prefix('auth')->group(function () {
    Route::post('/sign-in', [AuthenticationController::class, 'signIn']);
    Route::post('/sign-up', [AuthenticationController::class, 'signUp']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/sign-out', [AuthenticationController::class, 'signOut']);
    });
});
