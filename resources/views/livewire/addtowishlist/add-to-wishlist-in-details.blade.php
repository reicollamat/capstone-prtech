<div>
    <button type="submit" class="btn btn-outline-primary btn-square" wire:click.debounce.500ms="addToWishlist">
        <div wire:loading.remove>
            <i class="fas fa-heart"></i>
        </div>
        <div wire:loading.delay>
            <div class="spinner-border spinner-border-sm text-dark" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>

    </button>
</div>
