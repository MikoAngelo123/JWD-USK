@extends('layout')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <h3 class="fw-bold mb-4">Edit Skema Sertifikasi</h3>

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('skema.update', $skema->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Kode Skema</label>
                            <input type="text" name="kode_skema" class="form-control" value="{{ old('kode_skema', $skema->kode_skema) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama Skema Sertifikasi</label>
                            <input type="text" name="nama_skema" class="form-control" value="{{ old('nama_skema', $skema->nama_skema) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jenis Skema</label>
                            <select name="jenis_skema" class="form-select" required>
                                <option value="">-- Pilih Jenis Skema --</option>
                                <option value="KKNI" {{ old('jenis_skema', $skema->jenis_skema) == 'KKNI' ? 'selected' : '' }}>KKNI</option>
                                <option value="Okupasi" {{ old('jenis_skema', $skema->jenis_skema) == 'Okupasi' ? 'selected' : '' }}>Okupasi</option>
                                <option value="Klaster" {{ old('jenis_skema', $skema->jenis_skema) == 'Klaster' ? 'selected' : '' }}>Klaster</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('skema.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Perbarui Skema</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
