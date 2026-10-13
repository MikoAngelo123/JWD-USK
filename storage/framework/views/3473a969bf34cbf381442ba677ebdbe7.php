<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang - JWD Miko</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column justify-content-between vh-100 m-0">

    <!-- Header Sederhana -->
    <header class="bg-dark text-white py-3 px-4 shadow-sm">
        <div class="container-fluid">
            <h5 class="mb-0 fw-bold">JWD Miko</h5>
        </div>
    </header>

    <!-- Konten Utama Full Halaman -->
    <main class="flex-grow-1 d-flex align-items-center justify-content-center">
        <div class="text-center px-3" style="max-width: 600px;">

            <!-- Flash Message Logout / Notification -->
            <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show auto-dismiss-alert shadow-sm mb-4" role="alert">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <h1 class="display-5 fw-bold text-primary mb-3">Selamat Datang di JWD Miko</h1>
            <p class="lead text-secondary mb-4">
                Aplikasi Pengelolaan Skema Sertifikasi dan Data Peserta Ujian Kompetensi Keahlian RPL.
            </p>

            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <?php if(auth()->guard()->check()): ?>
                    <a href="<?php echo e(url('/dashboard')); ?>" class="btn btn-primary btn-lg px-4 gap-3 shadow">Masuk ke Dashboard</a>
                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>" class="btn btn-primary btn-lg px-4 shadow">Masuk / Login ke Sistem</a>
                <?php endif; ?>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="text-center py-3 text-muted small bg-white border-top">
        Uji Sertifikasi Kompetensi (USK) &copy; 2026
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script Auto-Fade untuk Notifikasi Flash -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const alertBox = document.querySelector('.auto-dismiss-alert');
            if (alertBox) {
                setTimeout(function () {
                    alertBox.style.transition = "opacity 0.8s ease";
                    alertBox.style.opacity = "0";
                    setTimeout(function () {
                        alertBox.remove();
                    }, 800);
                }, 3000); // Notifikasi hilang setelah 3 detik
            }
        });
    </script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\JWD_USK\resources\views/welcome.blade.php ENDPATH**/ ?>