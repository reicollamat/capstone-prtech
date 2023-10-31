<div x-data="">
    <button type="submit" class="btn " wire:click.debounce.500ms="addToWishlist">
        <div wire:loading.remove x-transition>
            <div class="d-flex text-center items-center self-center">
                <i class="bi bi-heart mr-2" style="font-size: 1.3rem"></i>

                <p class="mb-0">Add to Wishlist</p>
            </div>
        </div>
        <div wire:loading x-transition>
            <div class="d-flex text-center items-center self-center">
                <div class="spinner-border spinner-border-sm text-dark mr-2" role="status">
                </div>
                <p class="mb-0">Add to Wishlist</p>
            </div>
        </div>

    </button>
</div>
