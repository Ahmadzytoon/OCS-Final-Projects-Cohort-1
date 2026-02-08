<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title><?php echo $__env->yieldContent('title', 'TutorHub'); ?></title>
    <meta name="description" content="<?php echo $__env->yieldContent('description', 'Connect with expert tutors for personalized learning'); ?>">
    
    <!-- Favicons -->
    <link href="<?php echo e(asset('assets/home/img/favicon.png')); ?>" rel="icon">
    <link href="<?php echo e(asset('assets/home/img/apple-touch-icon.png')); ?>" rel="apple-touch-icon">
      
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700&family=Raleway:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo e(asset('assets/home/vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/home/vendor/bootstrap-icons/bootstrap-icons.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/home/vendor/aos/aos.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/home/vendor/glightbox/css/glightbox.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/home/vendor/swiper/swiper-bundle.min.css')); ?>" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="<?php echo e(asset('assets/home/css/main.css')); ?>" rel="stylesheet">
     
    <!-- Page Specific Styles -->
    <?php echo $__env->yieldContent('styles'); ?>

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

</head>
<body>
    
    <!-- Header -->
  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <!-- Logo -->
        <a href="<?php echo e(url('/')); ?>" class="logo d-flex align-items-center">
            <h1 class="sitename">TutorHub</h1>
        </a>

        <!-- Navigation -->
        <nav id="navmenu" class="navmenu d-none d-xl-block mx-auto">
            <ul class="d-flex gap-4 mb-0">
                <li><a href="<?php echo e(route('home.index')); ?>">Home</a></li>
                <li><a href="<?php echo e(route('home.about')); ?>">About</a></li>
                <li><a href="<?php echo e(route('home.tutors')); ?>">Tutors</a></li>
                <li><a href="<?php echo e(route('home.subjects')); ?>">Subjects</a></li>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
                    <li><a href="<?php echo e(route('user.student_profile')); ?>" class="<?php echo e(Request::is('user/student_profile*') ? 'active' : ''); ?>">Profile</a></li>
                    <li><a href="<?php echo e(route('user.student_requests')); ?>" class="<?php echo e(Request::is('user/student_requests*') ? 'active' : ''); ?>">My Requests</a></li>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <li><a href="<?php echo e(route('home.contact')); ?>">Contact</a></li>
            </ul>
        </nav>

        <!-- Right Side -->
        <div class="d-flex align-items-center gap-3">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->guest()): ?>
                <a class="btn-getstarted" href="<?php echo e(route('login')); ?>">Login</a>
                <a class="btn-getstarted" href="<?php echo e(route('user.register_student')); ?>">Sign Up</a>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
                <!-- Logout -->
                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn-getstarted">Logout</button>
                </form>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <!-- Mobile Toggle -->
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </div>
</header>

    <!-- Main Content -->
    <main id="main">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <!-- Footer -->
    <footer id="footer" class="footer position-relative light-background">
        <div class="container footer-top">
            <div class="row gy-4">

                <!-- About Section -->
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="<?php echo e(url('/')); ?>" class="logo d-flex align-items-center">
                        <span class="sitename">TutorHub</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p>Ahlam Tower, Abdoun</p>
                        <p>Amman, Jordan</p>
                        <p class="mt-3"><strong>Phone:</strong> <span>+962 7 1234 5678</span></p>
                        <p><strong>Email:</strong> <span>info@tutorhub.com</span></p>
                    </div>
                    <div class="social-links d-flex mt-4">
                        <a href="#" aria-label="Twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <!-- Useful Links -->
                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
                        <li><a href="<?php echo e(url('/about')); ?>">About Us</a></li>
                        <li><a href="<?php echo e(url('/trainers')); ?>">Tutors</a></li>
                        <li><a href="<?php echo e(url('/courses')); ?>">Subjects</a></li>
                        <li><a href="<?php echo e(url('/contact')); ?>">Contact Us</a></li>
                    </ul>
                </div>

                <!-- Services -->
                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><a href="#">One-on-One Tutoring</a></li>
                        <li><a href="#">Group Sessions</a></li>
                        <li><a href="#">Online Learning</a></li>
                        <li><a href="#">Exam Preparation</a></li>
                    </ul>
                </div>

                <!-- How It Works -->
                <div class="col-lg-4 col-md-6 footer-links">
                    <h4>How TutorHub Works</h4>
                    <ul>
                        <li>1. Browse tutors by subject & grade</li>
                        <li>2. Book your preferred schedule</li>
                        <li>3. Learn and achieve your goals</li>
                        <li>4. Rate and review your experience</li>
                    </ul>
                </div>

            </div>
        </div>

        <!-- Copyright -->
        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright <?php echo e(date('Y')); ?></span> <strong class="px-1 sitename">TutorHub</strong> <span>All Rights Reserved</span></p>
            <div class="credits">
                <a href="<?php echo e(url('/privacy')); ?>">Privacy Policy</a> | 
                <a href="<?php echo e(url('/terms')); ?>">Terms of Service</a>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <!-- Vendor JS Files -->
    <script src="<?php echo e(asset('assets/home/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/home/vendor/aos/aos.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/home/vendor/glightbox/js/glightbox.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/home/vendor/swiper/swiper-bundle.min.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/purecounterjs@1.5.0/dist/purecounter_vanilla.js"></script>

    <!-- Main JS File -->
    <script src="<?php echo e(asset('assets/home/js/main.js')); ?>"></script>
    
    <!-- Page Specific Scripts -->
    <?php echo $__env->yieldContent('scripts'); ?>
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

</body>
</html>
<?php /**PATH C:\laravelpro\admindashboard_laravel\resources\views/layouts/home.blade.php ENDPATH**/ ?>