<!-- resources/views/partials/topbar.blade.php -->
<div class="topbar">
    <div class="topbar-left">
        <button class="btn btn-link d-md-none" id="sidebarToggle">
            <i class="fas fa-bars"></i>
        </button>
        <h4 id="pageTitle"><?php echo $__env->yieldContent('page-title', 'Dashboard'); ?></h4>
    </div>
    <div class="topbar-right">
        <div class="user-profile">
            <div class="user-avatar">A</div>
            <div class="user-info">
                <div class="user-name"><?php echo e(Auth::user()->name ?? 'Admin'); ?></div>
                <div class="user-email"><?php echo e(Auth::user()->email ?? 'admin@bookstore.com'); ?></div>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\The Final Project Folder\Edited-FinalProject\resources\views/partials/topbar.blade.php ENDPATH**/ ?>