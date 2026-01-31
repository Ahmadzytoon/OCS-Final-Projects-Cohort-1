
<?php $__env->startSection('title', 'Coupons & Discounts'); ?>
<?php $__env->startSection('page-title', 'Coupons & Discounts'); ?>

<?php $__env->startSection('content'); ?>
<div class="table-container">
    <div class="table-header">
        <h5 class="mb-0"><i class="fas fa-tags me-2"></i> Coupons & Discounts</h5>
        <a href="<?php echo e(route('admin.coupons.create')); ?>" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i> Add Coupon
        </a>
    </div>
    
    <div style="padding: 0 2rem;">
        <!-- Filters -->
        <form method="GET" action="<?php echo e(route('admin.coupons.index')); ?>" class="row mb-4 g-3">
            <div class="col-md-3">
                <select class="form-select" name="status">
                    <option value="">All Status</option>
                    <option value="active" <?php echo e(request('status') == 'active' ? 'selected' : ''); ?>>Active</option>
                    <option value="inactive" <?php echo e(request('status') == 'inactive' ? 'selected' : ''); ?>>Inactive</option>
                </select>
            </div>
            <div class="col-md-3">
                <select class="form-select" name="expiration">
                    <option value="">All Expiration</option>
                    <option value="active" <?php echo e(request('expiration') == 'active' ? 'selected' : ''); ?>>Active</option>
                    <option value="expired" <?php echo e(request('expiration') == 'expired' ? 'selected' : ''); ?>>Expired</option>
                </select>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary">Filter</button>
                <a href="<?php echo e(route('admin.coupons.index')); ?>" class="btn btn-secondary">Reset</a>
            </div>
        </form>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>Code</th>
                    <th>Type</th>
                    <th>Value</th>
                    <th>Min Order</th>
                    <th>Usage Limit</th>
                    <th>Used</th>
                    <th>Expires</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <tr>
                    <td><code><?php echo e($coupon->code); ?></code></td>
                    <td><?php echo e(ucfirst($coupon->discount_type)); ?></td>
                    <td><?php echo e($coupon->discount_type === 'percentage' ? $coupon->discount_value . '%' : '$' . number_format($coupon->discount_value, 2)); ?></td>
                    <td><?php echo e($coupon->min_order_amount ? '$' . number_format($coupon->min_order_amount, 2) : 'N/A'); ?></td>
                    <td><?php echo e($coupon->usage_limit ?? 'Unlimited'); ?></td>
                    <td><?php echo e($coupon->used_count); ?></td>
                    <td><?php echo e($coupon->expires_at ? $coupon->expires_at->format('Y-m-d') : 'Never'); ?></td>
                    <td><span class="badge <?php echo e($coupon->status_badge_class); ?>"><?php echo e($coupon->status_label); ?></span></td>
                    <td>
                        <a href="<?php echo e(route('admin.coupons.edit', $coupon)); ?>" class="btn btn-sm btn-warning action-btn">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="<?php echo e(route('admin.coupons.destroy', $coupon)); ?>" method="POST" style="display: inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-sm btn-danger action-btn delete-coupon-btn" data-coupon-code="<?php echo e($coupon->code); ?>">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                <tr>
                    <td colspan="9" class="text-center">No coupons found</td>
                </tr>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-3">
        <?php echo e($coupons->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('assets/js/coupons.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Last Backup Edited Final Project 30-1-2026\Edited-FinalProject\resources\views/admin/coupons.blade.php ENDPATH**/ ?>