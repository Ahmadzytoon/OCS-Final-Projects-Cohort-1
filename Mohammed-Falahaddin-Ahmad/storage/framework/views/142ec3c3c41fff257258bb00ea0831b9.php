<?php $__env->startSection('content'); ?>
<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('user/assets/css/pagination-style.css')); ?>">
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
                <h1>Featured Author</h1>
                <div class="page-header">
                    <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".3s">
                        <li><a href="<?php echo e(route('user.home')); ?>">Home</a></li>
                        <li><i class="fa-solid fa-chevron-right"></i></li>
                        <li>Author</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <style>
        .team-box-items {
            height: 450px !important;
            display: flex !important;
            flex-direction: column !important;
            justify-content: space-between !important;
            padding: 30px !important;
            transition: all 0.4s ease !important;
            background: #fff !important;
            border-radius: 15px !important;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05) !important;
        }
        .team-box-items:hover {
            transform: translateY(-10px) !important;
            box-shadow: 0 15px 40px rgba(0,0,0,0.1) !important;
        }
        .team-image {
            height: 250px !important;
            width: 100% !important;
            margin-bottom: 20px !important;
            position: relative !important;
            overflow: hidden !important;
            border-radius: 12px !important;
        }
        .team-image .thumb {
            height: 100% !important;
            width: 100% !important;
        }
        .team-image .thumb img {
            height: 100% !important;
            width: 100% !important;
            object-fit: cover !important;
        }
        .team-content {
            flex-grow: 1 !important;
            display: flex !important;
            flex-direction: column !important;
            justify-content: center !important;
        }
        .team-content h6 {
            font-size: 20px !important;
            margin-bottom: 8px !important;
        }
        .team-content p {
            color: #666 !important;
            font-size: 14px !important;
        }
    </style>

    <!-- Team Section Start -->
    <section class="team-section fix section-padding">
        <div class="container">
            <div class="section-title text-center">
                <h2 class="mb-3 wow fadeInUp" data-wow-delay=".3s">Featured Author</h2>
            </div>
            
            <div class="row g-4 justify-content-center">
                <?php $__empty_1 = true; $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                        <div class="team-box-items">
                            <div class="team-image">
                                <div class="thumb">
                                    <img src="<?php echo e(filter_var($author->image, FILTER_VALIDATE_URL) ? $author->image : ($author->image ? asset('storage/' . $author->image) : 'https://ui-avatars.com/api/?name=' . urlencode($author->name) . '&background=ff7b6b&color=fff&size=512')); ?>" alt="<?php echo e($author->name); ?>">
                                </div>
                            </div>
                            <div class="team-content text-center">
                                <h6>
                                    <a href="<?php echo e(route('user.team-details', $author)); ?>"><?php echo e($author->name); ?></a>
                                </h6>
                                <p><?php echo e($author->books_count); ?> Published Books</p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-12 text-center p-4">
                        <p>No authors available.</p>
                    </div>
                <?php endif; ?>
            </div>

            <div class="mt-5 d-flex justify-content-center">
                <?php echo e($authors->links('pagination::bootstrap-5')); ?>

            </div>
        </div>
    </section>

</body>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\The Final Project Folder\Edited-FinalProject\resources\views/user/author-list.blade.php ENDPATH**/ ?>