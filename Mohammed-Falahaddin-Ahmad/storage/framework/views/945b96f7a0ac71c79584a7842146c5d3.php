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
<div class="hero-section hero-1 fix bg-cover" style="background-image: url(<?php echo e(asset('user/assets/img/hero/hero-bg-1.jpg')); ?>);">
    <div class="book-shape float-bob-y">
        <img src="<?php echo e(asset('user/assets/img/hero/book-shape.png')); ?>" alt="img">
    </div>
    <div class="book-shape-2 float-bob-y">
        <img src="<?php echo e(asset('user/assets/img/hero/book-2.png')); ?>" alt="img">
    </div>
    <div class="container">
        <div class="row">
            <div class="hero-main-wrapper">
                <div class="hero-content">
                    <h4 class="wow fadeInUp" data-wow-delay=".2s">Editor's Choice Best Books <span>Up to 50% Off</span></h4>
                    <h1 class="wow fadeInUp" data-wow-delay=".4s">Your Next Favorite Book <br> Is Just a <span class="line-shape">Click Away <img src="<?php echo e(asset('user/assets/img/hero/line-shape.png')); ?>" alt="shape"></span></h1>
                    <p class="wow fadeInUp" data-wow-delay=".6s">Discover hand-picked titles from top authors across all genres.
                        <br> Enjoy exclusive deals, limited-time discounts, and stories you'll love.</p>
                </div>
                <div class="hero-btn">
                    <a href="<?php echo e(route('user.shop')); ?>" class="theme-btn wow fadeInUp" data-wow-delay=".8s">Shop Now <i class="fa-solid fa-arrow-right-long"></i></a>
                    <a href="<?php echo e(route('user.shop')); ?>" class="theme-btn style-2 wow fadeInUp" data-wow-delay="1s">View All Books <i class="fa-solid fa-arrow-right-long"></i></a>
                </div>
                <div class="girl-img">
                    <img src="<?php echo e(asset('user/assets/img/hero-girl-1.png')); ?>" alt="img">
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .feature-wrapper {
        display: grid !important;
        grid-template-columns: repeat(3, 1fr) !important;
        gap: 20px !important;
        max-width: 1100px !important;
        margin: 0 auto !important;
    }
    
    .feature-box-items {
        height: 140px !important;
        width: 100% !important;
        display: flex !important;
        align-items: center !important;
        justify-content: flex-start !important;
        padding: 20px 25px !important;
        text-align: left !important;
    }
    
    .feature-box-items .icon {
        flex-shrink: 0 !important;
        width: 60px !important;
        height: 60px !important;
        margin-right: 20px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
    }
    
    .feature-box-items .content {
        flex: 1 !important;
        min-width: 0 !important;
    }
    
    .feature-box-items .content h3 {
        font-size: 17px !important;
        margin-bottom: 5px !important;
        font-weight: 600 !important;
        white-space: nowrap !important;
        overflow: hidden !important;
        text-overflow: ellipsis !important;
    }
    
    .feature-box-items .content p {
        font-size: 13px !important;
        margin: 0 !important;
        opacity: 0.8 !important;
        white-space: nowrap !important;
        overflow: hidden !important;
        text-overflow: ellipsis !important;
    }
    
    @media (max-width: 992px) {
        .feature-wrapper {
            grid-template-columns: repeat(2, 1fr) !important;
        }
    }
    
    @media (max-width: 576px) {
        .feature-wrapper {
            grid-template-columns: 1fr !important;
        }
    }
