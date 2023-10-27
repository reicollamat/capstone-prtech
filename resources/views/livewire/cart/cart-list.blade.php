<div class="h-full ">
    @if($cartiems_count > 0)
        @foreach($cartitems as $cartitem)
            <livewire:cart.cartitems :key="$cartitem->id" :cartitem="$cartitem"/>
        @endforeach
    @else
        <div class="flex flex-column justify-center items-center m-8 gap-2">
            <div>
                <p>Your cart is empty</p>
            </div>
            <div>
                <a href="{{ route('index_shop') }}"
                   class="btn btn-primary btn-lg text-center w-full ">
                    Start Shopping
                </a>
            </div>
        </div>
    @endif
    <div class="w-full absolute bottom-0 py-4 pr-8 bg-white ">
        <hr>
        <div class="d-flex justify-between mb-2">
            <div class="position-relative">
                <p class="text-gray-500 rounded-lg text-sm mb-0">Shipping is calculated at Checkout</p>

            </div>

            <p class="text-gray-500 rounded-lg text-sm font-bold self-center mb-0"> {{ $cartiems_count ?? 0 }}
                Items </p>
        </div>


        <button class="btn btn-primary btn-lg text-center w-full ">
            Checkout | PHP {{ $total_price ?? 0}}
        </button>

    </div>
</div>

