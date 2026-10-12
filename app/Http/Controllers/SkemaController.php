<?php

namespace App\Http\Controllers;

use App\Models\Skema;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class SkemaController extends Controller
{
    public function index(Request $request)
    {
        $query = Skema::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('kode_skema', 'like', "%{$search}%")
                  ->orWhere('nama_skema', 'like', "%{$search}%")
                  ->orWhere('jenis', 'like', "%{$search}%");
            });
        }

        $skemas = $query->latest()->paginate(10)->withQueryString();

        return view('skema.index', compact('skemas'));
    }

    public function create()
    {
        return view('skema.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_skema' => 'required|unique:skemas,kode_skema',
            'nama_skema' => 'required|string|max:255',
            'jenis'      => 'required|string|max:100',
        ]);

        Skema::create($request->all());

        return redirect()->route('skema.index')->with('success', 'Data skema sertifikasi berhasil ditambahkan.');
    }

    public function show(Skema $skema)
    {
        return view('skema.show', compact('skema'));
    }

    public function edit(Skema $skema)
    {
        return view('skema.edit', compact('skema'));
    }

    public function update(Request $request, Skema $skema)
    {
        $request->validate([
            'kode_skema' => 'required|unique:skemas,kode_skema,' . $skema->id,
            'nama_skema' => 'required|string|max:255',
            'jenis'      => 'required|string|max:100',
        ]);

        $skema->update($request->all());

        return redirect()->route('skema.index')->with('success', 'Data skema sertifikasi berhasil diperbarui.');
    }

    public function destroy(Skema $skema)
    {
        try {
            $skema->delete();
            return redirect()->route('skema.index')->with('success', 'Data skema sertifikasi berhasil dihapus.');
        } catch (QueryException $e) {
            return redirect()->route('skema.index')->with('error', 'Gagal menghapus! Skema ini masih digunakan oleh data peserta.');
        }
    }
}
