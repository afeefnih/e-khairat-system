<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('Guest.Utama');
});

Route::get('/Utama', [GuestController::class, 'GuestView1'])->name('Utama');
Route::get('/syarat', [GuestController::class, 'GuestView2'])->name('Syarat');
Route::get('/Infaq', [GuestController::class, 'GuestView3'])->name('Infaq');

Route::get('/Login', [AuthController::class, 'create'])->name('Login');
Route::post('/Login', [AuthController::class, 'Login'])->name('Login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/Register', [AuthController::class, 'registerStepAll'])->name('StepAll');
Route::post('/Register', [AuthController::class, 'registerPost']) ->name('register.post');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::post('/payment/callback', [FeeController::class, 'paymentCallback'])->name('payment.callback');
Route::get('/payment/return', [FeeController::class, 'paymentReturn'])->name('payment.return');


Route::get('/get/banks/fpx', [FeeController::class, 'getBankFpx'])->name('get::banks');
Route::get('/Create/fee/{user}', [FeeController::class, 'createFee'])->name('create::Fee');
Route::get('/bill/payment/link/{bill_code}', [FeeController::class, 'billPaymentLink'])->name('bill::payment::link');


Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');
Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');





Route::post('/register', [AuthController::class, 'register']);
