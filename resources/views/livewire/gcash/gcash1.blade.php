<div class="bg-light rounded-lg border shadow-md relative text-left p-4 pb-5 my-4 mx-auto w-25">
    <div class=" text-gray-500 mb-5">
        <div>
            <div>Merchant</div>
            <div>Amount Due: {{$total}}</div>
        </div>
    </div>
    <div class="mt-5 text-center">
        <h3 class="d-flex justify-content-center text-xl font-semibold mb-6">Login to pay with <p class="text-primary ml-1">GCash</p></h3>
        <p class="text-gray-500 text-center mb-6">Input your Mobile number</p>
    </div>
    <div class="mx-auto w-3/4">
        <div class="relative">
            <div class="mb-6">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="number">+63</span>
                    <input type="text" class="form-control" placeholder="9999999999" aria-label="mobilenumber" aria-describedby="basic-addon1" required>
                </div>
            <label
                for="number"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-light"
            ></label>
            {{-- <input
                type="tel"
                id="number"
                class="bg-light border border-gray-300 text-black-500 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5"
                placeholder="+63"
                required
            /> --}}
            </div>
        </div>
    </div>
    <div class="mt-12 flex justify-center no-underline">
        @if ($cart_ids)
        {{-- if route came from purchase_cart --}}
        <form wire:submit="gcash2()">
            <input type="text" wire:model="cart_ids" hidden>
            <input type="text" wire:model="subtotal" hidden>
            <input type="text" wire:model="total" hidden>
            <input type="text" wire:model="payment_type" hidden>
            <input type="text" wire:model="user_id" hidden>
            
            <button type="submit" target="_blank" class="bg-blue-500 text-light rounded-full py-2 px-16 no-underline">
                Next
            </button>
        </form>
        @else
        {{-- if route came from purchase_one --}}
        <form wire:submit="gcash2()">
            <input type="text" wire:model="user_id" hidden>
            <input type="text" wire:model="product_id" hidden>
            <input type="text" wire:model="quantity" hidden>
            <input type="text" wire:model="subtotal" hidden>
            <input type="text" wire:model="total" hidden>
            <input type="text" wire:model="category" hidden>
            <input type="text" wire:model="payment_type" hidden>
            
            <button type="submit" target="_blank" class="bg-blue-500 text-light rounded-full py-2 px-16 no-underline">
                Next
            </button>
        </form>
        @endif
    </div>
    <div class="mt-4 mb-5 flex justify-center no-underline">
        <a href="" class="no-underline">Create an account</a>
    </div>
</div>    
