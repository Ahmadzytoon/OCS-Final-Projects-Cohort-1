
<?php $__env->startSection('title', 'Order Details: ' . $order->order_id); ?>
<?php $__env->startSection('page-title', 'Order Details'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5>Order Details - <?php echo e($order->order_id); ?></h5>
        <a href="<?php echo e(route('admin.orders.index')); ?>" class="btn btn-secondary">Back to Orders</a>
    </div>
    <div class="card-body">
        <!-- Order Summary -->
        <div class="row mb-4">
            <div class="col-md-6">
                <h6>Customer Information</h6>
                <p><strong>Name:</strong> <?php echo e($order->user->name ?? 'N/A'); ?></p>
                <p><strong>Email:</strong> <?php echo e($order->user->email ?? 'N/A'); ?></p>
                <p><strong>Phone:</strong> <?php echo e($order->user->phone ?? 'N/A'); ?></p>
            </div>
            <div class="col-md-6">
                <h6>Shipping Address</h6>
                <p><?php echo e($order->address->street ?? 'N/A'); ?></p>
                <p><?php echo e($order->address->city ?? 'N/A'); ?>, <?php echo e($order->address->state ?? 'N/A'); ?> <?php echo e($order->address->zip_code ?? 'N/A'); ?></p>
                <p><strong>Country:</strong> <?php echo e($order->address->country ?? 'N/A'); ?></p>
            </div>
        </div>

        <!-- Order Status -->
        <div class="row mb-4">
            <div class="col-md-12">
                <h6>Order Status</h6>
                <form action="<?php echo e(route('admin.orders.update-status', $order)); ?>" method="POST" class="d-inline">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>
                    <select name="order_status" class="form-select d-inline w-auto" onchange="this.form.submit()">
                        <option value="pending" <?php echo e($order->order_status == 'pending' ? 'selected' : ''); ?>>Pending</option>
                        <option value="delivered" <?php echo e($order->order_status == 'delivered' ? 'selected' : ''); ?>>Delivered</option>
                        <option value="cancelled" <?php echo e($order->order_status == 'cancelled' ? 'selected' : ''); ?>>Cancelled</option>
                    </select>
                </form>
                <span class="badge <?php echo e($order->status_badge_class); ?> ms-2"><?php echo e($order->status_label); ?></span>
            </div>
        </div>

        <!-- Order Items -->
        <div class="row mb-4">
            <div class="col-md-12">
                <h6>Order Items</h6>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Book</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($item->book->title ?? 'N/A'); ?></td>
                            <td><?php echo e($item->book->author->name ?? 'N/A'); ?></td>
                            <td><?php echo e($item->book->category->name ?? 'N/A'); ?></td>
                            <td><?php echo e($item->quantity); ?></td>
                            <td>$<?php echo e(number_format($item->price_at_time, 2)); ?></td>
                            <td>$<?php echo e(number_format($item->price_at_time * $item->quantity, 2)); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="5" class="text-end">Total Amount:</th>
                            <th>$<?php echo e(number_format($order->total_amount, 2)); ?></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <!-- Order Actions -->
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-primary" onclick="window.print()"><i class="fas fa-print me-2"></i>Print Invoice</button>
                <?php if($order->order_status == 'pending'): ?>
                    <form action="<?php echo e(route('admin.orders.update-status', $order)); ?>" method="POST" class="d-inline">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PATCH'); ?>
                        <input type="hidden" name="order_status" value="delivered">
                        <button type="submit" class="btn btn-success" onclick="return confirm('Mark this order as delivered?')">
                            <i class="fas fa-check me-2"></i>Mark as Delivered
                        </button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\The Final Project Folder\Edited-FinalProject\resources\views/admin/orders-show.blade.php ENDPATH**/ ?>