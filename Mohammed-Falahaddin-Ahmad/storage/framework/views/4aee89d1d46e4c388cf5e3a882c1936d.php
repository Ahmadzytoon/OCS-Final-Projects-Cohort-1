<div>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($view === 'button'): ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($book->stock_quantity > 0): ?>
            <button wire:click="addToCart" class="cart-btn-pink w-100">
                Add To Cart
            </button>
        <?php else: ?>
            <button class="cart-btn-pink w-100 disabled" disabled>Out of Stock</button>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php else: ?>
        
        <div class="cart-action-row d-flex align-items-center gap-4 mb-4 flex-wrap">
            <!-- Quantity Selector (Oval) -->
            <div class="quantity-basket">
                <div class="qty d-flex align-items-center border rounded-pill px-3 py-2" style="border-color: #eee !important; background: #fff; height: 50px;">
                    <button type="button" class="qtyminus border-0 bg-transparent fw-bold px-2" style="color: #666;" wire:click="$set('quantity', Math.max(1, quantity - 1))">−</button>
                    <input type="number" wire:model="quantity" min="1" class="border-0 text-center fw-bold form-control shadow-none p-0 mx-2" style="width: 35px; color: #333; font-size: 18px; background: transparent;">
                    <button type="button" class="qtyplus border-0 bg-transparent fw-bold px-2" style="color: #666;" wire:click="$set('quantity', quantity + 1)">+</button>
                </div>
            </div>

            <!-- Wishlist Button (Circle) - Next to Counter -->
            <div class="wishlist-btn-wrapper">
                <div class="icon-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; border-radius: 50%; border: 1px solid #eee; cursor: pointer; transition: all 0.3s; background: white;">
                     <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('user.add-to-wishlist', ['book' => $book]);

$key = 'details-wishlist-row-'.$book->id;
$__componentSlots = [];

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-2445536340-0', $key);

$__html = app('livewire')->mount($__name, $__params, $key, $__componentSlots);

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__componentSlots);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                </div>
            </div>
            
            <!-- Actions Group: Read A Little + Add To Cart -->
            <div class="d-flex align-items-center gap-2">
                <!-- Read A Little Button (Outline) -->
                <button class="btn btn-outline-pink rounded-pill px-4 fw-bold text-nowrap d-flex align-items-center justify-content-center" 
                        type="button" 
                        data-bs-toggle="collapse" 
                        data-bs-target="#readMoreDescription" 
                        aria-expanded="false" 
                        aria-controls="readMoreDescription"
                        style="border: 1px solid #ff7b6b; color: #ff7b6b; font-size: 16px; height: 50px; min-width: 140px; background: white;">
                    Read A Little
                </button>

                <!-- Add To Cart Button (Solid) -->
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($book->stock_quantity > 0): ?>
                    <button wire:click="addToCart" class="cart-btn-pink px-5 text-nowrap fw-bold" style="height: 50px; font-size: 16px;">
                        <span wire:loading.remove wire:target="addToCart">Add To Cart</span>
                        <span wire:loading wire:target="addToCart"><i class="fas fa-spinner fa-spin"></i></span>
                    </button>
                <?php else: ?>
                    <button class="cart-btn-pink disabled px-5 text-nowrap fw-bold" disabled style="height: 50px; font-size: 16px;">Out of Stock</button>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

</div>
<?php /**PATH C:\Last Backup Edited Final Project 30-1-2026\Edited-FinalProject\resources\views/livewire/user/add-to-cart.blade.php ENDPATH**/ ?>