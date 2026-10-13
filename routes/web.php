<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SkemaController;
use App\Http\Controllers\PesertaController;

// Halaman Utama / Welcome Page (Menu Awal)
Route::get('/', function () {
    return view('welcome');
});

// Form Login (GET)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Proses Login & Logout (POST)
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route khusus setelah Login (Middleware Auth)
Route::middleware(['auth'])->group(function () {

    // Dashboard Admin
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // CRUD Skema Sertifikasi
    Route::resource('skema', SkemaController::class);

    // CRUD Peserta (Parameter disesuaikan agar rapi)
    Route::resource('peserta', PesertaController::class)->parameters([
        'peserta' => 'peserta'
    ]);

});
