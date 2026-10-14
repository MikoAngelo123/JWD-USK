@extends('layout')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <!-- Header Card Berwarna Biru (Menyesuaikan Dashboard & Edit) -->
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-body p-4 bg-primary text-white rounded-4">
                    <h2 class="fw-bold mb-2">Daftar Skema Sertifikasi</h2>
                    <p class="mb-0 text-white-50">Pilihan skema uji kompetensi keahlian yang tersedia untuk peserta</p>
                </div>
            </div>

            <!-- Tabel Daftar Skema -->
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-primary">
                                <tr class="text-white">
                                    <th style="width: 10%;">No</th>
                                    <th>Nama Skema Sertifikasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($skemas as $index => $skema)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td class="fw-semibold">{{ $skema->nama_skema ?? $skema->nama ?? '-' }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="text-center text-muted py-4">Belum ada skema sertifikasi yang tersedia.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection