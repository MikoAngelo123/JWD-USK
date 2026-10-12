@extends('layout')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Data Skema Sertifikasi</h2>
        <a href="{{ route('skema.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Skema Baru
        </a>
    </div>



    <!-- Card Pembungkus Utama (Sama seperti Data Peserta) -->
    <div class="card shadow-sm border-0 p-4">

        <!-- Form Search Memanjang di Atas -->
        <form action="{{ route('skema.index') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan kode, nama, atau jenis skema..." value="{{ request('search') }}">
                <button class="btn btn-dark" type="submit">
                    <i class="fas fa-search"></i> Cari
                </button>
                @if(request('search'))
                    <a href="{{ route('skema.index') }}" class="btn btn-outline-secondary">Reset</a>
                @endif
            </div>
        </form>

        <!-- Tabel Data -->
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th style="width: 5%;">No</th>
                        <th style="width: 20%;">Kode Skema</th>
                        <th style="width: 45%;">Nama Skema</th>
                        <th style="width: 15%;">Jenis</th>
                        <th style="width: 15%; text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($skemas as $index => $skema)
                    <tr>
                        <td>{{ $skemas->firstItem() + $index }}</td>
                        <td><span class="fw-semibold text-primary">{{ $skema->kode_skema }}</span></td>
                        <td>{{ $skema->nama_skema }}</td>
                        <td>
                            <span class="badge bg-info text-dark">{{ $skema->jenis }}</span>
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-1">
                                <a href="{{ route('skema.edit', $skema->id) }}" class="btn btn-warning btn-sm text-white" title="Edit">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('skema.destroy', $skema->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus skema ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">Belum ada data skema atau data tidak ditemukan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-3">
            {{ $skemas->links() }}
        </div>

    </div>
</div>
@endsection
