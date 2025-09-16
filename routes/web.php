<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PhoneVerificationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RequestController; // À créer
use App\Http\Controllers\ArtisanController; // À créer
use App\Http\Controllers\NotificationController; // À créer


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Page d'accueil publique
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('accueil'); // Redirige vers dashboard si connecté
    }
    return view('welcome');
})->name('welcome');

// Routes d'authentification et d'inscription (multi-étapes)
Route::get('/auth/method', [AuthController::class, 'showMethod'])->name('auth.method');
Route::get('/auth/role', [AuthController::class, 'showRole'])->name('auth.role');
Route::get('/auth/register/{role}', [AuthController::class, 'showRegisterForm'])->name('auth.register.form');

Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Routes de vérification de téléphone (protégées par authentification)
Route::middleware('auth')->group(function () {
    Route::get('/auth/verify-phone', [PhoneVerificationController::class, 'showVerifyPhone'])->name('auth.verify.phone');
    Route::post('/auth/send-code', [PhoneVerificationController::class, 'sendCode'])->name('auth.sendcode');
    Route::get('/auth/verify-code', [PhoneVerificationController::class, 'showVerifyCode'])->name('auth.show.verifycode');
    Route::post('/auth/verify-code', [PhoneVerificationController::class, 'verifyCode'])->name('auth.verifycode.post');
    Route::get('/auth/verify-skip', [PhoneVerificationController::class, 'skip'])->name('auth.verify.skip');

    // Routes du tableau de bord et accueil (protégées)
    Route::get('/accueil', [DashboardController::class, 'accueil'])->name('accueil');
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    // Routes pour les demandes
    Route::get('/request/{id}', [RequestController::class, 'show'])->name('request.show');
    Route::get('/request/create', [RequestController::class, 'create'])->name('request.create');

    // Routes pour les artisans
    Route::get('/artisan/{id}/contact', [ArtisanController::class, 'contact'])->name('artisan.contact');

    // Routes pour les notifications
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
});

// Pages statiques
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');