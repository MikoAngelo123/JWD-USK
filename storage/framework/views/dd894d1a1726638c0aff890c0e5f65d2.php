<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <!-- Kartu Selamat Datang / Dashboard Peserta -->
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-body p-4 bg-primary text-white rounded-4">
                    <h2 class="fw-bold mb-2">Selamat Datang, <?php echo e(session('peserta_nama')); ?>!</h2>
                    <p class="mb-0 text-white-50">Portal Peserta Uji Kompetensi Keahlian (USK) - JWD Miko</p>
                </div>
            </div>

            <!-- Informasi Detail Peserta -->
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <h4 class="fw-bold mb-4">Informasi Akun Anda</h4>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-semibold text-muted">Nomor Induk Kependudukan (NIK)</div>
                        <div class="col-md-8"><?php echo e($peserta->nik ?? '-'); ?></div>
                    </div>
                    <hr class="text-muted opacity-25">

                    <div class="row mb-3">
                        <div class="col-md-4 fw-semibold text-muted">Nama Lengkap</div>
                        <div class="col-md-8"><?php echo e($peserta->nama_lengkap ?? '-'); ?></div>
                    </div>
                    <hr class="text-muted opacity-25">

                    <div class="row mb-3">
                        <div class="col-md-4 fw-semibold text-muted">Email</div>
                        <div class="col-md-8"><?php echo e($peserta->email ?? '-'); ?></div>
                    </div>
                    <hr class="text-muted opacity-25">

                    <div class="row mb-3">
                        <div class="col-md-4 fw-semibold text-muted">Nomor Telepon / WhatsApp</div>
                        <div class="col-md-8"><?php echo e($peserta->nomor_telepon ?? $peserta->telepon ?? '-'); ?></div>
                    </div>
                    <hr class="text-muted opacity-25">

                    <div class="row mb-1">
                        <div class="col-md-4 fw-semibold text-muted">Skema Sertifikasi</div>
                        <div class="col-md-8">
                            <?php if(is_object($peserta->skema)): ?>
                                <span class="badge bg-success"><?php echo e($peserta->skema->kode_skema); ?> - <?php echo e($peserta->skema->nama_skema); ?></span>
                            <?php else: ?>
                                <span class="badge bg-secondary"><?php echo e($peserta->skema ?? 'Belum ada skema'); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\JWD_USK\resources\views/peserta/dashboard.blade.php ENDPATH**/ ?>