<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('user/assets/css/discount-style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('user/assets/css/pagination-style.css')); ?>">
    <style>
        .shop-box-items .book-thumb img {
            height: 280px;
            object-fit: contain;
        }
        .shop-box-items {
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        .shop-content {
            flex-grow: 1;
        }
        .categories-list .nav-link.active {
            background-color: var(--theme);
            color: #fff;
        }
        .search-container {
            position: relative;
        }
        .search-icon {
            position: absolute;
            right: 0;
            top: 0;
            height: 100%;
            background: none;
            border: none;
            padding: 0 15px;
            color: #666;
        }

        /* Book Card Consistency Styles */
        .shop-box-items {
            display: flex !important;
            flex-direction: column !important;
            height: 100% !important;
        }
        .shop-content {
            flex-grow: 1 !important;
            display: flex !important;
            flex-direction: column !important;
        }
        .shop-content h3 {
            min-height: 44px !important; /* Reduced from 52px */
            margin-bottom: 5px !important; /* Reduced from 10px */
            display: -webkit-box !important;
            -webkit-line-clamp: 2 !important;
            -webkit-box-orient: vertical !important;
            overflow: hidden !important;
            line-height: 1.2 !important;
        }
        .price-list {
            margin-top: 5px !important; /* Changed from auto to fixed small gap */
            margin-bottom: 5px !important;
            min-height: 24px !important;
        }
        .author-post {
            margin-top: 0 !important;
            min-height: 24px !important;
        }

        /* Category Sidebar Styles */
        .category-accordion .nav-link {
            color: #333;
            padding: 10px 15px;
            border-radius: 5px;
            transition: all 0.3s ease;
            font-weight: 500;
        }
        .category-accordion .nav-link:hover {
            color: var(--theme);
            background: #f8f9fa;
        }
        .category-accordion .nav-link.active {
            color: #fff;
            background: var(--theme);
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        
        .category-item {
            border-bottom: 1px solid #f0f0f0;
            margin-bottom: 5px;
        }
        .category-item:last-child {
            border-bottom: none;
        }

        .category-header {
            position: relative;
        }
        .category-header .main-category-link {
            flex-grow: 1;
            margin-right: 5px;
        }
        
        .btn-toggle {
            background: none;
            border: none;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
            cursor: pointer;
            transition: transform 0.3s ease;
            border-radius: 50%;
        }
        .btn-toggle:hover {
            background: #f0f0f0;
            color: var(--theme);
        }
        .btn-toggle[aria-expanded="true"] {
            transform: rotate(180deg);
            color: var(--theme);
        }

        .sub-categories {
            padding-left: 10px;
            padding-bottom: 10px;
        }
        .sub-category-link {
            font-size: 14px;
            padding: 8px 15px !important;
            color: #666 !important;
            border: none !important;
        }
        .sub-category-link:hover {
            color: var(--theme) !important;
            padding-left: 20px !important;
        }
        .sub-category-link.active {
            color: var(--theme) !important;
            font-weight: 700;
            background: #fff5f5 !important; /* Light theme tint */
            padding-left: 20px !important;
        }
        .sub-category-link i {
            font-size: 10px;
            opacity: 0.5;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

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
            <h1>Shop Default</h1>
            <div class="page-header">
                <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".3s">
                    <li><a href="<?php echo e(route('user.home')); ?>">Home</a></li>
                    <li><i class="fa-solid fa-chevron-right"></i></li>
                    <li>Shop Default</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Shop Section Start -->
<section class="shop-section fix section-padding pb-0">
    <div class="container">
        <div class="shop-default-wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="woocommerce-notices-wrapper wow fadeInUp" data-wow-delay=".3s">
                        <div class="form-clt">
                            <form action="<?php echo e(route('user.shop')); ?>" method="GET" class="d-inline">
                                <?php $__currentLoopData = request()->except(['sort', 'page']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <input type="hidden" name="<?php echo e($key); ?>" value="<?php echo e($val); ?>">
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <select name="sort" class="nice-select" onchange="this.form.submit()">
                                    <option value="default" <?php echo e(($sort ?? 'default') == 'default' ? 'selected' : ''); ?>>Default sorting</option>
                                    <option value="latest" <?php echo e(($sort ?? 'default') == 'latest' ? 'selected' : ''); ?>>Sort by latest</option>
                                    <option value="price_low_high" <?php echo e(($sort ?? 'default') == 'price_low_high' ? 'selected' : ''); ?>>Sort by price: low to high</option>
                                    <option value="price_high_low" <?php echo e(($sort ?? 'default') == 'price_high_low' ? 'selected' : ''); ?>>Sort by price: high to low</option>
                                </select>
                            </form>
                            <div class="icon">
                                <a href="<?php echo e(route('user.shop-list')); ?>"><i class="fas fa-list"></i></a>
                            </div>
                            <div class="icon-2 active">
                                <a href="<?php echo e(route('user.shop')); ?>"><i class="fa-sharp fa-regular fa-grid-2"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Sidebar -->
                <div class="col-xl-3 col-lg-4 order-2 order-md-1 wow fadeInUp" data-wow-delay=".3s">
                    <div class="main-sidebar">
                        <!-- Search Widget -->
                        <div class="single-sidebar-widget">
                            <div class="wid-title"><h5>Search</h5></div>
                            <form action="<?php echo e(route('user.shop')); ?>" method="GET" class="search-toggle-box">
                                <input type="hidden" name="category" value="<?php echo e(request('category')); ?>">
                                <input type="hidden" name="sort" value="<?php echo e(request('sort')); ?>">
                                <div class="input-area search-container">
                                    <input class="search-input" type="text" name="q" placeholder="Keywords here...." value="<?php echo e(request('q')); ?>">
                                    <button class="cmn-btn search-icon" type="submit"><i class="far fa-search"></i></button>
                                </div>
                            </form>
                        </div>

                        <!-- Categories Widget -->
                        <div class="single-sidebar-widget">
                            <div class="wid-title"><h5>Categories</h5></div>
                            <div class="categories-list">
                                <ul class="nav flex-column category-accordion">
                                    <li class="nav-item mb-2">
                                        <a class="nav-link main-category-link <?php echo e(!request('category') ? 'active' : ''); ?>" href="<?php echo e(request()->fullUrlWithoutQuery(['category', 'page'])); ?>">
                                            <i class="fas fa-th-large me-2"></i> All Categories
                                        </a>
                                    </li>

                                    <?php
                                        // Configuration
                                        $displayLimit = 5;
                                        $visibleCategories = $categories->take($displayLimit);
                                        $hiddenCategories = $categories->skip($displayLimit);
                                        
                                        // Check if any hidden category is active to auto-expand
                                        $shouldExpandMore = false;
                                        foreach($hiddenCategories as $cat) {
                                            if (request('category') == $cat->id || $cat->children->contains('id', request('category'))) {
                                                $shouldExpandMore = true;
                                                break;
                                            }
                                        }
                                    ?>

                                    
                                    <?php $__currentLoopData = $visibleCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo $__env->make('user.partials.category-item', ['category' => $category], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    
                                    <?php if($hiddenCategories->count() > 0): ?>
                                        <div class="collapse <?php echo e($shouldExpandMore ? 'show' : ''); ?>" id="moreCategories">
                                            <?php $__currentLoopData = $hiddenCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo $__env->make('user.partials.category-item', ['category' => $category], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>

                                        
                                        <li class="nav-item mt-2 text-center">
                                            <button class="btn btn-sm btn-light w-100 fw-bold" 
                                                    style="color: var(--theme);"
                                                    type="button" 
                                                    data-bs-toggle="collapse" 
                                                    data-bs-target="#moreCategories" 
                                                    aria-expanded="<?php echo e($shouldExpandMore ? 'true' : 'false'); ?>"
                                                    id="btnShowMoreCats">
                                                <?php echo e($shouldExpandMore ? 'Show Less' : 'Show More'); ?> <i class="fas <?php echo e($shouldExpandMore ? 'fa-chevron-up' : 'fa-chevron-down'); ?> ms-1"></i>
                                            </button>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>

                        <!-- Price Filter Widget -->
                        <div class="single-sidebar-widget">
                            <div class="wid-title"><h5>Filter by Price</h5></div>
                            <form action="<?php echo e(route('user.shop')); ?>" method="GET" class="price-filter-form">
                                <?php $__currentLoopData = request()->except(['min_price', 'max_price', 'page']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <input type="hidden" name="<?php echo e($key); ?>" value="<?php echo e($val); ?>">
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <div class="d-flex gap-2 mb-3">
                                    <input type="number" name="min_price" class="form-control form-control-sm" placeholder="Min" value="<?php echo e(request('min_price')); ?>">
                                    <input type="number" name="max_price" class="form-control form-control-sm" placeholder="Max" value="<?php echo e(request('max_price')); ?>">
                                </div>
                                <button type="submit" class="theme-btn btn-sm w-100">Filter</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Product Grid -->
                <div class="col-xl-9 col-lg-8 order-1 order-md-2">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-arts" role="tabpanel" tabindex="0">
                            <div class="row g-4">
                                <?php $__empty_1 = true; $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                                        <div class="shop-box-items">
                                            <div class="book-thumb center">
                                                <a href="<?php echo e(route('user.shop-details', $book)); ?>">
                                                    <?php
                                                        $coverImage = $book->cover_image;
                                                        $imagePath = asset('user/assets/img/book/placeholder.png');
                                                        if ($coverImage) {
                                                            if (file_exists(public_path('uploads/books/' . $coverImage))) $imagePath = asset('uploads/books/' . $coverImage);
                                                            elseif (file_exists(public_path('storage/' . $coverImage))) $imagePath = asset('storage/' . $coverImage);
                                                        }
                                                    ?>
                                                    <img src="<?php echo e($imagePath); ?>" alt="<?php echo e($book->title); ?>" onerror="this.onerror=null; this.src='<?php echo e(asset('user/assets/img/book/placeholder.png')); ?>'">
                                                </a>
                                                <ul class="shop-icon d-grid justify-content-center align-items-center">
                                                    <li>
                                                        <?php if(auth()->guard()->check()): ?>
                                                            <a href="#" class="wishlist-toggle <?php echo e($book->wishlistedByUser ? 'text-danger' : ''); ?>" data-id="<?php echo e($book->id); ?>" data-action="<?php echo e($book->wishlistedByUser ? 'remove' : 'add'); ?>">
                                                                <i class="<?php echo e($book->wishlistedByUser ? 'fas' : 'far'); ?> fa-heart"></i>
                                                            </a>
                                                        <?php else: ?>
                                                            <a href="<?php echo e(route('login')); ?>"><i class="far fa-heart"></i></a>
                                                        <?php endif; ?>
                                                    </li>
                                                    <li><a href="<?php echo e(route('user.shop-details', $book)); ?>"><i class="far fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="shop-content">
                                                <h5><?php echo e($book->category ? $book->category->getFullPath() : 'Uncategorized'); ?></h5>
                                                <h3><a href="<?php echo e(route('user.shop-details', $book)); ?>"><?php echo e(Str::limit($book->title, 40)); ?></a></h3>
                                                <ul class="price-list">
                                                    <?php if($book->activeDiscount): ?>
                                                        <li class="new-price">$<?php echo e(number_format($book->final_price, 2)); ?></li>
                                                        <li class="old-price"><del>$<?php echo e(number_format($book->price, 2)); ?></del></li>
                                                    <?php else: ?>
                                                        <li>$<?php echo e(number_format($book->price, 2)); ?></li>
                                                    <?php endif; ?>
                                                </ul>
                                                <ul class="author-post">
                                                    <li class="authot-list">
                                                        <span class="content"><?php echo e(optional($book->author)->name ?? 'Author'); ?></span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="shop-button">
                                                <?php if(auth()->guard()->check()): ?>
                                                    <?php if($book->stock_quantity > 0): ?>
                                                        <form action="<?php echo e(route('user.cart.add', $book)); ?>" method="POST">
                                                            <?php echo csrf_field(); ?>
                                                            <button type="submit" class="theme-btn w-100">Add To Cart</button>
                                                        </form>
                                                    <?php else: ?>
                                                        <button class="theme-btn w-100 bg-secondary disabled-btn" disabled>Out of Stock</button>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <?php if($book->stock_quantity > 0): ?>
                                                        <a href="<?php echo e(route('login')); ?>?redirect=<?php echo e(urlencode(url()->current())); ?>" class="theme-btn w-100">Add To Cart</a>
                                                    <?php else: ?>
                                                        <button class="theme-btn w-100 bg-secondary disabled-btn" disabled>Out of Stock</button>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <div class="col-12 text-center py-5">
                                        <h4>No books found matching your filters.</h4>
                                        <a href="<?php echo e(route('user.shop')); ?>" class="theme-btn mt-3">Clear Filters</a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <!-- PAGINATION -->
                    <?php if($books->hasPages()): ?>
                        <div class="pagination-area d-flex justify-content-center" style="margin-top: 80px !important; margin-bottom: 60px !important;">
                            <?php echo e($books->links('pagination::bootstrap-5')); ?>

                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Wishlist JS -->
<script src="<?php echo e(asset('user/assets/js/wishlist.js')); ?>"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Optional: Manual toggle handling if Bootstrap collapse events miss sync in some cases
        const toggles = document.querySelectorAll('.btn-toggle');
        toggles.forEach(toggle => {
            toggle.addEventListener('click', function() {
                const isExpanded = this.getAttribute('aria-expanded') === 'true';
                // Toggle state is handled by Bootstrap, this is just for custom logic if needed
            });
        });
        // Show More / Show Less Toggle Text
        const moreCategories = document.getElementById('moreCategories');
        const btnShowMore = document.getElementById('btnShowMoreCats');

        if (moreCategories && btnShowMore) {
            moreCategories.addEventListener('shown.bs.collapse', () => {
                btnShowMore.innerHTML = 'Show Less <i class="fas fa-chevron-up ms-1"></i>';
            });
            moreCategories.addEventListener('hidden.bs.collapse', () => {
                btnShowMore.innerHTML = 'Show More <i class="fas fa-chevron-down ms-1"></i>';
            });
        }
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\The Final Project Folder\Edited-FinalProject\resources\views/user/shop.blade.php ENDPATH**/ ?>