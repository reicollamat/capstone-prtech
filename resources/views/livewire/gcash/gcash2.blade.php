<div class="bg-light rounded-lg border shadow-md relative text-left p-4 pb-5 my-4 mx-auto w-25">
    <div class="text-gray-500 mb-4">
        <div>
            <div>We sent an authentication code to your number.</div>
        </div>
    </div>
    <div class="mt-20 text-center">
        <h3 class="text-xl font-semibold mb-6">Enter authentication code</h3>
    </div>
    <div class="mx-auto w-3/4">
        <div class="relative">
            <div class="mb-6">
                <label for="number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-light"></label>
                <input type="tel" id="number"
                    class="bg-light border border-gray-300 text-black-500 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5"
                    placeholder="" required />
            </div>
        </div>
    </div>
    <div class="mt-12 flex justify-center no-underline">
        @if ($is_cart)
            <form wire:submit="gcash3()">
                <input type="text" wire:model="is_cart" hidden>
                <input type="text" wire:model="subtotal" hidden>
                <input type="text" wire:model="total" hidden>
                <input type="text" wire:model="payment_type" hidden>
                <input type="text" wire:model="user_id" hidden>

                <button type="submit" target="_blank"
                    class="bg-blue-500 text-light rounded-full py-2 px-16 no-underline">
                    Next
                </button>
            </form>
        @else
            <button wire:click="gcash3()" target="_blank"
                class="bg-blue-500 text-light rounded-full py-2 px-16 no-underline">
                Submit Code
            </button>
        @endif
    </div>
    <div class="mt-4 mb-5 flex justify-center no-underline">
        <a href="" class="no-underline">Resend authentication code</a>
    </div>
</div>
