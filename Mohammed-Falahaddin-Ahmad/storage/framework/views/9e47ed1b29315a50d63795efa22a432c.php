<!-- Login Sidebar Area Start -->
<div id="targetElement" class="side_bar slideInRight side_bar_hidden">
    <div class="side_bar_overlay"></div>
    <div class="cart-title mb-50">
        <h4>Log in</h4>
    </div>
    <div class="login-sidebar">
        <form action="<?php echo e(route('login')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="row g-4">
                <div class="col-lg-12">
                    <div class="form-clt">
                        <span>Email Address *</span>
                        <input type="email" name="email" id="email_sidebar" placeholder="Enter your email" required>
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger mt-1 small"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-clt">
                        <span>Password *</span>
                        <input name="password" id="password_sidebar" type="password" placeholder="Enter your password" required>
                        <div class="icon"><i class="fa-regular fa-eye"></i></div>
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger mt-1 small"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <div class="col-lg-12">
                    <button class="theme-btn" type="submit"><span>Log In</span></button>
                </div>
                <div class="col-lg-12">
                    <div class="from-cheak-items">
                        <div class="form-check d-flex gap-2 from-customradio">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember_sidebar">
                            <label class="form-check-label" for="remember_sidebar">Remember Me</label>
                        </div>
                        <p><a href="#">Forgot Password?</a></p>
                    </div>
                </div>
            </div>
        </form>
        <p class="text">Or login with</p>
        <div class="social-item">
            <a href="#" class="facebook-text"><img src="<?php echo e(asset('user/assets/img/facebook.png')); ?>" alt="img">FACEBOOK</a>
            <a href="#" class="facebook-text google-text"><img src="<?php echo e(asset('user/assets/img/google.png')); ?>" alt="img">Google</a>
        </div>
        <div class="user-icon-box">
            <img src="<?php echo e(asset('user/assets/img/user.png')); ?>" alt="img">
            <p>No account yet?</p>
            <a href="#">Create an Account</a>
        </div>
    </div>
    <button id="closeButton" class="x-mark-icon"><i class="fas fa-times"></i></button>
</div>
<?php /**PATH C:\The Final Project Folder\Edited-FinalProject\resources\views/user/sidebar.blade.php ENDPATH**/ ?>