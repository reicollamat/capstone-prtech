{{-- searchning filter --}}
<div class="flex justify-between flex-lg-row-reverse lg:items-center gap-2.5 mb-3">
    <button type="button" class="relative bg-primary hover:!bg-blue-700 text-white p-2 rounded w-fit"
        data-bs-toggle="modal" data-bs-target="#massShip">
        Mass Shipping Orders
    </button>
    <!-- Modal -->
    <div class="modal fade" id="massShip" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="confirmRemoveLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmRemoveLabel">Mass Shipping Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center text-lg text-black">Are you sure you want to proceed with mass
                    shipping
                    <span class="font-medium"> {{ $total_to_ship_count ?? 0 }} item/s ?</span>
                    This action will dispatch a <span class="font-medium">large number of items at once</span> .
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" @disabled( $total_to_ship_count == 0)
                        wire:click="massShip">Continue and Ship
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="relative text-gray-600">
        <label for="quick_search" class="sr-only">Search</label>
        <div class="flex gap-1.5 items-center">
            <div class="input-group">
                <span class="input-group-text" id="basic-addon1">
                    <i class="bi bi-search"></i>
                </span>
                <input id="quick_search" type="search" name="serch" placeholder="Search To Ship"
                    class="form-control bg-white w-full h-full border-gray-200 !rounded-r-lg text-sm focus:outline-none"
                    wire:model.live="toship_quick_search_filter">
            </div>
        </div>
    </div>

</div>

