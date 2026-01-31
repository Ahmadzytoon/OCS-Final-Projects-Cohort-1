<?php
    $isActive = request('category') == $category->id;
    $hasActiveChild = $category->children->contains('id', request('category'));
    $isOpen = $isActive || $hasActiveChild;
?>
<li class="nav-item category-item <?php echo e($isOpen ? 'expanded' : ''); ?>">
    <div class="d-flex align-items-center justify-content-between category-header">
        <a class="nav-link main-category-link <?php echo e($isActive ? 'active' : ''); ?>"
            href="<?php echo e(request()->fullUrlWithQuery(['category' => $category->id, 'page' => null])); ?>">
            <?php echo e($category->name); ?>

        </a>
        <?php if($category->children->count() > 0): ?>
            <button class="btn-toggle <?php echo e($isOpen ? 'open' : ''); ?>" type="button" data-bs-toggle="collapse" data-bs-target="#cat-<?php echo e($category->id); ?>" aria-expanded="<?php echo e($isOpen ? 'true' : 'false'); ?>">
                <i class="fas fa-chevron-down"></i>
            </button>
        <?php endif; ?>
    </div>
    
    <?php if($category->children->count() > 0): ?>
        <div class="collapse <?php echo e($isOpen ? 'show' : ''); ?>" id="cat-<?php echo e($category->id); ?>">
            <ul class="nav flex-column ms-3 mt-1 sub-categories">
                <?php $__currentLoopData = $category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="nav-item">
                        <a class="nav-link sub-category-link <?php echo e(request('category') == $child->id ? 'active' : ''); ?>" 
                           href="<?php echo e(request()->fullUrlWithQuery(['category' => $child->id, 'page' => null])); ?>">
                            <i class="fas fa-angle-right me-2"></i> <?php echo e($child->name); ?>

                        </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
</li>
<?php /**PATH C:\The Final Project Folder\Edited-FinalProject\resources\views/user/partials/category-item.blade.php ENDPATH**/ ?>