@extends('layout')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <h3 class="fw-bold mb-4">Tambah Data Peserta</h3>

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('peserta.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">NIK (16 Digit)</label>
                            <input type="text" name="nik" class="form-control" value="{{ old('nik') }}" maxlength="16" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 16);" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <!-- Hanya boleh huruf, spasi, titik, koma, dan tanda petik -->
                            <input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap') }}" oninput="this.value = this.value.replace(/[^a-zA-Z\s.,']/g, '');" placeholder="Contoh: Miko Pratama" required>
                            <small class="text-muted">Hanya boleh berisi huruf.</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nomor Telepon (Maksimal 15 Angka)</label>
                            <input type="text" name="telepon" class="form-control" value="{{ old('telepon') }}" maxlength="15" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 15);" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Skema Sertifikasi</label>
                            <select name="skema_id" class="form-select" required>
                                <option value="">-- Pilih Skema --</option>
                                @foreach($skemas as $skema)
                                    <option value="{{ $skema->id }}" {{ old('skema_id') == $skema->id ? 'selected' : '' }}>
                                        {{ $skema->nama_skema }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('peserta.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
