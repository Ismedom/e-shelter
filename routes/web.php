<?php

use App\Http\Controllers\Business\BusinessInformationController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Guest\GuestController;
use App\Http\Controllers\Lang\SwichLanguageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\ForgotPasswordController;

// Authentication
Route::middleware('locale')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::middleware(['redirectIfAuthenticated'])->group(function () {
            // Registration & Login
            Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
            Route::post('/register', [AuthController::class, 'register']);
            Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
            Route::post('/login', [AuthController::class, 'login']);

            // Forgot & Reset Password
            Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('password.request');
            Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
            Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showOtpForm'])->name('password.reset');
            Route::post('/verify-otp', [ForgotPasswordController::class, 'verifyOtp'])->name('password.verify-otp');
            Route::get('/reset-password-form/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset-form');
            Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('password.update');
        });

        // Email verification (requires authentication)
        Route::middleware(['auth'])->group(function () {
            Route::middleware(['redirectIfAuthenticated'])->group(function () {
                Route::get("/verify", [AuthController::class, 'verifyEmail'])->name('verify');
                Route::post("/verify", [AuthController::class, 'verifyEmailOTP'])->name('verify.otp');
                Route::post("/resend-otp", [AuthController::class, 'resendOTP'])->name('resendOTP');
            });

            Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        });
    });

    // Authenticated and Verified Dashboard
    Route::middleware(['auth', 'verified.email'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/guests', [GuestController::class, 'index'])->name('guests.index');
        Route::get('/business-information', [BusinessInformationController::class, 'index'])->name('business-information.index');
    });

    // Language Switch
    Route::post('lang', [SwichLanguageController::class, 'switchLang'])->name('lang.switch');

    // Website Pages
    Route::get("/", function () {
        return view('website.home');
    })->name('home');

    Route::get("/service", function () {
        return view('website.service');
    })->name('service');

    Route::get("/partner", function () {
        return view('website.partner');
    })->name('partner');

    Route::get("/features", function () {
        return view('website.features');
    })->name('features');

    Route::prefix("term-condition")->group(function () {
        Route::get("hotel-owner", function () {
            return view('website.term-condition.hotel-owner');
        });
        Route::get("user", function () {
            return view('website.term-condition.user');
        });
    });
});
