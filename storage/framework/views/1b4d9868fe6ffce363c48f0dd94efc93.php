
<?php $__env->startSection('title','Tutor Profile'); ?>
<?php $__env->startSection('content'); ?>

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Poppins', sans-serif;
    background-color: aliceblue;
}

.wrapper {
    padding: 30px 50px;
    border: 1px solid #ddd;
    border-radius: 15px;
    margin: 10px auto;
    max-width: 80%;
}

h4 {
    letter-spacing: -1px;
    font-weight: 400;
}

.img {
    width: 100px;
    height: 100px;
    border-radius: 6px;
    object-fit: cover;
}

#img-section p {
    font-size: 12px;
    color: #777;
    margin-bottom: 10px;
}

#img-section b {
    font-size: 14px;
}

label {
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 500;
    color: #777;
    padding-left: 3px;
}

.form-control {
    border-radius: 10px;
}

.form-control:focus {
    box-shadow: none;
    border: 1.5px solid #0779e4;
}

.btn-purple {
    background-color: #6f42c1 !important;
    border-color: #6f42c1 !important;
    color: #fff !important;
}

.btn-purple:hover {
    background-color: #5a32a3 !important;
    border-color: #5a32a3 !important;
}

@media(max-width:576px) {
    .wrapper {
        padding: 25px 20px;
    }
}
</style>

<div class="wrapper bg-white mt-sm-2">
    <h4 class="pb-4 border-bottom">Account settings</h4>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show">
            <?php echo e(session('success')); ?>

            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </ul>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <div class="py-2">
        <form action="<?php echo e(route('tutor.profile.update')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="d-flex align-items-start py-3 border-bottom">
                <img src="<?php echo e($user->profile_image 
                             ? asset('storage/profile_images/' . $user->profile_image) 
                             : asset('assets/home/img/team/team-1.jpg')); ?>" 
                     class="img" 
                     alt="Profile Photo"
                     id="preview-image">

                <div class="pl-sm-4 pl-2" id="img-section">
                    <b>Profile Photo</b>
                    <p>Accepted: .png, .jpg, .jpeg (Max: 1MB)</p>
                    <input type="file" 
                           name="profile_image" 
                           id="profile_image"
                           class="form-control-file" 
                           accept="image/*">
                </div>
            </div>

        
            <div class="row py-2">
                <div class="col-md-6">
                    <label for="name">Full Name</label>
                    <input type="text" name="name" class="bg-light form-control" value="<?php echo e($user->name); ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" class="bg-light form-control" value="<?php echo e($user->email); ?>" required>
                </div>
            </div>

            <div class="row py-2">
                <div class="col-md-6 pt-md-0 pt-3">
                    <label for="phone">Phone Number</label>
                    <input type="tel" name="phone" class="bg-light form-control" value="<?php echo e($user->phone); ?>">
                </div>
                <div class="col-md-6 pt-md-0 pt-3">
                    <label for="location">Location</label>
                    <input type="text" name="location" class="bg-light form-control" value="<?php echo e($user->location); ?>">
                </div>
            </div>

    
            <div class="row py-2">
                <div class="col-md-12">
                    <label for="bio">Bio</label>
                    <textarea class="bg-light form-control" name="bio" rows="4"><?php echo e($user->tutor->bio ?? ''); ?></textarea>
                </div>
            </div>


            <div class="row py-2">
                <div class="col-md-4">
                    <label for="current_password">Current Password</label>
                    <input type="password" name="current_password" class="bg-light form-control">
                </div>
                <div class="col-md-4 pt-md-0 pt-3">
                    <label for="password">New Password</label>
                    <input type="password" name="password" class="bg-light form-control" >
                </div>
                <div class="col-md-4 pt-md-0 pt-3">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="bg-light form-control">
                </div>
            </div>

            <div class="py-3 pb-4 border-bottom">
                <button type="submit" class="btn btn-purple mr-3"> Save Changes</button>
            </div>
        </form>
    </div>
</div>

<script>

document.getElementById('profile_image').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview-image').src = e.target.result;
        }
        reader.readAsDataURL(file);
    }
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.tutor', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laravelpro\admindashboard_laravel\resources\views/tutor/tutor_profile.blade.php ENDPATH**/ ?>