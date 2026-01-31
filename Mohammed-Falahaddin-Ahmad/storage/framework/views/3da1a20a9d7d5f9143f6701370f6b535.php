    
    <?php $__env->startSection('content'); ?>
    <div class="container py-5">
        <div class="section-title text-center mb-5">
            <h2>My Orders</h2>
            <p>Track your recent purchases</p>
        </div>

        <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo e(session('success')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php if($orders->count() > 0): ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Order ID</th>
                            <th>Date</th>
                            <th>Items</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>#<?php echo e(str_pad($order->id, 6, '0', STR_PAD_LEFT)); ?></td>
                                <td><?php echo e($order->created_at->format('M d, Y')); ?></td>
                                <td><?php echo e($order->items->count()); ?> item(s)</td>
                                <td class="fw-bold">$<?php echo e(number_format($order->total_amount ?? 0, 2)); ?></td>
                                <td>
                                    <span class="badge bg-<?php echo e($order->status === 'completed' ? 'success' : ($order->status === 'processing' ? 'warning' : 'secondary')); ?>">
                                        <?php echo e(ucfirst($order->status ?? 'pending')); ?>

                                    </span>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('user.order.show', $order->id)); ?>" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye me-1"></i> View
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            
            <div class="d-flex justify-content-center mt-4">
                <?php echo e($orders->links()); ?>

            </div>
        <?php else: ?>
            <div class="text-center py-5">
                <div class="mb-4">
                    <i class="fas fa-box-open fa-3x text-muted"></i>
                </div>
                <h4>No orders yet</h4>
                <p class="text-muted mb-4">Start shopping to see your orders here</p>
                <a href="<?php echo e(route('user.shop')); ?>" class="theme-btn">
                    <i class="fas fa-book-reader me-1"></i> Browse Books
                </a>
            </div>
        <?php endif; ?>
    </div>
    <?php $__env->stopSection(); ?>

    <?php $__env->startPush('styles'); ?>
    <style>
        .table {
            border-radius: 8px;
            overflow: hidden;
        }
        .table th {
            background-color: #f8f9fa;
            font-weight: 600;
        }
        .badge {
            padding: 0.4em 0.8em;
            font-size: 0.85em;
        }
        .btn-outline-primary:hover {
            background-color: #0d6efd;
            color: white;
        }
    </style>
    <?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\The Final Project Folder\Edited-FinalProject\resources\views/user/orders.blade.php ENDPATH**/ ?>