</style>

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
                <?php $__currentLoopData = $featuredBooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="swiper-slide">
                    <div class="shop-box-items style-2">
                        <div class="book-thumb center">
                            <a href="<?php echo e(route('user.shop-details', $book)); ?>">
                                <img src="<?php echo e($book->cover_image ? asset('uploads/books/' . $book->cover_image) : asset('user/assets/img/book/placeholder.png')); ?>" alt="<?php echo e($book->title); ?>">
                            </a>
                            <ul class="shop-icon d-grid justify-content-center align-items-center">
                                <li>
                                    <?php if(auth()->check() && isset($wishlist[$book->id])): ?>
                                        <a href="#" class="wishlist-toggle text-danger" data-id="<?php echo e($book->id); ?>" data-action="remove" title="Remove from wishlist">
                                            <i class="fas fa-heart"></i>
                                        </a>
                                    <?php else: ?>
                                        <a href="#" class="wishlist-toggle" data-id="<?php echo e($book->id); ?>" data-action="add" title="Add to wishlist">
                                            <i class="far fa-heart"></i>
                                        </a>
                                    <?php endif; ?>
                                </li>
                                <li><a href="<?php echo e(route('user.shop-details', $book)); ?>"><i class="far fa-eye"></i></a></li>
                            </ul>
                        </div>
                        <div class="shop-content">
                            <h5><?php echo e($book->category ? $book->category->getFullPath() : 'Uncategorized'); ?></h5>
                            <h3><a href="<?php echo e(route('user.shop-details', $book)); ?>"><?php echo e(Str::limit($book->title, 40)); ?></a></h3>
                            <ul class="price-list">
                                <li>$<?php echo e(number_format($book->price, 2)); ?></li>
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
                                    <a href="<?php echo e(route('user.shop-details', $book)); ?>" class="theme-btn">Add To Cart</a>
                                <?php else: ?>
                                    <button class="theme-btn bg-secondary disabled-btn" disabled>Out of Stock</button>
                                <?php endif; ?>
                            <?php else: ?>
                                <?php if($book->stock_quantity > 0): ?>
                                    <a href="<?php echo e(route('login')); ?>?redirect=<?php echo e(urlencode(url()->current())); ?>" class="theme-btn">Add To Cart</a>
                                <?php else: ?>
                                    <button class="theme-btn bg-secondary disabled-btn" disabled>Out of Stock</button>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>

<!-- Top Categories Section -->
<section class="book-catagories-section fix section-padding bg-cover"
    style="background-image: url(<?php echo e(asset('user/assets/img/ReadBook.png')); ?>);">
    <div class="container">
        <div class="book-catagories-wrapper">
            <div class="section-title text-center">
                <span class="icon"><img src="<?php echo e(asset('user/assets/img/icon/icon-24.svg')); ?>" alt="icon"></span>
                <h2 class="wow fadeInUp" data-wow-delay=".3s">Top Categories Book</h2>
            </div>
            <div class="swiper book-catagories-slider">
                <div class="swiper-wrapper">
                    <?php $__currentLoopData = $topCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="swiper-slide">
                        <div class="book-catagories-items">
                            <div class="book-thumb">
                                <p><?php echo e($category->name); ?></p>
                                <div class="book-box">
                                    <?php echo e($category->total_books_count); ?> books
                                </div>
                            </div>
                            <div class="book-content">
                                <h6><a href="<?php echo e(route('user.shop', ['category' => $category->id])); ?>"><?php echo e($category->name); ?></a></h6>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
            <?php $__currentLoopData = $readitTopBooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="shop-box-items style-2">
                <div class="book-thumb center">
                    <a href="<?php echo e(route('user.shop-details', $book)); ?>">
                        <img src="<?php echo e($book->cover_image ? asset('uploads/books/' . $book->cover_image) : asset('user/assets/img/book/placeholder.png')); ?>" alt="<?php echo e($book->title); ?>">
                    </a>
                    <ul class="shop-icon d-grid justify-content-center align-items-center">
                        <li>
                            <?php if(auth()->check() && isset($wishlist[$book->id])): ?>
                                <a href="#" class="wishlist-toggle text-danger" data-id="<?php echo e($book->id); ?>" data-action="remove" title="Remove from wishlist">
                                    <i class="fas fa-heart"></i>
                                </a>
                            <?php else: ?>
                                <a href="#" class="wishlist-toggle" data-id="<?php echo e($book->id); ?>" data-action="add" title="Add to wishlist">
                                    <i class="far fa-heart"></i>
                                </a>
                            <?php endif; ?>
                        </li>
                        <li><a href="<?php echo e(route('user.shop-details', $book)); ?>"><i class="far fa-eye"></i></a></li>
                    </ul>
                </div>
                <div class="shop-content">
                    <h5><?php echo e($book->category ? $book->category->getFullPath() : 'Uncategorized'); ?></h5>
                    <h3><a href="<?php echo e(route('user.shop-details', $book)); ?>"><?php echo e(Str::limit($book->title, 40)); ?></a></h3>

                    
                    <ul class="price-list">
                        <li>$<?php echo e(number_format($book->price, 2)); ?></li>
                    </ul>
                    <ul class="author-post">
                        <li class="authot-list">
                            <span class="content"><?php echo e(optional($book->author)->name ?? 'Author'); ?></span>
                        </li>
                        <li class="star">
                      
                    </ul>
                </div>
                <div class="shop-button">
                    <?php if(auth()->guard()->check()): ?>
                        <?php if($book->stock_quantity > 0): ?>
                            <a href="<?php echo e(route('user.shop-details', $book)); ?>" class="theme-btn">Add To Cart</a>
                        <?php else: ?>
                            <button class="theme-btn bg-secondary disabled-btn" disabled>Out of Stock</button>
                        <?php endif; ?>
                    <?php else: ?>
                        <?php if($book->stock_quantity > 0): ?>
                            <a href="<?php echo e(route('login')); ?>?redirect=<?php echo e(urlencode(url()->current())); ?>" class="theme-btn">Add To Cart</a>
                        <?php else: ?>
                            <button class="theme-btn bg-secondary disabled-btn" disabled>Out of Stock</button>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
