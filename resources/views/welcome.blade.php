<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JWD Miko - Portal Sertifikasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .hero-container {
            min-height: 80vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
    </style>
</head>
<body>

    <!-- Header / Navbar Sederhana -->
    <nav class="navbar navbar-dark bg-dark px-4 shadow-sm">
        <span class="navbar-brand mb-0 h1 fw-bold">JWD Miko</span>
    </nav>

    <!-- Konten Utama (Welcome Page) -->
    <div class="container hero-container">
        
        <!-- Flash Message Sukses Logout -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm mb-4 auto-dismiss-alert" role="alert" style="max-width: 500px; width: 100%;">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <h1 class="display-4 fw-bold text-primary mb-3">Selamat Datang di JWD Miko</h1>
        <p class="lead text-secondary mb-4" style="max-width: 600px;">
            Aplikasi Pengelolaan Skema Sertifikasi dan Data Peserta Ujian Kompetensi Keahlian RPL.
        </p>

        <!-- Pilihan 2 Tombol Login (Pastikan route('login.peserta') untuk peserta!) -->
        <div class="d-flex gap-3 justify-content-center">
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg px-4 shadow-sm">
                Masuk ke Dashboard Admin
            </a>
            <a href="{{ route('login.peserta') }}" class="btn btn-success btn-lg px-4 shadow-sm">
                Masuk Portal Peserta
            </a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center py-3 text-muted border-top bg-white">
        <small>Uji Sertifikasi Kompetensi (USK) &copy; 2026</small>
    </footer>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script Auto-Fade untuk Flash Message -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const alerts = document.querySelectorAll('.auto-dismiss-alert');
            alerts.forEach(function (alert) {
                setTimeout(function () {
                    alert.style.transition = "opacity 0.8s ease";
                    alert.style.opacity = "0";
                    setTimeout(function () {
                        alert.remove();
                    }, 800);
                }, 3000);
            });
        });
    </script>
</body>
</html>