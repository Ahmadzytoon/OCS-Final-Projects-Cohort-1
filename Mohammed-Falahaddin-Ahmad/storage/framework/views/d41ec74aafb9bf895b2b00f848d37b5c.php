
<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('page-title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="row g-3 mb-4">
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stat-card primary position-relative h-100 d-flex flex-column justify-content-center">
            <div class="stat-title">Total Users</div>
            <div class="stat-value" id="totalUsers"><?php echo e(number_format($totalUsers)); ?></div>
            <div class="text-muted small">&nbsp;</div> <!-- Placeholder for height consistency -->
            <i class="fas fa-users stat-icon"></i>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stat-card success position-relative h-100 d-flex flex-column justify-content-center">
            <div class="stat-title">Total Books</div>
            <div class="stat-value" id="totalBooks"><?php echo e(number_format($totalBooks)); ?></div>
            <div class="text-muted small">Authors: <span id="totalAuthors"><?php echo e(number_format($totalAuthors)); ?></span></div>
            <i class="fas fa-book stat-icon"></i>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stat-card info position-relative h-100 d-flex flex-column justify-content-center">
            <div class="stat-title">Total Orders</div>
            <div class="stat-value" id="totalOrders"><?php echo e(number_format($totalOrders)); ?></div>
            <div class="text-muted small">Completed: <span id="completedOrders"><?php echo e(number_format($completedOrders)); ?></span></div>
            <i class="fas fa-shopping-cart stat-icon"></i>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stat-card warning position-relative h-100 d-flex flex-column justify-content-center">
            <div class="stat-title">Total Revenue</div>
            <div class="stat-value">$<?php echo e(number_format($totalRevenue, 2)); ?></div>
            <div class="text-muted small">Active Coupons: <span><?php echo e(number_format($activeCoupons)); ?></span></div>
            <i class="fas fa-dollar-sign stat-icon"></i>
        </div>
    </div>
</div>

<div class="row g-3 mb-4">
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stat-card danger position-relative h-100 d-flex flex-column justify-content-center">
            <div class="stat-title">Pending Orders</div>
            <div class="stat-value" id="pendingOrders"><?php echo e(number_format($pendingOrders)); ?></div>
            <div class="text-muted small">Canceled: <span id="canceledOrders"><?php echo e(number_format($canceledOrders)); ?></span></div>
            <i class="fas fa-clock stat-icon"></i>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stat-card warning position-relative h-100 d-flex flex-column justify-content-center">
            <div class="stat-title">Low Stock Books</div>
            <div class="stat-value" id="lowStock"><?php echo e(number_format($lowStockBooks)); ?></div>
            <div class="text-muted small">Out of stock: <span id="outOfStock"><?php echo e(number_format($outOfStock)); ?></span></div>
            <i class="fas fa-exclamation-triangle stat-icon"></i>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stat-card success position-relative h-100 d-flex flex-column justify-content-center">
            <div class="stat-title">Active Categories</div>
            <div class="stat-value" id="activeCategories"><?php echo e(number_format($activeCategories)); ?></div>
            <div class="text-muted small">Total: <?php echo e(number_format($activeCategories)); ?></div>
            <i class="fas fa-list stat-icon"></i>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stat-card info position-relative h-100 d-flex flex-column justify-content-center">
            <div class="stat-title">Coupons Used</div>
            <div class="stat-value" id="couponsUsed"><?php echo e(number_format($usedCoupons)); ?></div>
            <div class="text-muted small">Active: <?php echo e(number_format($activeCoupons)); ?></div>
            <i class="fas fa-ticket-alt stat-icon"></i>
        </div>
    </div>
</div>

<!-- Charts remain as placeholders for now -->
<div class="row g-3 mb-4">
    <div class="col-xl-8">
        <div class="chart-container">
            <div class="chart-header">
                <h5><i class="fas fa-chart-line me-2"></i> Sales Analytics</h5>
                <select class="form-select form-select-sm" style="width: auto;" id="salesPeriod">
                    <option value="7">Last 7 Days</option>
                    <option value="30" selected>Last 30 Days</option>
                    <option value="90">Last 3 Months</option>
                </select>
            </div>
            <canvas id="salesChart"></canvas>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="chart-container">
            <div class="chart-header">
                <h5><i class="fas fa-chart-pie me-2"></i> Order Status</h5>
            </div>
            <canvas id="orderStatusChart"></canvas>
        </div>
    </div>
</div>

<div class="row g-3 mb-4">
    <div class="col-xl-6">
        <div class="chart-container">
            <div class="chart-header">
                <h5><i class="fas fa-chart-bar me-2"></i> Top Selling Books</h5>
            </div>
            <canvas id="topBooksChart"></canvas>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="chart-container">
            <div class="chart-header">
                <h5><i class="fas fa-chart-bar me-2"></i> Top Categories</h5>
            </div>
            <canvas id="topCategoriesChart"></canvas>
        </div>
    </div>
</div>


<div id="chartData" 
    data-sales='<?php echo json_encode($salesData, 15, 512) ?>' 
    data-order-status='<?php echo json_encode($orderStatusData, 15, 512) ?>'
    data-top-books='<?php echo json_encode($topBooks, 15, 512) ?>'
    data-top-categories='<?php echo json_encode($topCategories, 15, 512) ?>'
    data-daily-orders='<?php echo json_encode($dailyOrdersData, 15, 512) ?>'
    style="display: none;">
</div>
<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/admin-dashboard.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('assets/admin/js/admin.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Last Backup Edited Final Project 30-1-2026\Edited-FinalProject\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>