<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Skema;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $pesertas = Peserta::with('skema')
            ->when($search, function ($query, $search) {
                return $query->where('nama_lengkap', 'like', "%{$search}%")
                             ->orWhere('nik', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('peserta.index', compact('pesertas', 'search'));
    }

    public function create()
    {
        $skemas = Skema::all();
        return view('peserta.create', compact('skemas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik'          => 'required|digits:16|unique:pesertas,nik',
            'nama_lengkap' => 'required|string|max:255',
            'email'        => 'required|email|unique:pesertas,email',
            'telepon'      => 'required|numeric|digits_between:10,13|unique:pesertas,telepon',
            'skema_id'     => 'required|exists:skemas,id',
        ], [
            'nik.unique'             => 'NIK ini sudah terdaftar oleh peserta lain.',
            'email.unique'           => 'Email ini sudah terdaftar oleh peserta lain.',
            'telepon.unique'         => 'Nomor HP/WhatsApp ini sudah terdaftar oleh peserta lain.',
            'telepon.digits_between' => 'Nomor HP/WhatsApp harus di antara 10 hingga 13 digit angka.',
            'telepon.numeric'        => 'Nomor HP/WhatsApp hanya boleh berisi angka.',
        ]);

        Peserta::create($request->all());

        return redirect()->route('peserta.index')->with('success', 'Data peserta berhasil ditambahkan.');
    }

    public function show($id)
    {
        $peserta = Peserta::with('skema')->findOrFail($id);
        return view('peserta.show', compact('peserta'));
    }

    // Form Edit Peserta untuk Admin (Ditambahkan $skemas agar pilihan skema muncul di form)
    public function edit($id)
    {
        $peserta = Peserta::findOrFail($id);
        $skemas = Skema::all();
        
        return view('peserta.edit', compact('peserta', 'skemas'));
    }

    public function update(Request $request, $id)
    {
        $peserta = Peserta::findOrFail($id);

        $request->validate([
            'nik'          => 'required|digits:16|unique:pesertas,nik,' . $peserta->id,
            'nama_lengkap' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s\.,\']+$/'],
            'email'        => 'required|email|max:255|unique:pesertas,email,' . $peserta->id,
            'telepon'      => 'required|numeric|digits_between:10,13|unique:pesertas,telepon,' . $peserta->id,
            'skema_id'     => 'required|exists:skemas,id',
        ], [
            'nik.digits'             => 'NIK harus persis 16 digit angka.',
            'nama_lengkap.regex'     => 'Nama lengkap hanya boleh berisi huruf, spasi, titik, koma, dan petik atas.',
            'telepon.digits_between' => 'Nomor HP/WhatsApp harus di antara 10 hingga 13 digit angka.',
            'telepon.numeric'        => 'Nomor HP/WhatsApp hanya boleh berisi angka.',
        ]);

        $peserta->update([
            'nik'          => $request->nik,
            'nama_lengkap' => $request->nama_lengkap,
            'email'        => $request->email,
            'telepon'      => $request->telepon,
            'skema_id'     => $request->skema_id,
        ]);

        return redirect()->route('peserta.index')->with('success', 'Data peserta berhasil diperbarui oleh Admin.');
    }

    public function destroy($id)
    {
        try {
            $peserta = Peserta::findOrFail($id);
            $peserta->delete();
            return redirect()->route('peserta.index')->with('success', 'Data peserta berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('peserta.index')->with('error', 'Gagal menghapus data peserta!');
        }
    }
}