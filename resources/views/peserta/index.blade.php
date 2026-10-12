@extends('layout')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Data Peserta Sertifikasi</h2>
        <a href="{{ route('peserta.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> Tambah Peserta
        </a>
    </div>



    <div class="card border-0 shadow-sm rounded-4 mb-4">
        <div class="card-body">
            <form action="{{ route('peserta.index') }}" method="GET" class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan NAMA atau NIK peserta..." value="{{ request('search') }}">
                <button class="btn btn-dark" type="submit">
                    <i class="fas fa-search me-1"></i> Cari
                </button>
                @if(request('search'))
                    <a href="{{ route('peserta.index') }}" class="btn btn-outline-secondary">Reset</a>
                @endif
            </form>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama Lengkap</th>
                            <th>Email / Telepon</th>
                            <th>Skema Sertifikasi</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pesertas as $index => $peserta)
                        <tr>
                            <td>{{ $pesertas->firstItem() + $index }}</td>
                            <td><code>{{ $peserta->nik }}</code></td>
                            <td class="fw-bold">{{ $peserta->nama_lengkap }}</td>
                            <td>
                                <small class="d-block text-muted"><i class="fas fa-envelope me-1"></i>{{ $peserta->email }}</small>
                                <small class="d-block text-muted"><i class="fas fa-phone me-1"></i>{{ $peserta->telepon }}</small>
                            </td>
                            <td><span class="badge bg-info text-dark">{{ $peserta->skema->nama_skema ?? '-' }}</span></td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-1">
                                    <a href="{{ route('peserta.show', $peserta->id) }}" class="btn btn-info btn-sm text-white" title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('peserta.edit', $peserta->id) }}" class="btn btn-warning btn-sm text-white" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('peserta.destroy', $peserta->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data peserta ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">Data peserta tidak ditemukan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-3">
                {{ $pesertas->withQueryString()->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
