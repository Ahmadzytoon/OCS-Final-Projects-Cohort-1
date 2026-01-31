<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/user/css/home.css')); ?>">
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

<!-- Hero Section start -->
<div class="hero-section hero-1 fix bg-cover" style="background-image: url(<?php echo e(asset('assets/user/images/hero/hero-bg-1.jpg')); ?>);">
    <div class="book-shape float-bob-y">
        <img src="<?php echo e(asset('assets/user/images/hero/book-shape.png')); ?>" alt="img">
    </div>
    <div class="book-shape-2 float-bob-y">
        <img src="<?php echo e(asset('assets/user/images/hero/book-2.png')); ?>" alt="img">
    </div>
    <div class="container">
        <div class="row">
            <div class="hero-main-wrapper">
                <div class="hero-content">
                    <h4 class="wow fadeInUp" data-wow-delay=".2s">Editor's Choice Best Books <span>Up to 50% Off</span></h4>
                    <h1 class="wow fadeInUp" data-wow-delay=".4s">Your Next Favorite Book <br> Is Just a <span class="line-shape">Click Away <img src="<?php echo e(asset('assets/user/images/hero/line-shape.png')); ?>" alt="shape"></span></h1>
                    <p class="wow fadeInUp" data-wow-delay=".6s">Discover hand-picked titles from top authors across all genres.
                        <br> Enjoy exclusive deals, limited-time discounts, and stories you'll love.</p>
                </div>
                <div class="hero-btn">
                    <a href="<?php echo e(route('user.shop')); ?>" class="theme-btn wow fadeInUp" data-wow-delay=".8s">Shop Now <i class="fa-solid fa-arrow-right-long"></i></a>
                    <a href="<?php echo e(route('user.shop')); ?>" class="theme-btn style-2 wow fadeInUp" data-wow-delay="1s">View All Books <i class="fa-solid fa-arrow-right-long"></i></a>
                </div>
                <div class="girl-img">
                    <img src="<?php echo e(asset('assets/user/images/hero-girl-1.png')); ?>" alt="img">
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Feature Section start -->
<section class="feature-section fix section-padding">
    <div class="container">
        <div class="feature-wrapper">
            <div class="feature-box-items wow fadeInUp" data-wow-delay=".2s">
                <div class="icon"><i class="icon-icon-1"></i></div>
                <div class="content"><h3>Return & refund</h3><p>Money back guarantee</p></div>
            </div>
            <div class="feature-box-items wow fadeInUp" data-wow-delay=".4s">
                <div class="icon"><i class="icon-icon-2"></i></div>
                <div class="content"><h3>Secure Payment</h3><p>30% off by subscribing</p></div>
            </div>
            <div class="feature-box-items wow fadeInUp" data-wow-delay=".6s">
                <div class="icon"><i class="icon-icon-3"></i></div>
                <div class="content"><h3>Quality Support</h3><p>Always online 24/7</p></div>
            </div>
            <div class="feature-box-items wow fadeInUp" data-wow-delay=".8s">
                <div class="icon"><i class="icon-icon-4"></i></div>
                <div class="content"><h3>Daily Offers</h3><p>20% off by subscribing</p></div>
            </div>
            <div class="feature-box-items wow fadeInUp" data-wow-delay="1s">
                <div class="icon"><i class="fa-solid fa-truck-fast"></i></div>
                <div class="content"><h3>Free Shipping</h3><p>On all orders</p></div>
            </div>
            <div class="feature-box-items wow fadeInUp" data-wow-delay="1.2s">
                <div class="icon"><i class="fa-solid fa-rotate-left"></i></div>
                <div class="content"><h3>Easy Returns</h3><p>30-day return policy</p></div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Books Section -->
<section class="shop-section section-padding fix pt-0">
    <div class="container">
        <div class="section-title-area">
            <div class="section-title">
                <h2 class="wow fadeInUp" data-wow-delay=".3s">Featured Books</h2>
            </div>
            <a href="<?php echo e(route('user.shop')); ?>" class="theme-btn style-2 fadeInUp" data-wow-delay=".5s">Explore More <i class="fa-solid fa-arrow-right-long"></i></a>
        </div>
        <div class="swiper book-slider">
            <div class="swiper-wrapper">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $featuredBooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <div class="swiper-slide">
                    <div class="shop-box-items style-2">
                        <div class="book-thumb center">
                            <a href="<?php echo e(route('user.shop-details', $book)); ?>">
                                <img src="<?php echo e($book->cover_image ? asset('uploads/books/' . $book->cover_image) : asset('assets/user/images/book/placeholder.png')); ?>" alt="<?php echo e($book->title); ?>">
                            </a>
                            <ul class="shop-icon d-grid justify-content-center align-items-center">
                                <li>
                                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('user.add-to-wishlist', ['book' => $book]);

