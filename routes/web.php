<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PhoneVerificationController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', fn() => view('welcome'))->name('welcome');

/* Auth flows + pages (multi-étapes) */
Route::get('/auth/method', [AuthController::class, 'showMethod'])->name('auth.method');
Route::get('/auth/role', [AuthController::class, 'showRole'])->name('auth.role');
Route::get('/auth/register/{role}', [AuthController::class, 'showRegisterForm'])->name('auth.register.form');

Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/* Phone verification */
Route::middleware('auth')->group(function() {
    Route::get('/auth/verify-phone', [PhoneVerificationController::class, 'showVerifyPhone'])->name('auth.verify.phone');
    Route::post('/auth/send-code', [PhoneVerificationController::class, 'sendCode'])->name('auth.sendcode');
    Route::get('/auth/verify-code', [PhoneVerificationController::class, 'showVerifyCode'])->name('auth.show.verifycode');
    Route::post('/auth/verify-code', [PhoneVerificationController::class, 'verifyCode'])->name('auth.verifycode.post');
    Route::get('/auth/verify-skip', [PhoneVerificationController::class, 'skip'])->name('auth.verify.skip');

    /* Dashboard / accueil */
    Route::get('/accueil', [DashboardController::class, 'accueil'])->name('accueil');
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
});

/* Simple static pages */
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');
