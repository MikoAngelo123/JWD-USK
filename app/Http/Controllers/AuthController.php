<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman form login admin
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Memproses login admin
    public function login(Request $request)
    {
        // Validasi login admin
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // PENTING: Hapus semua session peserta yang tertinggal agar tidak bentrok!
            $request->session()->forget(['peserta_logged_in', 'peserta_nik', 'peserta_nama']);

            return redirect()->intended('/dashboard')
                ->with('success', 'Selamat datang kembali, Administrator!');
            }

        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    // Memproses logout admin
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Bersihkan session peserta juga saat admin logout
        $request->session()->forget(['peserta_logged_in', 'peserta_nik', 'peserta_nama']);

        // Diubah ke '/' agar kembali ke halaman utama / welcome page
        return redirect('/')->with('success', 'Berhasil logout dari admin.');
    }
}
