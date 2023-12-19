<div class="bg-white overflow-x-auto rounded-lg p-3">
    <div class="grid grid-cols-12 text-center text-sm">
        <div class="col-span-1 p-2 !text-gray-400 !font-light border-b-2 border-blue-300">#</div>
        <div class="col-span-2 p-2 !text-gray-400 !font-light border-b-2 border-blue-300">Customer</div>
        <div class="col-span-2 p-2 !text-gray-400 !font-light border-b-2 border-blue-300">Product</div>
        <div class="col-span-2 p-2 !text-gray-400 !font-light border-b-2 border-blue-300">Completion Date</div>
        <div class="col-span-2 p-2 !text-gray-400 !font-light border-b-2 border-blue-300">Condition</div>
        <div class="col-span-2 p-2 !text-gray-400 !font-light border-b-2 border-blue-300">Agreement</div>
        <div class="col-span-1 p-2 !text-gray-400 !font-light border-b-2 border-blue-300">Details</div>
    </div>

    <div wire:loading.remove x-transition>
        @if ($this->getReturnrefundRecords->count() > 0)
            @foreach ($this->getReturnrefundRecords as $key => $item)
                <div class="border-b border-gray-300" x-data="{ selected: null }">
                    <div class="grid grid-cols-12 text-center">
                        <div class="col-span-1 mb-0 py-3 !text-gray-800 !font-light">
                            {{ $item->id }}
                        </div>
                        <div class="col-span-2 mb-0 py-3 !text-gray-800 !font-light">
                            {{ $item->user->first_name }} {{ $item->user->last_name }}
                        </div>
                        <div class="col-span-2 mb-0 py-3 !text-gray-800 !font-light">
                            {{ $item->purchase_item->product->title }}
                        </div>
                        <div class="col-span-2 mb-0 py-3 !text-gray-800 !font-light">
                            {{ date('d-M-y (h:i a)', strtotime($item->completion_date)) }}
                        </div>
                        <div class="col-span-2 mb-0 py-3 !text-gray-800 !font-light">
                            {{ $item->condition }}
                        </div>
                        <div class="col-span-2 mb-0 py-3 !text-gray-800 !font-light">
                            @if ($item->refund_option == 'return_product')
                                <div class="col-span-2 !text-gray-900 !font-black !border-b-2 border-gray-600 w-full">
                                    Return Product
                                </div>
                            @elseif ($item->refund_option == 'partial_refund')
                                <div class="col-span-2 !text-gray-900 !font-black !border-b-2 border-gray-600 w-full">
                                    Partial Refund without Return
                                </div>
                            @elseif ($item->refund_option == 'full_refund')
                                <div class="col-span-2 !text-gray-900 !font-black !border-b-2 border-gray-600 w-full">
                                    Full Refund without Return
                                </div>
                            @elseif ($item->refund_option == 'replacement')
                                <div class="col-span-2 !text-gray-900 !font-black !border-b-2 border-gray-600 w-full">
                                    Replacement or Exchange
                                </div>
                            @else
                                <div class="col-span-2 !text-gray-500 !font-black !border-b-2 border-gray-600 w-full">
                                    {{$item->refund_option}}
                                </div>
                            @endif
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

                    <div class="relative overflow-hidden bg-blue-100 transition-all max-h-0 duration-300 rounded" style=""
                        x-ref="container2"
                        x-bind:style="selected == 2 ? 'max-height: ' + $refs.container2.scrollHeight + 'px' :
                            ''">
                        <div class="p-2 flex flex-col lg:flex-row">
                            <div class="flex-1">
                                <div class="w-full flex flex-col lg:flex-row gap-1.5">
                                    <div class="p-1.5 lg:w-1/3">
                                        <div class="mb-3">
                                            <label for="product_name"
                                                class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">
                                                Product Name
                                            </label>
                                            <input type="text" id="product_name" value="{{ $item->purchase_item->product->title }}"
                                                class="bg-transparent !border-b-2 border-gray-600 text-gray-900 text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                                placeholder="" disabled>
                                        </div>
                                    </div>
                                    <div class="p-1.5 lg:w-1/8">
                                        <div class="mb-3">
                                            <label for="product_name"
                                                class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">
                                                Quantity
                                            </label>
                                            <input type="text" id="product_name" value="{{ $item->item_quantity }}"
                                                class="bg-transparent !border-b-2 border-gray-600 text-gray-900 text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                                placeholder="" disabled>
                                        </div>
                                    </div>
                                    {{-- second half --}}
                                    <div class="p-1.5 lg:w-1/2">
                                        <div class="mb-3 grid lg:grid-cols-2 gap-4">
                                            <div>
                                                <label for="quantity" class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">
                                                    Product Condition
                                                </label>
                                                <input type="text" id="quantity" value="{{ $item->condition }}"
                                                    class="bg-transparent !border-b-2 border-gray-600 text-gray-900 text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                                    placeholder="" disabled>
                                            </div>
                                            <div>
                                                <label for="order_status" class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">
                                                    Return/Refund Status
                                                </label>
                                                @if ($item->status == 'returnrefund-pending')
                                                    <input type="text" id="purchase_status"
                                                        value="Pending for your Approval"
                                                        class="bg-transparent !border-b-2 border-gray-600 text-blue-600 text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                                        placeholder="" disabled>
                                                @elseif ($item->status == 'returnrefund-agreement')
                                                    <input type="text" id="purchase_status"
                                                        value="Waiting for customer's response"
                                                        class="bg-transparent !border-b-2 border-gray-600 text-gray-500 text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                                        placeholder="" disabled>
                                                @else
                                                    <input type="text" id="purchase_status"
                                                        value="{{ $item->status }}"
                                                        class="bg-transparent !border-b-2 border-gray-600 text-gray-900 text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                                        placeholder="" disabled>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full flex flex-col lg:flex-row gap-1.5">
                                    <div class="p-1.5 lg:w-1/3">
                                        <div class="mb-3">
                                            <label for="product_name"
                                                class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">
                                                Customer Name
                                            </label>
                                            <input type="text" id="product_name" value="{{ $item->user->first_name }} {{ $item->user->last_name }}"
                                                class="bg-transparent !border-b-2 border-gray-600 text-gray-900 text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                                placeholder="" disabled>
                                        </div>
                                    </div>
                                    {{-- second half --}}
                                    <div class="p-1.5 lg:w-3/4">
                                        <div class="mb-3">
                                            <div>
                                                <label for="quantity"
                                                    class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">
                                                    Reason of Return/Refund
                                                </label>
                                                <input type="text" id="quantity" value="{{ $item->reason }}"
                                                    class="bg-transparent !border-b-2 border-gray-600 text-gray-900 text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                                    placeholder="" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-5 mx-4 mb-3">
                            <div class="col-span-5 content-start">
                                <h5>Photographic evidence:</h5>
                                <div class="flex flex-wrap justify-start gap-4">
                                    @foreach ($item->returnrefund_images as $image)
                                        <img src="{{ asset($image->img_path) }}"
                                            class="rounded-xl d-block h-48"
                                            alt="Product-Thumbnail">
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
        @else
            <div class="flex content-center text-gray-500 p-6">
                <h4>No Return/Refund Request Listed</h4>
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