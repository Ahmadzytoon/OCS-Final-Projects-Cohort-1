<?php $__env->startSection('content'); ?>
<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/discount-style.css')); ?>">
<?php $__env->stopPush(); ?>
<body>
<!-- Cursor follower -->
<div class="cursor-follower"></div>

    <!-- Preloader start -->
    <div id="preloader" class="preloader">
        <div class="animation-preloader">
            <div class="spinner"></div>
            <div class="txt-loading">
                <span data-text-preloader="R" class="letters-loading">R</span>
                <span data-text-preloader="E" class="letters-loading">E</span>
                <span data-text-preloader="A" class="letters-loading">A</span>
                <span data-text-preloader="D" class="letters-loading">D</span>
                <span data-text-preloader="I" class="letters-loading">I</span>
                <span data-text-preloader="F" class="letters-loading">F</span>
                <span data-text-preloader="Y" class="letters-loading">Y</span>
            </div>
            <p class="text-center">Loading</p>
        </div>

    <div class="loader">
        <div class="row">
            <div class="col-3 loader-section section-left"><div class="bg"></div></div>
            <div class="col-3 loader-section section-left"><div class="bg"></div></div>
            <div class="col-3 loader-section section-right"><div class="bg"></div></div>
            <div class="col-3 loader-section section-right"><div class="bg"></div></div>
        </div>
    </div>
</div>

<!-- Back To Top start -->
<button id="back-top" class="back-to-top">
    <i class="fa-solid fa-chevron-up"></i>
</button>

<!-- Breadcumb Section Start -->
<div class="breadcrumb-wrapper bg-cover section-padding"
    style="background-image: url(<?php echo e(asset('user/assets/img/hero/breadcrumb-bg.jpg')); ?>);">
    <div class="container">
        <div class="page-heading">
            <h1>Shop Details</h1>
            <div class="page-header">
                <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".3s">
                    <li><a href="<?php echo e(route('user.home')); ?>">Home</a></li>
                    <li><i class="fa-solid fa-chevron-right"></i></li>
                    <li><?php echo e($book->title); ?></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Shop Details Section Start -->