<div class="bg-white overflow-x-auto rounded-lg p-3">
    <div class="grid grid-cols-12 text-center text-sm">
        <div class="col-span-2 p-2 !text-gray-400 !font-light border-b-2 border-blue-300">Purchase#</div>
        <div class="col-span-2 p-2 !text-gray-400 !font-light border-b-2 border-blue-300">Shipment#</div>
        {{-- <div class="col-span-2 p-2 !text-gray-400 !font-light border-b-2 border-blue-300">Buyer</div> --}}
        <div class="col-span-1 p-2 !text-gray-400 !font-light border-b-2 border-blue-300">Total Amount</div>
        <div class="col-span-2 p-2 !text-gray-400 !font-light border-b-2 border-blue-300">Purchased On
        </div>
        <div class="col-span-1 p-2 !text-gray-400 !font-light border-b-2 border-blue-300">Payment</div>
        <div class="col-span-2 p-2 !text-gray-400 !font-light border-b-2 border-blue-300">Location</div>
        <div class="col-span-1 p-2 !text-gray-400 !font-light border-b-2 border-blue-300">Action</div>
        <div class="col-span-1 p-2 !text-gray-400 !font-light border-b-2 border-blue-300">Details</div>
    </div>

    <div wire:loading.remove x-transition>
        @if ($this->getToShipList->count() > 0)
            @foreach ($this->getToShipList as $key => $to_ship)
                <div class="border-b border-gray-100" x-data="{ selected: null }">
                    {{-- @dd($to_ship) --}}
                    <div class="grid grid-cols-12 text-center">
                        <div class="col-span-2 mb-0 py-3 !text-gray-800 !font-light">
                            {{ $to_ship->purchase->reference_number }}
                        </div>
                        <div class="col-span-2 mb-0 py-3 !text-gray-800 !font-light">
                            {{ $to_ship->shipment_number }}
                        </div>
                        {{-- <div class="col-span-2 mb-0 py-3 text-sm !text-gray-800 !font-light"> --}}
                        {{--     {{ $to_ship->user->first_name }} {{ $to_ship->user->last_name }} --}}
                        {{-- </div> --}}
                        <div class="col-span-1 mb-0 py-3 !text-gray-800 !font-light">
                            ₱{{ $to_ship->purchase->total_amount }}
                        </div>
                        <div class="col-span-2 mb-0 py-3 !text-gray-800 !font-light">
                            {{ date('d-M-y', strtotime($to_ship->purchase->purchase_date)) }}
                        </div>
                        <div class="col-span-1 mb-0 py-3 !text-gray-800 !font-light">
                            {{ $to_ship->purchase->payment->payment_type }}
                        </div>
                        <div class="col-span-2 mb-0 py-3 !text-gray-800 !font-light">
                            {{ $to_ship->city }}, {{ $to_ship->state_province }}
                        </div>
                        <div class="col-span-1 mb-0 py-3 !text-gray-800 !font-light">
                            <button type="button" wire:click="$set('set_to_shipping', '{{ $to_ship->id }}')"
                                class="bg-blue-500 hover:bg-blue-700 text-white text-sm p-2 rounded">
                                Ship
                            </button>
                        </div>
                        <div class="col-span-1 mb-0 py-3 !text-gray-800 !font-light">
                            <button type="button"
                                class="flex items-center justify-center text-center font-semibold p-1 bg-gray-100 rounded-lg mx-auto"
                                @click="selected !== 2 ? selected = 2 : selected = null" :aria-selected="selected">
                                <span class="transform origin-center transition duration-200 ease-out"
                                    :class="{ '!rotate-180': selected }">
                                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12 15.713L18.01 9.70299L16.597 8.28799L12 12.888L7.40399 8.28799L5.98999 9.70199L12 15.713Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </div>

                    <div class="relative overflow-hidden transition-all max-h-0 duration-500 ease-in-out bg-background-light rounded"
                        style="" x-ref="container2"
                        x-bind:style="selected == 2 ? 'max-height: ' + $refs.container2.scrollHeight + 'px' :
                            ''">
                        <div class="overflow-hidden border-t-2 border-blue-100">
                            <h5 class="pl-4 pt-2">More details..</h5>
                            <div class="px-2 flex flex-col lg:flex-row">
                                <div class="flex-1">
                                    <div class="w-full flex flex-col lg:flex-row gap-1.5">
                                        <div class="p-1.5 lg:w-1/2">
                                            <div class="mb-2">
                                                <label for="product_name"
                                                    class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">
                                                    Street Address
                                                </label>
                                                <input type="text" id="product_name"
                                                    value="{{ $to_ship->street_address_1 }}"
                                                    class="bg-transparent !border-b-2 border-gray-600 text-gray-900 focus:!ring-0 focus:border-0 block w-full !p-1"
                                                    placeholder="" disabled>
                                            </div>
                                        </div>
                                        {{-- second half --}}
                                        <div class="p-1.5 lg:w-1/2">
                                            <div class="mb-2">
                                                <div class="grid lg:grid-cols-2 gap-4">
                                                    <div>
                                                        <label for="payment_type"
                                                            class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">
                                                            City
                                                        </label>
                                                        <input type="text" id="payment_type"
                                                            value="{{ $to_ship->city }}"
                                                            class="bg-transparent !border-b-2 border-gray-600 text-gray-900 focus:!ring-0 focus:border-0 block w-full !p-1"
                                                            placeholder="" disabled>
                                                    </div>
                                                    <div>
                                                        <label for="reference_code"
                                                            class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">
                                                            Postal Code
                                                        </label>
                                                        <input type="text" id="reference_code"
                                                            value="{{ $to_ship->postal_code }}"
                                                            class="bg-transparent !border-b-2 border-gray-600 text-gray-900 focus:!ring-0 focus:border-0 block w-full !p-1"
                                                            placeholder="" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full flex flex-col lg:flex-row gap-1.5 mb-4">
                                        <div class="p-1.5 lg:w-1/2">
                                            <div class="mb-2">
                                                <label for="product_name"
                                                    class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">
                                                    State / Province
                                                </label>
                                                <input type="text" id="product_name"
                                                    value="{{ $to_ship->state_province }}"
                                                    class="bg-transparent !border-b-2 border-gray-600 text-gray-900 focus:!ring-0 focus:border-0 block w-full !p-1"
                                                    placeholder="" disabled>
                                            </div>
                                        </div>
                                        {{-- second half --}}
                                        <div class="p-1.5 lg:w-1/2">
                                            <div class="mb-2">
                                                <label for="product_name"
                                                    class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">
                                                    Country
                                                </label>
                                                <input type="text" id="product_name"
                                                    value="{{ $to_ship->country }}"
                                                    class="bg-transparent !border-b-2 border-gray-600 text-gray-900 focus:!ring-0 focus:border-0 block w-full !p-1"
                                                    placeholder="" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full flex flex-col lg:flex-row gap-1.5">
                                        <div class="p-1.5 lg:w-1/2">
                                            <div class="mb-2">
                                                <div class="grid lg:grid-cols-2 gap-4">
                                                    <div>
                                                        <label for="product_name"
                                                            class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">
                                                            Order Reference Number
                                                        </label>
                                                        <input type="text" id="product_name"
                                                            value="{{ $to_ship->purchase->reference_number }}"
                                                            class="bg-transparent !border-b-2 border-gray-600 text-gray-900 focus:!ring-0 focus:border-0 block w-full !p-1"
                                                            placeholder="" disabled>
                                                    </div>
                                                    <div>
                                                        <label for="product_name"
                                                            class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">
                                                            Shipment Fee
                                                        </label>
                                                        <input type="text" id="product_name"
                                                            value="{{ $to_ship->purchase->shipping_fee }}"
                                                            class="bg-transparent !border-b-2 border-gray-600 text-gray-900 focus:!ring-0 focus:border-0 block w-full !p-1"
                                                            placeholder="" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- second half --}}
                                        <div class="p-1.5 lg:w-1/2">
                                            <div class="mb-2">
                                                <div class="grid lg:grid-cols-2 gap-4">
                                                    <div>
                                                        <label for="payment_type"
                                                            class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">
                                                            Date of Purchase
                                                        </label>
                                                        <input type="text" id="payment_type"
                                                            value="{{ date('M d, Y (h:i a)', strtotime($to_ship->purchase->purchase_date)) }}"
                                                            class="bg-transparent !border-b-2 border-gray-600 text-gray-900 focus:!ring-0 focus:border-0 block w-full !p-1"
                                                            placeholder="" disabled>
                                                    </div>
                                                    <div>
                                                        <label for="reference_code"
                                                            class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">
                                                            Completion Date
                                                        </label>
                                                        @if ($to_ship->purchase->purchase_status == 'completed')
                                                            <input type="text" id="reference_code"
                                                                value="{{ date('M d, Y (h:i a)', strtotime($to_ship->purchase->completion_date)) }}"
                                                                class="bg-transparent !border-b-2 border-gray-600 text-gray-900 focus:!ring-0 focus:border-0 block w-full !p-1"
                                                                placeholder="" disabled>
                                                        @else
                                                            <input type="text" id="reference_code"
                                                                value="Waiting.."
                                                                class="bg-transparent !border-b-2 border-gray-600 text-gray-700 italic focus:!ring-0 focus:border-0 block w-full !p-1"
                                                                placeholder="" disabled>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="px-2 pb-4 flex flex-col lg:flex-row">
                                <div class="flex-1">
                                    <div class="w-full flex flex-col lg:flex-row gap-1.5">
                                        <div class="p-1.5 lg:w-1/3">
                                            <div class="mb-2">
                                                <div>
                                                    <label for="purchase_date"
                                                        class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">
                                                        Payment Type
                                                    </label>
                                                    @if ($to_ship->purchase->payment->payment_type == 'cod')
                                                        <input type="text" id="purchase_date"
                                                            value="COD (Cash On Delivery)"
                                                            class="bg-transparent !border-b-2 border-gray-600 text-gray-900 focus:!ring-0 focus:border-0 block w-full !p-1"
                                                            placeholder="" disabled>
                                                    @elseif ($to_ship->purchase->payment->payment_type == 'gcash')
                                                        <input type="text" id="purchase_date" value="GCash"
                                                            class="bg-transparent !border-b-2 border-gray-600 text-gray-900 focus:!ring-0 focus:border-0 block w-full !p-1"
                                                            placeholder="" disabled>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        {{-- second half --}}
                                        <div class="p-1.5 lg:w-1/3">
                                            <div class="mb-2">
                                                <div>
                                                    <label for="purchase_date"
                                                        class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">
                                                        Date of Payment
                                                    </label>
                                                    @if ($to_ship->purchase->payment->date_of_payment)
                                                        <input type="text" id="purchase_date"
                                                            value="{{ date('M d, Y (h:i a)', strtotime($to_ship->purchase->payment->date_of_payment)) }}"
                                                            class="bg-transparent !border-b-2 border-gray-600 text-gray-900 focus:!ring-0 focus:border-0 block w-full !p-1"
                                                            placeholder="" disabled>
                                                    @else
                                                        <input type="text" id="purchase_date" value="unpaid"
                                                            class="bg-transparent !border-b-2 border-gray-600 text-red-600 italic focus:!ring-0 focus:border-0 block w-full !p-1"
                                                            placeholder="" disabled>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-1.5 lg:w-1/3">
                                            <div class="mb-2">
                                                <div>
                                                    <label for="purchase_date"
                                                        class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">
                                                        Payment Reference Code
                                                    </label>
                                                    <input type="text" id="purchase_date"
                                                        value="{{ $to_ship->purchase->payment->reference_code }}"
                                                        class="bg-transparent !border-b-2 border-gray-600 text-gray-900 focus:!ring-0 focus:border-0 block w-full !p-1"
                                                        placeholder="" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="border-t-4 border-blue-100 flex flex-col lg:flex-row">
                                <h4 class="mx-auto mt-2">ITEMS</h4>
                            </div>
                            {{-- @dd($purchase) --}}
                            @foreach ($to_ship->purchase->purchase_items as $item)
                                {{-- @dd($item) --}}
                                <div class="p-2 flex flex-col lg:flex-row">
                                    <div class="px-6 content-center">
                                        <div class="flex flex-col justify-center items-center p-2.5 gap-2">
                                            <img src="{{ asset($item->product->product_images[0]->image_paths) }}"
                                                class="rounded-xl border border-gray-600 p-2.5 mx-auto d-block w-28 h-28"
                                                alt="Product-Thumbnail">
                                        </div>
                                    </div>
                                    <div class="flex-1 my-auto">
                                        <div class="w-full flex flex-col lg:flex-row gap-1.5">
                                            <div class="p-1.5 lg:w-1/2">
                                                <div class="mb-3">
                                                    <label for="product_name"
                                                        class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">
                                                        Product Name
                                                    </label>
                                                    <input type="text" id="product_name"
                                                        value="{{ $item->product->title }}"
                                                        class="bg-transparent !border-b-2 border-gray-600 text-gray-900 text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                                        placeholder="" disabled>
                                                </div>
                                            </div>
                                            {{-- second half --}}
                                            <div class="p-1.5 lg:w-1/2">

                                                <div class="mb-3 grid lg:grid-cols-2 gap-4">
                                                    <div>
                                                        <label for="quantity"
                                                            class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">Quantity
                                                        </label>
                                                        <input type="text" id="quantity"
                                                            value="{{ $item->quantity }}"
                                                            class="bg-transparent !border-b-2 border-gray-600 text-gray-900 text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                                            placeholder="" disabled>
                                                    </div>
                                                    <div>
                                                        <label for="total_price"
                                                            class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">Total
                                                            Price
                                                        </label>
                                                        <input type="text" id="total_price"
                                                            value="{{ $item->total_price }}"
                                                            class="bg-transparent !border-b-2 border-gray-600 text-gray-900 text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                                            placeholder="" disabled>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="flex content-center text-gray-500 p-6">
                <h4>No Shipment Listed</h4>
            </div>
        @endif
    </div>

    {{-- loading indicator --}}
    <div class="w-full !hidden " wire:loading.class.remove="!hidden" x-transition>
        <div class="w-full" wire:loading wire:target="gotoPage, category_filter, ">
            <div role="status"
                class="w-full my-2 p-4 space-y-4 border border-gray-200 divide-y divide-gray-200 rounded  animate-pulse">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-600 w-24 mb-2.5"></div>
                        <div class="w-32 h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div>
                    </div>
                    <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-700 w-12"></div>
                </div>
                <div class="flex items-center justify-between pt-4">
                    <div>
                        <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-600 w-24 mb-2.5"></div>
                        <div class="w-32 h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div>
                    </div>
                    <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-700 w-12"></div>
                </div>
                <div class="flex items-center justify-between pt-4">
                    <div>
                        <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-600 w-24 mb-2.5"></div>
                        <div class="w-32 h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div>
                    </div>
                    <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-700 w-12"></div>
                </div>
                <div class="flex items-center justify-between pt-4">
                    <div>
                        <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-600 w-24 mb-2.5"></div>
                        <div class="w-32 h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div>
                    </div>
                    <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-700 w-12"></div>
                </div>
                <div class="flex items-center justify-between pt-4">
                    <div>
                        <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-600 w-24 mb-2.5"></div>
                        <div class="w-32 h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div>
                    </div>
                    <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-700 w-12"></div>
                </div>
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
</div>
