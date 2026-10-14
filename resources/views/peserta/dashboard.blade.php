@extends('layout')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <!-- Kartu Selamat Datang / Dashboard Peserta -->
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-body p-4 bg-primary text-white rounded-4">
                    <h2 class="fw-bold mb-2">Selamat Datang, {{ session('peserta_nama') }}!</h2>
                    <p class="mb-0 text-white-50">Portal Peserta Uji Kompetensi Keahlian (USK) - JWD Miko</p>
                </div>
            </div>

            <!-- Informasi Detail Peserta -->
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <h4 class="fw-bold mb-4">Informasi Akun Anda</h4>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-semibold text-muted">Nomor Induk Kependudukan (NIK)</div>
                        <div class="col-md-8">{{ $peserta->nik ?? '-' }}</div>
                    </div>
                    <hr class="text-muted opacity-25">

                    <div class="row mb-3">
                        <div class="col-md-4 fw-semibold text-muted">Nama Lengkap</div>
                        <div class="col-md-8">{{ $peserta->nama_lengkap ?? '-' }}</div>
                    </div>
                    <hr class="text-muted opacity-25">

                    <div class="row mb-3">
                        <div class="col-md-4 fw-semibold text-muted">Email</div>
                        <div class="col-md-8">{{ $peserta->email ?? '-' }}</div>
                    </div>
                    <hr class="text-muted opacity-25">

                    <div class="row mb-3">
                        <div class="col-md-4 fw-semibold text-muted">Nomor Telepon / WhatsApp</div>
                        <div class="col-md-8">{{ $peserta->nomor_telepon ?? $peserta->telepon ?? '-' }}</div>
                    </div>
                    <hr class="text-muted opacity-25">

                    <div class="row mb-1">
                        <div class="col-md-4 fw-semibold text-muted">Skema Sertifikasi</div>
                        <div class="col-md-8">
                            @if(is_object($peserta->skema))
                                <span class="badge bg-success">{{ $peserta->skema->kode_skema }} - {{ $peserta->skema->nama_skema }}</span>
                            @else
                                <span class="badge bg-secondary">{{ $peserta->skema ?? 'Belum ada skema' }}</span>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
