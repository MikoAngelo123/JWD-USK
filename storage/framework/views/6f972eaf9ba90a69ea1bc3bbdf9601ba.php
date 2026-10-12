<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Data Skema Sertifikasi</h2>
        <a href="<?php echo e(route('skema.create')); ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Skema Baru
        </a>
    </div>



    <!-- Card Pembungkus Utama (Sama seperti Data Peserta) -->
    <div class="card shadow-sm border-0 p-4">

        <!-- Form Search Memanjang di Atas -->
        <form action="<?php echo e(route('skema.index')); ?>" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan kode, nama, atau jenis skema..." value="<?php echo e(request('search')); ?>">
                <button class="btn btn-dark" type="submit">
                    <i class="fas fa-search"></i> Cari
                </button>
                <?php if(request('search')): ?>
                    <a href="<?php echo e(route('skema.index')); ?>" class="btn btn-outline-secondary">Reset</a>
                <?php endif; ?>
            </div>
        </form>

        <!-- Tabel Data -->
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th style="width: 5%;">No</th>
                        <th style="width: 20%;">Kode Skema</th>
                        <th style="width: 45%;">Nama Skema</th>
                        <th style="width: 15%;">Jenis</th>
                        <th style="width: 15%; text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $skemas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $skema): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($skemas->firstItem() + $index); ?></td>
                        <td><span class="fw-semibold text-primary"><?php echo e($skema->kode_skema); ?></span></td>
                        <td><?php echo e($skema->nama_skema); ?></td>
                        <td>
                            <span class="badge bg-info text-dark"><?php echo e($skema->jenis); ?></span>
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-1">
                                <a href="<?php echo e(route('skema.edit', $skema->id)); ?>" class="btn btn-warning btn-sm text-white" title="Edit">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="<?php echo e(route('skema.destroy', $skema->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus skema ini?')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">Belum ada data skema atau data tidak ditemukan.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-3">
            <?php echo e($skemas->links()); ?>

        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\JWD_USK\resources\views/skema/index.blade.php ENDPATH**/ ?>