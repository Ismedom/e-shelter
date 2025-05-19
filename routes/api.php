<?php

use App\Http\Controllers\Api\BookingApp\ApiBookingController;
use App\Http\Controllers\Api\BookingApp\Auth\AuthenticationController;
use Illuminate\Support\Facades\Route;


Route::prefix('auth')->group(function () {
    Route::post('/sign-in', [AuthenticationController::class, 'signIn']);
    Route::post('/sign-up', [AuthenticationController::class, 'signUp']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/sign-out', [AuthenticationController::class, 'signOut']);
    });
});

Route::prefix('booking')
     ->middleware(['auth:sanctum', 'throttle:60,1'])
     ->group(function () {
         Route::get('history',      [ApiBookingController::class, 'history'])->name('history');
         Route::post('/',           [ApiBookingController::class, 'storeBooking'])->name('store');
         Route::get('{booking}',    [ApiBookingController::class, 'show'])->name('show');
     });
