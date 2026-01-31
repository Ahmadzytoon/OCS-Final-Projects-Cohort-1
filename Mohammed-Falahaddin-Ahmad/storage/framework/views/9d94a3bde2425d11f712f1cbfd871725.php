

<?php $__env->startSection('title', 'Stock Management'); ?>
<?php $__env->startSection('page-title', 'Stock Management'); ?>

<?php $__env->startSection('content'); ?>
<div class="table-container">

    <div class="table-header mb-3 d-flex justify-content-between align-items-center">
        <h5 class="mb-0">
            <i class="fas fa-boxes me-2"></i> Stock Management
        </h5>
    </div>

    <div style="padding: 0 2rem;">
        
        <form method="GET" action="<?php echo e(route('admin.stock.index')); ?>" class="row mb-4 g-3">
            <div class="col-md-4">
                <select class="form-select" name="stock_level">
                    <option value="">All Stock Levels</option>
                    <option value="in_stock" <?php echo e(request('stock_level') == 'in_stock' ? 'selected' : ''); ?>>In Stock (&gt;50)</option>
                    <option value="low_stock" <?php echo e(request('stock_level') == 'low_stock' ? 'selected' : ''); ?>>Low Stock (1–50)</option>
                    <option value="out_of_stock" <?php echo e(request('stock_level') == 'out_of_stock' ? 'selected' : ''); ?>>Out of Stock (0)</option>
                </select>
            </div>
            <div class="col-md-4">
                <button class="btn btn-primary">Filter</button>
                <a href="<?php echo e(route('admin.stock.index')); ?>" class="btn btn-secondary">Reset</a>
            </div>
        </form>
    </div>

    
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Book</th>
                    <th>Stock</th>
                    <th>Status</th>
                    <th>Updated</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>

            <?php $__empty_1 = true; $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="<?php echo e($book->stock_status == 'low_stock' ? 'table-warning' : ($book->stock_status == 'out_of_stock' ? 'table-danger' : '')); ?>">
                    <td><?php echo e($book->id); ?></td>
                    <td><?php echo e($book->title); ?></td>
                    <td>
                        <span class="badge <?php echo e($book->stock_status_badge_class); ?>">
                            <?php echo e($book->stock_quantity); ?>

                        </span>
                    </td>
                    <td>
                        <span class="badge <?php echo e($book->stock_status_badge_class); ?>">
                            <?php echo e($book->stock_status_label); ?>

                        </span>
                    </td>
                    <td><?php echo e($book->updated_at->format('Y-m-d')); ?></td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-warning"
                                data-bs-toggle="modal"
                                data-bs-target="#adjustStockModal<?php echo e($book->id); ?>">
                            <i class="fas fa-edit"></i>
                        </button>

                        <a href="<?php echo e(route('admin.stock.history', $book)); ?>"
                           class="btn btn-sm btn-info">
                            <i class="fas fa-history"></i>
                        </a>
                    </td>
                </tr>



            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="6" class="text-center">No books found</td>
                </tr>
            <?php endif; ?>

            </tbody>
        </table>
    </div>

    
    <div class="d-flex justify-content-center mt-4">
        <ul class="pagination pagination-sm">
            <?php if($books->onFirstPage()): ?>
                <li class="page-item disabled"><span class="page-link">« Previous</span></li>
            <?php else: ?>
                <li class="page-item">
                    <a class="page-link" href="<?php echo e($books->previousPageUrl()); ?>">« Previous</a>
                </li>
            <?php endif; ?>

            <?php if($books->hasMorePages()): ?>
                <li class="page-item">
                    <a class="page-link" href="<?php echo e($books->nextPageUrl()); ?>">Next »</a>
                </li>
            <?php else: ?>
                <li class="page-item disabled"><span class="page-link">Next »</span></li>
            <?php endif; ?>
        </ul>
    </div>

</div>


<?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="modal fade" id="adjustStockModal<?php echo e($book->id); ?>" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <form method="POST" action="<?php echo e(route('admin.stock.adjust', $book)); ?>">
                    <?php echo csrf_field(); ?>

                    <div class="modal-header">
                        <h5 class="modal-title">
                            Adjust Stock – <?php echo e($book->title); ?>

                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <p>
                            Current Stock:
                            <strong><?php echo e($book->stock_quantity); ?></strong>
                        </p>

                        <div class="mb-3">
                            <label class="form-label">Quantity Change</label>
                            <input type="number"
                                   name="quantity_change"
                                   class="form-control"
                                   placeholder="+10 or -5"
                                   required>
                            <small class="text-muted">
                                Positive to add, negative to remove
                            </small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Reason (optional)</label>
                            <input type="text"
                                   name="reason"
                                   class="form-control"
                                   placeholder="Inventory count, damaged items…">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary">Save</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const alert = document.getElementById('success-alert');
    if (alert) {
        setTimeout(() => alert.remove(), 3000);
    }
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\The Final Project Folder\Edited-FinalProject\resources\views/admin/stock.blade.php ENDPATH**/ ?>