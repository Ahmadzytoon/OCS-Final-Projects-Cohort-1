
<?php $__env->startSection('title', 'Book Management'); ?>
<?php $__env->startSection('page-title', 'Book Management'); ?>


<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/books.css')); ?>">
<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>
<div class="table-container">
    <div class="table-header">
        <h5 class="mb-0"><i class="fas fa-book me-2"></i> Book Management</h5>
        <a href="<?php echo e(route('admin.books.create')); ?>" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i> Add Book
        </a>
    </div>
    

    <div style="padding: 0 2rem;">
        
        <div class="row mb-4 g-3">
            <div class="col-md-5 col-lg-4">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input
                        type="text"
                        class="form-control"
                        id="searchBooks"
                        placeholder="Search by title, ISBN, author..."
                    >
                </div>
            </div>
            <div class="col-md-3 col-lg-3">
                <select class="form-select" id="filterCategory">
                    <option value="">All Categories</option>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                        <option value="<?php echo e(strtolower($category->name)); ?>"><?php echo e($category->name); ?></option>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </select>
            </div>
            <div class="col-md-3 col-lg-3">
                <select class="form-select" id="filterStock">
                    <option value="">All Stock Status</option>
                    <option value="in">In Stock</option>
                    <option value="low">Low Stock</option>
                    <option value="out">Out of Stock</option>
                </select>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Cover</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody id="booksTableBody">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <?php
                    $stockType = $book->stock_quantity > 10 ? 'in' : ($book->stock_quantity > 0 ? 'low' : 'out');
                ?>
                <tr
                    data-title="<?php echo e(strtolower($book->title)); ?>"
                    data-isbn="<?php echo e(strtolower($book->isbn)); ?>"
                    data-author="<?php echo e(strtolower($book->author->name ?? '')); ?>"
                    data-category="<?php echo e(strtolower($book->category->name ?? '')); ?>"
                    data-stock="<?php echo e($stockType); ?>"
                >
                    <td class="text-center"><?php echo e($book->id); ?></td>
                    
                    <td class="text-center">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($book->cover_image): ?>
                            <img src="<?php echo e(asset('uploads/books/' . $book->cover_image)); ?>"
                                 class="img-thumbnail"
                                 style="width:50px;height:70px;object-fit:cover;border-radius:4px;">
                        <?php else: ?>
                            <div class="bg-light border rounded"
                                 style="width:50px;height:70px;display:flex;align-items:center;justify-content:center;">
                                <i class="fas fa-book text-muted"></i>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </td>
                    
                    <td style="max-width: 200px;" class="text-truncate fw-bold">
                        <?php echo e($book->title); ?>

                      
                    </td>
                    
                    <td style="max-width: 150px;" class="text-truncate"><?php echo e($book->author->name ?? 'N/A'); ?></td>
                    <td style="max-width: 150px;" class="text-truncate"><?php echo e($book->category->name ?? 'N/A'); ?></td>
                    
                    <td class="text-center">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($book->activeDiscount): ?>
                            <div class="text-decoration-line-through text-muted small">
                                $<?php echo e(number_format($book->price, 2)); ?>

                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <div class="fw-bold text-primary">
                            $<?php echo e(number_format($book->final_price, 2)); ?>

                        </div>
                    </td>
                    
                    <td class="text-center">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($book->stock_quantity > 10): ?>
                            <span class="badge bg-success"><?php echo e($book->stock_quantity); ?></span>
                        <?php elseif($book->stock_quantity > 0): ?>
                            <span class="badge bg-warning"><?php echo e($book->stock_quantity); ?></span>
                        <?php else: ?>
                            <span class="badge bg-danger">Out</span>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </td>
                    
                   
                    
                    <td class="text-center">
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" 
                                    type="button" 
                                    id="actionMenu<?php echo e($book->id); ?>" 
                                    data-bs-toggle="dropdown" 
                                    aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="actionMenu<?php echo e($book->id); ?>">
                                <li>
                                    <a class="dropdown-item text-info" href="<?php echo e(route('admin.books.show', $book->id)); ?>">
                                        <i class="fas fa-eye me-2"></i> View Details
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-warning" href="<?php echo e(route('admin.books.edit', $book->id)); ?>">
                                        <i class="fas fa-edit me-2"></i> Edit Book
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($book->activeDiscount): ?>
                                    <li>
                                        <button class="dropdown-item text-warning edit-discount-btn"
                                                data-bs-toggle="modal"
                                                data-bs-target="#discountModal"
                                                data-book-id="<?php echo e($book->id); ?>"
                                                data-discount-url="<?php echo e(route('admin.books.discount.store', $book->id)); ?>"
                                                data-discount-type="<?php echo e($book->activeDiscount->discount_type); ?>"
                                                data-discount-amount="<?php echo e($book->activeDiscount->discount_amount); ?>"
                                                data-valid-until="<?php echo e($book->activeDiscount->valid_until ? $book->activeDiscount->valid_until->format('Y-m-d\TH:i') : ''); ?>">
                                            <i class="fas fa-tag me-2"></i> Edit Discount
                                        </button>
                                    </li>
                                    <li>
                                        <button class="dropdown-item text-danger remove-discount-btn"
                                                data-book-id="<?php echo e($book->id); ?>"
                                                data-book-title="<?php echo e($book->title); ?>"
                                                data-delete-url="<?php echo e(route('admin.books.discount.remove', $book->id)); ?>">
                                            <i class="fas fa-trash me-2"></i> Remove Discount
                                        </button>
                                    </li>
                                <?php else: ?>
                                    <li>
                                        <button class="dropdown-item text-success add-discount-btn"
                                                data-bs-toggle="modal"
                                                data-bs-target="#discountModal"
                                                data-book-id="<?php echo e($book->id); ?>"
                                                data-discount-url="<?php echo e(route('admin.books.discount.store', $book->id)); ?>">
                                            <i class="fas fa-tag me-2"></i> Add Discount
                                        </button>
                                    </li>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <button class="dropdown-item text-danger delete-book-btn"
                                            data-book-title="<?php echo e($book->title); ?>"
                                            data-delete-url="<?php echo e(route('admin.books.destroy', $book->id)); ?>">
                                        <i class="fas fa-trash me-2"></i> Delete Book
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                <tr>
                    <td colspan="9" class="text-center py-4">
                        <i class="fas fa-book-open fa-3x text-muted mb-2 d-block"></i>
                        <p class="text-muted mb-0">No books found</p>
                    </td>
                </tr>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-4">
        <nav aria-label="Book pagination">
            <ul class="pagination pagination-sm">
                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($books->onFirstPage()): ?>
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">« Previous</span>
                    </li>
                <?php else: ?>
                    <li class="page-item">
                        <a class="page-link" href="<?php echo e($books->previousPageUrl()); ?>" rel="prev">« Previous</a>
                    </li>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($books->hasMorePages()): ?>
                    <li class="page-item">
                        <a class="page-link" href="<?php echo e($books->nextPageUrl()); ?>" rel="next">Next »</a>
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


