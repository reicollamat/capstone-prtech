{{-- searchning filter --}}
<div class="flex flex-column flex-lg-row-reverse lg:items-center gap-2.5 mb-1">
    <div class="relative text-gray-600">
        <label for="quick_search" class="sr-only">Search</label>
        <div class="flex gap-1.5 items-center">
            <div class="input-group">
                <span class="input-group-text" id="basic-addon1">
                    <i class="bi bi-search"></i>
                </span>
                <input id="quick_search" type="search" name="serch" placeholder="Search Shipping"
                    class="form-control bg-white w-full h-full border-gray-200 !rounded-r-lg text-sm focus:outline-none"
                    wire:model.live="quick_search_filter">
            </div>
        </div>
    </div>
</div>

<div class="bg-white overflow-x-auto rounded-lg p-3">
    <div class="grid grid-cols-12 text-center text-sm">
        <div class="col-span-1 p-2 !text-gray-400 !font-light border-b-2 border-blue-300">IMG</div>
        <div class="col-span-1 p-2 !text-gray-400 !font-light border-b-2 border-blue-300">Ref-ID</div>
        <div class="col-span-3 p-2 !text-gray-400 !font-light border-b-2 border-blue-300">Product</div>
        <div class="col-span-2 p-2 !text-gray-400 !font-light border-b-2 border-blue-300">Total Price
        </div>
        <div class="col-span-2 p-2 !text-gray-400 !font-light border-b-2 border-blue-300">Purchased On
        </div>
        <div class="col-span-1 p-2 !text-gray-400 !font-light border-b-2 border-blue-300">Payment</div>
        <div class="col-span-1 p-2 !text-gray-400 !font-light border-b-2 border-blue-300">Details</div>
        <div class="col-span-1 p-2 !text-gray-400 !font-light border-b-2 border-blue-300">Update</div>
    </div>

    <div wire:loading.remove x-transition>
        @if ($this->getShippingList->count() > 0)
            @foreach ($this->getShippingList as $item)
                <div class="" x-data="{ selected: null }">

                    <div class="grid grid-cols-12 text-center">
                        <div class="col-span-1 mb-0 py-3 !text-gray-800 !font-light">
                            <img src="{{ asset($item->image) }}" class="rounded-lg mx-auto d-block w-9 h-9"
                                alt="Product-Thumbnail">
                        </div>
                        <div class="col-span-1 mb-0 py-3 text-sm !text-gray-800 !font-light">
                            [{{ $item->referenceId }}]
                        </div>
                        <div class="col-span-3 mb-0 py-3 !text-gray-800 !font-light">
                            {{ $item->title }}
                        </div>
                        <div class="col-span-2 mb-0 py-3 !text-gray-800 !font-light">
                            {{ $item->total_price }}
                        </div>
                        <div class="col-span-2 mb-0 py-3 !text-gray-800 !font-light">
                            {{ date('d-M-y', strtotime($item->purchase_date)) }}
                        </div>
                        <div class="col-span-1 mb-0 py-3 !text-gray-800 !font-light">
                            {{ $item->payment_type }}
                        </div>
                        <div class="col-span-1 mb-0 py-3 !text-gray-800 !font-light">
                            <button type="button"
                                class="flex items-center justify-center text-center font-semibold p-1 bg-white rounded-lg mx-auto"
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
                        <div class="col-span-1 mb-0 py-3 !text-gray-800 !font-light">
                            <button type="button" wire:click.debounce="$set('set_to_complete', '{{ $item->id }}')"
                                class="bg-green-300 hover:bg-green-700 text-dark text-sm p-2 rounded">
                                Arrived
                            </button>
                        </div>
                    </div>

                    <div class="relative overflow-hidden transition-all max-h-0 duration-500" style=""
                        x-ref="container2"
                        x-bind:style="selected == 2 ? 'max-height: ' + $refs.container2.scrollHeight + 'px' :
                            ''">
                        <div class="p-2 flex flex-col lg:flex-row">
                            <div class="px-6 content-center">
                                <div class="flex flex-col justify-center items-center p-2.5 gap-2">
                                    <img src="{{ asset($item->image) }}"
                                        class="rounded-xl border border-gray-600 p-2.5 mx-auto d-block w-28 h-28"
                                        alt="Product-Thumbnail">
                                </div>
                            </div>
                            <div class="flex-1">
                                <div class="w-full flex flex-col lg:flex-row gap-1.5">
                                    <div class="p-1.5 lg:w-1/2">
                                        <div class="mb-3">
                                            <label for="product_name"
                                                class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">
                                                Product Name
                                            </label>
                                            <input type="text" id="product_name" value="{{ $item->title }}"
                                                class="bg-transparent !border-b-2 border-gray-600 text-gray-900 text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                                placeholder="" disabled>
                                        </div>
                                        <div class="grid lg:grid-cols-2 mb-3 gap-4">
                                            <div>
                                                <label for="purchase_date"
                                                    class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">
                                                    Purchase Date
                                                </label>
                                                <input type="text" id="purchase_date"
                                                    value="{{ date('d-M-y', strtotime($item->purchase_date)) }}"
                                                    class="bg-transparent !border-b-2 border-gray-600 text-gray-900 text-xs focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                                    placeholder="" disabled>
                                            </div>
                                            <div>
                                                <label for="date_of_payment"
                                                    class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">
                                                    Payment Date
                                                </label>
                                                @if ($item->date_of_payment == null)
                                                    <input type="text" id="date_of_payment" value="unpaid"
                                                        class="bg-transparent !border-b-2 border-red-600 text-red-500 text-xs focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                                        placeholder="" disabled>
                                                @else
                                                    <input type="text" id="date_of_payment"
                                                        value="{{ date('d-M-y', strtotime($item->date_of_payment)) }}"
                                                        class="bg-transparent !border-b-2 border-gray-600 text-gray-900 text-xs focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                                        placeholder="" disabled>
                                                @endif
                                            </div>
                                        </div>
                                        <div>
                                            <div class="grid lg:grid-cols-2 gap-4">
                                                <div>
                                                    <label for="payment_type"
                                                        class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">Payment
                                                        Type
                                                    </label>
                                                    <input type="text" id="payment_type"
                                                        value="{{ $item->payment_type }}"
                                                        class="bg-transparent !border-b-2 border-gray-600 text-gray-900 text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                                        placeholder="" disabled>
                                                </div>
                                                <div>
                                                    <label for="reference_code"
                                                        class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">Reference
                                                        Code

                                                    </label>
                                                    <input type="text" id="reference_code"
                                                        value="{{ $item->reference_code }}"
                                                        class="bg-transparent !border-b-2 border-gray-600  text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                                        placeholder="" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- second half --}}
                                    <div class="p-1.5 lg:w-1/2">

                                        <div class="mb-3 grid lg:grid-cols-2 gap-4">
                                            <div>
                                                <label for="quantity"
                                                    class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">Quantity
                                                </label>
                                                <input type="text" id="quantity" value="{{ $item->quantity }}"
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
                                        <div class="mb-3 grid lg:grid-cols-2 gap-2">
                                            <div>
                                                <label for="order_status"
                                                    class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">Shipment
                                                    Status
                                                </label>
                                                @if ($item->shipment_status == 'pending')
                                                    <input type="text" id="shipment_status"
                                                        value="{{ $item->shipment_status }}"
                                                        class="bg-transparent !border-b-2 border-gray-600 text-blue-600 text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                                        placeholder="" disabled>
                                                @elseif ($item->shipment_status == 'completed')
                                                    <input type="text" id="shipment_status"
                                                        value="{{ $item->shipment_status }}"
                                                        class="bg-transparent !border-b-2 border-gray-600 text-green-600 text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                                        placeholder="" disabled>
                                                @elseif ($item->shipment_status == 'failed_delivery')
                                                    <input type="text" id="shipment_status"
                                                        value="{{ $item->shipment_status }}"
                                                        class="bg-transparent !border-b-2 border-gray-600 text-red-500 text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                                        placeholder="" disabled>
                                                @elseif ($item->shipment_status == 'cancellation')
                                                    <input type="text" id="shipment_status"
                                                        value="{{ $item->shipment_status }}"
                                                        class="bg-transparent !border-b-2 border-gray-600 text-red-500 text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                                        placeholder="" disabled>
                                                @else
                                                    <input type="text" id="shipment_status"
                                                        value="{{ $item->shipment_status }}"
                                                        class="bg-transparent !border-b-2 border-gray-600 text-gray-900 text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                                        placeholder="" disabled>
                                                @endif
                                            </div>
                                            <div>
                                                <label for="status"
                                                    class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">Payment
                                                    Status
                                                </label>
                                                @if ($item->payment_status == 'paid')
                                                    <input type="text" id="payment_status"
                                                        value="{{ $item->payment_status }}"
                                                        class="bg-transparent !border-b-2 border-gray-600 text-green-600 text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                                        placeholder="" disabled>
                                                @else
                                                    <input type="text" id="payment_status"
                                                        value="{{ $item->payment_status }}"
                                                        class="bg-transparent !border-b-2 border-gray-600 text-red-500 text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                                        placeholder="" disabled>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="">
                                            <label for="referenceId"
                                                class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">
                                                Shipment Reference ID
                                            </label>
                                            <input type="text" id="referenceId" value="#{{ $item->referenceId }}"
                                                class="bg-transparent !border-b-2 border-gray-600 text-gray-900 focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                                placeholder="" disabled>
                                        </div>
                                    </div>

                                </div>
                            </div>
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
