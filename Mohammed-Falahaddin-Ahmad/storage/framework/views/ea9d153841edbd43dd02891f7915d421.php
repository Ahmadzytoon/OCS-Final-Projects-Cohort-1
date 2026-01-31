
<?php $__env->startSection('title', 'Author Details: ' . $author->name); ?>
<?php $__env->startSection('page-title', 'Author Details'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5>Author Details</h5>
        <a href="<?php echo e(route('admin.authors.index')); ?>" class="btn btn-secondary">Back to Authors</a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <strong>Author Name:</strong> <?php echo e($author->name); ?>

                </div>

                <?php if($author->biography): ?>
                    <div class="mb-3">
                        <strong>Biography:</strong>
                        <p><?php echo e($author->biography); ?></p>
                    </div>
                <?php endif; ?>

                <div class="mb-3">
                    <strong>Books Count:</strong> 
                    <?php echo e($author->books->count() ?? 0); ?> 
                </div>

                <div class="mb-3">
                    <strong>Added:</strong> <?php echo e($author->created_at->format('Y-m-d')); ?>

                </div>

                <?php if($author->books->count() > 0): ?>
                    <div class="mt-4">
                        <h6>Books by <?php echo e($author->name); ?>:</h6>
                        <ul class="list-group">
                            <?php $__currentLoopData = $author->books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <?php echo e($book->title); ?>

                                    <span class="badge bg-primary rounded-pill"><?php echo e($book->created_at->format('Y')); ?></span>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php else: ?>
                    <div class="mt-4">
                        <p>No books found for this author.</p>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('assets/js/admin-author-show.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\The Final Project Folder\Edited-FinalProject\resources\views/admin/authors-show.blade.php ENDPATH**/ ?>