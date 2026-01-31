
<?php $__env->startSection('title', 'Edit Category'); ?>
<?php $__env->startSection('page-title', 'Edit Category'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <h5>Edit Category</h5>
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

        <form action="<?php echo e(route('admin.categories.update', $category->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            
            <div class="mb-3">
                <label for="name" class="form-label">Category Name *</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo e(old('name', $category->name)); ?>" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"><?php echo e(old('description', $category->description)); ?></textarea>
            </div>

            <div class="mb-3">
                <label for="parent_id" class="form-label">Parent Category</label>
                <select class="form-control" id="parent_id" name="parent_id">
                    <option value="">None (Parent Category)</option>
                    <?php $__currentLoopData = $parentCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($parent->id); ?>" <?php echo e(old('parent_id', $category->parent_id) == $parent->id ? 'selected' : ''); ?>>
                            <?php echo e($parent->name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <small class="form-text text-muted">Select a parent category to make this a subcategory</small>
            </div>

        
            <button type="submit" class="btn btn-primary">Update Category</button>
            <a href="<?php echo e(route('admin.categories.index')); ?>" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\The Final Project Folder\Edited-FinalProject\resources\views/admin/categories-edit.blade.php ENDPATH**/ ?>