<section class="shop-details-section fix section-padding">
    <div class="container">
        <div class="shop-details-wrapper">
            <div class="row g-4">
                <div class="col-lg-5">
                    <div class="shop-details-image">
                        <div class="tab-content">
                            <div id="thumb1" class="tab-pane fade show active">
                                <div class="shop-details-thumb">
                                    <img src="<?php echo e($book->cover_image ? asset('uploads/books/' . $book->cover_image) : asset('user/assets/img/book/placeholder.png')); ?>" alt="<?php echo e($book->title); ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="shop-details-content">
                        <div class="title-wrapper">
                            <h2><?php echo e($book->title); ?></h2>
                            <h5><?php echo e($book->stock_quantity > 0 ? 'In Stock' : 'Out of Stock'); ?></h5>
                        </div>
                        <div class="star">
                            <?php for($i = 1; $i <= 5; $i++): ?>
                                <?php if($i <= 4): ?>
                                    <i class="fa-solid fa-star"></i>
                                <?php else: ?>
                                    <i class="fa-regular fa-star"></i>
                                <?php endif; ?>
                            <?php endfor; ?>
                            <span>(1 Customer Reviews)</span>
                        </div>
                        <p><?php echo e($book->description ?? 'No description available.'); ?></p>
                        
                        <!-- DISCOUNT PRICE DISPLAY -->
                        <div class="price-list">
                            <?php if($book->activeDiscount): ?>
                                <h4 class="old-price"><del>$<?php echo e(number_format($book->price, 2)); ?></del></h4>
                                <h3 class="new-price">$<?php echo e(number_format($book->final_price, 2)); ?></h3>
                                <span class="discount-badge badge bg-danger mt-2 d-inline-block">
                                    <?php if($book->activeDiscount->discount_type === 'percentage'): ?>
                                        <?php echo e($book->activeDiscount->discount_amount); ?>% OFF
                                    <?php else: ?>
                                        $<?php echo e(number_format($book->activeDiscount->discount_amount, 2)); ?> OFF
                                    <?php endif; ?>
                                    <?php if($book->activeDiscount->valid_until): ?>
                                        • Expires: <?php echo e($book->activeDiscount->valid_until->format('M d, Y')); ?>

                                    <?php endif; ?>
                                </span>
                            <?php else: ?>
                                <h3>$<?php echo e(number_format($book->price, 2)); ?></h3>
                            <?php endif; ?>
                        </div>
                        
                        <div class="cart-wrapper">
                            <div class="quantity-basket">
                                <p class="qty">
                                    <?php if(Auth::check()): ?>
                                        <button class="qtyminus" aria-hidden="true" <?php echo e($book->stock_quantity <= 0 ? 'disabled' : ''); ?>>−</button>
                                        <input type="number" name="qty" min="1" max="10" step="1" value="1" id="book-quantity" <?php echo e($book->stock_quantity <= 0 ? 'disabled' : ''); ?>>
                                        <button class="qtyplus" aria-hidden="true" <?php echo e($book->stock_quantity <= 0 ? 'disabled' : ''); ?>>+</button>
                                    <?php else: ?>
                                        <input type="number" name="qty" min="1" max="10" step="1" value="1" disabled class="form-control text-center" style="width: 70px; background-color: #f8f9fa;">
                                        <small class="text-muted d-block mt-1">Login to select quantity</small>
                                    <?php endif; ?>
                                </p>
                            </div>
                            <button type="button" class="theme-btn style-2" data-bs-toggle="modal" data-bs-target="#readMoreModal">
                                Read A little
                            </button>

                            <!-- Read More Modal -->
                            <div class="modal fade" id="readMoreModal" tabindex="-1" aria-labelledby="readMoreModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body" style="background-image: url(<?php echo e(asset('user/assets/img/popupBg.png')); ?>);">
                                            <div class="close-btn">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="readMoreBox">
                                                <div class="content">
                                                    <h3 id="readMoreModalLabel"><?php echo e($book->title); ?></h3>
                                                    <p><?php echo e($book->description ?? 'No extended description available.'); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- AUTHENTICATED: Show Add to Cart button -->
                            <?php if(auth()->guard()->check()): ?>
                                <form action="<?php echo e(route('user.cart.add', $book)); ?>" method="POST" class="d-inline" id="add-to-cart-form">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="quantity" id="cart-quantity" value="1">
                                    <?php if($book->stock_quantity > 0): ?>
                                        <button type="submit" class="theme-btn">Add To Cart</button>
                                        <?php else: ?>
                                        <button type="button" class="theme-btn bg-secondary disabled-btn" disabled>Out of Stock</button>
                                    <?php endif; ?>
                                </form>
                            <?php else: ?>
                                <!-- GUEST: Show 'Add to Cart' as link to Login with Redirect -->
                                <?php if($book->stock_quantity > 0): ?>
                                    <a href="<?php echo e(route('login')); ?>?redirect=<?php echo e(urlencode(url()->current())); ?>" class="theme-btn">Add To Cart</a>
                                <?php else: ?>
                                    <button type="button" class="theme-btn bg-secondary disabled-btn" disabled>Out of Stock</button>
                                <?php endif; ?>
                            <?php endif; ?>

                            <div class="icon-box">
                                <a href="#" class="icon"><i class="far fa-heart"></i></a>
                            </div>
                        </div>
                        <div class="category-box">
                            <div class="category-list">
                                <ul>
                                    <li><span>SKU:</span> <?php echo e($book->isbn ?? 'N/A'); ?></li>
                                    <li><span>Category:</span> <?php echo e($book->category ? $book->category->getFullPath() : 'Uncategorized'); ?></li>
                                </ul>
                                <ul>
                                    <li><span>Tags:</span> <?php echo e($book->tags ?? 'Book'); ?></li>
                                    <li><span>Format:</span> <?php echo e($book->format ?? 'Hardcover'); ?></li>
                                </ul>
                                <ul>
                                    <li><span>Total page:</span> <?php echo e($book->pages ?? 'N/A'); ?></li>
                                    <li><span>Language:</span> <?php echo e($book->language ?? 'English'); ?></li>
                                </ul>
                                <ul>
                                    <li><span>Publish Year:</span> <?php echo e($book->publish_year ?? 'N/A'); ?></li>
                                    <li><span>Country:</span> <?php echo e($book->country ?? 'United States'); ?></li>
                                </ul>
                            </div>
                            <!-- Merged Check List -->
                            <div class="check-list mt-3 pt-3 border-top">
                                <ul>
                                    <li><i class="fa-solid fa-check"></i> Free shipping orders from $150</li>
                                    <li><i class="fa-solid fa-check"></i> 30 days exchange & return</li>
                                </ul>
                                <ul>
                                    <li><i class="fa-solid fa-check"></i> Mamaya Flash Discount: Starting at 30% Off</li>
                                    <li><i class="fa-solid fa-check"></i> Safe & Secure online shopping</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabs: Description, Additional Info, Reviews -->
            <div class="single-tab section-padding pb-0">
                <ul class="nav mb-5" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a href="#description" data-bs-toggle="tab" class="nav-link ps-0 active">Description</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#additional" data-bs-toggle="tab" class="nav-link">Additional Information</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#review" data-bs-toggle="tab" class="nav-link">Reviews (3)</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div id="description" class="tab-pane fade show active">
                        <div class="description-items">
                            <p><?php echo e($book->long_description ?? $book->description ?? 'No detailed description available.'); ?></p>
                        </div>
                    </div>

                    <div id="additional" class="tab-pane fade">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr><td>Availability</td><td><?php echo e($book->stock_quantity > 0 ? 'Available' : 'Out of Stock'); ?></td></tr>
                                    <tr><td>Categories</td><td><?php echo e($book->category ? $book->category->getFullPath() : 'N/A'); ?></td></tr>
                                    <tr><td>Publish Date</td><td><?php echo e($book->publish_date ?? 'N/A'); ?></td></tr>
                                    <tr><td>Total Page</td><td><?php echo e($book->pages ?? 'N/A'); ?></td></tr>
                                    <tr><td>Format</td><td><?php echo e($book->format ?? 'Hardcover'); ?></td></tr>
                                    <tr><td>Country</td><td><?php echo e($book->country ?? 'United States'); ?></td></tr>
                                    <tr><td>Language</td><td><?php echo e($book->language ?? 'English'); ?></td></tr>
                                    <tr><td>Dimensions</td><td><?php echo e($book->dimensions ?? 'N/A'); ?></td></tr>
                                    <tr><td>Weight</td><td><?php echo e($book->weight ?? 'N/A'); ?></td></tr>
                                    <?php if($book->activeDiscount): ?>
                                        <tr><td>Discount</td><td>
                                            <?php if($book->activeDiscount->discount_type === 'percentage'): ?>
                                                <?php echo e($book->activeDiscount->discount_amount); ?>% off
                                            <?php else: ?>
                                                $<?php echo e(number_format($book->activeDiscount->discount_amount, 2)); ?> off
                                            <?php endif; ?>
                                            <?php if($book->activeDiscount->valid_until): ?>
                                                (Valid until <?php echo e($book->activeDiscount->valid_until->format('M d, Y')); ?>)
                                            <?php endif; ?>
                                        </td></tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div id="review" class="tab-pane fade">
                        <div class="review-items">
                            <div class="row g-5">
                                <div class="col-lg-7">
                                    <div class="reviews-list-wrapper">
                                        <h4 class="mb-4">Customer Reviews (<?php echo e($approvedReviews->count()); ?>)</h4>
                                        <?php $__empty_1 = true; $__currentLoopData = $approvedReviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <div class="review-single-item mb-4 pb-4 border-bottom">
                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                    <div class="reviewer-meta">
                                                        <h6 class="mb-0"><?php echo e($review->customer_name); ?></h6>
                                                        <small class="text-muted"><?php echo e($review->created_at->format('M d, Y')); ?></small>
                                                    </div>
                                                    <div class="review-stars text-warning">
                                                        <?php for($i = 1; $i <= 5; $i++): ?>
                                                            <?php if($i <= $review->rating): ?>
                                                                <i class="fa-solid fa-star"></i>
                                                            <?php else: ?>
                                                                <i class="fa-regular fa-star"></i>
                                                            <?php endif; ?>
                                                        <?php endfor; ?>
                                                    </div>
                                                </div>
                                                <p class="review-comment mb-0" style="font-size: 0.95rem; line-height: 1.6;">
                                                    "<?php echo e($review->comment); ?>"
                                                </p>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <div class="alert alert-light border py-4 text-center">
                                                <i class="fas fa-comment-slash d-block mb-3 fs-3 text-muted"></i>
                                                <p class="mb-0">No reviews yet for this book.</p>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="review-form-card p-4 rounded shadow-sm border bg-white">
                                        <h4 class="mb-3">Submit a Review</h4>
                                        
                                        <?php if(auth()->guard()->guest()): ?>
                                            <div class="text-center py-4">
                                                <p class="mb-3">Please login to write a review.</p>
                                                <a href="<?php echo e(route('login')); ?>" class="theme-btn btn-sm">Login Now</a>
                                            </div>
                                        <?php else: ?>
                                            <?php if($hasPurchased): ?>
                                                <form action="<?php echo e(route('user.reviews.store', $book)); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <div class="mb-3">
                                                        <label class="form-label">Your Rating</label>
                                                        <div class="star-rating">
                                                            <div class="rating-group d-flex gap-2">
                                                                <?php for($i = 5; $i >= 1; $i--): ?>
                                                                    <input type="radio" name="rating" id="star<?php echo e($i); ?>" value="<?php echo e($i); ?>" class="btn-check" required>
                                                                    <label for="star<?php echo e($i); ?>" class="btn btn-outline-warning btn-sm">
                                                                        <?php echo e($i); ?> <i class="fa-solid fa-star"></i>
                                                                    </label>
                                                                <?php endfor; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="comment" class="form-label">Review Details</label>
                                                        <textarea name="comment" id="comment" class="form-control" rows="4" placeholder="Share your experience with this book..." required></textarea>
                                                    </div>
                                                    <button type="submit" class="theme-btn w-100">Submit Review</button>
                                                </form>
                                            <?php else: ?>
                                                <div class="alert alert-info py-4 text-center mb-0">
                                                    <i class="fas fa-shopping-bag d-block mb-3 fs-3"></i>
                                                    <h6>Verified Purchase Required</h6>
                                                    <p class="small mb-0">Only customers who have purchased and received this book can leave a review.</p>
                                                </div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Products -->
