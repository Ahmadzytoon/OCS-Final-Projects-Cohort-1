
<?php $__env->startSection('title', 'Add New Book'); ?>
<?php $__env->startSection('page-title', 'Add New Book'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <h5>Add New Book</h5>
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

        <form action="<?php echo e(route('admin.books.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            
            <!-- Basic Info -->
            <div class="mb-3">
                <label for="title" class="form-label">Title *</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo e(old('title')); ?>" required>
            </div>

            <div class="mb-3">
                <label for="isbn" class="form-label">ISBN *</label>
                <input type="text" class="form-control" id="isbn" name="isbn" value="<?php echo e(old('isbn')); ?>" required>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="author_id" class="form-label">Author *</label>
                    <select class="form-select" id="author_id" name="author_id" required>
                        <option value="">Select Author</option>
                        <?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($author->id); ?>" <?php echo e(old('author_id') == $author->id ? 'selected' : ''); ?>>
                                <?php echo e($author->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="category_id" class="form-label">Category *</label>
                    <select class="form-select" id="category_id" name="category_id" required>
                        <option value="">Select Category</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->id); ?>" <?php echo e(old('category_id') == $category->id ? 'selected' : ''); ?>>
                                <?php echo e($category->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>

            <!-- Pricing & Stock -->
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="price" class="form-label">Price *</label>
                    <input type="number" class="form-control" id="price" name="price" step="0.01" min="0" value="<?php echo e(old('price')); ?>" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="stock_quantity" class="form-label">Stock Quantity *</label>
                    <input type="number" class="form-control" id="stock_quantity" name="stock_quantity" min="0" value="<?php echo e(old('stock_quantity')); ?>" required>
                </div>
            </div>

         

            <!-- Cover Image -->
            <div class="mb-3">
                <label for="cover_image" class="form-label">Cover Image</label>
                <input type="file" class="form-control" id="cover_image" name="cover_image" accept="image/*">
            </div>

            <!-- Descriptions -->
            <div class="mb-3">
                <label for="description" class="form-label">Short Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Brief description shown in listings"><?php echo e(old('description')); ?></textarea>
            </div>

            <div class="mb-3">
                <label for="long_description" class="form-label">Long Description</label>
                <textarea class="form-control" id="long_description" name="long_description" rows="5" placeholder="Detailed description shown on product page"><?php echo e(old('long_description')); ?></textarea>
            </div>

            <!-- Book Details -->
            <h6 class="mt-4 mb-3">Book Details</h6>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="language" class="form-label">Language</label>
                    <input type="text" class="form-control" id="language" name="language" value="<?php echo e(old('language', 'English')); ?>">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="format" class="form-label">Format</label>
                    <select class="form-select" id="format" name="format">
                        <option value="Hardcover" <?php echo e(old('format', 'Hardcover') == 'Hardcover' ? 'selected' : ''); ?>>Hardcover</option>
                        <option value="Paperback" <?php echo e(old('format') == 'Paperback' ? 'selected' : ''); ?>>Paperback</option>
                        <option value="eBook" <?php echo e(old('format') == 'eBook' ? 'selected' : ''); ?>>eBook</option>
                        <option value="Audiobook" <?php echo e(old('format') == 'Audiobook' ? 'selected' : ''); ?>>Audiobook</option>
                        <option value="Other" <?php echo e(old('format') == 'Other' ? 'selected' : ''); ?>>Other</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="pages" class="form-label">Number of Pages</label>
                    <input type="number" class="form-control" id="pages" name="pages" min="1" value="<?php echo e(old('pages')); ?>">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="country" class="form-label">Country of Publication</label>
                    <input type="text" class="form-control" id="country" name="country" value="<?php echo e(old('country', 'United States')); ?>">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="publish_date" class="form-label">Publish Date</label>
                    <input type="date" class="form-control" id="publish_date" name="publish_date" value="<?php echo e(old('publish_date')); ?>">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="publish_year" class="form-label">Publish Year</label>
                    <input type="number" class="form-control" id="publish_year" name="publish_year" min="1000" max="<?php echo e(date('Y')); ?>" value="<?php echo e(old('publish_year')); ?>">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="dimensions" class="form-label">Dimensions (e.g., 6 x 9 in)</label>
                    <input type="text" class="form-control" id="dimensions" name="dimensions" placeholder="e.g., 15 x 23 cm" value="<?php echo e(old('dimensions')); ?>">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="weight" class="form-label">Weight (kg)</label>
                    <input type="number" class="form-control" id="weight" name="weight" step="0.01" min="0" placeholder="e.g., 0.5" value="<?php echo e(old('weight')); ?>">
                </div>
            </div>

            <div class="mb-3">
                <label for="tags" class="form-label">Tags (comma-separated)</label>
                <input type="text" class="form-control" id="tags" name="tags" placeholder="e.g., Fiction, Bestseller, Adventure" value="<?php echo e(old('tags')); ?>">
            </div>

            <!-- Submit Buttons -->
            <button type="submit" class="btn btn-primary">Save Book</button>
            <a href="<?php echo e(route('admin.books.index')); ?>" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\The Final Project Folder\Edited-FinalProject\resources\views/admin/books-create.blade.php ENDPATH**/ ?>