$key = 'featured-wishlist-'.$book->id;
$__componentSlots = [];

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-2103831425-0', $key);

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
                                <span class="authot-list"><span class="content"><?php echo e(optional($book->author)->name ?? 'Author'); ?></span></span>
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

$key = 'featured-cart-'.$book->id;
$__componentSlots = [];

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-2103831425-1', $key);

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
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Top Categories Section -->
<section class="book-catagories-section fix section-padding bg-cover"
    style="background-image: url(<?php echo e(asset('assets/user/images/ReadBook.png')); ?>);">
    <div class="container">
        <div class="book-catagories-wrapper">
            <div class="section-title text-center">
                <span class="icon"><img src="<?php echo e(asset('assets/user/images/icon/icon-24.svg')); ?>" alt="icon"></span>
                <h2 class="wow fadeInUp" data-wow-delay=".3s">Top Categories Book</h2>
            </div>
            <div class="swiper book-catagories-slider">
                <div class="swiper-wrapper">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $topCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <div class="swiper-slide">
                        <div class="book-catagories-items">
                            <div class="category-icon">
                                <i class="fas fa-book-open"></i>
                            </div>
                            <div class="book-content">
                                <h6><a href="<?php echo e(route('user.shop', ['category' => $category->id])); ?>"><?php echo e($category->name); ?></a></h6>
                                <div class="book-box">
                                    <?php echo e($category->total_books_count); ?> Volumes
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Readit Top Books -->
<section class="shop-section section-padding fix">
    <div class="container">
        <div class="section-title-area">
            <div class="section-title mb- wow fadeInUp" data-wow-delay=".3s">
                <h2>Readit Top Books</h2>
            </div>
            <a href="<?php echo e(route('user.shop')); ?>" class="theme-btn style-2 wow fadeInUp" data-wow-delay=".5s">Explore More <i class="fa-solid fa-arrow-right-long"></i></a>
        </div>
        <div class="book-shop-wrapper">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $readitTopBooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
            <div class="shop-box-items style-2">
                <div class="book-thumb center">
                    <a href="<?php echo e(route('user.shop-details', $book)); ?>">
                        <img src="<?php echo e($book->cover_image ? asset('uploads/books/' . $book->cover_image) : asset('assets/user/images/book/placeholder.png')); ?>" alt="<?php echo e($book->title); ?>">
                    </a>
                    <ul class="shop-icon d-grid justify-content-center align-items-center">
                        <li>
                            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('user.add-to-wishlist', ['book' => $book]);

$key = 'readit-wishlist-'.$book->id;
$__componentSlots = [];

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-2103831425-2', $key);

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
                        <span class="authot-list"><span class="content"><?php echo e(optional($book->author)->name ?? 'Author'); ?></span></span>
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

$key = 'readit-cart-'.$book->id;
$__componentSlots = [];

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-2103831425-3', $key);

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
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>

        </div>
    </div>
</section>

<!-- CTA Banner -->
<section class="cta-banner-section fix section-padding pt-0">
    <div class="container">
        <div class="cta-banner-wrapper section-padding bg-cover" style="background-color: #ff7b6b; border-radius: 20px;">
            <div class="book-shape"><img src="<?php echo e(asset('assets/user/images/cta-book-2.png')); ?>" alt="shape-img"></div>
            <div class="book-shape-2"><img src="<?php echo e(asset('assets/user/images/cta-book.png')); ?>" alt="shape-img"></div>
            <div class="cta-content text-center">
                <span class="wow fadeInUp" data-wow-delay=".2s">Get 25% <img src="<?php echo e(asset('assets/user/images/line-shape.png')); ?>" alt=""></span>
                <h2 class="mb-40 wow fadeInUp" data-wow-delay=".4s">discount in all <br> kind of super Selling</h2>
                <a href="<?php echo e(route('user.shop')); ?>" class="theme-btn wow fadeInUp" data-wow-delay=".6s">Shop Now<i class="fa-solid fa-arrow-right-long"></i></a>
            </div>
        </div>
    </div>
</section>

