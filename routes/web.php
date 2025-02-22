<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsOtpVerified;
use App\Http\Middleware\UserMiddleware;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\BkashPaymentController;
use App\Http\Controllers\UserRegistrationController;
use App\Http\Middleware\CheckRegistrationConfirmation;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/registraion', function () {
    return view('registration_form');
})->name('registration');

Route::get('/login', [UserAuthController::class, 'isLogin'])->name('login');

Route::post('/login',[UserAuthController::class, 'submitLoginForm'])->middleware('throttle: 3, 1')->name('user.login');
Route::get('/logout',[UserAuthController::class, 'logoutUser'])->name('user.logout');

Route::middleware(UserMiddleware::class)->group(function(){
    Route::get('/profile', [UserRegistrationController::class, 'userProfileData'])->name('profile');
    Route::get('/profile/update', [UserRegistrationController::class, 'userProfileUpdate'])->name('update.profile');
    Route::post('/profile/update', [UserRegistrationController::class, 'userProfileUpdatePost'])->name('update.profile.post');
});


Route::get('/test', function () {
    return view('test');
})->name('test');

Route::get('/opinion', function () {
    return view('opinion');
})->name('opinion');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/opinion', [UserRegistrationController::class, 'opinionSubmit'])->name('opinion.submit');

Route::post('/calculate-payment-and-participants', [UserRegistrationController::class, 'paymentAndParticipants'])->name('payment.participants');

Route::get('/payment-summary', function () {
    if(empty(session()->get('validate_data')['mobile_number']) || empty(session()->get('total_amount')) || session()->has('otp_verified')) {
        return redirect()->route('home');
    }
    return view('payment_summary');
})->name('payment.summary');

Route::get('/payment', [BkashPaymentController::class, 'bkashPayment'])->name('payment');

Route::get('/send-otp',[UserRegistrationController::class, 'sendOtp'])->name('send.otp');

Route::get('/verify-otp', function () {
    return view('otp_verification');
})->middleware(IsOtpVerified::class)->name('otp.verification');

Route::post('/submitted-otp',[UserRegistrationController::class, 'otpVerify'])->name('submitted.otp.verification');

Route::get('/transaction-status', [BkashPaymentController::class, 'transactionStatus'])->name('transaction.status');

Route::get('/registration-confirmation', function() {
    return view('registration_confirmation');
})->middleware(CheckRegistrationConfirmation::class)->name('registration.confirmation');


Route::prefix('admin')->group(function (){
    Route::get('/', function (){
        return redirect()->route('admin.login.form');
    });

    Route::get('/login', function (){
        if(Auth::guard('web')->check()) {
            return redirect()->route('home');
        }
        return view('admin.login_form');
    })->name('admin.login.form');

    Route::post('/login', [AdminController::class, 'login'])->middleware('throttle: 3, 1')->name('admin.login');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    // Route::get('/insert', [AdminController::class, 'insertAdmin']);
    
    Route::middleware(AdminMiddleware::class)->group(function () {
        Route::get('/dashboard', [UserRegistrationController::class, 'usersData'])->name('admin.dashboard');
        Route::get('/user/search', [UserRegistrationController::class, 'userSearch'])->name('admin.user.search');
        Route::post('/user/update/given',[UserRegistrationController::class, 'updateGivenData'])->name('user.update.given');
        Route::get('/received-opinion', [UserRegistrationController::class, 'usersOpinionData'])->name('admin.received.opinion');
        Route::get('/received-opinion/view/{id}', [UserRegistrationController::class, 'userOpinionDataView'])->name('admin.received.opinion.view');
    });
  
});