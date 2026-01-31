<div>
    <a href="javascript:void(0);" wire:click="toggleWishlist" class="wishlist-toggle <?php echo e($isWishlisted ? 'text-danger' : ''); ?>" title="<?php echo e($isWishlisted ? 'Remove from wishlist' : 'Add to wishlist'); ?>">
        <i wire:loading.remove wire:target="toggleWishlist" class="<?php echo e($isWishlisted ? 'fas' : 'far'); ?> fa-heart"></i>
        <i wire:loading wire:target="toggleWishlist" class="fas fa-spinner fa-spin"></i>
    </a>
</div>
<?php /**PATH C:\Last Backup Edited Final Project 30-1-2026\Edited-FinalProject\resources\views/livewire/user/add-to-wishlist.blade.php ENDPATH**/ ?>