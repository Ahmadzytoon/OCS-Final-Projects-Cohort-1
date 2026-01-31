<!-- Header Section Start (navbar) -->
<header id="header-sticky" class="header-1">
    <div class="container-fluid">
        <div class="mega-menu-wrapper" style="padding: 10px 0;">
            <div class="header-main d-flex justify-content-between align-items-center" style="gap: 40px;">

                <!-- LOGO -->
                <div class="logo">
                    <a href="<?php echo e(route('user.home')); ?>" class="header-logo d-flex align-items-center gap-2 text-decoration-none">
                        <img src="<?php echo e(asset('uploads/books/main logo icon.jpg')); ?>" alt="Readify Icon" style="height: 50px; width: auto; border-radius: 8px;">
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

                    
                    <?php if(auth()->guard()->check()): ?>
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
                    <?php endif; ?>

                    
                    <div class="header-icon-wrapper mx-3">
                        <a href="<?php echo e(route('user.wishlist')); ?>" class="nav-user-icon position-relative" id="wishlist-link">
                            <i class="fa-regular fa-heart"></i>
                            <?php
                                $wishlistCount = auth()->check() 
                                    ? auth()->user()->wishlists()->count() 
                                    : 0;
                            ?>
                            <?php if($wishlistCount > 0): ?>
                                <span class="number" id="wishlist-count"><?php echo e($wishlistCount); ?></span>
                            <?php else: ?>
                                <span class="number" id="wishlist-count" style="display: none;">0</span>
                            <?php endif; ?>
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
                            <?php if($cartItems->count()): ?>
                                <ul>
                                    <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <img 
                                                src="<?php echo e($item->book->cover_image 
                                                    ? asset('storage/' . $item->book->cover_image) 
                                                    : asset('user/assets/img/book/placeholder.png')); ?>" 
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
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                            <?php endif; ?>
                        </div>

                        <a href="<?php echo e(route('user.shop-cart')); ?>" class="cart-icon">
                            <i class="fa-sharp fa-regular fa-bag-shopping"></i>
                            <?php if($cartCount > 0): ?>
                                <span class="number"><?php echo e($cartCount); ?></span>
                            <?php endif; ?>
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


<style>
    /* Creative Logo Styling */
    .readify-text {
        font-size: 30px;
        font-weight: 800;
        letter-spacing: -0.5px;
        background: linear-gradient(45deg, #333, #ff7b6b);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-family: 'Outfit', sans-serif;
    }

    /* Standardized Navbar Spacing */
    .header-main {
        padding: 0 15px;
    }

    .header-right {
        gap: 30px !important;
    }

    .nav-user-dropdown-wrapper, 
    .header-icon-wrapper, 
    .menu-cart {
        margin: 0 !important;
        display: flex;
        align-items: center;
    }

    /* Style for dynamic cart count badge */
    .header-1 .header-main .header-right .menu-cart .cart-icon .number {
        position: absolute;
        top: -7px;
        right: -8px;
        width: 20px;
        line-height: 20px;
        height: 20px;
        border-radius: 50px;
        background-color: var(--theme);
        color: var(--white);
        font-size: 12px;
        text-align: center;
        font-weight: 500;
        display: inline-block;
    }

    /* Wishlist & Auth icon count badge */
    .header-main .header-right .nav-user-icon .number {
        position: absolute;
        top: -9px;
        right: -10px;
        width: 18px;
        height: 18px;
        border-radius: 50px;
        line-height: 18px;
        text-align: center;
        background-color: var(--theme);
        color: var(--white);
        font-size: 10px;
        font-weight: 400;
        display: inline-block;
    }

    /* Highlight current page in user dropdown */
    .submenu li a.active-item {
        background-color: #f8f9ff !important;
        color: #4361ee !important;
        font-weight: 500;
        position: relative;
        padding-left: 18px;
    }
    .submenu li a.active-item::before {
        content: '';
        position: absolute;
        left: 8px;
        top: 50%;
        transform: translateY(-50%);
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background-color: #4361ee;
    }
    .submenu li a.active-item:hover {
        background-color: #f0f3ff !important;
        color: #3a56e0 !important;
    }
    
    /* Improve logout button styling */
    .dropdown-logout-btn {
        background: none !important;
        border: none !important;
        padding: 10px 20px !important;
        width: 100% !important;
        text-align: left !important;
        color: #e74c3c !important;
        font-weight: 500 !important;
        cursor: pointer !important;
        display: flex !important;
        align-items: center !important;
        border-radius: 4px !important;
        transition: all 0.2s ease !important;
    }
    .dropdown-logout-btn:hover {
        background-color: #fff5f5 !important;
        color: #c0392b !important;
        transform: translateX(3px);
    }
    .dropdown-logout-btn i {
        margin-right: 6px !important;
    }

    /* Force vertical stacking only when submenus or dropdowns are active */
    .submenu, .dropdown-menu.show {
        display: flex !important;
        flex-direction: column !important;
    }
    .submenu li, .dropdown-menu li {
        width: 100% !important;
    }
    .nav-user-icon {
        font-size: 1.2rem;
        color: #333;
        transition: color 0.3s;
    }
    .nav-user-icon:hover {
        color: #ff7b6b;
    }
</style><?php /**PATH C:\The Final Project Folder\Edited-FinalProject\resources\views/user/navbar.blade.php ENDPATH**/ ?>