<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/user/css/discount-style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/user/css/pagination-style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/user/css/shop.css')); ?>">
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
    style="background-image: url(<?php echo e(asset('assets/user/images/hero/breadcrumb-bg.jpg')); ?>);">
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
<section class="shop-section fix section-padding">
    <div class="container">
        <div class="shop-default-wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="woocommerce-notices-wrapper wow fadeInUp" data-wow-delay=".3s">
                        <div class="form-clt">
                            <form action="<?php echo e(route('user.shop')); ?>" method="GET" class="d-inline">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = request()->except(['sort', 'page']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                    <input type="hidden" name="<?php echo e($key); ?>" value="<?php echo e($val); ?>">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
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

                                    
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $visibleCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                        <?php echo $__env->make('user.partials.category-item', ['category' => $category], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>

                                    
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hiddenCategories->count() > 0): ?>
                                        <div class="collapse <?php echo e($shouldExpandMore ? 'show' : ''); ?>" id="moreCategories">
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $hiddenCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                                <?php echo $__env->make('user.partials.category-item', ['category' => $category], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
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
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </ul>
                            </div>
                        </div>

                        <!-- Price Filter Widget -->
                        <div class="single-sidebar-widget">
                            <div class="wid-title"><h5>Filter by Price</h5></div>
                            <form action="<?php echo e(route('user.shop')); ?>" method="GET" class="price-filter-form">
                                <?php $__currentLoopData = request()->except(['min_price', 'max_price', 'page']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <input type="hidden" name="<?php echo e($key); ?>" value="<?php echo e($val); ?>">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
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
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                                        <div class="shop-box-items">
                                            <div class="book-thumb center">
                                                <a href="<?php echo e(route('user.shop-details', $book)); ?>">
                                                    <?php
                                                        $coverImage = $book->cover_image;
                                                        $imagePath = asset('assets/user/images/book/placeholder.png');
                                                        if ($coverImage) {
                                                            if (file_exists(public_path('uploads/books/' . $coverImage))) $imagePath = asset('uploads/books/' . $coverImage);
                                                            elseif (file_exists(public_path('storage/' . $coverImage))) $imagePath = asset('storage/' . $coverImage);
                                                        }
                                                    ?>
                                                    <img src="<?php echo e($imagePath); ?>" alt="<?php echo e($book->title); ?>" onerror="this.onerror=null; this.src='<?php echo e(asset('assets/user/images/book/placeholder.png')); ?>'">
                                                </a>
                                                <ul class="shop-icon d-grid justify-content-center align-items-center">
                                                    <li>
                                                        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('user.add-to-wishlist', ['book' => $book]);

$key = 'shop-wishlist-'.$book->id;
$__componentSlots = [];

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-4182811664-0', $key);

$__html = app('livewire')->mount($__name, $__params, $key, $__componentSlots);

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__componentSlots);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                                                    </li>
                                                    <li><a href="<?php echo e(route('user.shop-details', $book)); ?>"><i class="far fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="shop-content">
                                                <div class="author-post">
                                                    <span class="authot-list">
                                                        <span class="content"><?php echo e(optional($book->author)->name ?? 'Author'); ?></span>
                                                    </span>
                                                </div>
                                                <h3><a href="<?php echo e(route('user.shop-details', $book)); ?>"><?php echo e(Str::limit($book->title, 40)); ?></a></h3>
                                                
                                                <div class="price-rating-row">
                                                    <ul class="compact-price-list">
                                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($book->activeDiscount): ?>
                                                            <li class="new-price">$<?php echo e(number_format($book->final_price, 2)); ?></li>
                                                            <li class="old-price"><del class="text-muted">$<?php echo e(number_format($book->price, 2)); ?></del></li>
                                                        <?php else: ?>
                                                            <li>$<?php echo e(number_format($book->price, 2)); ?></li>
                                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                    </ul>
                                                    <?php echo $book->single_star_rating_html; ?>

                                                </div>
                                            </div>
                                            <div class="shop-button">
                                                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('user.add-to-cart', ['book' => $book]);

$key = 'shop-cart-'.$book->id;
$__componentSlots = [];

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-4182811664-1', $key);

$__html = app('livewire')->mount($__name, $__params, $key, $__componentSlots);

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__componentSlots);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                                            </div>
                                        </div>
                                    </div>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                    <div class="col-12 text-center py-5">
                                        <h4>No books found matching your filters.</h4>
                                        <a href="<?php echo e(route('user.shop')); ?>" class="theme-btn mt-3">Clear Filters</a>
                                    </div>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <!-- PAGINATION -->
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($books->hasPages()): ?>
                        <div class="pagination-area d-flex justify-content-center" style="margin-top: 80px !important; margin-bottom: 60px !important;">
                            <?php echo e($books->links('pagination::bootstrap-5')); ?>

                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Wishlist JS -->

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
<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Last Backup Edited Final Project 30-1-2026\Edited-FinalProject\resources\views/user/shop.blade.php ENDPATH**/ ?>