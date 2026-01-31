

<?php $__env->startSection('title', 'Stock History'); ?>
<?php $__env->startSection('page-title', 'Stock History'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">

    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">
            <i class="fas fa-history me-2"></i>
            <?php echo e($book->title); ?>

        </h5>
        <a href="<?php echo e(route('admin.stock.index')); ?>" class="btn btn-secondary">
            Back to Stock
        </a>
    </div>

    <div class="card-body">

        <div class="mb-3">
            <strong>Current Stock:</strong>
            <span class="badge <?php echo e($book->stock_status_badge_class); ?>">
                <?php echo e($book->stock_quantity); ?>

            </span>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Date</th>
                        <th>Change</th>
                        <th>Previous</th>
                        <th>New</th>
                        <th>Reason</th>
                    </tr>
                </thead>
                <tbody>

                <?php $__empty_1 = true; $__currentLoopData = $adjustments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $adjustment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($adjustment->created_at->format('Y-m-d H:i')); ?></td>
                        <td class="<?php echo e($adjustment->quantity_change > 0 ? 'text-success' : 'text-danger'); ?>">
                            <?php echo e($adjustment->quantity_change > 0 ? '+' : ''); ?><?php echo e($adjustment->quantity_change); ?>

                        </td>
                        <td><?php echo e($adjustment->previous_stock); ?></td>
                        <td><?php echo e($adjustment->new_stock); ?></td>
                        <td><?php echo e($adjustment->reason ?? 'N/A'); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5" class="text-center">No stock adjustments found</td>
                    </tr>
                <?php endif; ?>

                </tbody>
            </table>
        </div>

        <div class="mt-3">
            <?php echo e($adjustments->links()); ?>

        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\The Final Project Folder\Edited-FinalProject\resources\views/admin/stock-history.blade.php ENDPATH**/ ?>