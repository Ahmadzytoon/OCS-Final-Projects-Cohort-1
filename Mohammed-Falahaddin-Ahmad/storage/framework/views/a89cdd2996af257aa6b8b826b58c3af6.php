<footer class="footer-section footer-bg section-padding pb-0" style="background-color: #fcf6f5;">
    <div class="container">
        <div class="footer-widgets-wrapper">
            <div class="row g-4">
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <h4 class="text-dark">About Us</h4>
                        </div>
                        <div class="footer-content">
                            <p class="mb-4">
                                Your premier destination for books of all genres. We believe in the power of reading to transform lives and expand horizons.
                            </p>
                            <div class="social-icon d-flex align-items-center gap-3">
                                <a href="https://www.facebook.com/" class="text-dark"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://x.com/" class="text-dark"><i class="fab fa-twitter"></i></a>
                                <a href="https://www.youtube.com/" class="text-dark"><i class="fab fa-youtube"></i></a>
                                <a href="https://www.linkedin.com/" class="text-dark"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <h4 class="text-dark">Quick Links</h4>
                        </div>
                        <ul class="list-area">
                            <li><a href="<?php echo e(route('user.home')); ?>" class="text-muted"><i class="fa-solid fa-chevron-right me-2"></i>Home</a></li>
                            <li><a href="<?php echo e(route('user.shop')); ?>" class="text-muted"><i class="fa-solid fa-chevron-right me-2"></i>Shop</a></li>
                            <li><a href="<?php echo e(route('user.about')); ?>" class="text-muted"><i class="fa-solid fa-chevron-right me-2"></i>About Us</a></li>
                            <li><a href="<?php echo e(route('user.contact')); ?>" class="text-muted"><i class="fa-solid fa-chevron-right me-2"></i>Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".6s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <h4 class="text-dark">Categories</h4>
                        </div>
                        <ul class="list-area">
                            <?php $__currentLoopData = \App\Models\Category::take(5)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="<?php echo e(route('user.shop', ['category' => $cat->id])); ?>" class="text-muted"><i class="fa-solid fa-chevron-right me-2"></i><?php echo e($cat->name); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".8s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <h4 class="text-dark">Contact Information</h4>
                        </div>
                        <div class="footer-content">
                            <ul class="contact-info">
                                <li class="d-flex align-items-center mb-3">
                                    <i class="fa-solid fa-location-dot me-3 text-pink"></i>
                                    <span class="text-muted">123 Bookstore St, Knowledge City</span>
                                </li>
                                <li class="d-flex align-items-center mb-3">
                                    <i class="fa-solid fa-phone me-3 text-pink"></i>
                                    <a href="tel:+1234567890" class="text-muted">+1 234 567 890</a>
                                </li>
                                <li class="d-flex align-items-center">
                                    <i class="fa-solid fa-envelope me-3 text-pink"></i>
                                    <a href="mailto:info@readify.com" class="text-muted">info@readify.com</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom mt-5 py-4 border-top">
        <div class="container">
            <div class="d-flex flex-wrap justify-content-between align-items-center">
                <p class="mb-0 text-muted">&copy; <?php echo e(date('Y')); ?> Readify. All rights reserved.</p>
                <div class="payment-methods d-flex gap-3">
                    <img src="<?php echo e(asset('user/assets/img/visa-logo.png')); ?>" alt="Visa" style="height: 20px; opacity: 0.8;">
                    <img src="<?php echo e(asset('user/assets/img/mastercard.png')); ?>" alt="Mastercard" style="height: 20px; opacity: 0.8;">
                    <img src="<?php echo e(asset('user/assets/img/PayPal.png')); ?>" alt="PayPal" style="height: 20px; opacity: 0.8;">
                    <img src="<?php echo e(asset('user/assets/img/GooglePay.png')); ?>" alt="Google Pay" style="height: 20px; opacity: 0.8;">
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
    .footer-section {
        color: #333;
    }
    .text-pink {
        color: #ff7b6b;
    }
    .single-footer-widget .widget-head h4 {
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 30px;
        position: relative;
    }
    .single-footer-widget .widget-head h4::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: -10px;
        width: 40px;
        height: 2px;
        background: #ff7b6b;
    }
    .single-footer-widget ul.list-area li {
        margin-bottom: 12px;
    }
    .single-footer-widget ul.list-area li a:hover {
        color: #ff7b6b !important;
        padding-left: 5px;
        transition: all 0.3s;
    }
    .footer-bg {
        border-top: 1px solid #f0f0f0;
    }
</style><?php /**PATH C:\The Final Project Folder\Edited-FinalProject\resources\views/user/footer.blade.php ENDPATH**/ ?>