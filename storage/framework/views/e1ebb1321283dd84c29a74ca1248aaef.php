

<?php $__env->startSection('content'); ?>
<div class="p-5 mb-4 bg-white rounded-4 shadow-sm border">
    <div class="container-fluid py-3">
        <h1 class="display-5 fw-bold text-dark">Selamat Datang, Administrator!</h1>
        <p class="col-md-8 fs-5 text-muted">Aplikasi Pengelolaan Data Peserta Sertifikasi Skema Junior Web Developer.</p>
        <hr class="my-4">
        <div class="row g-3">
            <div class="col-md-6">
                <div class="p-4 bg-primary text-white rounded-3 shadow-sm">
                    <h3><?php echo e(\App\Models\Skema::count()); ?></h3>
                    <p class="mb-0">Total Skema Sertifikasi Tersedia</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-4 bg-success text-white rounded-3 shadow-sm">
                    <h3><?php echo e(\App\Models\Peserta::count()); ?></h3>
                    <p class="mb-0">Total Peserta Terdaftar</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\JWD_USK\resources\views/dashboard.blade.php ENDPATH**/ ?>