<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\ProfileController;

// Home Routes
Route::get('/', function () {
    return view('Guest.Utama');
});

Route::get('/Utama', [GuestController::class, 'GuestView1'])->name('Utama');
Route::get('/syarat', [GuestController::class, 'GuestView2'])->name('Syarat');
Route::get('/Infaq', [GuestController::class, 'GuestView3'])->name('Infaq');

// Donation Routes
//Route::post('/Infaq', [GuestController::class, 'processDonation'])->name('donation.process'); // Handle donation submission
//Route::post('/Infaq/callback', [GuestController::class, 'donationCallback'])->name('donation.callback'); // ToyyibPay callback
//Route::get('/bill/payment/link/{bill_code}', [FeeController::class, 'billPaymentLink'])->name('bill::payment::link'); // Redirect to payment link


// Process the donation
Route::post('/Infaq', [GuestController::class, 'processDonation'])->name('donation.process');

// ToyyibPay callback for donations
Route::post('/donation/callback', [GuestController::class, 'donationCallback'])->name('donation.callback');

// Return URL for donations
Route::get('/donation/return', [GuestController::class, 'donationReturn'])->name('donation.return');

// Redirect to payment link
Route::get('/bill/payment/link/{bill_code}', [GuestController::class, 'billPaymentLink'])->name('bill::payment::link');

// Auth Routes
Route::get('/Login', [AuthController::class, 'create'])->name('Login');
Route::post('/Login', [AuthController::class, 'Login'])->name('Login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/Register', [AuthController::class, 'registerStepAll'])->name('StepAll');
Route::post('/Register', [AuthController::class, 'registerPost'])->name('register.post');

// Dashboard Route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// Payment Routes (Fees)
Route::post('/payment/callback', [FeeController::class, 'paymentCallback'])->name('payment.callback'); // Callback for fee payments
Route::get('/payment/return', [FeeController::class, 'paymentReturn'])->name('payment.return'); // Return URL after fee payment

Route::get('/get/banks/fpx', [FeeController::class, 'getBankFpx'])->name('get::banks');
Route::get('/Create/fee/{user}', [FeeController::class, 'createFee'])->name('create::Fee');

// Profile Routes
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');
Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');

// Fallback Route for Registration
Route::post('/register', [AuthController::class, 'register']);
