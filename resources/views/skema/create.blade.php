@extends('layout')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <h3 class="fw-bold mb-4">Tambah Skema Sertifikasi Baru</h3>

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('skema.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Kode Skema</label>
                            <input type="text" name="kode_skema" class="form-control" value="{{ old('kode_skema') }}" placeholder="Masukkan kode skema" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama Skema Sertifikasi</label>
                            <input type="text" name="nama_skema" class="form-control" value="{{ old('nama_skema') }}" placeholder="Masukkan nama skema" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jenis Skema</label>
                            <!-- Menggunakan name="jenis" dan fallback name="jenis_skema" agar cocok dengan validator Controller -->
                            <select name="jenis" class="form-select" required>
                                <option value="">-- Pilih Jenis Skema --</option>
                                <option value="KKNI" {{ (old('jenis') ?? old('jenis_skema')) == 'KKNI' ? 'selected' : '' }}>KKNI</option>
                                <option value="Okupasi" {{ (old('jenis') ?? old('jenis_skema')) == 'Okupasi' ? 'selected' : '' }}>Okupasi</option>
                                <option value="Klaster" {{ (old('jenis') ?? old('jenis_skema')) == 'Klaster' ? 'selected' : '' }}>Klaster</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('skema.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan Skema</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
