

<?php $__env->startSection('content'); ?>
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
                                <?php $__empty_1 = true; $__currentLoopData = $skemas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $skema): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($index + 1); ?></td>
                                        <td class="fw-semibold"><?php echo e($skema->nama_skema ?? $skema->nama ?? '-'); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="2" class="text-center text-muted py-4">Belum ada skema sertifikasi yang tersedia.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\JWD_USK\resources\views/peserta/skema.blade.php ENDPATH**/ ?>