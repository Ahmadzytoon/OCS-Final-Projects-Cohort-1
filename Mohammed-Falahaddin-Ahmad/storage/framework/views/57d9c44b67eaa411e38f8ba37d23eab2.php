
<?php $__env->startSection('title', 'Add New Coupon'); ?>
<?php $__env->startSection('page-title', 'Add New Coupon'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <h5>Add New Coupon</h5>
    </div>
    <div class="card-body">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                        <li><?php echo e($error); ?></li>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </ul>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <form action="<?php echo e(route('admin.coupons.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            
            <div class="mb-3">
                <label for="code" class="form-label">Coupon Code *</label>
                <input type="text" class="form-control" id="code" name="code" value="<?php echo e(old('code')); ?>" required>
                <small class="form-text text-muted">Use uppercase letters and numbers only</small>
            </div>

            <div class="mb-3">
                <label for="discount_type" class="form-label">Discount Type *</label>
                <select class="form-select" id="discount_type" name="discount_type" required>
                    <option value="">Select Discount Type</option>
                    <option value="percentage" <?php echo e(old('discount_type') == 'percentage' ? 'selected' : ''); ?>>Percentage</option>
                    <option value="fixed" <?php echo e(old('discount_type') == 'fixed' ? 'selected' : ''); ?>>Fixed Amount</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="discount_value" class="form-label">Discount Value *</label>
                <input type="number" class="form-control" id="discount_value" name="discount_value" step="0.01" value="<?php echo e(old('discount_value')); ?>" required>
                <small class="form-text text-muted">For percentage: 20 = 20%, For fixed: 10 = $10</small>
            </div>

            <div class="mb-3">
                <label for="min_order_amount" class="form-label">Minimum Order Amount</label>
                <input type="number" class="form-control" id="min_order_amount" name="min_order_amount" step="0.01" value="<?php echo e(old('min_order_amount')); ?>">
                <small class="form-text text-muted">Leave blank for no minimum</small>
            </div>

            <div class="mb-3">
                <label for="usage_limit" class="form-label">Usage Limit</label>
                <input type="number" class="form-control" id="usage_limit" name="usage_limit" value="<?php echo e(old('usage_limit')); ?>">
                <small class="form-text text-muted">Leave blank for unlimited uses</small>
            </div>

            <div class="mb-3">
                <label for="expires_at" class="form-label">Expiration Date</label>
                <input type="datetime-local" class="form-control" id="expires_at" name="expires_at" value="<?php echo e(old('expires_at')); ?>">
                <small class="form-text text-muted">Leave blank for never expiring</small>
            </div>

            <div class="mb-3">
                <label for="is_active" class="form-label">Status *</label>
                <select class="form-select" id="is_active" name="is_active" required>
                    <option value="1" <?php echo e(old('is_active', 1) == 1 ? 'selected' : ''); ?>>Active</option>
                    <option value="0" <?php echo e(old('is_active') == 0 ? 'selected' : ''); ?>>Inactive</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Save Coupon</button>
            <a href="<?php echo e(route('admin.coupons.index')); ?>" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Last Backup Edited Final Project 30-1-2026\Edited-FinalProject\resources\views/admin/coupons-create.blade.php ENDPATH**/ ?>