<section class="top-ratting-book-section fix">
    <div class="container">
        <div class="section-title text-center">
            <h2 class="mb-3">Related Products</h2>
            <p>Discover more books you might like</p>
        </div>
        <div class="swiper book-slider">
            <div class="swiper-wrapper">
                <?php $__currentLoopData = $relatedBooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relatedBook): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="swiper-slide">
                        <div class="shop-box-items style-2">
                            <div class="book-thumb center">
                                <a href="<?php echo e(route('user.shop-details', $relatedBook)); ?>">
                                    <img src="<?php echo e($relatedBook->cover_image ? asset('uploads/books/' . $relatedBook->cover_image) : asset('user/assets/img/book/placeholder.png')); ?>" alt="<?php echo e($relatedBook->title); ?>">
                                </a>
                                <ul class="shop-icon d-grid justify-content-center align-items-center">
                                    <li><a href="<?php echo e(route('user.shop-details', $relatedBook)); ?>"><i class="far fa-eye"></i></a></li>
                                </ul>
                            </div>
                            <div class="shop-content">
                                <h5><?php echo e($relatedBook->category ? $relatedBook->category->getFullPath() : 'Uncategorized'); ?></h5>
                                <h3><a href="<?php echo e(route('user.shop-details', $relatedBook)); ?>"><?php echo e(Str::limit($relatedBook->title, 40)); ?></a></h3>
                                <ul class="price-list">
                                    <?php if($relatedBook->activeDiscount): ?>
                                        <li class="old-price"><del>$<?php echo e(number_format($relatedBook->price, 2)); ?></del></li>
                                        <li class="new-price">$<?php echo e(number_format($relatedBook->final_price, 2)); ?></li>
                                    <?php else: ?>
                                        <li>$<?php echo e(number_format($relatedBook->price, 2)); ?></li>
                                    <?php endif; ?>
                                </ul>
                                <ul class="author-post">
                                    <li class="authot-list">
                                        <span class="content"><?php echo e(optional($relatedBook->author)->name ?? 'Author'); ?></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="shop-button">
                                <!-- FIXED: Changed misleading button text -->
                                <a href="<?php echo e(route('user.shop-details', $relatedBook)); ?>" class="theme-btn">View Details</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>

