<div class="relative h-full">
    @if($cartiems_count ?? 0 > 0)
        <p>you have {{ $cartiems_count }} items in your cart</p>
        @foreach($cartitems as $cartitem)
            <livewire:cart.cartitems :cartitem="$cartitem" :key="$cartitem->id"/>
        @endforeach
        <p>{{ $total_price }}</p>
    @else
        <p>You don't have any products in the Cart yet.
            You will find a lot of interesting products on our "Shop" page.</p>
    @endif
    <div class="w-full absolute bottom-0 py-4 px-3">
        <hr>
        <div class="d-flex justify-between mb-2">
            <p class="text-gray-500 rounded-lg text-sm mb-0">Shipping is calculated at Checkout</p>
            <p class="text-gray-500 rounded-lg text-sm font-bold self-center mb-0"> {{ $cartiems_count ?? 0 }}
                Items </p>
        </div>

        <button class="btn btn-primary btn-lg text-center w-full py-2">
            Checkout | PHP {{ $total_price ?? 0}}
        </button>

    </div>
</div>


