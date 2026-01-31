
<?php $__env->startSection('title', 'Reviews Management'); ?>
<?php $__env->startSection('page-title', 'Reviews Management'); ?>

<?php $__env->startSection('content'); ?>
<div class="table-container">
    <div class="table-header">
        <h5 class="mb-0"><i class="fas fa-star me-2"></i> Reviews Management</h5>
    </div>
    
    <div style="padding: 0 2rem;">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
                <i class="fas fa-check-circle me-2"></i><?php echo e(session('success')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <!-- Filters -->
        <form method="GET" action="<?php echo e(route('admin.reviews.index')); ?>" class="row mb-4 g-3">
            <div class="col-md-3">
                <select class="form-select" name="rating">
                    <option value="">All Ratings</option>
                    <option value="5" <?php echo e(request('rating') == '5' ? 'selected' : ''); ?>>5 Stars</option>
                    <option value="4" <?php echo e(request('rating') == '4' ? 'selected' : ''); ?>>4 Stars</option>
                    <option value="3" <?php echo e(request('rating') == '3' ? 'selected' : ''); ?>>3 Stars</option>
                    <option value="2" <?php echo e(request('rating') == '2' ? 'selected' : ''); ?>>2 Stars</option>
                    <option value="1" <?php echo e(request('rating') == '1' ? 'selected' : ''); ?>>1 Star</option>
                </select>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary">Filter</button>
                <a href="<?php echo e(route('admin.reviews.index')); ?>" class="btn btn-secondary">Reset</a>
            </div>
        </form>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>Reviewer</th>
                    <th>Book</th>
                    <th>Rating</th>
                    <th>Comment</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <tr>
                    <td><?php echo e($review->user->name ?? 'Anonymous'); ?></td>
                    <td><?php echo e($review->book->title ?? 'N/A'); ?></td>
                    <td><?php echo $review->rating_stars; ?></td>
                    <td><?php echo e(Str::limit($review->comment, 50)); ?></td>
                    <td><?php echo e($review->created_at->format('Y-m-d H:i')); ?></td>
                    <td>
                        <a href="<?php echo e(route('admin.reviews.show', $review)); ?>" class="btn btn-sm btn-info text-white me-2">
                            <i class="fas fa-eye"></i> View
                        </a>
                        <form action="<?php echo e(route('admin.reviews.destroy', $review)); ?>" method="POST" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this review?')">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                <tr>
                    <td colspan="7" class="text-center">No reviews found</td>
                </tr>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-3">
        <?php echo e($reviews->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
// Auto-dismiss success alert after 3 seconds
document.addEventListener('DOMContentLoaded', function() {
    const successAlert = document.getElementById('success-alert');
    if (successAlert) {
        setTimeout(() => {
            successAlert.classList.remove('show');
            successAlert.classList.add('fade');
            setTimeout(() => successAlert.remove(), 150);
        }, 3000);
    }
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Last Backup Edited Final Project 30-1-2026\Edited-FinalProject\resources\views/admin/reviews.blade.php ENDPATH**/ ?>