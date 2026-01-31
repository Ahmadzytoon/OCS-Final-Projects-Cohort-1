
<?php $__env->startSection('title', 'Book Details: ' . $book->title); ?>
<?php $__env->startSection('page-title', 'Book Details'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5>Book Details</h5>
        <a href="<?php echo e(route('admin.books.index')); ?>" class="btn btn-secondary">Back to Books</a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 text-center">
                <?php if($book->cover_image): ?>
                    <img src="<?php echo e(asset('uploads/books/' . $book->cover_image)); ?>" alt="Cover" style="max-width: 100%; height: auto; border-radius: 5px;">
                <?php else: ?>
                    <div style="width: 200px; height: 300px; background: #ddd; border-radius: 5px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-book fa-3x text-muted"></i>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-md-8">
                <div class="mb-3">
                    <strong>Title:</strong> <?php echo e($book->title); ?>

                </div>
                <div class="mb-3">
                    <strong>ISBN:</strong> <?php echo e($book->isbn); ?>

                </div>
                <div class="mb-3">
                    <strong>Author:</strong> <?php echo e($book->author->name ?? 'N/A'); ?>

                </div>
                <div class="mb-3">
                    <strong>Category:</strong> <?php echo e($book->category->name ?? 'N/A'); ?>

                </div>
                <div class="mb-3">
                    <strong>Price:</strong> $<?php echo e(number_format($book->price, 2)); ?>

                </div>
                <div class="mb-3">
                    <strong>Stock Quantity:</strong> <?php echo e($book->stock_quantity); ?>

                </div>
                <div class="mb-3">
                    <strong>Status:</strong> 
                    <span class="status-badge <?php echo e($book->status == 'Active' ? 'badge-active' : 'badge-inactive'); ?>">
                        <?php echo e($book->status); ?>

                    </span>
                </div>
                <?php if($book->description): ?>
                    <div class="mb-3">
                        <strong>Description:</strong>
                        <p><?php echo e($book->description); ?></p>
                    </div>
                <?php endif; ?>
                <div class="mt-4">
                    <a href="<?php echo e(route('admin.books.edit', $book->id)); ?>" class="btn btn-warning">
                        <i class="fas fa-edit me-2"></i> Edit Book
                    </a>
                    <button type="button" class="btn btn-danger delete-book-btn" 
                            data-book-id="<?php echo e($book->id); ?>"
                            data-book-title="<?php echo e($book->title); ?>"
                            data-delete-url="<?php echo e(route('admin.books.destroy', $book->id)); ?>">
                        <i class="fas fa-trash me-2"></i> Delete Book
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('assets/js/books-show.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\The Final Project Folder\Edited-FinalProject\resources\views/admin/books-show.blade.php ENDPATH**/ ?>