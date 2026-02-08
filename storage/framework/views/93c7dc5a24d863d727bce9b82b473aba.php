
<?php $__env->startSection('title', 'Home Page'); ?>
<?php $__env->startSection('content'); ?>
<div class="container mt-5 mb-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-10 mx-auto text-center">
            <div class="card p-5">
                <div class="card-body">
                    <h1 class="error-code">404</h1>
                    
                    <div class="error-message">
                        <i class="fa fa-exclamation-triangle text-warning"></i>
                        Oops! The page you are looking for does not exist.
                    </div>

                    <p class="text-muted mb-4">
                        It looks like nothing was found at this location. Maybe try going back to the home page or search for something else.
                    </p>

                    <div class="d-flex justify-content-center">
                        <a href="<?php echo e(route('home.index')); ?>" class="btn btn-purple px-5 py-2 shadow-sm">
                            <i class="fa fa-home"></i> Back to Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.home', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laravelpro\admindashboard_laravel\resources\views/errors/404.blade.php ENDPATH**/ ?>