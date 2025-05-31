<?php

use App\Http\Controllers\Accommodations\AccommodationsController;
use App\Http\Controllers\Accommodations\FeaturesController;
use App\Http\Controllers\Billing\BillingController;
use App\Http\Controllers\Booking\BookingController;
use App\Http\Controllers\Business\BusinessInformationController;
use App\Http\Controllers\Content\ContentController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Guest\GuestController;
use App\Http\Controllers\Lang\SwichLanguageController;
use App\Http\Controllers\Mediation\UserFeedBackController;
use App\Http\Controllers\Room\RoomController;
use App\Http\Controllers\Room\RoomTypeController;
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

        Route::get('/delete', [UserController::class, 'selftDelete'])->name('delete');
    });

    //  dashboard
    Route::middleware(['auth', 'verified.email'])->group(function (){   
       
        // dashboard
       
        Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard.index');

        // users
        Route::get('/users',[UserController::class, 'index'])->name('users.index');
        Route::get('/users/search',[UserController::class, 'search'])->name('users.search.index');

        // guest 
        Route::get('/guests',[GuestController::class, 'index'])->name('guests.index');

        // booking 
        Route::get('/booking',[BookingController::class, 'index'])->name('booking.index');
        Route::get('/booking/{id}',[BookingController::class, 'show'])->name('booking.show');
        Route::get('/booking/{id}/edit',[BookingController::class, 'show'])->name('booking.edit');
        Route::get('/booking/{id}/confirm',[BookingController::class, 'show'])->name('booking.confirm');

        // billing 
        Route::get('/billing',[BillingController::class, 'index'])->name('billing.index');

        // content 
        Route::get('/content',[ContentController::class, 'index'])->name('content.index');

        Route::prefix('accommodation')->group(function (){
            Route::get('/',[AccommodationsController::class, 'index'])->name('accommodations.index');
            Route::get('/create',[AccommodationsController::class, 'create'])->name('accommodations.create');
            Route::post('/store',[AccommodationsController::class, 'store'])->name('accommodations.store');
            Route::get('/edit/{accommodation}',[AccommodationsController::class, 'edit'])->name('accommodations.edit');
            Route::put('/{accommodation}',[AccommodationsController::class, 'update'])->name('accommodations.update');
            Route::delete('/{accommodation}',[AccommodationsController::class, 'destroy'])->name('accommodations.delete');
            Route::get('/{accommodation}', [AccommodationsController::class, 'show'])->name('accommodations.show');

            Route::prefix('/{accommodation}')->group(function () {
                Route::resource('rooms', RoomController::class);
                // room type
                Route::resource('room-types', RoomTypeController::class);      
                // for feature
                Route::resource('features', FeaturesController::class);
            });
            // Route::resource('accommodations.room-types', RoomController::class);

        });

        // /user-feedback 
        Route::get('/user-feedback',[UserFeedBackController::class, 'index'])->name('user-feedback.index');
        
        // business information
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

    Route::prefix('admin/contents')->middleware(['auth'])->group(function () {
        Route::get('/', [ContentController::class, 'index'])->name('contents.index');
        Route::get('/hero', [ContentController::class, 'hero'])->name('contents.hero');
        Route::get('/province', [ContentController::class, 'province'])->name('contents.province');
        Route::get('/host', [ContentController::class, 'host'])->name('contents.host');
        Route::get('/benefits', [ContentController::class, 'benefits'])->name('contents.benefits');
        Route::get('/features', [ContentController::class, 'features'])->name('contents.features');
        Route::get('/faq', [ContentController::class, 'faq'])->name('contents.faq');
    });
});