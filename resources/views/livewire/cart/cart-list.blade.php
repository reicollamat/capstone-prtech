<div class="h-full ">
    @if($cartiems_count > 0)
        @foreach($cartitems as $cartitem)
            <livewire:cart.cartitems :key="$cartitem->id" :cartitem="$cartitem"/>
        @endforeach
    @else
        <p>You don't have any products in the Cart yet.
            You will find a lot of interesting products on our "Shop" page.</p>
    @endif
    <div class="w-full absolute bottom-0 py-4 pr-8 bg-white ">
        <hr>
        <div class="d-flex justify-between mb-4">
            <p class="text-gray-500 rounded-lg text-sm mb-0">Shipping is calculated at Checkout</p>
            <p class="text-gray-500 rounded-lg text-sm font-bold self-center mb-0"> {{ $cartiems_count ?? 0 }}
                Items </p>
        </div>

        <button class="btn btn-primary btn-lg text-center w-full ">
            Checkout | PHP {{ $total_price ?? 0}}
        </button>

    </div>
</div>