</section>

<!-- CTA Banner -->
<section class="cta-banner-section fix section-padding pt-0">
    <div class="container">
        <div class="cta-banner-wrapper section-padding bg-cover" style="background-color: #ff7b6b; border-radius: 20px;">
            <div class="book-shape"><img src="<?php echo e(asset('user/assets/img/cta-book-2.png')); ?>" alt="shape-img"></div>
            <div class="book-shape-2"><img src="<?php echo e(asset('user/assets/img/cta-book.png')); ?>" alt="shape-img"></div>
            <div class="cta-content text-center">
                <span class="wow fadeInUp" data-wow-delay=".2s">Get 25% <img src="<?php echo e(asset('user/assets/img/line-shape.png')); ?>" alt=""></span>
                <h2 class="mb-40 wow fadeInUp" data-wow-delay=".4s">discount in all <br> kind of super Selling</h2>
                <a href="<?php echo e(route('user.shop')); ?>" class="theme-btn wow fadeInUp" data-wow-delay=".6s">Shop Now<i class="fa-solid fa-arrow-right-long"></i></a>
            </div>
        </div>
    </div>
</section>

<!-- Top Rating Books -->
<section class="top-ratting-book-section fix section-padding bg-cover"
    style="background-image: url(<?php echo e(asset('user/assets/img/ratting-bg.jpg')); ?>);">
    <div class="container">
        <div class="top-ratting-book-wrapper">
            <div class="section-title-area">
                <div class="section-title">
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">Top Rating Books</h2>
                </div>
                <a href="<?php echo e(route('user.shop')); ?>" class="theme-btn wow fadeInUp" data-wow-delay=".5s">view more books <i class="fa-solid fa-arrow-right-long"></i></a>
            </div>
            <div class="row">
                <?php $__currentLoopData = $topRatingBooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xl-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="top-ratting-box-items">
                        <div class="book-thumb">
                            <a href="<?php echo e(route('user.shop-details', $book)); ?>">
                                <img src="<?php echo e($book->cover_image ? asset('uploads/books/' . $book->cover_image) : asset('user/assets/img/top-book/01.png')); ?>" alt="<?php echo e($book->title); ?>">
                            </a>
                        </div>
                        <div class="book-content">
                            <div class="title-header">
                                <div>
                                    <h5><?php echo e($book->category ? $book->category->getFullPath() : 'Uncategorized'); ?></h5>
                                    <h3><a href="<?php echo e(route('user.shop-details', $book)); ?>"><?php echo e($book->title); ?></a></h3>
                                </div>
                                <ul class="shop-icon d-flex justify-content-center align-items-center">
                                    <li>
                                        <?php if(auth()->check() && isset($wishlist[$book->id])): ?>
                                            <a href="#" class="wishlist-toggle text-danger" data-id="<?php echo e($book->id); ?>" data-action="remove" title="Remove from wishlist">
                                                <i class="fas fa-heart"></i>
                                            </a>
                                        <?php else: ?>
                                            <a href="#" class="wishlist-toggle" data-id="<?php echo e($book->id); ?>" data-action="add" title="Add to wishlist">
                                                <i class="far fa-heart"></i>
                                            </a>
                                        <?php endif; ?>
                                    </li>
                                    <li><a href="<?php echo e(route('user.shop-details', $book)); ?>"><i class="far fa-eye"></i></a></li>
                                </ul>
                            </div>
                            <span class="mt-10">$<?php echo e(number_format($book->price, 2)); ?></span>
                            <ul class="author-post">
                                <li class="authot-list">
                                    <span class="content mt-10"><?php echo e(optional($book->author)->name ?? 'Author'); ?></span>
                                </li>
                            </ul>
                            <div class="shop-btn">
                                <?php if(auth()->guard()->check()): ?>
                                    <?php if($book->stock_quantity > 0): ?>
                                        <a href="<?php echo e(route('user.shop-details', $book)); ?>" class="theme-btn">Add To Cart</a>
                                    <?php else: ?>
                                        <button class="theme-btn bg-secondary disabled-btn" disabled>Out of Stock</button>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php if($book->stock_quantity > 0): ?>
                                        <a href="<?php echo e(route('login')); ?>?redirect=<?php echo e(urlencode(url()->current())); ?>" class="theme-btn">Add To Cart</a>
                                    <?php else: ?>
                                        <button class="theme-btn bg-secondary disabled-btn" disabled>Out of Stock</button>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                <?php $__currentLoopData = $topSellingBooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="swiper-slide">
                    <div class="shop-box-items style-2">
                        <div class="book-thumb center">
                            <a href="<?php echo e(route('user.shop-details', $book)); ?>">
                                <img src="<?php echo e($book->cover_image ? asset('uploads/books/' . $book->cover_image) : asset('user/assets/img/book/placeholder.png')); ?>" alt="<?php echo e($book->title); ?>">
                            </a>
                          
                            <ul class="shop-icon d-grid justify-content-center align-items-center">
                                <li>
                                    <?php if(auth()->check() && isset($wishlist[$book->id])): ?>
                                        <a href="#" class="wishlist-toggle text-danger" data-id="<?php echo e($book->id); ?>" data-action="remove" title="Remove from wishlist">
                                            <i class="fas fa-heart"></i>
                                        </a>
                                    <?php else: ?>
                                        <a href="#" class="wishlist-toggle" data-id="<?php echo e($book->id); ?>" data-action="add" title="Add to wishlist">
                                            <i class="far fa-heart"></i>
                                        </a>
                                    <?php endif; ?>
                                </li>
                                <li><a href="<?php echo e(route('user.shop-details', $book)); ?>"><i class="far fa-eye"></i></a></li>
                            </ul>
                        </div>
                        <div class="shop-content">
                            <h5><?php echo e($book->category ? $book->category->getFullPath() : 'Uncategorized'); ?></h5>
                            <h3><a href="<?php echo e(route('user.shop-details', $book)); ?>"><?php echo e(Str::limit($book->title, 40)); ?></a></h3>
                            <ul class="price-list">
                                <li>$<?php echo e(number_format($book->price, 2)); ?></li>
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
                                    <a href="<?php echo e(route('user.shop-details', $book)); ?>" class="theme-btn">Add To Cart</a>
                                <?php else: ?>
                                    <button class="theme-btn bg-secondary disabled-btn" disabled>Out of Stock</button>
                                <?php endif; ?>
                            <?php else: ?>
                                <?php if($book->stock_quantity > 0): ?>
                                    <a href="<?php echo e(route('login')); ?>?redirect=<?php echo e(urlencode(url()->current())); ?>" class="theme-btn">Add To Cart</a>
                                <?php else: ?>
                                    <button class="theme-btn bg-secondary disabled-btn" disabled>Out of Stock</button>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>