<!-- Top Rating Books -->
<section class="top-ratting-book-section fix section-padding bg-cover"
    style="background-image: url(<?php echo e(asset('assets/user/images/ratting-bg.jpg')); ?>);">
    <div class="container">
        <div class="top-ratting-book-wrapper">
            <div class="section-title-area">
                <div class="section-title">
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">Top Rating Books</h2>
                </div>
                <a href="<?php echo e(route('user.shop')); ?>" class="theme-btn wow fadeInUp" data-wow-delay=".5s">view more books <i class="fa-solid fa-arrow-right-long"></i></a>
            </div>
            <div class="row g-4">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $topRatingBooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="shop-box-items horizontal-card">
                        <div class="book-thumb">
                            <a href="<?php echo e(route('user.shop-details', $book)); ?>">
                                <img src="<?php echo e($book->cover_image ? asset('uploads/books/' . $book->cover_image) : asset('assets/user/images/top-book/01.png')); ?>" alt="<?php echo e($book->title); ?>">
                            </a>
                            <ul class="shop-icon d-grid justify-content-center align-items-center">
                                <li>
                                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('user.add-to-wishlist', ['book' => $book]);

$key = 'top-rating-wishlist-'.$book->id;
$__componentSlots = [];

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-2103831425-4', $key);

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
                                <span class="authot-list"><span class="content"><?php echo e(optional($book->author)->name ?? 'Author'); ?></span></span>
                            </div>
                            <h3><a href="<?php echo e(route('user.shop-details', $book)); ?>"><?php echo e(Str::limit($book->title, 60)); ?></a></h3>
                            
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
                            <div class="shop-button mt-3">
                                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('user.add-to-cart', ['book' => $book]);

$key = 'top-rating-cart-'.$book->id;
$__componentSlots = [];

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-2103831425-5', $key);

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
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </div>
    </div>
</section>


<!-- Top Selling Books -->
<section class="shop-section section-padding fix">
    <div class="container">
        <div class="section-title-area">
            <div class="section-title wow fadeInUp" data-wow-delay=".3s">
                <h2>Top Selling Books</h2>
            </div>
            <a href="<?php echo e(route('user.shop')); ?>" class="theme-btn style-2 wow fadeInUp" data-wow-delay=".5s">Explore More <i class="fa-solid fa-arrow-right-long"></i></a>
        </div>
        <div class="swiper book-slider">
            <div class="swiper-wrapper">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $topSellingBooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <div class="swiper-slide">
                    <div class="shop-box-items style-2">
                        <div class="book-thumb center">
                            <a href="<?php echo e(route('user.shop-details', $book)); ?>">
                                <img src="<?php echo e($book->cover_image ? asset('uploads/books/' . $book->cover_image) : asset('assets/user/images/book/placeholder.png')); ?>" alt="<?php echo e($book->title); ?>">
                            </a>
                          
                            <ul class="shop-icon d-grid justify-content-center align-items-center">
                                <li>
                                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('user.add-to-wishlist', ['book' => $book]);

$key = 'top-selling-wishlist-'.$book->id;
$__componentSlots = [];

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-2103831425-6', $key);

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
                                <span class="authot-list"><span class="content"><?php echo e(optional($book->author)->name ?? 'Author'); ?></span></span>
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

$key = 'top-selling-cart-'.$book->id;
$__componentSlots = [];

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-2103831425-7', $key);

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
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Featured Authors -->
<section class="team-section fix section-padding pt-0 margin-bottom-30">
    <div class="container">
        <div class="section-title text-center">
            <h2 class="mb-3 wow fadeInUp" data-wow-delay=".3s">Featured Author</h2>
            <p class="wow fadeInUp" data-wow-delay=".5s">Meet our curated selection of visionary writers and influential thought leaders.<br> Explore their deep catalogs of inspiring works and academic masterpieces.</p>
        </div>
        
        <div class="row g-4 justify-content-center mt-4">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $featuredAuthors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                    <a href="<?php echo e(route('user.team-details', $author)); ?>" class="featured-author-item text-center">
                        <div class="author-img-circle">
                            <img src="<?php echo e(filter_var($author->image, FILTER_VALIDATE_URL) ? $author->image : ($author->image ? asset('storage/' . $author->image) : 'https://ui-avatars.com/api/?name=' . urlencode($author->name) . '&background=ff7b6b&color=fff&size=512')); ?>" alt="<?php echo e($author->name); ?>">
                        </div>
                        <h6 class="author-name-only"><?php echo e($author->name); ?></h6>
                    </a>
                </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>

    </div>
</section>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Last Backup Edited Final Project 30-1-2026\Edited-FinalProject\resources\views/user/index.blade.php ENDPATH**/ ?>