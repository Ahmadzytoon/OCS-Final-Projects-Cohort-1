<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $__env->yieldContent('title','Tutor Dashboard'); ?></title>
    <link href="<?php echo e(asset('assets/admin/vendor/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/admin/vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/admin/css/sb-admin-2.min.css')); ?>" rel="stylesheet">
      <style>
        .bg-gradient-purple {
    background: #4C1D95;
}

    </style>
    <?php echo $__env->yieldContent('styles'); ?>
</head>
<body>
      <div id="wrapper">

<!-- Sidebar -->
      <ul class="navbar-nav bg-gradient-purple sidebar sidebar-dark accordion"  id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo e(route('tutor.tutor_profile')); ?>">
                <div class="sidebar-brand-icon ">  
                <i class="fa fa-chalkboard-teacher"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Tutor dashboard</div>
            </a>

        
            <!-- Divider -->
            <hr class="sidebar-divider">

        
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('tutor.tutor_profile')); ?>">
                    <i class="fa fa-user"></i>
                    <span>My Profile</span></a>
            </li>

    
            <hr class="sidebar-divider my-0">

                <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('tutor.my_requests')); ?>">
                    <i class="fa fa-envelope"></i>
                    <span>My Requests</span></a>
            </li>

            <hr class="sidebar-divider my-0">

                <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('tutor.subjects', auth()->user()->tutor->id )); ?>">
                    <i class="fas fa-fw fa-book"></i>
                    <span>My Subjects </span></a>
            </li>

            <hr class="sidebar-divider my-0">

                <li class="nav-item">
                <a class="nav-link" href="<?php echo e(url('admin/logout')); ?>">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>
            </ul>
          <!-- Content Wrapper Start -->

             <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">

                 <div class="container-fluid">
                    <?php echo $__env->yieldContent('content'); ?>

                </div>
                </div>
           
    
    
       <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy;TutorHub2026</span>
                    </div>
                </div>
            </footer>
      </div>  
      </div>  
      

<!-- jQuery -->
<script src="<?php echo e(asset('assets/admin/vendor/jquery/jquery.min.js')); ?>"></script>

<!-- Bootstrap 4 Bundle -->
<script src="<?php echo e(asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>

<!-- jQuery Easing -->
<script src="<?php echo e(asset('assets/admin/vendor/jquery-easing/jquery.easing.min.js')); ?>"></script>

<!-- SB Admin core -->
<script src="<?php echo e(asset('assets/admin/js/sb-admin-2.min.js')); ?>"></script>
<!-- Chart.js -->
<script src="<?php echo e(asset('assets/admin/vendor/chart.js/Chart.min.js')); ?>"></script>

<!-- Demo scripts for charts -->
<script src="<?php echo e(asset('assets/admin/js/demo/chart-area-demo.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/js/demo/chart-bar-demo.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/js/demo/chart-pie-demo.js')); ?>"></script>
   <?php echo $__env->yieldContent('scripts'); ?>

</body>
</html><?php /**PATH C:\laravelpro\admindashboard_laravel\resources\views/layouts/tutor.blade.php ENDPATH**/ ?>