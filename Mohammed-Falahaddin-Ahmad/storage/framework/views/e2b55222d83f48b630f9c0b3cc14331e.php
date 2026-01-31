
<?php $__env->startSection('title', 'Order Management'); ?>
<?php $__env->startSection('page-title', 'Order Management'); ?>

<?php $__env->startSection('content'); ?>
<div class="table-container">
    <div class="table-header">
        <h5 class="mb-0"><i class="fas fa-shopping-cart me-2"></i> Order Management</h5>
    </div>
    
    <div style="padding: 0 2rem;">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
                <i class="fas fa-check-circle me-2"></i><?php echo e(session('success')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <!-- Filters -->
        <form method="GET" action="<?php echo e(route('admin.orders.index')); ?>" class="row mb-4 g-3">
            <div class="col-md-3">
                <select class="form-select" name="status">
                    <option value="">All Status</option>
                    <option value="pending" <?php echo e(request('status') == 'pending' ? 'selected' : ''); ?>>Pending</option>
                    <option value="delivered" <?php echo e(request('status') == 'delivered' ? 'selected' : ''); ?>>Delivered</option>
                    <option value="cancelled" <?php echo e(request('status') == 'cancelled' ? 'selected' : ''); ?>>Cancelled</option>
                </select>
            </div>
            <div class="col-md-3">
                <input type="date" class="form-control" name="from_date" value="<?php echo e(request('from_date')); ?>" placeholder="From Date">
            </div>
            <div class="col-md-3">
                <input type="date" class="form-control" name="to_date" value="<?php echo e(request('to_date')); ?>" placeholder="To Date">
            </div>
            <div class="col-md-2">
                <input type="text" class="form-control" name="search" value="<?php echo e(request('search')); ?>" placeholder="Order ID or Customer">
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary me-1">Filter</button>
                <a href="<?php echo e(route('admin.orders.index')); ?>" class="btn btn-secondary">Reset</a>
            </div>
        </form>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>Order ID</th>
                    <th>Customer</th>
                    <th>Items</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <tr>
                    <td><?php echo e($order->order_id); ?></td>
                    <td><?php echo e($order->user->name ?? 'N/A'); ?></td>
                    <td><?php echo e($order->orderItems->count()); ?></td>
                    <td>$<?php echo e(number_format($order->total_amount, 2)); ?></td>
                    <td><span class="badge <?php echo e($order->status_badge_class); ?>"><?php echo e($order->status_label); ?></span></td>
                    <td><?php echo e($order->created_at->format('Y-m-d')); ?></td>
                    <td>
                        <a href="<?php echo e(route('admin.orders.show', $order)); ?>" class="btn btn-sm btn-info action-btn">
                            <i class="fas fa-eye"></i>
                        </a>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($order->order_status == 'pending'): ?>
                            <form action="<?php echo e(route('admin.orders.update-status', $order)); ?>" method="POST" style="display: inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PATCH'); ?>
                                <input type="hidden" name="order_status" value="delivered">
                                <button type="submit" class="btn btn-sm btn-success action-btn" 
                                        onclick="return confirm('Mark this order as delivered?')">
                                    <i class="fas fa-check"></i>
                                </button>
                            </form>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <button class="btn btn-sm btn-primary action-btn" onclick="window.print()">
                            <i class="fas fa-print"></i>
                        </button>
                    </td>
                </tr>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                <tr>
                    <td colspan="7" class="text-center">No orders found</td>
                </tr>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-3">
        <?php echo e($orders->links()); ?>

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
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Last Backup Edited Final Project 30-1-2026\Edited-FinalProject\resources\views/admin/orders.blade.php ENDPATH**/ ?>