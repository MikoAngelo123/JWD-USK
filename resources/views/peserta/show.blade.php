@extends('layout')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <h2 class="fw-bold mb-4">Detail Data Peserta</h2>

                    <div class="table-responsive">
                        <table class="table table-bordered align-middle">
                            <tr>
                                <th class="w-25 bg-light">NIK</th>
                                <td class="fw-semibold text-primary">{{ $peserta->nik }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Nama Lengkap</th>
                                <td class="fw-bold">{{ $peserta->nama_lengkap }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Email</th>
                                <td>{{ $peserta->email }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Nomor Telepon</th>
                                <td>{{ $peserta->telepon ?? $peserta->nomor_telepon ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Skema Sertifikasi</th>
                                <td>
                                    <span class="badge bg-info text-dark">
                                        {{ $peserta->skema->nama_skema ?? 'Belum ada skema' }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th class="bg-light">Tanggal Dibuat</th>
                                <td>{{ $peserta->created_at ? $peserta->created_at->format('d-m-Y H:i') : '-' }}</td>
                            </tr>
                        </table>
                    </div>

                    <!-- Tombol Kembali (Tombol Edit Data sudah dihapus agar tidak error/mental ke login) -->
                    <div class="d-flex justify-content-start mt-4">
                        <a href="{{ url('admin-peserta') }}" class="btn btn-secondary px-4">
                            <i class="fas fa-arrow-left me-1"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection