<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/user/css/navbar.css')); ?>">
<?php $__env->stopPush(); ?>

<!-- Header Section Start (navbar) -->
<header class="header-1">
    <div class="container-fluid">
        <div class="mega-menu-wrapper" style="padding: 5px 0;">
            <div class="header-main d-flex justify-content-between align-items-center" style="gap: 40px;">

                <!-- LOGO -->
                <div class="logo">
                    <a href="<?php echo e(route('user.home')); ?>" class="header-logo d-flex align-items-center gap-2 text-decoration-none">
                        <img src="<?php echo e(asset('uploads/books/main logo icon.jpg')); ?>" alt="Readify Icon" style="height: 55px; width: auto; border-radius: 8px;">
                        <span class="readify-text">Readify</span>
                    </a>
                </div>

                <!-- MENU -->
                <div class="mean__menu-wrapper">
                    <div class="main-menu">
                        <nav id="mobile-menu" style="display: block;">
                            <ul>
                                <li><a href="<?php echo e(route('user.home')); ?>">Home</a></li>

                                <li>
                                    <a href="<?php echo e(route('user.shop')); ?>">
                                        Shop
                                        <i class="fas fa-angle-down"></i>
                                    </a>
                                    <ul class="submenu">
                                        <li><a href="<?php echo e(route('user.shop')); ?>">Shop</a></li>
                                        <li><a href="<?php echo e(route('user.checkout')); ?>">Checkout</a></li>
                                    </ul>
                                </li>

                                <li class="has-dropdown">
                                    <a href="<?php echo e(route('user.about')); ?>">
                                        Pages
                                        <i class="fas fa-angle-down"></i>
                                    </a>
                                    <ul class="submenu">
                                        <li><a href="<?php echo e(route('user.about')); ?>">About Us</a></li>
                                        <li><a href="<?php echo e(route('user.team')); ?>">Author</a></li>
                                        <li><a href="<?php echo e(route('user.faq')); ?>">Faq's</a></li>
                                    </ul>
                                </li>

                                <li><a href="<?php echo e(route('user.contact')); ?>">Contact</a></li>

                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- RIGHT SIDE -->
                <div class="header-right d-flex justify-content-end align-items-center">
                    <!-- SEARCH ICON -->
                    <a href="#0" class="search-trigger search-icon style-2 d-xl-none">
                        <i class="fa-regular fa-magnifying-glass"></i>
                    </a>

                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
                        <div class="nav-user-dropdown-wrapper mx-3">
                            <a href="#" class="nav-user-icon" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-regular fa-user"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow border-0" aria-labelledby="userDropdown">
                                <li class="px-3 py-2 border-bottom mb-2">
                                    <span class="fw-bold fs-6">Hi, <?php echo e(auth()->user()->name); ?></span>
                                </li>
                                <li><a class="dropdown-item py-2" href="<?php echo e(route('user.profile')); ?>"><i class="fa-regular fa-circle-user me-2"></i>My Profile</a></li>
                                <li><a class="dropdown-item py-2" href="<?php echo e(route('user.orders')); ?>"><i class="fa-regular fa-box me-2"></i>My Orders</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="<?php echo e(route('logout')); ?>" method="POST" class="m-0">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="dropdown-item py-2 text-danger"><i class="fa-solid fa-arrow-right-from-bracket me-2"></i>Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    <?php else: ?>
                        <div class="nav-user-dropdown-wrapper mx-3">
                            <a href="<?php echo e(route('login')); ?>" class="nav-user-icon">
                                <i class="fa-regular fa-user"></i>
                            </a>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <div class="header-icon-wrapper mx-3">
                        <a href="<?php echo e(route('user.wishlist')); ?>" class="nav-user-icon position-relative" id="wishlist-link">
                            <i class="fa-regular fa-heart"></i>
                            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('user.wishlist-counter', []);

$key = null;
$__componentSlots = [];

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-1928641316-0', $key);

$__html = app('livewire')->mount($__name, $__params, $key, $__componentSlots);

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__componentSlots);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                        </a>
                    </div>

                    
                    <div class="menu-cart">
                        <?php
                            if (auth()->check()) {
                                $cart = \App\Models\Cart::where('user_id', auth()->id())
                                            ->with(['items.book' => function($q) {
                                                $q->where('status', 'Active');
                                            }])
                                            ->first();
                                
                                $cartItems = $cart 
                                    ? $cart->items->filter(fn($item) => $item->book !== null) 
                                    : collect();
                                
                                $cartCount = $cartItems->sum('quantity');
                                $cartTotal = $cartItems->sum(fn($item) => $item->book->price * $item->quantity);
                            } else {
                                $cartItems = collect();
                                $cartCount = 0;
                                $cartTotal = 0;
                            }
                        ?>

                        <div class="cart-box">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($cartItems->count()): ?>
                                <ul>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                        <li>
                                            <img 
                                                src="<?php echo e($item->book->cover_image 
                                                    ? asset('storage/' . $item->book->cover_image) 
                                                    : asset('assets/user/images/book/placeholder.png')); ?>" 
                                                alt="<?php echo e($item->book->title); ?>">
                                            <div class="cart-product">
                                                <div class="cart-ctx">
                                                    <a href="<?php echo e(route('user.shop-details', $item->book->id)); ?>">
                                                        <?php echo e($item->book->title); ?>

                                                    </a>
                                                    <span>$<?php echo e(number_format($item->book->price, 2)); ?></span>
                                                </div>
                                                <form action="<?php echo e(route('user.cart.remove', $item->id)); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="bg-transparent border-0" title="Remove item">
                                                        <i class="fa-solid fa-xmark"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </li>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                </ul>
                                <div class="shopping-items">
                                    <span>Total:</span>
                                    <span>$<?php echo e(number_format($cartTotal, 2)); ?></span>
                                </div>
                                <div class="cart-button mb-4">
                                    <a href="<?php echo e(route('user.shop-cart')); ?>" class="theme-btn">View Cart</a>
                                </div>
                            <?php else: ?>
                                <p class="text-center px-3 py-2">Your cart is empty</p>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>

                        <a href="<?php echo e(route('user.shop-cart')); ?>" class="cart-icon">
                            <i class="fa-sharp fa-regular fa-bag-shopping"></i>
                            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('user.cart-counter', []);

$key = null;
$__componentSlots = [];

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-1928641316-1', $key);

$__html = app('livewire')->mount($__name, $__params, $key, $__componentSlots);

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__componentSlots);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                        </a>
                    </div>

                    <!-- MOBILE MENU -->
                    <div class="header__hamburger d-xl-none my-auto">
                        <div class="sidebar__toggle">
                            <i class="fas fa-bars"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<?php /**PATH C:\Last Backup Edited Final Project 30-1-2026\Edited-FinalProject\resources\views/user/navbar.blade.php ENDPATH**/ ?>