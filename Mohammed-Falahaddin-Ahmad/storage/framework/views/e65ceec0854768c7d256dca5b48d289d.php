
<?php $__env->startSection('title', 'Review Details'); ?>
<?php $__env->startSection('page-title', 'Review Details'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><i class="fas fa-search me-2 text-primary"></i> Review #<?php echo e($review->id); ?></h5>
                    <div class="status-badge">
                        <span class="badge <?php echo e($review->is_approved ? 'bg-success' : 'bg-warning text-dark'); ?>">
                            <?php echo e($review->is_approved ? 'Approved' : 'Pending Approval'); ?>

                        </span>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="text-muted small text-uppercase fw-bold">Reviewer</label>
                            <p class="fs-5 mb-0"><?php echo e($review->user->name ?? $review->customer_name); ?></p>
                            <span class="text-muted small"><?php echo e($review->user->email ?? $review->customer_email); ?></span>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <label class="text-muted small text-uppercase fw-bold">Date Submitted</label>
                            <p class="mb-0"><?php echo e($review->created_at->format('M d, Y - H:i')); ?></p>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="text-muted small text-uppercase fw-bold">Book Reviewed</label>
                        <div class="d-flex align-items-center mt-2">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($review->book->cover_image): ?>
                                <img src="<?php echo e(asset('uploads/books/' . $review->book->cover_image)); ?>" alt="cover" class="rounded me-3" style="width: 50px; height: 75px; object-fit: cover;">
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <div>
                                <h6 class="mb-0"><?php echo e($review->book->title); ?></h6>
                                <span class="text-muted small">ISBN: <?php echo e($review->book->isbn); ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="text-muted small text-uppercase fw-bold">Rating</label>
                        <div class="star-rating fs-4 mt-2">
                            <?php echo $review->rating_stars; ?>

                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="text-muted small text-uppercase fw-bold">Comment</label>
                        <div class="bg-light p-3 rounded mt-2">
                            <p class="mb-0" style="white-space: pre-wrap;"><?php echo e($review->comment); ?></p>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="d-flex gap-2">
                        <a href="<?php echo e(route('admin.reviews.index')); ?>" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i> Back to List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Last Backup Edited Final Project 30-1-2026\Edited-FinalProject\resources\views/admin/reviews-show.blade.php ENDPATH**/ ?>