<!-- Quantity Control Script (Only for authenticated users) -->
<?php if(auth()->guard()->check()): ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const qtyInput = document.getElementById('book-quantity');
    const cartQtyInput = document.getElementById('cart-quantity');
    const minusBtn = document.querySelector('.qtyminus');
    const plusBtn = document.querySelector('.qtyplus');
    
    if (qtyInput && minusBtn && plusBtn) {
        minusBtn.addEventListener('click', function(e) {
            e.preventDefault();
            let val = parseInt(qtyInput.value);
            if (val > 1) {
                qtyInput.value = val - 1;
                cartQtyInput.value = qtyInput.value;
            }
        });
        
        plusBtn.addEventListener('click', function(e) {
            e.preventDefault();
            let val = parseInt(qtyInput.value);
            if (val < parseInt(qtyInput.max)) {
                qtyInput.value = val + 1;
                cartQtyInput.value = qtyInput.value;
            }
        });
        
        qtyInput.addEventListener('change', function() {
            let val = parseInt(this.value);
            if (isNaN(val) || val < 1) this.value = 1;
            if (val > parseInt(this.max)) this.value = this.max;
            cartQtyInput.value = this.value;
        });
    }
});
</script>
<?php endif; ?>
</body>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\The Final Project Folder\Edited-FinalProject\resources\views/user/shop-details.blade.php ENDPATH**/ ?>