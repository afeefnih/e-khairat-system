<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DependentController;

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
Route::post('http://e-khairat-system.test/donation/callback', [GuestController::class, 'donationCallback'])->name('donation.callback');



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

Route::get('/invoice/{user}', [AuthController::class, 'invoice'])->name('invoice.show');
Route::post('/invoice/{user}', [AuthController::class, 'processInvoice'])->name('invoice.process');


// Dashboard Route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');



// Route to add dependents
Route::get('/dependent/add/{user}', [DependentController::class, 'addDependentPage'])->name('dependent.add');
Route::post('/dependent/store/{user}', [DependentController::class, 'storeDependent'])->name('dependent.store');

// Payment Routes (Fees)
Route::post('/payment/callback', [FeeController::class, 'paymentCallback'])->name('payment.callback'); // Callback for fee payments
Route::get('/payment/return', [FeeController::class, 'paymentReturn'])->name('payment.return'); // Return URL after fee payment

Route::get('/get/banks/fpx', [FeeController::class, 'getBankFpx'])->name('get::banks');
Route::get('/Create/fee/{user}', [FeeController::class, 'createFee'])->name('create::Fee');

// Profile Routes
Route::middleware('auth')->group(function () {
    // Profile and dependent routes
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::post('/profile/dependent/add', [ProfileController::class, 'addDependent'])->name('Newdependent.store');

// Route to edit dependents
Route::get('/dependents/{dependent}/edit', [DependentController::class, 'editDependents'])->name('dependents.edit');

Route::put('/dependents/{dependent}', [DependentController::class, 'updateDependents'])->name('dependents.update');

Route::delete('/dependents/{dependent}', [DependentController::class, 'deleteDependent'])->name('dependents.delete');
});

Route::get('/password/change', [ProfileController::class, 'showChangePasswordForm'])->name('password.change.form')->middleware('auth');
Route::post('/password/change', [ProfileController::class, 'changePassword'])->name('password.change')->middleware('auth');



// Fallback Route for Registration
Route::post('/register', [AuthController::class, 'register']);
