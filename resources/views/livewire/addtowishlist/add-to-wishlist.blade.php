<div>
    <div class="position-absolute top-0 end-0 mt-1 mr-2.5 z-50">
        @if($added_to_wishlist)
            <button wire:click="addtowishlist">
                <i class="bi bi-heart-fill" style="font-size: 1.5rem"></i>

            </button>
        @else
            <button wire:click="addtowishlist">
                <i class="bi bi-heart" style="font-size: 1.5rem"></i>
            </button>

        @endif
    </div>
</div>

