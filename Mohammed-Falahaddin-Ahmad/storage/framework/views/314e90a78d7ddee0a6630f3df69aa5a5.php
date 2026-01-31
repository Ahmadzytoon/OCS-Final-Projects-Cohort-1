<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <h3><i class="fas fa-book-open"></i> BookStore Admin</h3>
    </div>
    <div class="sidebar-menu">
        <a href="<?php echo e(route('admin.dashboard')); ?>" class="menu-item <?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?>">
            <i class="fas fa-tachometer-alt"></i> Dashboard
        </a>
        <a href="<?php echo e(route('admin.users.index')); ?>" class="menu-item <?php echo e(request()->routeIs('admin.users.*') ? 'active' : ''); ?>" data-page="users">
            <i class="fas fa-users"></i> User Management
        </a>
        <a href="<?php echo e(route('admin.books.index')); ?>" class="menu-item <?php echo e(request()->routeIs('admin.books.*') ? 'active' : ''); ?>" data-page="books">
            <i class="fas fa-book"></i> Book Management
        </a>
        <a href="<?php echo e(route('admin.categories.index')); ?>" class="menu-item <?php echo e(request()->routeIs('admin.categories.*') ? 'active' : ''); ?>" data-page="categories">
            <i class="fas fa-list"></i> Categories
        </a>
        <a href="<?php echo e(route('admin.authors.index')); ?>" class="menu-item <?php echo e(request()->routeIs('admin.authors.*') ? 'active' : ''); ?>" data-page="authors">
            <i class="fas fa-user-edit"></i> Authors
        </a>
        <a href="<?php echo e(route('admin.orders.index')); ?>" class="menu-item <?php echo e(request()->routeIs('admin.orders.*') ? 'active' : ''); ?>" data-page="orders">
            <i class="fas fa-shopping-cart"></i> Order Management
        </a>
        <a href="<?php echo e(route('admin.stock.index')); ?>" class="menu-item <?php echo e(request()->routeIs('admin.stock.*') ? 'active' : ''); ?>" data-page="stock">
            <i class="fas fa-boxes"></i> Stock Management
        </a>
        <a href="<?php echo e(route('admin.coupons.index')); ?>" class="menu-item <?php echo e(request()->routeIs('admin.coupons.*') ? 'active' : ''); ?>" data-page="coupons">
            <i class="fas fa-tags"></i> Coupons & Discounts
        </a>
        <a href="<?php echo e(route('admin.reviews.index')); ?>" class="menu-item <?php echo e(request()->routeIs('admin.reviews.*') ? 'active' : ''); ?>" data-page="reviews">
            <i class="fas fa-star"></i> Reviews & Ratings
        </a>
        <a href="<?php echo e(route('admin.settings.index')); ?>" class="menu-item <?php echo e(request()->routeIs('admin.settings') ? 'active' : ''); ?>" data-page="settings">
            <i class="fas fa-cog"></i> System Settings
        </a>

        <form method="POST" action="<?php echo e(route('logout')); ?>" style="margin: 0; padding: 0;">
            <?php echo csrf_field(); ?>
            <button type="submit" class="menu-item" style="width: 100%; text-align: left; border: none; background: transparent; color: white; font: inherit; padding: 0.75rem 1rem; cursor: pointer; display: flex; align-items: center; gap: 0.75rem;">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </form>
    </div>
</div><?php /**PATH C:\The Final Project Folder\Edited-FinalProject\resources\views/partials/sidebar.blade.php ENDPATH**/ ?>