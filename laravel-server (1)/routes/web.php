<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\ResetPinController;
use App\Http\Controllers\Crypto\CryptoController;
use App\Http\Controllers\Crypto\CryptoSendController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\Crypto\BitcoinController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\DaddressController ;
use App\Http\Controllers\Crypto\ShowCoinController;
use App\Http\Controllers\Crypto\CoinController;
use App\Http\Controllers\KycController;
use Illuminate\Support\Facades\Artisan;


// Public routes
Route::get('/', function () {
    return view('index');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/forgot-pin', function () {
    return view('auth.forgot-pin');
})->name('forgot-pin');

Route::get('/signup', [RegistrationController::class, 'create'])->name('signup');
Route::post('/signup', [RegistrationController::class, 'store']);

Route::get('/signin', [LoginController::class, 'create'])->name('login');
Route::post('/signin', [LoginController::class, 'store']);

Route::get('/verify', [VerificationController::class, 'create'])->name('verifyOtp');
Route::post('/verify', [VerificationController::class, 'verifyOtp'])->name('verify.otp');
Route::post('/resend-otp', [VerificationController::class, 'resendOtp'])->name('resend.otp');

Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

Route::get('/forgot-pin', [ResetPinController::class, 'showForgotPinForm'])->name('forgot-pin');
Route::post('/forgot-pin', [ResetPinController::class, 'sendResetLink'])->name('forgot-pin.send');
Route::get('/reset-pin/{token}', [ResetPinController::class, 'showResetPinForm'])->name('reset-pin');
Route::post('/reset-pin', [ResetPinController::class, 'resetPin'])->name('reset-pin.update');


// Authenticated routes with 'auth' and 'verified' middleware
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/crypto', [CryptoController::class, 'index'])->name('crypto.index');
    Route::get('/crypto-send', [CryptoSendController::class, 'index'])->name('crypto-send');
    Route::post('/crypto-send', [CryptoSendController::class, 'sendCrypto']);
    
    Route::get('/address-book', [DaddressController::class, 'showAllAddresses']);
    
    Route::view('/price-alerts', 'price-alerts');
    Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile');
    Route::get('/my-account', [ProfileController::class, 'showAccountPage'])->name('my-account');
    Route::get('/change-pin', [ProfileController::class, 'showChangePin'])->name('change-pin');
    Route::post('/change-pin', [ProfileController::class, 'changePin'])->name('profile.change-pin');
    Route::post('/profile/update', [ProfileController::class, 'updateUser'])->name('profile.update');
    
    Route::get('/history', [TransactionController::class, 'getUserDetails']);
    
    // Route to display the form (crypto request page)
    Route::get('/fetch-all-cryptos', [DaddressController::class, 'fetchAllCryptos']);
    Route::view('/crypto-request', 'crypto-request');
    Route::get('/crypto-request/{cryptoType?}', [DaddressController::class, 'showAddressForRequest'])->name('crypto.request');
    
    Route::view('/crypto-exchange', 'crypto-exchange');


    // Then, define the dynamic route for other coins
    Route::get('coins/{cryptoId}', [ShowCoinController::class, 'show']);

    Route::get('/receive/{cryptoType}', [DaddressController::class, 'showAddress'])->name('receive.show');

    Route::post('/connect-wallet', [WalletController::class, 'connectWallet'])->name('connect-wallet');
    Route::get('/connect-wallet', [WalletController::class, 'show']);
     
   
    
    // Fetch the price for a specific cryptocurrency
    Route::match(['get', 'post'], '/price/{cryptoType}', [CoinController::class, 'fetchCryptoPrice'])->name('send.show');
    Route::get('/send/{cryptoType}', [CoinController::class, 'showSendForm'])->name('send.show');

    // Handle the form submission to send cryptocurrency
    Route::post('/send/{cryptoType}', [CoinController::class, 'processSend'])->name('send.show');

    Route::view('/setting', 'settings');
    Route::view('/insight', 'insight');
    Route::view('/faq', 'help');
    Route::get('/kyc', [KycController::class, 'viewKyc'])->name('kyc.view');
    Route::get('/upload-kyc', [KycController::class, 'uploadKycForm'])->name('kyc.uploadForm');
    Route::post('/upload-kyc', [KycController::class, 'uploadKyc'])->name('kyc.upload');
});
