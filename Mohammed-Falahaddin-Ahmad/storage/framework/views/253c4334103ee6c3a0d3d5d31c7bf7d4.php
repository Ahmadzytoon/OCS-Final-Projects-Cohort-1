

<?php $__env->startSection('content'); ?>

    <!-- Cursor follower -->
    <div class="cursor-follower"></div>

    <!-- Preloader start -->
    <div id="preloader" class="preloader">
        <div class="animation-preloader">
            <div class="spinner"></div>
            <div class="txt-loading">
                <span data-text-preloader="R" class="letters-loading">R</span>
                <span data-text-preloader="E" class="letters-loading">E</span>
                <span data-text-preloader="A" class="letters-loading">A</span>
                <span data-text-preloader="D" class="letters-loading">D</span>
                <span data-text-preloader="I" class="letters-loading">I</span>
                <span data-text-preloader="F" class="letters-loading">F</span>
                <span data-text-preloader="Y" class="letters-loading">Y</span>
            </div>
            <p class="text-center">Loading</p>
        </div>
        <div class="loader">
            <div class="row">
                <div class="col-3 loader-section section-left">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-left">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-right">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-right">
                    <div class="bg"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Back To Top start -->
    <button id="back-top" class="back-to-top">
        <i class="fa-solid fa-chevron-up"></i>
    </button>
    
    <!-- Breadcumb Section Start -->
   <div class="breadcrumb-wrapper bg-cover section-padding"
    style="background-image: url(<?php echo e(asset('assets/user/images/hero/breadcrumb-bg.jpg')); ?>);">

        <div class="container">
            <div class="page-heading">
                <h1>Checkout</h1>
                <div class="page-header">
                    <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".3s">
                        <li>
                           <a href="<?php echo e(route('user.home')); ?>">Home</a>
                        </li>
                        <li>
                            <i class="fa-solid fa-chevron-right"></i>
                        </li>
                        <li>
                            Checkout
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Checkout Section Start -->
    <section class="checkout-section fix section-padding pb-0">
        <div class="container">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('error')): ?>
                <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <form action="<?php echo e(route('user.checkout.process')); ?>" method="post" id="checkout-form">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="payment_intent_id" id="payment_intent_id">
                
                <div class="row g-5">
                    <div class="col-lg-9">
                        <div class="checkout-single-wrapper">
                            <div class="checkout-single boxshado-single">
                                <h4>Billing Details</h4>
                                <div class="checkout-single-form">
                                    <div class="row g-4">
                                        <div class="col-lg-6">
                                            <div class="input-single">
                                                <span>First Name*</span>
                                                <input type="text" name="first_name" id="userFirstName" required placeholder="First Name" value="<?php echo e(auth()->user()->name); ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-single">
                                                <span>Last Name*</span>
                                                <input type="text" name="last_name" id="userLastName" required placeholder="Last Name">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="input-single">
                                                <span>Country*</span>
                                                <input name="country" id="country" placeholder="Select a country" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="input-single">
                                                <span>Street Address*</span>
                                                <input name="address_1" id="userAddress" placeholder="Home number and street name" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="input-single">
                                                <span>Street Address 2</span>
                                                <input name="address_2" id="userAddress2" placeholder="Apartment, suite, unit, etc. (optional)">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="input-single">
                                                <span>Town/ City*</span>
                                                <input name="city" id="towncity" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-single">
                                                <span>Phone*</span>
                                                <input name="phone" id="phone" placeholder="phone" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-single">
                                                <span>Email Address*</span>
                                                <input name="email" id="email22" placeholder="email" value="<?php echo e(auth()->user()->email); ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="checkout-single boxshado-single mt-4">
                                <h4>Payment Information</h4>
                                <div class="checkout-single-form">
                                    <div class="row g-4">
                                        <div class="col-lg-12">
                                            <div class="input-single">
                                                <span>Card Number*</span>
                                                <div id="card-number-element" class="form-control" style="height: 45px; padding-top: 12px; border: 1px solid #ddd; border-radius: 5px;"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-single">
                                                <span>Expiry Date*</span>
                                                <div id="card-expiry-element" class="form-control" style="height: 45px; padding-top: 12px; border: 1px solid #ddd; border-radius: 5px;"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-single">
                                                <span>CVV / CVC*</span>
                                                <div id="card-cvc-element" class="form-control" style="height: 45px; padding-top: 12px; border: 1px solid #ddd; border-radius: 5px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Used to display form errors. -->
                                    <div id="card-errors" role="alert" class="text-danger mt-3"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="checkout-order-area">
                            <h3>Our Order</h3>
                            <div class="product-checout-area">
                                <div class="checkout-item d-flex align-items-center justify-content-between">
                                    <p>Product</p>
                                    <p>Subtotal</p>
                                </div>

                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $cart->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($item->book): ?>
                                    <?php
                                        $price = $item->book->discount_amount > 0 
                                            ? ($item->book->discount_type === 'percentage' 
                                                ? $item->book->price - ($item->book->price * $item->book->discount_amount / 100)
                                                : $item->book->price - $item->book->discount_amount)
                                            : $item->book->price;
                                        $subtotal = $price * $item->quantity;
                                    ?>
                                    <div class="checkout-item d-flex align-items-center justify-content-between">
                                        <p><?php echo e($item->book->title); ?> x <?php echo e($item->quantity); ?></p>
                                        <p>$<?php echo e(number_format($subtotal, 2)); ?></p>
                                    </div>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>

                                <div class="checkout-item d-flex justify-content-between">
                                    <p>Subtotal</p>
                                    <p>$<?php echo e(number_format($total, 2)); ?></p>
                                </div>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($couponDiscount > 0): ?>
                                <div class="checkout-item d-flex justify-content-between">
                                    <p>Discount</p>
                                    <p>-$<?php echo e(number_format($couponDiscount, 2)); ?></p>
                                </div>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                                <div class="checkout-item d-flex align-items-center justify-content-between">
                                    <p>Total</p>
                                    <p>$<?php echo e(number_format($finalTotal, 2)); ?></p>
                                </div>
                                
                                <div class="checkout-item-2">
                                     <button type="submit" id="submit-button" class="theme-btn w-100 mt-4 text-center">
                                        Place Order
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const stripe = Stripe('<?php echo e(env('STRIPE_KEY')); ?>');
            const elements = stripe.elements();
            
            // Custom styling for Stripe Elements
            const style = {
                base: {
                    color: '#32325d',
                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                        color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
            };

            // Create separate elements for Number, Expiry, and CVC (CVV)
            const cardNumber = elements.create('cardNumber', {style: style});
            const cardExpiry = elements.create('cardExpiry', {style: style});
            const cardCvc = elements.create('cardCvc', {style: style});

            // Mount elements
            cardNumber.mount('#card-number-element');
            cardExpiry.mount('#card-expiry-element');
            cardCvc.mount('#card-cvc-element');

            // Handle errors for all elements
            const handleError = (event) => {
                const displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            };

            cardNumber.on('change', handleError);
            cardExpiry.on('change', handleError);
            cardCvc.on('change', handleError);

            const form = document.getElementById('checkout-form');
            const submitButton = document.getElementById('submit-button');

            form.addEventListener('submit', async function(event) {
                event.preventDefault();
                submitButton.disabled = true;
                submitButton.textContent = 'Processing...';

                // 1. Create PaymentIntent via AJAX
                try {
                    const response = await fetch('<?php echo e(route('user.checkout.payment-intent')); ?>', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                        }
                    });

                    const data = await response.json();
                    if (data.error) {
                        throw new Error(data.error);
                    }

                    const clientSecret = data.clientSecret;

                    // 2. Confirm Card Payment using the cardNumber element
                    // Stripe will automatically pull Expiry and CVC since they are on the same 'elements' instance
                    const result = await stripe.confirmCardPayment(clientSecret, {
                        payment_method: {
                            card: cardNumber,
                            billing_details: {
                                name: document.getElementById('userFirstName').value + ' ' + document.getElementById('userLastName').value,
                                email: document.getElementById('email22').value,
                                phone: document.getElementById('phone').value,
                                address: {
                                    line1: document.getElementById('userAddress').value,
                                    city: document.getElementById('towncity').value,
                                    country: document.getElementById('country').value,
                                }
                            }
                        }
                    });

                    if (result.error) {
                        // Show error to your customer
                        const errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                        submitButton.disabled = false;
                        submitButton.textContent = 'Place Order';
                    } else {
                        // The payment has been processed!
                        if (result.paymentIntent.status === 'succeeded') {
                            // 3. Submit the form with the PaymentIntent ID
                            document.getElementById('payment_intent_id').value = result.paymentIntent.id;
                            form.submit();
                        }
                    }
                } catch (error) {
                    const errorElement = document.getElementById('card-errors');
                    errorElement.textContent = error.message;
                    submitButton.disabled = false;
                    submitButton.textContent = 'Place Order';
                }
            });
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Last Backup Edited Final Project 30-1-2026\Edited-FinalProject\resources\views/user/checkout.blade.php ENDPATH**/ ?>