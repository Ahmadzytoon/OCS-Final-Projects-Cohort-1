

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/user/css/cart-page.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!-- Cursor follower -->
<div class="cursor-follower"></div>

<!-- Back To Top start -->
<button id="back-top" class="back-to-top">
    <i class="fa-solid fa-chevron-up"></i>
</button>

<!-- Breadcumb Section Start -->
<div class="breadcrumb-wrapper bg-cover section-padding"
    style="background-image: url(<?php echo e(asset('assets/user/images/hero/breadcrumb-bg.jpg')); ?>);">
    <div class="container">
        <div class="page-heading">
            <h1>Shopping Cart</h1>
            <div class="page-header">
                <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".3s">
                    <li><a href="<?php echo e(route('user.home')); ?>">Home</a></li>
                    <li><i class="fa-solid fa-chevron-right"></i></li>
                    <li>Shopping Cart</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Cart Section Start -->
<section class="cart-section section-padding pb-0">
    <div class="container">
        <div class="main-cart-wrapper">
            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo e(session('error')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($cart && $cart->items->count() > 0): ?>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="cart-table-area">
                            <table class="table cart-table">
                                <thead>
                                    <tr>
                                        <th class="product-header">Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $cart->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($item->book): ?>
                                            <tr>
                                                <td class="product-col">
                                                    <div class="d-flex align-items-center">
                                                        <div class="cart-actions d-flex flex-column gap-2 me-3">
                                                            <form action="<?php echo e(route('user.cart.remove', $item->id)); ?>" method="POST" class="d-inline">
                                                                <?php echo csrf_field(); ?>
                                                                <?php echo method_field('DELETE'); ?>
                                                                <button type="submit" class="remove-btn" title="Remove from cart">
                                                                    <i class="fas fa-times"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                        
                                                        <div class="cart-product-img">
                                                             <?php
                                                                $coverImage = $item->book->cover_image;
                                                                $imagePath = asset('assets/user/images/book/placeholder.png');
                                                                
                                                                if ($coverImage) {
                                                                    if (file_exists(public_path('storage/' . $coverImage))) {
                                                                        $imagePath = asset('storage/' . $coverImage);
                                                                    } elseif (file_exists(public_path('uploads/books/' . $coverImage))) {
                                                                        $imagePath = asset('uploads/books/' . $coverImage);
                                                                    } elseif (file_exists(public_path('storage/books/' . $coverImage))) {
                                                                        $imagePath = asset('storage/books/' . $coverImage);
                                                                    } elseif (file_exists(public_path($coverImage))) {
                                                                        $imagePath = asset($coverImage);
                                                                    }
                                                                }
                                                            ?>
                                                            <a href="<?php echo e(route('user.shop-details', $item->book->id)); ?>">
                                                                <img src="<?php echo e($imagePath); ?>" alt="<?php echo e($item->book->title); ?>" onerror="this.onerror=null; this.src='<?php echo e(asset('assets/user/images/book/placeholder.png')); ?>'">
                                                            </a>
                                                        </div>
                                                        <div class="cart-product-info">
                                                            <h5><a href="<?php echo e(route('user.shop-details', $item->book->id)); ?>"><?php echo e($item->book->title); ?></a></h5>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="price-col">
                                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($item->book->activeDiscount): ?>
                                                        <span class="price theme-color">$<?php echo e(number_format($item->book->final_price, 2)); ?></span>
                                                        <br><small><del class="text-muted">$<?php echo e(number_format($item->book->price, 2)); ?></del></small>
                                                    <?php else: ?>
                                                        <span class="price theme-color">$<?php echo e(number_format($item->book->price, 2)); ?></span>
                                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                </td>
                                                <td class="quantity-col">
                                                    <div class="cart-quantity">
                                                        <div class="quantity-control">
                                                            <form action="<?php echo e(route('user.cart.update')); ?>" method="POST" class="d-inline">
                                                                <?php echo csrf_field(); ?>
                                                                <input type="hidden" name="qty[<?php echo e($item->id); ?>]" value="<?php echo e(max(1, $item->quantity - 1)); ?>">
                                                                <button type="submit" class="qty-btn" <?php echo e($item->quantity <= 1 ? 'disabled' : ''); ?>>-</button>
                                                            </form>
                                                            <input type="text" value="<?php echo e($item->quantity); ?>" readonly>
                                                            <form action="<?php echo e(route('user.cart.update')); ?>" method="POST" class="d-inline">
                                                                <?php echo csrf_field(); ?>
                                                                <input type="hidden" name="qty[<?php echo e($item->id); ?>]" value="<?php echo e($item->quantity + 1); ?>">
                                                                <button type="submit" class="qty-btn">+</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="total-col">
                                                    <span class="total-price theme-color">$<?php echo e(number_format($item->book->final_price * $item->quantity, 2)); ?></span>
                                                </td>
                                            </tr>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="coupon-area mt-4 mb-5">
                             <form action="<?php echo e(route('user.cart.apply-coupon')); ?>" method="POST" class="d-flex gap-3 align-items-center">
                                <?php echo csrf_field(); ?>
                                <input type="text" name="coupon_code" class="form-control coupon-input" placeholder="Coupon Code" value="<?php echo e(old('coupon_code')); ?>">
                                <button class="theme-btn coupon-btn" type="submit">Apply</button>
                            </form>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="cart-total-box">
                            <h4>Cart Total</h4>
                            
                            <?php
                                $originalSubtotal = 0;
                                $bookDiscountTotal = 0;
                                
                                foreach($cart->items as $item) {
                                    if ($item->book) {
                                        $originalPrice = $item->book->price * $item->quantity;
                                        $originalSubtotal += $originalPrice;
                                        
                                        $itemTotal = $item->book->discount_amount > 0 
                                            ? ($item->book->discount_type === 'percentage' 
                                                ? $item->book->price - ($item->book->price * $item->book->discount_amount / 100)
                                                : $item->book->price - $item->book->discount_amount)
                                            : $item->book->price;
                                        // $bookDiscountTotal += ($originalPrice - ($itemTotal * $item->quantity));
                                        // Fix calculation: originalPrice is total original line price.
                                        // itemTotal is discounted unit price.
                                        // discountedLinePrice is itemTotal * quantity.
                                        $bookDiscountTotal += ($originalPrice - ($itemTotal * $item->quantity));
                                    }
                                }
                                
                                $couponDiscount = session('coupon_discount', 0);
                            ?>

                            <ul class="list-unstyled">
                                <li>
                                    <span>Subtotal:</span>
                                    <span class="price theme-color">$<?php echo e(number_format($originalSubtotal, 2)); ?></span>
                                </li>
                                
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($bookDiscountTotal > 0): ?>
                                    <li>
                                        <span>Discount:</span>
                                        <span class="price theme-color">-$<?php echo e(number_format($bookDiscountTotal, 2)); ?></span>
                                    </li>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($couponDiscount > 0): ?>
                                    <li>
                                        <span>
                                            Coupon:
                                            <form action="<?php echo e(route('user.cart.remove-coupon')); ?>" method="POST" class="d-inline ms-1">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn p-0 border-0 bg-transparent text-danger" style="font-size: 0.8rem; text-decoration: underline;">
                                                    (Remove)
                                                </button>
                                            </form>
                                        </span>
                                        <span class="price theme-color">-$<?php echo e(number_format($couponDiscount, 2)); ?></span>
                                    </li>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                
                                <li>
                                    <span>Shipping:</span>
                                    <span class="price">Free</span>
                                </li>
                                
                                <li class="total-border">
                                    <span>Total:</span>
                                    <span class="price theme-color">$<?php echo e(number_format($finalTotal ?? $total ?? 0, 2)); ?></span>
                                </li>
                            </ul>
                            <a href="<?php echo e(route('user.checkout')); ?>" class="theme-btn w-100 text-center">Proceed To Checkout</a>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="empty-cart text-center py-5">
                    <div class="mb-4">
                        <i class="fas fa-shopping-cart fa-4x text-muted"></i>
                    </div>
                    <h4 class="mb-3">Your cart is empty</h4>
                    <p class="text-muted mb-4">Add some books to your cart to see them here!</p>
                    <a href="<?php echo e(route('user.shop')); ?>" class="theme-btn">
                        <i class="fas fa-book-reader me-1"></i> Start Shopping
                    </a>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</section>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('assets/user/js/cart-page.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Last Backup Edited Final Project 30-1-2026\Edited-FinalProject\resources\views/user/shop-cart.blade.php ENDPATH**/ ?>