<div class="modal fade" id="discountModal" tabindex="-1" aria-labelledby="discountModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="discountForm" method="POST">
                <?php echo csrf_field(); ?>
                
                <div class="modal-header">
                    <h5 class="modal-title" id="discountModalLabel">Add Discount</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="book_id" name="book_id">
                    
                    <div class="mb-3">
                        <label for="discount_type" class="form-label">Discount Type <span class="text-danger">*</span></label>
                        <select class="form-select" id="discount_type" name="discount_type" required>
                            <option value="percentage">Percentage (%)</option>
                            <option value="fixed">Fixed Amount ($)</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="discount_amount" class="form-label">Discount Amount <span class="text-danger">*</span></label>
                        <input type="number" step="0.01" min="0" class="form-control" id="discount_amount" name="discount_amount" required>
                        <div class="form-text">For percentage: 0-100. For fixed: cannot exceed book price.</div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="valid_until" class="form-label">Valid Until (Optional)</label>
                        <input type="datetime-local" class="form-control" id="valid_until" name="valid_until">
                        <div class="form-text">Leave blank for no expiration</div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Apply Discount</button>
                </div>
            </form>
        </div>
    </div>
</div>

<form id="removeDiscountForm" method="POST" style="display:none;">
    <?php echo csrf_field(); ?>
    <?php echo method_field('DELETE'); ?>
</form>
<?php $__env->stopSection(); ?>



<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('assets/admin/js/books.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Last Backup Edited Final Project 30-1-2026\Edited-FinalProject\resources\views/admin/books.blade.php ENDPATH**/ ?>