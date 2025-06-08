<?php

use App\Http\Controllers\Accommodations\PostController;
use App\Http\Controllers\Api\BookingApp\AccommodationController;
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
    //  ->middleware(['auth:sanctum', 'throttle:60,1'])
     ->group(function () {
         Route::get('history',      [ApiBookingController::class, 'history'])->name('history');
         Route::post('/',           [ApiBookingController::class, 'storeBooking'])->name('store');
         Route::get('{booking}',    [ApiBookingController::class, 'show'])->name('show');
     });
Route::post('accommodations', [AccommodationController::class, 'listAccommodations'])->name('accommodations.list');
Route::post('accommodations/top-rated', [AccommodationController::class, 'topRating'])->name('accommodations.top-rating');
Route::post('accommodations/{id}', [AccommodationController::class, 'accommodation'])->name('accommodations.list');