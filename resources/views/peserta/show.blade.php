@extends('layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4">
                <h3 class="fw-bold mb-4">Detail Data Peserta</h3>

                <table class="table table-bordered">
                    <tr>
                        <th width="30%">NIK</th>
                        <td><code>{{ $peserta->nik }}</code></td>
                    </tr>
                    <tr>
                        <th>Nama Lengkap</th>
                        <td class="fw-bold">{{ $peserta->nama_lengkap }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $peserta->email }}</td>
                    </tr>
                    <tr>
                        <th>Nomor Telepon</th>
                        <td>{{ $peserta->telepon }}</td>
                    </tr>
                    <tr>
                        <th>Skema Sertifikasi</th>
                        <td>
                            <span class="badge bg-info text-dark">
                                {{ $peserta->skema->nama_skema ?? '-' }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th>Tanggal Dibuat</th>
                        <td>{{ $peserta->created_at ? $peserta->created_at->setTimezone('Asia/Jakarta')->format('d-m-Y H:i') : '-' }}</td>
                    </tr>
                </table>

                <div class="mt-4">
                    <a href="{{ route('peserta.index') }}" class="btn btn-secondary">Kembali</a>
                    <a href="{{ route('peserta.edit', $peserta->id) }}" class="btn btn-warning">Edit Data</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection