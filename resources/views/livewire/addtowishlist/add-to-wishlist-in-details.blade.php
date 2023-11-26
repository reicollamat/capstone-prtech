<div x-data="">
    {{-- session flash notification --}}
    {{-- for add-to-wishlist --}}
    <div class="alert alert-primary rounded alert-dismissible fade show" role="alert" style="display: none; position: fixed; top: 20px; left: 25%; width: 50%; z-index:9999;" 
        x-data="{show: false}" 
        x-show="show"
        x-transition:leave.duration.500ms
        x-init="@this.on('notif-alert-wishlist', () => { show = true; setTimeout(() => { show = false;}, 5000) })">
            {{ session('notification-livewire') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

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
