<?php $__env->startSection('content'); ?>
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
                <h1>Author Profile</h1>
                <div class="page-header">
                    <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".3s">
                        <li><a href="<?php echo e(route('user.home')); ?>">Home</a></li>
                        <li><i class="fa-solid fa-chevron-right"></i></li>
                        <li><a href="<?php echo e(route('user.team')); ?>">Author</a></li>
                        <li><i class="fa-solid fa-chevron-right"></i></li>
                        <li><?php echo e($author->name); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Author Profile Header -->
    <style>
        /* Remove all background images from author profile page */
        .author-profile-header,
        .author-profile-wrapper,
        .shop-section,
        .container,
        body,
        section {
            background-image: none !important;
            background: transparent !important;
        }
        
        .author-avatar img {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border: 5px solid #ff7b6b;
        }
        
        .author-stats {
            background: #f8f9fa !important;
        }
    </style>
    <section class="author-profile-header fix section-padding pb-0">
        <div class="container">
            <div class="author-profile-wrapper">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-3">
                        <div class="author-avatar">
                            <img src="<?php echo e($author->image ? asset('storage/' . $author->image) : asset('user/assets/img/team/placeholder.jpg')); ?>" alt="<?php echo e($author->name); ?>" class="rounded-circle img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="author-info">
                            <h2 class="mb-1"><?php echo e($author->name); ?></h2>
                            <div class="social-icons mb-3">
                                <a href="#" class="btn btn-outline-secondary btn-sm me-2"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="btn btn-outline-secondary btn-sm me-2"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="btn btn-outline-secondary btn-sm me-2"><i class="fab fa-youtube"></i></a>
                                <a href="#" class="btn btn-outline-secondary btn-sm"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                            <p class="mt-3">
                                <?php echo e($author->biography ?? 'No biography available. This author has not yet shared their story.'); ?>

                            </p>
                        </div>
                    </div>
                </div>
                <div class="author-stats mt-4 p-4 bg-light rounded shadow-sm">
                    <div class="row text-center">
                        <div class="col-md-12">
                            <h3 class="mb-0"><?php echo e($author->books_count); ?> Book<?php echo e($author->books_count != 1 ? 's' : ''); ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Books by Author -->
    <section class="shop-section fix section-padding">
        <div class="container">
            <div class="section-title-area">
                <div class="section-title">
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">Books By <?php echo e($author->name); ?></h2>
                </div>
            </div>
            <?php if($author->books->isNotEmpty()): ?>
                <div class="swiper book-slider">
                    <div class="swiper-wrapper">
                        <?php $__currentLoopData = $author->books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="swiper-slide">
                                <div class="shop-box-items style-2">
                                    <div class="book-thumb center">
                                        <a href="<?php echo e(route('user.shop-details', $book)); ?>">
                                            <img src="<?php echo e($book->cover_image ? asset('uploads/books/' . $book->cover_image) : asset('user/assets/img/book/placeholder.png')); ?>" alt="<?php echo e($book->title); ?>">
                                        </a>
                                        <?php if($book->price < 35): ?>
                                            <ul class="post-box">
                                                <li>Hot</li>
                                                <?php if($book->price < 30): ?>
                                                    <li>-<?php echo e(round((1 - $book->price / 39.99) * 100)); ?>%</li>
                                                <?php endif; ?>
                                            </ul>
                                        <?php endif; ?>
                                        <ul class="shop-icon d-grid justify-content-center align-items-center">
                                            <li><a href="#"><i class="far fa-heart"></i></a></li>
                                            <li><a href="<?php echo e(route('user.shop-details', $book)); ?>"><i class="far fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="shop-content">
                                        <h5><?php echo e(optional($book->category)->name ?? 'Uncategorized'); ?></h5>
                                        <h3><a href="<?php echo e(route('user.shop-details', $book)); ?>"><?php echo e(Str::limit($book->title, 40)); ?></a></h3>
                                        <ul class="price-list">
                                            <li>$<?php echo e(number_format($book->price, 2)); ?></li>
                                            <?php if($book->price < 39.99): ?>
                                                <li><del>$39.99</del></li>
                                            <?php endif; ?>
                                        </ul>
                                        <ul class="author-post">
                                            <li class="authot-list">
                                                <span class="content"><?php echo e(optional($book->author)->name ?? 'Author'); ?></span>
                                            </li>
                                            <li class="star">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-regular fa-star"></i>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="shop-button">
                                        <a href="<?php echo e(route('user.shop-details', $book)); ?>" class="theme-btn">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php else: ?>
                <div class="text-center py-5">
                    <p>No books published by this author yet.</p>
                </div>
            <?php endif; ?>
        </div>
    </section>

</body>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\The Final Project Folder\Edited-FinalProject\resources\views/user/author-show.blade.php ENDPATH**/ ?>