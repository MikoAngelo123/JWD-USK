<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Asesmen Kompetensi</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="<?php echo e(session()->has('peserta_logged_in') || auth()->check() ? 'bg-light' : 'bg-secondary'); ?>">

    <!-- Navbar untuk PESERTA -->
    <?php if(session()->has('peserta_logged_in')): ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="<?php echo e(route('peserta.dashboard')); ?>">Portal Peserta - JWD Miko</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavPeserta">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavPeserta">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->routeIs('peserta.dashboard') ? 'active fw-bold' : ''); ?>" href="<?php echo e(route('peserta.dashboard')); ?>">Dashboard Saya</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->routeIs('peserta.skema') ? 'active fw-bold' : ''); ?>" href="<?php echo e(route('peserta.skema')); ?>">Skema Sertifikasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->routeIs('peserta.edit') ? 'active fw-bold' : ''); ?>" href="<?php echo e(route('peserta.edit')); ?>">Edit Dataku</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item d-flex align-items-center text-white me-3 small">
                        Halo, <?php echo e(session('peserta_nama', 'Peserta')); ?>

                    </li>
                    <li class="nav-item">
                        <form action="<?php echo e(route('logout.peserta')); ?>" method="POST" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-danger btn-sm px-3">
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Navbar untuk ADMIN -->
    <?php elseif(auth()->check()): ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="<?php echo e(route('dashboard')); ?>">JWD Miko (Admin)</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAdmin">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAdmin">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('skema.index')); ?>">Skema Sertifikasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('peserta.index')); ?>">Data Peserta</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <form action="<?php echo e(route('logout')); ?>" method="POST" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-danger btn-sm px-3">
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php endif; ?>

    <!-- Konten Utama -->
    <main class="py-4">
        <div class="container">
            <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show shadow-sm mb-4 auto-dismiss-alert" role="alert">
                    <i class="fas fa-check-circle me-2"></i> <?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <?php if(session('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show shadow-sm mb-4 auto-dismiss-alert" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i> <?php echo e(session('error')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </main>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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
</html><?php /**PATH C:\xampp\htdocs\JWD_USK\resources\views/layout.blade.php ENDPATH**/ ?>