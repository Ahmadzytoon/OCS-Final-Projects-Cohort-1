
<?php $__env->startSection('title', 'Author Management'); ?>
<?php $__env->startSection('page-title', 'Author Management'); ?>

<?php $__env->startSection('content'); ?>
<div class="table-container">
    <div class="table-header">
        <h5 class="mb-0"><i class="fas fa-user-edit me-2"></i> Author Management</h5>
        <a href="<?php echo e(route('admin.authors.create')); ?>" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i> Add Author
        </a>
    </div>
    
    <div style="padding: 0 2rem;">
        <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
                <i class="fas fa-check-circle me-2"></i><?php echo e(session('success')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
        
        <?php if(session('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i><?php echo e(session('error')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Author Name</th>
                    <th>Bio</th>
                    <th>Books Count</th>
                    <th>Added</th>
                    <th class="text-nowrap">Actions</th> <!-- Prevent wrapping -->
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($author->id); ?></td>
                    <td><?php echo e($author->name); ?></td>
                    <td style="max-width: 200px;" class="text-truncate"><?php echo e($author->biography ?? 'N/A'); ?></td>
                    <td><?php echo e($author->books_count); ?></td>
                    <td><?php echo e($author->created_at->format('Y-m-d')); ?></td>
                    <td class="text-nowrap">
                        <div class="d-flex gap-1">
                            <a href="<?php echo e(route('admin.authors.show', $author->id)); ?>" class="btn btn-sm btn-info action-btn">
                                <i class="fas fa-eye"></i>
                            </a>
                            
                            
                            <!-- SweetAlert Delete Button -->
                            <button type="button" 
                                    class="btn btn-sm btn-danger action-btn delete-author-btn" 
                                    data-author-id="<?php echo e($author->id); ?>"
                                    data-author-name="<?php echo e($author->name); ?>"
                                    data-books-count="<?php echo e($author->books_count); ?>"
                                    data-delete-url="<?php echo e(route('admin.authors.destroy', $author->id)); ?>">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="6" class="text-center">No authors found</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>




    <div class="d-flex justify-content-center mt-4">
        <nav aria-label="Category pagination">
            <ul class="pagination pagination-sm">
                
                <?php if($authors->onFirstPage()): ?>
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">« Previous</span>
                    </li>
                <?php else: ?>
                    <li class="page-item">
                        <a class="page-link" href="<?php echo e($authors->previousPageUrl()); ?>" rel="prev">« Previous</a>
                    </li>
                <?php endif; ?>

                
                <?php if($authors->hasMorePages()): ?>
                    <li class="page-item">
                        <a class="page-link" href="<?php echo e($authors->nextPageUrl()); ?>" rel="next">Next »</a>
                    </li>
                <?php else: ?>
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">Next »</span>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>












<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('assets/js/authors.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\The Final Project Folder\Edited-FinalProject\resources\views/admin/authors.blade.php ENDPATH**/ ?>