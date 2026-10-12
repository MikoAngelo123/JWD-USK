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
            'nik' => 'required|digits:16|unique:pesertas,nik',
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:pesertas,email',
            'telepon' => 'required|string|max:15',
            'skema_id' => 'required|exists:skemas,id',
        ], [
            'telepon.max' => 'Nomor telepon tidak boleh lebih dari 15 digit.',
        ]);

        Peserta::create($request->all());

        return redirect()->route('peserta.index')->with('success', 'Data peserta berhasil ditambahkan.');
    }

    public function show($id)
    {
        $peserta = Peserta::with('skema')->findOrFail($id);
        return view('peserta.show', compact('peserta'));
    }

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
            'nik' => 'required|digits:16|unique:pesertas,nik,' . $peserta->id,
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:pesertas,email,' . $peserta->id,
            'telepon' => 'required|string|max:15',
            'skema_id' => 'required|exists:skemas,id',
        ], [
            'telepon.max' => 'Nomor telepon tidak boleh lebih dari 15 digit.',
        ]);

        $peserta->update($request->all());

        return redirect()->route('peserta.index')->with('success', 'Data peserta berhasil diperbarui.');
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