<!-- Featured Authors -->
<section class="team-section fix section-padding pt-0 margin-bottom-30">
    <div class="container">
        <div class="section-title text-center">
            <h2 class="mb-3 wow fadeInUp" data-wow-delay=".3s">Featured Author</h2>
            <p class="wow fadeInUp" data-wow-delay=".5s">Interdum et malesuada fames ac ante ipsum primis in faucibus.<br> Donec at nulla nulla. Duis posuere ex lacus</p>
        </div>
        
        <div class="row g-4 justify-content-center mt-4">
            <?php $__currentLoopData = $featuredAuthors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="team-box-items" style="height: 450px; display: flex; flex-direction: column; justify-content: space-between; padding: 30px; transition: all 0.4s ease; background: #fff; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
                        <div class="team-image" style="height: 250px; width: 100%; margin-bottom: 20px; position: relative; overflow: hidden; border-radius: 12px;">
                            <div class="thumb" style="height: 100%; width: 100%;">
                                <img src="<?php echo e(filter_var($author->image, FILTER_VALIDATE_URL) ? $author->image : ($author->image ? asset('storage/' . $author->image) : 'https://ui-avatars.com/api/?name=' . urlencode($author->name) . '&background=ff7b6b&color=fff&size=512')); ?>" alt="<?php echo e($author->name); ?>" style="height: 100%; width: 100%; object-fit: cover;">
                            </div>
                        </div>
                        <div class="team-content text-center" style="flex-grow: 1; display: flex; flex-direction: column; justify-content: center;">
                            <h6 style="font-size: 20px; margin-bottom: 8px;">
                                <a href="<?php echo e(route('user.team-details', $author)); ?>"><?php echo e($author->name); ?></a>
                            </h6>
                            <p style="color: #666; font-size: 14px;"><?php echo e($author->books_count); ?> Published Books</p>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>

