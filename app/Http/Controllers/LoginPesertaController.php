<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;
use App\Models\Skema;

class LoginPesertaController extends Controller
{
    // Menampilkan halaman form login peserta
    public function showLoginForm()
    {
        return view('auth.login-peserta');
    }

    public function login(Request $request)
    {
        // Validasi ketat input sebelum dicek ke database
        $request->validate([
            'email' => 'required|email',
            'nik'   => 'required|digits:16',
        ], [
            'nik.required' => 'NIK wajib diisi.',
            'nik.digits'   => 'NIK harus tepat 16 digit angka.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
        ]);

        // Cek data peserta di database berdasarkan email dan NIK
        $peserta = Peserta::where('email', $request->email)
                          ->where('nik', $request->nik)
                          ->first();

        if ($peserta) {
            // Jika ditemukan, buat session login peserta
            $request->session()->put('peserta_logged_in', true);
            $request->session()->put('peserta_nik', $peserta->nik);
            $request->session()->put('peserta_nama', $peserta->nama_lengkap);

            return redirect()->route('peserta.dashboard')
                ->with('success', 'Selamat datang di Portal Peserta, ' . $peserta->nama_lengkap);
        }

        // Jika tidak ditemukan di database
        return back()->withErrors([
            'email' => 'Email atau NIK tidak terdaftar / tidak sesuai!',
        ])->onlyInput('email');
    }

    // Dashboard Peserta
    public function dashboard(Request $request)
    {
        if (!$request->session()->has('peserta_logged_in')) {
            return redirect()->route('login.peserta')->with('error', 'Silakan login terlebih dahulu.');
        }

        $nik = $request->session()->get('peserta_nik');
        $peserta = Peserta::where('nik', $nik)->first();

        if (!$peserta) {
            $request->session()->flush();
            return redirect()->route('login.peserta')->with('error', 'Data peserta tidak ditemukan.');
        }

        return view('peserta.dashboard', compact('peserta'));
    }

    // Halaman Skema untuk Peserta
    public function listSkema(Request $request)
    {
        if (!$request->session()->has('peserta_logged_in')) {
            return redirect()->route('login.peserta')->with('error', 'Silakan login terlebih dahulu.');
        }

        $nik = $request->session()->get('peserta_nik');
        $peserta = Peserta::where('nik', $nik)->first();
        $skemas = Skema::all();

        return view('peserta.skema', compact('peserta', 'skemas'));
    }

    // Form Edit Profil Peserta
    public function editProfile(Request $request)
    {
        if (!$request->session()->has('peserta_logged_in')) {
            return redirect()->route('login.peserta')->with('error', 'Silakan login terlebih dahulu.');
        }

        $nik = $request->session()->get('peserta_nik');
        $peserta = Peserta::where('nik', $nik)->first();

        if (!$peserta) {
            return redirect()->route('login.peserta')->with('error', 'Sesi tidak valid, silakan login ulang.');
        }

        return view('peserta.user-edit', compact('peserta'));
    }

    public function updateProfile(Request $request)
    {
        if (!$request->session()->has('peserta_logged_in')) {
            return redirect()->route('login.peserta')->with('error', 'Silakan login terlebih dahulu.');
        }

        $nik = $request->session()->get('peserta_nik');
        $peserta = Peserta::where('nik', $nik)->first();

        if (!$peserta) {
            return redirect()->route('login.peserta')->with('error', 'Sesi tidak valid, silakan login ulang.');
        }

        $request->validate([
            'nama_lengkap' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s\.,\']+$/'],
            'email'        => 'required|email|max:255|unique:pesertas,email,' . $peserta->id,
            'telepon'      => 'required|numeric|digits_between:10,13',
        ], [
            'nama_lengkap.regex'     => 'Nama lengkap hanya boleh berisi huruf, spasi, titik, koma, dan petik atas.',
            'telepon.digits_between' => 'Nomor HP/WhatsApp harus di antara 10 hingga 13 digit angka.',
            'telepon.numeric'        => 'Nomor HP/WhatsApp hanya boleh berisi angka.',
        ]);

        $peserta->update([
            'nama_lengkap' => $request->nama_lengkap,
            'email'        => $request->email,
            'telepon'      => $request->telepon,
        ]);

        $request->session()->put('peserta_nama', $peserta->nama_lengkap);

        return redirect()->route('peserta.dashboard')->with('success', 'Profil Anda berhasil diperbarui!');
    }

    // Memproses logout peserta
    public function logout(Request $request)
    {
        $request->session()->forget(['peserta_logged_in', 'peserta_nik', 'peserta_nama']);
        $request->session()->flush();

        return redirect('/')->with('success', 'Berhasil logout dari Portal Peserta.');
    }
}