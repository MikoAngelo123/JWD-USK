<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginPesertaController;
use App\Http\Controllers\SkemaController;
use App\Http\Controllers\PesertaController;

// Halaman Beranda Utama
Route::get('/', function () {
    return view('welcome');
});

// ==================== 1. ROUTE LOGIN ADMIN ====================
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ==================== 2. ROUTE LOGIN PESERTA ====================
Route::get('/peserta/login', [LoginPesertaController::class, 'showLoginForm'])->name('login.peserta');
Route::post('/peserta/login', [LoginPesertaController::class, 'login']);
Route::post('/peserta/logout', [LoginPesertaController::class, 'logout'])->name('logout.peserta');

// ==================== 3. ROUTE AREA PESERTA (Session Based) ====================
Route::prefix('peserta')->name('peserta.')->group(function () {
    Route::get('/dashboard', [LoginPesertaController::class, 'dashboard'])->name('dashboard');
    Route::get('/skema', [LoginPesertaController::class, 'listSkema'])->name('skema');
    Route::get('/profile-edit', [LoginPesertaController::class, 'editProfile'])->name('edit');
    Route::put('/profile-update', [LoginPesertaController::class, 'updateProfile'])->name('update');
});

// ==================== 4. ROUTE AREA ADMIN (Auth Middleware) ====================
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('skema', SkemaController::class);
    
    // Resource admin peserta menggunakan path 'admin-peserta' agar mutlak bebas dari bentrok
    Route::resource('admin-peserta', PesertaController::class)->names('peserta');
});