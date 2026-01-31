<?php $__env->startSection('content'); ?>

<!-- Cursor follower -->
<div class="cursor-follower"></div>

<!-- Back To Top start -->
<button id="back-top" class="back-to-top">
    <i class="fa-solid fa-chevron-up"></i>
</button>

<!-- Breadcrumb Section Start -->
<div class="breadcrumb-wrapper bg-cover section-padding"
    style="background-image: url(<?php echo e(asset('assets/user/images/hero/breadcrumb-bg.jpg')); ?>);">
    <div class="container">
        <div class="page-heading">
            <h1>My Wishlist</h1>
            <div class="page-header">
                <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".3s">
                    <li><a href="<?php echo e(route('user.home')); ?>">Home</a></li>
                    <li><i class="fa-solid fa-chevron-right"></i></li>
                    <li>Wishlist</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Wishlist Section Start -->
<div class="wishlist-section section-padding">
    <div class="container">
        <div class="wishlist-wrapper">
            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show mb-5" role="alert">
                    <i class="fas fa-check-circle me-2"></i> <?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($wishlist->count() > 0): ?>
                <div class="row g-4">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $wishlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($item->book): ?>
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="wishlist-card shadow-sm h-100 position-relative">
                                    <a href="#" class="remove-btn position-absolute top-0 end-0 m-2 remove-from-wishlist" 
                                       data-id="<?php echo e($item->book_id); ?>" title="Remove from wishlist">
                                        <i class="fas fa-times"></i>
                                    </a>
                                    
                                    <div class="wishlist-thumb">
                                        <?php
                                            $coverImage = $item->book->cover_image;
                                            $imagePath = asset('assets/user/images/book/placeholder.png');
                                            
                                            if ($coverImage) {
                                                if (file_exists(public_path('storage/' . $coverImage))) {
                                                    $imagePath = asset('storage/' . $coverImage);
                                                } 
                                                elseif (file_exists(public_path('uploads/books/' . $coverImage))) {
                                                    $imagePath = asset('uploads/books/' . $coverImage);
                                                } 
                                            }
                                        ?>
                                        <a href="<?php echo e(route('user.shop-details', $item->book->id)); ?>">
                                            <img src="<?php echo e($imagePath); ?>" alt="<?php echo e($item->book->title); ?>" 
                                                 onerror="this.onerror=null; this.src='<?php echo e(asset('assets/user/images/book/placeholder.png')); ?>'">
                                        </a>
                                    </div>
                                    
                                    <div class="wishlist-content p-3 mt-2">
                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                            <h6 class="book-title text-truncate mb-0" style="max-width: 100%;">
                                                <a href="<?php echo e(route('user.shop-details', $item->book->id)); ?>"><?php echo e($item->book->title); ?></a>
                                            </h6>
                                        </div>
                                        
                                        <div class="price-stock d-flex justify-content-between align-items-center mb-3">
                                            <span class="price fw-bold">$<?php echo e(number_format($item->book->price, 2)); ?></span>
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($item->book->stock_quantity > 0): ?>
                                                <span class="badge bg-success-subtle text-success border border-success-subtle px-2">In Stock</span>
                                            <?php else: ?>
                                                <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-2">Out Stock</span>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        </div>
                                        
                                        <div class="actions d-grid gap-2">
                                            <a href="<?php echo e(route('user.shop-details', $item->book->id)); ?>" class="theme-btn btn-sm style-2 text-center">
                                                Details
                                            </a>
                                            
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
                                                <form action="<?php echo e(route('user.cart.add', $item->book->id)); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <button type="submit" class="theme-btn btn-sm w-100 <?php echo e($item->book->stock_quantity <= 0 ? 'bg-secondary disabled' : ''); ?>" <?php echo e($item->book->stock_quantity <= 0 ? 'disabled' : ''); ?>>
                                                        <i class="fas fa-shopping-cart me-1"></i> Add to Cart
                                                    </button>
                                                </form>
                                            <?php else: ?>
                                                <a href="<?php echo e(route('login')); ?>?redirect=<?php echo e(urlencode(url()->current())); ?>" class="theme-btn btn-sm text-center <?php echo e($item->book->stock_quantity <= 0 ? 'bg-secondary disabled' : ''); ?>">
                                                    Add to Cart
                                                </a>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div>

                <!-- Pagination -->
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($wishlist->hasPages()): ?>
                    <div class="pagination-area d-flex justify-content-center mt-5">
                        <?php echo e($wishlist->links('pagination::bootstrap-5')); ?>

                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php else: ?>
                <div class="empty-wishlist text-center py-5 bg-light rounded shadow-sm">
                    <div class="mb-4">
                        <i class="fas fa-heart fa-4x text-muted opacity-25"></i>
                    </div>
                    <h4 class="fw-bold">Your Wishlist is Dreaming...</h4>
                    <p class="text-muted mb-4">It looks like you haven't added any books yet to your wishlist collection.</p>
                    <a href="<?php echo e(route('user.shop')); ?>" class="theme-btn">
                        <i class="fas fa-search me-1"></i> Discover New Books
                    </a>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</div>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/user/css/wishlist.css')); ?>">
<?php $__env->stopPush(); ?>

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '<?php echo e(csrf_token()); ?>';

        document.querySelectorAll('.remove-from-wishlist').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const wishlistId = this.getAttribute('data-id');

                Swal.fire({
                    title: 'Remove Book?',
                    text: "Shall we remove this book from your wishlist?",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#ff7c6b',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes, remove',
                    cancelButtonText: 'Keep it',
                    borderRadius: '20px'
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(`/wishlist/remove/${wishlistId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': csrfToken,
                                'Accept': 'application/json',
                                'Content-Type': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data && data.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Removed!',
                                    text: 'The book was removed from your collection.',
                                    timer: 2000,
                                    showConfirmButton: false,
                                    borderRadius: '20px'
                                }).then(() => {
                                    location.reload();
                                });
                            }
                        });
                    }
                });
            });
        });
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Last Backup Edited Final Project 30-1-2026\Edited-FinalProject\resources\views/user/wishlist.blade.php ENDPATH**/ ?>