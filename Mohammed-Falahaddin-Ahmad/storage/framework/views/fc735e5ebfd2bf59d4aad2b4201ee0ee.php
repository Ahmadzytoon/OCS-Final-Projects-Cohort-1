<?php $__env->startSection('content'); ?>

<!-- Make sure your layout (layouts/user.blade.php) has: -->


<!-- Cursor follower -->
<div class="cursor-follower"></div>

<!-- Back To Top start -->
<button id="back-top" class="back-to-top">
    <i class="fa-solid fa-chevron-up"></i>
</button>

<!-- Breadcrumb Section Start -->
<div class="breadcrumb-wrapper bg-cover section-padding"
    style="background-image: url(<?php echo e(asset('user/assets/img/hero/breadcrumb-bg.jpg')); ?>);">
    <div class="container">
        <div class="page-heading">
            <h1>Wishlist</h1>
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
<div class="cart-section section-padding pb-0">
    <div class="container">
        <div class="main-cart-wrapper">
            <div class="row">
                <div class="col-12">
                    
                    
                    <?php if(session('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo e(session('success')); ?>

                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <?php if($wishlist->count() > 0): ?> 
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Stock</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $wishlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                        <?php if($item->book): ?>
                                            <tr>
                                                <td>
                                                    <span class="d-flex gap-5 align-items-center">
                                                        <a href="#" class="remove-from-wishlist" data-id="<?php echo e($item->id); ?>" title="Remove from wishlist">
                                                            <img src="<?php echo e(asset('user/assets/img/icon/icon-9.svg')); ?>" alt="Remove">
                                                        </a>
                                                        <span class="cart">
                                                            <?php
                                                                $coverImage = $item->book->cover_image;
                                                                $imagePath = asset('user/assets/img/book/placeholder.png');
                                                                
                                                                if ($coverImage) {
                                                                    if (file_exists(public_path('storage/' . $coverImage))) {
                                                                        $imagePath = asset('storage/' . $coverImage);
                                                                    } 
                                                                    elseif (file_exists(public_path('uploads/books/' . $coverImage))) {
                                                                        $imagePath = asset('uploads/books/' . $coverImage);
                                                                    } 
                                                                    elseif (file_exists(public_path('storage/books/' . $coverImage))) {
                                                                        $imagePath = asset('storage/books/' . $coverImage);
                                                                    }
                                                                    elseif (file_exists(public_path($coverImage))) {
                                                                        $imagePath = asset($coverImage);
                                                                    }
                                                                }
                                                            ?>
                                                            <img 
                                                                src="<?php echo e($imagePath); ?>" 
                                                                alt="<?php echo e($item->book->title); ?>" 
                                                                width="60"
                                                                onerror="this.onerror=null; this.src='<?php echo e(asset('user/assets/img/book/placeholder.png')); ?>'">
                                                        </span>
                                                        <span class="cart-title">
                                                            <a href="<?php echo e(route('user.shop-details', $item->book->id)); ?>">
                                                                <?php echo e($item->book->title); ?>

                                                            </a>
                                                        </span>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="cart-price">$<?php echo e(number_format($item->book->price, 2)); ?></span>
                                                </td>
                                                <td>
                                                    <?php if($item->book->stock_quantity > 0): ?>
                                                        <span class="stock-title">In Stock</span>
                                                    <?php else: ?>
                                                        <span class="stock-title-two">Out Of Stock</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <a href="<?php echo e(route('user.shop-details', $item->book->id)); ?>" class="theme-btn style-2 btn-sm">
                                                        View Details
                                                    </a>
                                                    <?php if(auth()->guard()->check()): ?>
                                                        <form action="<?php echo e(route('user.cart.add', $item->book->id)); ?>" method="POST" class="d-inline mt-2">
                                                            <?php echo csrf_field(); ?>
                                                            <?php if($item->book->stock_quantity > 0): ?>
                                                                <button type="submit" class="theme-btn btn-sm mt-1">
                                                                    Add to Cart
                                                                </button>
                                                            <?php else: ?>
                                                                <button type="button" class="theme-btn btn-sm mt-1 bg-secondary disabled-btn" disabled>
                                                                    Out of Stock
                                                                </button>
                                                            <?php endif; ?>
                                                        </form>
                                                    <?php else: ?>
                                                        <?php if($item->book->stock_quantity > 0): ?>
                                                            <a href="<?php echo e(route('login')); ?>?redirect=<?php echo e(urlencode(url()->current())); ?>" class="theme-btn btn-sm mt-1 d-inline-block">Add to Cart</a>
                                                        <?php else: ?>
                                                            <button type="button" class="theme-btn btn-sm mt-1 bg-secondary disabled-btn" disabled>
                                                                Out of Stock
                                                            </button>
                                                        <?php endif; ?>
                                                    <?php endif; ?>>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <?php if($wishlist->hasPages()): ?>
                            <div class="pagination-area d-flex justify-content-center" style="margin-top: 40px;">
                                <?php echo e($wishlist->links('pagination::bootstrap-5')); ?>

                            </div>
                        <?php endif; ?>
                    <?php else: ?>
                        <div class="text-center py-5">
                            <div class="mb-4">
                                <i class="fas fa-heart fa-4x text-muted"></i>
                            </div>
                            <h4>Your wishlist is empty.</h4>
                            <p>Add your favorite books to keep track of them!</p>
                            <a href="<?php echo e(route('user.shop')); ?>" class="theme-btn mt-3">
                                <i class="fas fa-book-reader me-1"></i> Start Shopping
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

        if (!csrfToken) {
            console.error('CSRF token missing! Check your layout.');
            return;
        }

        document.querySelectorAll('.remove-from-wishlist').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const wishlistId = this.getAttribute('data-id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, remove it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: 'Removing...',
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading();
                            }
                        });

                        fetch(`/wishlist/remove/${wishlistId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': csrfToken,
                                'Accept': 'application/json',
                                'Content-Type': 'application/json'
                            }
                        })
                        .then(response => {
                            // If response is not OK, try to parse JSON anyway, or reject
                            if (response.ok) {
                                return response.json();
                            } else {
                                return response.json().catch(() => {
                                    throw new Error(`HTTP ${response.status}`);
                                });
                            }
                        })
                        .then(data => {
                            if (data && data.success) {
                                Swal.fire(
                                    'Removed!',
                                    'The book has been removed from your wishlist.',
                                    'success'
                                ).then(() => {
                                    location.reload();
                                });
                            } else {
                                throw new Error('Server returned success=false');
                            }
                        })
                        .catch(error => {
                            console.error('Wishlist removal error:', error);
                            Swal.fire(
                                'Error!',
                                'Failed to remove the book. Please try again.',
                                'error'
                            );
                        });
                    }
                });
            });
        });
    });
</script>

<style>
    .stock-title {
        color: #28a745;
        font-weight: 600;
    }
    
    .stock-title-two {
        color: #dc3545;
        font-weight: 600;
    }
    
    .cart-title a {
        text-decoration: none;
        color: #333;
        font-weight: 600;
    }
    
    .cart-title a:hover {
        color: #007bff;
    }
    
    .cart img {
        border-radius: 4px;
        object-fit: cover;
        height: 60px;
        width: 60px;
    }
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\The Final Project Folder\Edited-FinalProject\resources\views/user/wishlist.blade.php ENDPATH**/ ?>