@extends('layout')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <h3 class="fw-bold mb-4">Edit Data Peserta</h3>

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('peserta.update', $peserta->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- NIK -->
                        <div class="mb-3">
                            <label class="form-label">NIK (16 Digit)</label>
                            <input type="text" name="nik" class="form-control" value="{{ old('nik', $peserta->nik) }}"
                                   maxlength="16" oninput="this.value = this.value.replace(/[^0-9]/g, '');" required>
                        </div>

                        <!-- Nama Lengkap -->
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap', $peserta->nama_lengkap) }}"
                                   oninput="this.value = this.value.replace(/[^a-zA-Z\s.,']/g, '')" required>
                            <div class="form-text text-muted small">Hanya boleh berisi huruf, spasi, titik, koma, dan petik atas.</div>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', $peserta->email) }}" required>
                        </div>

                        <!-- Nomor Telepon / WA -->
                        <div class="mb-3">
                            <label class="form-label">Nomor Telepon / WhatsApp</label>
                            <input type="text" name="telepon" class="form-control" value="{{ old('telepon', $peserta->telepon) }}"
                                   minlength="10" maxlength="13"
                                   oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 13);" required>
                            <div class="form-text text-muted small">Masukkan nomor yang valid (10 s.d. 13 digit angka).</div>
                        </div>

                        <!-- Skema Sertifikasi -->
                        <div class="mb-3">
                            <label class="form-label">Skema Sertifikasi</label>
                            <select name="skema_id" class="form-select" required>
                                <option value="">-- Pilih Skema Sertifikasi --</option>
                                @foreach($skemas as $skema)
                                    <option value="{{ $skema->id }}" {{ old('skema_id', $peserta->skema_id) == $skema->id ? 'selected' : '' }}>
                                        {{ $skema->kode_skema }} - {{ $skema->nama_skema }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex justify-content-between pt-2">
                            <a href="{{ route('peserta.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Perbarui Peserta</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
