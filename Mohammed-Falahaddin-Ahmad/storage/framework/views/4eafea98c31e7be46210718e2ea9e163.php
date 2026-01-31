
<?php $__env->startSection('title', 'Edit Review'); ?>
<?php $__env->startSection('page-title', 'Edit Review'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0"><i class="fas fa-edit me-2 text-warning"></i> Edit Review #<?php echo e($review->id); ?></h5>
                </div>
                <div class="card-body p-4">
                    <form action="<?php echo e(route('admin.reviews.update', $review)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Reviewer</label>
                                <input type="text" class="form-control bg-light" value="<?php echo e($review->user->name ?? $review->customer_name); ?>" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Book</label>
                                <input type="text" class="form-control bg-light" value="<?php echo e($review->book->title); ?>" readonly>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="rating" class="form-label fw-bold">Rating*</label>
                            <select name="rating" id="rating" class="form-select <?php $__errorArgs = ['rating'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                <option value="5" <?php echo e(old('rating', $review->rating) == 5 ? 'selected' : ''); ?>>5 Stars</option>
                                <option value="4" <?php echo e(old('rating', $review->rating) == 4 ? 'selected' : ''); ?>>4 Stars</option>
                                <option value="3" <?php echo e(old('rating', $review->rating) == 3 ? 'selected' : ''); ?>>3 Stars</option>
                                <option value="2" <?php echo e(old('rating', $review->rating) == 2 ? 'selected' : ''); ?>>2 Stars</option>
                                <option value="1" <?php echo e(old('rating', $review->rating) == 1 ? 'selected' : ''); ?>>1 Star</option>
                            </select>
                            <?php $__errorArgs = ['rating'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="mb-4">
                            <label for="comment" class="form-label fw-bold">Comment*</label>
                            <textarea name="comment" id="comment" rows="6" class="form-control <?php $__errorArgs = ['comment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required><?php echo e(old('comment', $review->comment)); ?></textarea>
                            <?php $__errorArgs = ['comment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Approval Status</label>
                            <div class="form-check form-switch">
                                <input type="hidden" name="is_approved" value="0">
                                <input class="form-check-input" type="checkbox" name="is_approved" id="is_approved" value="1" <?php echo e(old('is_approved', $review->is_approved) ? 'checked' : ''); ?>>
                                <label class="form-check-label" for="is_approved">Approved</label>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="d-flex gap-2">
                            <a href="<?php echo e(route('admin.reviews.index')); ?>" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i> Update Review
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\The Final Project Folder\Edited-FinalProject\resources\views/admin/reviews-edit.blade.php ENDPATH**/ ?>