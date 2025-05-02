<?php

use App\Http\Controllers\Accommodations\AccommodationsController;
use App\Http\Controllers\Booking\BookingController;
use App\Http\Controllers\Business\BusinessInformationController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Guest\GuestController;
use App\Http\Controllers\Lang\SwichLanguageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\UserController;

//  Authentication 

Route::middleware('locale')->group(function (){  
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

        // billing 
        Route::get('/billing',[GuestController::class, 'index'])->name('billing.index');

        // content 
        Route::get('/content',[GuestController::class, 'index'])->name('content.index');

        // hotel 
        Route::get('/accommodation',[AccommodationsController::class, 'index'])->name('accommodations.index');
        Route::get('/accommodation/create',[AccommodationsController::class, 'create'])->name('accommodations.create');
        Route::post('/accommodation/store',[AccommodationsController::class, 'store'])->name('accommodations.store');
        Route::get('/accommodation/edit/{id}',[AccommodationsController::class, 'edit'])->name('accommodations.edit');
        Route::post('/accommodation/update/{id}',[AccommodationsController::class, 'update'])->name('accommodations.update');
        Route::get('/accommodation/delete/{id}',[AccommodationsController::class, 'destroy'])->name('accommodations.delete');
        Route::get('/accommodation/{id}', [AccommodationsController::class, 'info'])->name('accommodations.info');

        // /user-feedback 
        Route::get('/user-feedback',[GuestController::class, 'index'])->name('user-feedback.index');
        
        // business information
        Route::get('/business-information', [BusinessInformationController::class, 'index'])->name('business-information.index');

    });

    Route::post('lang', [SwichLanguageController::class, 'switchLang'])->name('lang.switch');

    // website

    Route::get("/", function (){
        return view('website.home');
    })->name('home');

    Route::get("/service", function (){
        return ;
    })->name('service');

    Route::get("/partner", function (){
        return ;
    })->name('partner');

    Route::get("/features", function (){
        return ;
    })->name('features');
    Route::prefix("term-condition")->group(function(){
        Route::get("hotel-owner", function(){
            return view('website.term-condition.hotel-owner');
        });
        Route::get("user", function(){
            return view('website.term-condition.user');
        });
    });
});