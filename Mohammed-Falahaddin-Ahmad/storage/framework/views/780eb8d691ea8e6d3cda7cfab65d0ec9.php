<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="pixel-plus">
    <meta name="description" content="Boimela - Books Library eCommerce Store">
    <title><?php echo $__env->yieldContent('title', 'Boimela - Books Library eCommerce Store'); ?></title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo e(asset('user/assets/img/favicon.png')); ?>">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?php echo e(asset('user/assets/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('user/assets/css/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('user/assets/css/animate.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('user/assets/css/magnific-popup.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('user/assets/css/meanmenu.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('user/assets/css/swiper-bundle.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('user/assets/css/nice-select.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('user/assets/css/icomoon.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('user/assets/css/main.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('user/assets/css/color.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('user/assets/css/pagination-style.css')); ?>">

    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>

    <!-- Header Top Section -->
    <?php echo $__env->make('user.header-top-section', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- Navbar -->
    <?php echo $__env->make('user.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- Main Content -->
    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <!-- Footer -->
    <?php echo $__env->make('user.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- Scripts -->
    <script src="<?php echo e(asset('user/assets/js/jquery-3.7.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('user/assets/js/viewport.jquery.js')); ?>"></script>
    <script src="<?php echo e(asset('user/assets/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('user/assets/js/jquery.nice-select.min.js')); ?>"></script>
    <script src="<?php echo e(asset('user/assets/js/jquery.waypoints.js')); ?>"></script>
    <script src="<?php echo e(asset('user/assets/js/jquery.counterup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('user/assets/js/swiper-bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('user/assets/js/jquery.meanmenu.min.js')); ?>"></script>
    <script src="<?php echo e(asset('user/assets/js/jquery.magnific-popup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('user/assets/js/wow.min.js')); ?>"></script>
    <script src="<?php echo e(asset('user/assets/js/gsap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('user/assets/js/main.js')); ?>"></script>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>




<?php /**PATH C:\The Final Project Folder\Edited-FinalProject\resources\views/layouts/user.blade.php ENDPATH**/ ?>