<!-- Wishlist Functionality Script (Clean - No Alerts) -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;
    
    // Handle wishlist toggle clicks
    document.querySelectorAll('.wishlist-toggle').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const bookId = this.dataset.id;
            const currentAction = this.dataset.action;
            const icon = this.querySelector('i');
            const isAuth = <?php echo e(auth()->check() ? 'true' : 'false'); ?>;
            
            // Guest user handling
            if (!isAuth) {
                window.location.href = '<?php echo e(route('login')); ?>';
                return;
            }
            
            // Show loading state
            const originalClass = icon.className;
            icon.className = 'fas fa-spinner fa-spin';
            
            // Determine request details
            const url = currentAction === 'add' 
                ? `/wishlist/add/${bookId}` 
                : `/wishlist/remove/${bookId}`;
            const method = currentAction === 'add' ? 'POST' : 'DELETE';
            
            // Send request
            fetch(url, {
                method: method,
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update UI state silently
                    if (currentAction === 'add') {
                        icon.className = 'fas fa-heart';
                        this.dataset.action = 'remove';
                        this.classList.add('text-danger');
                    } else {
                        icon.className = 'far fa-heart';
                        this.dataset.action = 'add';
                        this.classList.remove('text-danger');
                    }
                } else {
                    // Revert icon on failure
                    icon.className = originalClass;
                    console.error('Wishlist update failed:', data.message);
                }
            })
            .catch(error => {
                console.error('Wishlist error:', error);
                icon.className = originalClass;
            });
        });
    });
});
</script>

<style>
    /* Smooth wishlist icon transitions */
    .wishlist-toggle i {
        transition: all 0.3s ease;
        font-size: 1.2rem;
    }
    .wishlist-toggle:hover i {
        transform: scale(1.2);
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
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\The Final Project Folder\Edited-FinalProject\resources\views/user/index.blade.php ENDPATH**/ ?>