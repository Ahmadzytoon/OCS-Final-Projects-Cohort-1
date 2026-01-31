
<?php $__env->startSection('title', 'Category Management'); ?>
<?php $__env->startSection('page-title', 'Category Management'); ?>

<?php $__env->startSection('content'); ?>
<div class="table-container">
    <div class="table-header">
        <h5 class="mb-0"><i class="fas fa-list me-2"></i> Category Management</h5>
        <a href="<?php echo e(route('admin.categories.create')); ?>" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i> Add Category
        </a>
    </div>
    
    <div style="padding: 0 2rem;">


    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Books Count</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <tr>
                    <td><?php echo e($category->id); ?></td>
                    <td>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($category->parent_id): ?>
                            <span class="text-muted ms-3">└─</span> <?php echo e($category->name); ?>

                            <small class="text-muted">(<?php echo e($category->parent->name); ?>)</small>
                        <?php else: ?>
                            <strong><?php echo e($category->name); ?></strong>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </td>
                    <td><?php echo e($category->books_count); ?></td>
                  
                    <td><?php echo e($category->created_at->format('Y-m-d')); ?></td>
                    <td>
                        <a href="<?php echo e(route('admin.categories.edit', $category->id)); ?>" class="btn btn-sm btn-warning action-btn">
                            <i class="fas fa-edit"></i>
                        </a>
                        
                        <button type="button" 
                                class="btn btn-sm btn-danger action-btn delete-category-btn" 
                                data-category-id="<?php echo e($category->id); ?>"
                                data-category-name="<?php echo e($category->name); ?>"
                                data-books-count="<?php echo e($category->books_count); ?>"
                                data-delete-url="<?php echo e(route('admin.categories.destroy', $category->id)); ?>">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                <tr>
                    <td colspan="6" class="text-center">No categories found</td>
                </tr>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-4">
        <nav aria-label="Category pagination">
            <ul class="pagination pagination-sm">
                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($categories->onFirstPage()): ?>
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">« Previous</span>
                    </li>
                <?php else: ?>
                    <li class="page-item">
                        <a class="page-link" href="<?php echo e($categories->previousPageUrl()); ?>" rel="prev">« Previous</a>
                    </li>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($categories->hasMorePages()): ?>
                    <li class="page-item">
                        <a class="page-link" href="<?php echo e($categories->nextPageUrl()); ?>" rel="next">Next »</a>
                    </li>
                <?php else: ?>
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">Next »</span>
                    </li>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </ul>
        </nav>
    </div>

</div>
<?php $__env->stopSection(); ?>









<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('assets/admin/js/categories.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Last Backup Edited Final Project 30-1-2026\Edited-FinalProject\resources\views/admin/categories.blade.php ENDPATH**/ ?>