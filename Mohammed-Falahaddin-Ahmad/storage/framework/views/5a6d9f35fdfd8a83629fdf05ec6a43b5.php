
<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="row mb-4">
        <div class="col-md-6">
            <h2>Order Details</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="<?php echo e(route('user.orders')); ?>" class="theme-btn style-2">
                <i class="fas fa-arrow-left me-1"></i> Back to Orders
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0"><i class="fas fa-box me-2"></i> Order Items</h5>
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="<?php echo e($item->book->cover_image ? asset('uploads/books/' . $item->book->cover_image) : asset('user/assets/img/book/placeholder.png')); ?>" 
                                                     alt="<?php echo e($item->book->title); ?>" 
                                                     width="50" 
                                                     class="rounded me-3">
                                                <span><?php echo e($item->book->title); ?></span>
                                            </div>
                                        </td>
                                        <td>$<?php echo e(number_format($item->price, 2)); ?></td>
                                        <td><?php echo e($item->quantity); ?></td>
                                        <td class="fw-bold">$<?php echo e(number_format($item->price * $item->quantity, 2)); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" class="text-end fw-bold">Total:</td>
                                    <td class="fw-bold fs-5">$<?php echo e(number_format($order->total_amount ?? 0, 2)); ?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i> Order Information</h5>
                </div>
                <div class="card-body p-4">
                    <p><strong>Order ID:</strong> #<?php echo e(str_pad($order->id, 6, '0', STR_PAD_LEFT)); ?></p>
                    <p><strong>Date:</strong> <?php echo e($order->created_at->format('M d, Y')); ?></p>
                    <p><strong>Status:</strong> 
                        <span class="badge bg-<?php echo e($order->status === 'completed' ? 'success' : ($order->status === 'processing' ? 'warning' : 'secondary')); ?>">
                            <?php echo e(ucfirst($order->status ?? 'pending')); ?>

                        </span>
                    </p>
                    <?php if($order->payment): ?>
                        <p><strong>Payment Method:</strong> <?php echo e($order->payment->payment_method ?? 'N/A'); ?></p>
                        <p><strong>Payment Status:</strong> 
                            <span class="badge bg-<?php echo e($order->payment->status === 'completed' ? 'success' : 'secondary'); ?>">
                                <?php echo e(ucfirst($order->payment->status ?? 'pending')); ?>

                            </span>
                        </p>
                    <?php endif; ?>
                </div>
            </div>

            <?php if($order->shippingAddress): ?>
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0"><i class="fas fa-shipping-fast me-2"></i> Shipping Address</h5>
                    </div>
                    <div class="card-body p-4">
                        <p><?php echo e($order->shippingAddress->full_name); ?></p>
                        <p><?php echo e($order->shippingAddress->address_line1); ?></p>
                        <?php if($order->shippingAddress->address_line2): ?>
                            <p><?php echo e($order->shippingAddress->address_line2); ?></p>
                        <?php endif; ?>
                        <p><?php echo e($order->shippingAddress->city); ?>, <?php echo e($order->shippingAddress->state); ?> <?php echo e($order->shippingAddress->postal_code); ?></p>
                        <p><?php echo e($order->shippingAddress->country); ?></p>
                        <p><strong>Phone:</strong> <?php echo e($order->shippingAddress->phone); ?></p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\The Final Project Folder\Edited-FinalProject\resources\views/user/order-show.blade.php ENDPATH**/ ?>