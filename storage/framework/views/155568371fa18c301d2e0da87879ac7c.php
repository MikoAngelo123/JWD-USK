<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Portal Peserta - JWD Miko</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #6c757d; /* Warna background abu-abu gelap mirip login admin */
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-body p-4">
                    <h3 class="fw-bold mb-4 text-center text-primary">Login Portal Peserta</h3>

                    <!-- Alert Error Flash session (misal: data tidak ditemukan) -->
                    <?php if(session('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show rounded-4 shadow-sm mb-4" role="alert">
                            <?php echo e(session('error')); ?>

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <!-- Kotak Peringatan Error Validasi Laravel (misal: NIK kurang dari 16 digit) -->
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger rounded-4 shadow-sm mb-4">
                            <ul class="mb-0 ps-3">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form action="<?php echo e(route('login.peserta')); ?>" method="POST">
                        <?php echo csrf_field(); ?>

                        <!-- Email Peserta -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email Terdaftar</label>
                            <input type="email" name="email" class="form-control" value="<?php echo e(old('email')); ?>" placeholder="Masukkan email..." required autofocus>
                        </div>

                        <!-- NIK Peserta -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">NIK (16 Digit)</label>
                            <input type="text" name="nik" class="form-control" maxlength="16" placeholder="Masukkan 16 digit NIK..." oninput="this.value = this.value.replace(/[^0-9]/g, '');" required>
                            <div class="form-text text-muted small">Masukkan NIK angka tanpa spasi.</div>
                        </div>

                        <div class="d-grid gap-2 pt-2">
                            <button type="submit" class="btn btn-success btn-lg">Masuk Portal Peserta</button>
                            <a href="<?php echo e(url('/')); ?>" class="btn btn-outline-secondary">Kembali ke Beranda</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html><?php /**PATH C:\xampp\htdocs\JWD_USK\resources\views/auth/login-peserta.blade.php ENDPATH**/ ?>