<div x-transition>
    @if ($cartiems_count > 0)
        @foreach ($cartitems as $cartitem)
            <livewire:cart.cartitems :key="$cartitem->id" :cartitem="$cartitem" />
        @endforeach
    @else
        <div class="flex flex-column justify-center items-center m-8 gap-2">
            <div>
                <p>Your cart is empty</p>
            </div>
            <div>
                <a href="{{ route('index_shop') }}" class="btn btn-primary btn-lg text-center w-full ">
                    Start Shopping
                </a>
            </div>
        </div>
    @endif
    <div class="w-full absolute bottom-0 start-0 py-4 px-4 bg-white mt-0">
        <hr>
        <div class="d-flex justify-between mb-2">
            <div class="position-relative">
                <p class="text-gray-500 rounded-lg mb-0">Shipping is calculated at Checkout</p>

            </div>

            <p class="text-gray-500 rounded-lg text-sm font-bold self-center mb-0"> {{ $cartiems_count ?? 0 }}
                Items </p>
        </div>

        {{-- check if there is an item in the cart --}}
        @if ($cartiems_count > 0)
            <button class="btn btn-primary btn-lg w-full" wire:click="cart_checkout({{ $cartitems }})">
                Checkout | PHP {{ $total_price ?? 0 }}
            </button>
        @else
            <button class="btn btn-primary btn-lg w-full">
                Checkout | PHP {{ $total_price ?? 0 }}
            </button>
        @endif

    </div>
</div>
