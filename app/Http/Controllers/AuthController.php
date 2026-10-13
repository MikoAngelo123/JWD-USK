<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Ditambahkan flash message sukses masuk ke dashboard
            return redirect()->intended('/dashboard')->with('success', 'Berhasil masuk! Selamat datang kembali.');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    // Redirect ke beranda (/) dengan pesan sukses
    return redirect('/')->with('success', 'Anda telah berhasil keluar (logout).');
}
}
