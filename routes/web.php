<?php

use App\Http\Controllers\AbaPayController;
use App\Http\Controllers\Accommodations\AccommodationsController;
use App\Http\Controllers\Accommodations\FeaturesController;
use App\Http\Controllers\Accommodations\PostController;
use App\Http\Controllers\Billing\BillingController;
use App\Http\Controllers\Booking\BookingController;
use App\Http\Controllers\Business\BusinessInformationController;
use App\Http\Controllers\Content\ContentController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Guest\GuestController;
use App\Http\Controllers\KhqrController;
use App\Http\Controllers\Lang\SwichLanguageController;
use App\Http\Controllers\Mediation\UserFeedBackController;
use App\Http\Controllers\PaymentController;
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

        Route::get('/login/google', [AuthController::class, 'google'])->name('google.auth');
        Route::get('/google/callback', [AuthController::class, 'googleCallBack'])->name('google.redirect');

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
                // for post
                Route::resource('posts', PostController::class);
            });
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

    // Add FAQ display route
    Route::get("/faq", [ContentController::class, 'displayFaq'])->name('faq.display');

    Route::prefix("term-condition")->group(function () {
        Route::get("hotel-owner", function () {
            return view('website.term-condition.hotel-owner');
        });
        Route::get("user", function () {
            return view('website.term-condition.user');
        });
    });

    Route::prefix('admin/contents')->middleware(['auth'])->group(function () {
        // Hero Section
        Route::get('/hero', [ContentController::class, 'hero'])->name('contents.hero');
        Route::match(['post', 'put'], '/hero', [ContentController::class, 'storeHero'])->name('contents.hero.store');
        
        // Province Section
        Route::get('/province', [ContentController::class, 'province'])->name('contents.province');
        Route::match(['post', 'put'], '/province', [ContentController::class, 'storeProvince'])->name('contents.province.store');
        
        // Host Section
        Route::get('/host', [ContentController::class, 'host'])->name('contents.host');
        Route::match(['post', 'put'], '/host', [ContentController::class, 'storeHost'])->name('contents.host.store');
        
        // Benefits Section
        Route::get('/benefits', [ContentController::class, 'benefits'])->name('contents.benefits');
        Route::match(['post', 'put'], '/benefits', [ContentController::class, 'storeBenefits'])->name('contents.benefits.store');
        
        // Features Section
        Route::get('/features', [ContentController::class, 'features'])->name('contents.features');
        Route::match(['post', 'put'], '/features', [ContentController::class, 'storeFeatures'])->name('contents.features.store');
        
        // FAQ Section
        Route::get('/faq', [ContentController::class, 'faq'])->name('contents.faq');
        Route::match(['post', 'put'], '/faq', [ContentController::class, 'storeFaq'])->name('contents.faq.store');
    });
});



Route::get('/payment', function () {
    return view('payment.form');
})->name('payment.form');

// Route::get('/khqr', [KhqrController::class, 'showForm']);
// Route::post('/khqr/generate', [KhqrController::class, 'generateQr']);

Route::get('/payment/display', function () {
    $html = session('aba_payment_html');
    if ($html) {
        return response($html);
    }
    return redirect()->route('payment.form');
})->name('payment.display');


Route::get('/pay', [AbaPayController::class, 'pay']);
Route::get('/pay/check/{tranId}', [AbaPayController::class, 'check'])->name('aba.check');
Route::get('/pay/success', [AbaPayController::class, 'success'])->name('aba.success');
Route::get('/pay/cancel', [AbaPayController::class, 'cancel'])->name('aba.cancel');
