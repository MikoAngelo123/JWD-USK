@extends('layout')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Header Kartu Khusus Peserta (Tema Biru) -->
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-body p-4 bg-primary text-white rounded-4">
                    <h2 class="fw-bold mb-2">Edit Data Profil Saya</h2>
                    <p class="mb-0 text-white-50">Perbarui informasi data diri Anda sebagai peserta uji kompetensi</p>
                </div>
            </div>

            <!-- Kotak Peringatan Error Validasi -->
            @if ($errors->any())
                <div class="alert alert-danger rounded-4 shadow-sm mb-4">
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <form action="{{ route('peserta.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- NIK (Dikunci untuk Peserta) -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">NIK (16 Digit - Dikunci)</label>
                            <input type="text" class="form-control bg-light" value="{{ $peserta->nik }}" disabled>
                            <div class="form-text text-muted">NIK tidak dapat diubah untuk menjaga integritas data ujian.</div>
                        </div>

                        <!-- Nama Lengkap (Hanya huruf, spasi, titik, koma, petik atas) -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" value="{{ old('nama_lengkap', $peserta->nama_lengkap) }}" required>
                            <div class="form-text text-muted">Hanya boleh berisi huruf, spasi, titik, koma, dan petik atas.</div>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', $peserta->email) }}" required>
                        </div>

                        <!-- Nomor Telepon / WhatsApp (Hanya angka, max 13 digit) -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Nomor Telepon / WhatsApp</label>
                            <input type="text" name="telepon" id="telepon" class="form-control" maxlength="13" value="{{ old('telepon', $peserta->telepon ?? $peserta->nomor_telepon ?? '') }}" required>
                            <div class="form-text text-muted">Masukkan nomor yang valid (10 s.d. 13 digit angka).</div>
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('peserta.dashboard') }}" class="btn btn-outline-secondary px-4">
                                <i class="fas fa-arrow-left me-1"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary px-4 fw-semibold">
                                <i class="fas fa-save me-1"></i> Simpan Perubahan Profil
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript agar input langsung tersaring secara otomatis pas diketik -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Nama Lengkap: Hanya huruf, spasi, titik, koma, petik atas (Angka ditolak)
        const inputNama = document.getElementById('nama_lengkap');
        if (inputNama) {
            inputNama.addEventListener('input', function () {
                this.value = this.value.replace(/[^a-zA-Z\s\.,']/g, '');
            });
        }

        // Nomor Telepon: Hanya angka, maksimal 13 digit
        const inputTelepon = document.getElementById('telepon');
        if (inputTelepon) {
            inputTelepon.addEventListener('input', function () {
                this.value = this.value.replace(/[^0-9]/g, '').slice(0, 13);
            });
        }
    });
</script>
@endsection