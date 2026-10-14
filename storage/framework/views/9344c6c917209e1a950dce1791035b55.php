<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-0">Data Peserta Sertifikasi</h2>
        <a href="<?php echo e(url('admin-peserta/create')); ?>" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> Tambah Peserta
        </a>
    </div>

    <!-- Tabel Data Peserta dengan Kotak Pencarian dan Tombol Reset -->
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">

            <!-- Form Pencarian dengan Tombol Cari & Reset -->
            <form action="<?php echo e(url('admin-peserta')); ?>" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan NIK atau nama lengkap..." value="<?php echo e(request('search')); ?>">
                    <button type="submit" class="btn btn-dark">
                        <i class="fas fa-search me-1"></i> Cari
                    </button>
                    <?php if(request('search')): ?>
                        <a href="<?php echo e(url('admin-peserta')); ?>" class="btn btn-outline-secondary">Reset</a>
                    <?php endif; ?>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama Lengkap</th>
                            <th>Email / Telepon</th>
                            <th>Skema Sertifikasi</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $pesertas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $peserta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($index + 1); ?></td>
                                <td class="fw-semibold text-primary"><?php echo e($peserta->nik); ?></td>
                                <td class="fw-bold"><?php echo e($peserta->nama_lengkap); ?></td>
                                <td>
                                    <i class="fas fa-envelope text-muted me-1"></i> <?php echo e($peserta->email); ?><br>
                                    <i class="fas fa-phone text-muted me-1"></i> <?php echo e($peserta->nomor_telepon ?? $peserta->telepon ?? '-'); ?>

                                </td>
                                <td>
                                    <span class="badge bg-info text-dark">
                                        <?php echo e($peserta->skema->nama_skema ?? $peserta->skema_sertifikasi ?? 'Belum ada skema'); ?>

                                    </span>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1">
                                        <!-- Tombol Detail / Show Admin -->
                                        <a href="<?php echo e(url('admin-peserta/' . $peserta->id)); ?>" class="btn btn-info btn-sm text-white" title="Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        <!-- Tombol Edit Admin (Kuning) -->
                                        <a href="<?php echo e(url('admin-peserta/' . $peserta->id . '/edit')); ?>" class="btn btn-warning btn-sm text-white" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <!-- Tombol Hapus Admin -->
                                        <form action="<?php echo e(url('admin-peserta/' . $peserta->id)); ?>" method="POST" onsubmit="return confirm('Yakin ingin menghapus data peserta ini?');" class="d-inline">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">Belum ada data peserta yang terdaftar.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\JWD_USK\resources\views/peserta/index.blade.php ENDPATH**/ ?>