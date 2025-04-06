<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::prefix('auth')->group(function () {
    Route::middleware(['redirectIfAuthenticated'])->group(function (){
        Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
        Route::post('/register', [AuthController::class, 'register']);
    
        Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AuthController::class, 'login']);
    });

    Route::middleware(['auth'])->group(function(){
        Route::middleware(['redirectIfAuthenticated'])->group(function (){
            Route::get("/verify", [AuthController::class, 'verifyEmail'])->name('verify');
            Route::post("/verify", [AuthController::class, 'verifyEmailOTP'])->name('verify.otp');
            Route::post("/resend-otp", [AuthController::class, 'resendOTP'])->name('resendOTP');
        });
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    }); 
});

Route::middleware(['auth', 'verified.email'])->group(function (){
    Route::get('/', function () {
        return view('pages.dashboard.customer');
    })->name('dashboard');
});


