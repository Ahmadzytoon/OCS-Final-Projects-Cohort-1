
<?php $__env->startSection('title', 'Add New Author'); ?>
<?php $__env->startSection('page-title', 'Add New Author'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <h5>Add New Author</h5>
    </div>
    <div class="card-body">
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('admin.authors.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            
            <div class="mb-3">
                <label for="name" class="form-label">Author Name *</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo e(old('name')); ?>" required>
            </div>

            <div class="mb-3">
                <label for="biography" class="form-label">Biography</label>
                <textarea class="form-control" id="biography" name="biography" rows="4"><?php echo e(old('biography')); ?></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Save Author</button>
            <a href="<?php echo e(route('admin.authors.index')); ?>" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\The Final Project Folder\Edited-FinalProject\resources\views/admin/authors-create.blade.php ENDPATH**/ ?>