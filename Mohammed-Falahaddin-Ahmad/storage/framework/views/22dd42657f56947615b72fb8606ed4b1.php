

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('user/assets/css/cart-page.css')); ?>">
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
    style="background-image: url(<?php echo e(asset('user/assets/img/hero/breadcrumb-bg.jpg')); ?>);">
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
            
            <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            
            <?php if(session('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo e(session('error')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?php if($cart && $cart->items->count() > 0): ?>
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
                                    <?php $__currentLoopData = $cart->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($item->book): ?>
                                            <tr>
                                                <td class="product-col">
                                                    <div class="d-flex align-items-center">
                                                        <form action="<?php echo e(route('user.cart.remove', $item->id)); ?>" method="POST" class="d-inline">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('DELETE'); ?>
                                                            <button type="submit" class="remove-btn">
                                                                <i class="fas fa-times"></i>
                                                            </button>
                                                        </form>
                                                        
                                                        <div class="cart-product-img">
                                                             <?php
                                                                $coverImage = $item->book->cover_image;
                                                                $imagePath = asset('user/assets/img/book/placeholder.png');
                                                                
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
                                                                <img src="<?php echo e($imagePath); ?>" alt="<?php echo e($item->book->title); ?>" onerror="this.onerror=null; this.src='<?php echo e(asset('user/assets/img/book/placeholder.png')); ?>'">
                                                            </a>
                                                        </div>
                                                        <div class="cart-product-info">
                                                            <h5><a href="<?php echo e(route('user.shop-details', $item->book->id)); ?>"><?php echo e($item->book->title); ?></a></h5>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="price-col">
                                                    <span class="price theme-color">$<?php echo e(number_format($item->book->price, 2)); ?></span>
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
                                                    <span class="total-price theme-color">$<?php echo e(number_format($item->book->price * $item->quantity, 2)); ?></span>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                
                                <?php if($bookDiscountTotal > 0): ?>
                                    <li>
                                        <span>Discount:</span>
                                        <span class="price theme-color">-$<?php echo e(number_format($bookDiscountTotal, 2)); ?></span>
                                    </li>
                                <?php endif; ?>

                                <?php if($couponDiscount > 0): ?>
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
                                <?php endif; ?>
                                
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
            <?php endif; ?>
        </div>
    </div>
</section>

<style>
    /* Cart Redesign CSS */
    .cart-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 0;
    }
    
    .cart-table th {
        font-size: 18px;
        font-weight: 700;
        color: #1a1a1a;
        border: none;
        padding-bottom: 20px;
        text-align: center;
    }
    
    .cart-table th.product-header {
        text-align: left;
        padding-left: 20px;
    }
    
    .cart-table td {
        border-top: 1px solid #eee;
        border-bottom: none;
        vertical-align: middle;
        padding: 30px 10px;
        text-align: center;
    }
    
    .cart-table td.product-col {
        text-align: left;
    }
    
    .remove-btn {
        width: 30px;
        height: 30px;
        border: 1px solid #eee;
        border-radius: 50%;
        background: transparent;
        color: #777;
        font-size: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 20px;
        transition: all 0.3s;
    }
    
    .remove-btn:hover {
        background: #ff7b6b;
        color: #fff;
        border-color: #ff7b6b;
    }
    
    .cart-product-img {
        width: 60px;
        height: 80px;
        margin-right: 20px;
        flex-shrink: 0;
    }
    
    .cart-product-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .cart-product-info h5 {
        margin: 0;
        font-size: 16px;
        font-weight: 600;
        line-height: 1.4;
    }
    
    .cart-product-info h5 a {
        color: #1a1a1a;
        text-decoration: none;
        transition: 0.3s;
    }
    
    .cart-product-info h5 a:hover {
        color: #ff7b6b;
    }
    
    .theme-color {
        color: #ff7b6b;
        font-weight: 600;
    }
    
    .price-col .price {
        font-size: 16px;
    }
    
    .total-col .total-price {
        font-size: 16px;
    }
    
    /* Quantity Control */
    .quantity-control {
        display: inline-flex;
        align-items: center;
        border: 1px solid #eee;
        border-radius: 5px;
        padding: 5px;
    }
    
    .qty-btn {
        border: none;
        background: transparent;
        width: 30px;
        height: 30px;
        font-size: 18px;
        color: #333;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: 0.3s;
    }
    
    .qty-btn:hover:not(:disabled) {
        color: #ff7b6b;
    }
    
    .quantity-control input {
        width: 40px;
        border: none;
        text-align: center;
        font-weight: 600;
        color: #1a1a1a;
        padding: 0;
        background: transparent;
    }

    /* Coupon Area */
    .coupon-input {
        max-width: 250px;
        border-radius: 0;
        border: 1px solid #eee;
        padding: 12px 20px;
    }
    
    .coupon-btn {
        padding: 12px 30px !important;
        background-color: #ff7b6b;
        color: #fff;
    }
    .update-btn {
        padding: 12px 30px !important;
        background-color: #ff7b6b;
        color: #fff;
        margin-left: auto; /* Push to right if space allows */
    }

    /* Cart Summary Box */
    .cart-total-box {
        border: 1px solid #eee;
        padding: 30px;
        border-radius: 5px;
    }
    
    .cart-total-box h4 {
        margin-bottom: 25px;
        font-size: 20px;
        font-weight: 700;
    }
    
    .cart-total-box ul {
        margin-bottom: 25px;
        padding: 0;
    }
    
    .cart-total-box ul li {
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;
        color: #555;
        font-size: 16px;
    }
    
    .cart-total-box ul li.total-border {
        border-top: 1px solid #eee;
        padding-top: 15px;
        margin-top: 15px;
        margin-bottom: 0;
        color: #1a1a1a;
        font-weight: 600;
    }
    
    .cart-total-box .price {
        font-weight: 600;
    }
    
    .cart-total-box .theme-btn {
        padding: 15px 30px;
        border-radius: 50px; /* Rounded button style */
    }
</style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('user/assets/js/cart-page.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\The Final Project Folder\Edited-FinalProject\resources\views/user/shop-cart.blade.php ENDPATH**/ ?>