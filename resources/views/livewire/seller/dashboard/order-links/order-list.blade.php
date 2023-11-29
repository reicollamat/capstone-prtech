<div class="h-full w-full p-3" x-data="">
    {{-- Nothing in the world is as soft and yielding as water. --}}
    {{-- <button wire:click="getOrderList()">test</button> --}}
    <x-slot:page_header>
        Order Management
    </x-slot:page_header>
    <div class="flex h-full">

        <div class="flex-1 w-64">
            <div class="flex flex-column flex-lg-row justify-between gap-2 ">
                <div class="flex lg:hidden flex-none  flex-column items-center md:content-center h-full pr-4">
                    <div class="w-full h-fit pr-4 rounded-lg shadow pl-3 justify-start bg-white">
                        <p class="text-xs text-center font-light uppercase text-gray-700 max-w-7xl">Overview</p>
                        <div class="py-2 text-center">
                            <p class="text-sm font-base text-gray-500 mb-1">Total Orders Listed</p>
                            <p class="font-semibold">{{ $this->getTotalPurchaseCount }}</p>
                        </div>
                        <div class="py-2 text-center flex justify-center">
                            <div class="px-2">
                                <p class="text-xs font-base text-gray-500 mb-1">Pending</p>
                                <p class="font-semibold">{{ $this->getTotalPendingCount }}</p>
                            </div>
                            <div class="px-2">
                                <p class="text-xs font-base text-gray-500 mb-1">Completed</p>
                                <p class="font-semibold">{{ $this->getTotalCompletedCount }}</p>
                            </div>
                            <div class="px-2">
                                <p class="text-xs font-base text-gray-500 mb-1">To Ship</p>
                                <p class="font-semibold">{{ $this->getTotalToShipCount }}</p>
                            </div>
                        </div>
                        <div x-data="{ expanded: false }" class="bg-white">
                            <div class="flex flex-column flex-lg-row flex-shrink-0 min-w-full items-center text-center">
                                <div
                                    class="w-full flex justify-center mb-0 min-w-[100px] p-2 !text-gray-600 !font-light items-center">
                                    <button id="faqs-title-01" type="button"
                                        class="flex items-center justify-center text-center p-1 bg-white rounded-lg"
                                        @click="expanded = !expanded" :aria-expanded="expanded"
                                        aria-controls="faqs-text-01">
                                        more..
                                    </button>
                                </div>
                            </div>
                            <div x-cloak id="faqs-text-01" role="region" aria-labelledby="faqs-title-01"
                                class="grid text-sm text-slate-600 overflow-hidden rounded transition-all duration-300 ease-in-out "
                                :class="expanded ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'">
                                <div class="overflow-hidden">
                                    <div class="py-2 text-center flex justify-center">
                                        <div class="px-2">
                                            <p class="text-xs font-base text-gray-500 mb-1">Shipping</p>
                                            <p class="font-semibold">{{ $this->getTotalShippingCount }}</p>
                                        </div>
                                        <div class="px-2">
                                            <p class="text-xs font-base text-gray-500 mb-1">Failed Delivery</p>
                                            <p class="font-semibold">{{ $this->getTotalFailedDeliveryCount }}</p>
                                        </div>
                                        <div class="px-2">
                                            <p class="text-xs font-base text-gray-500 mb-1">To Ship</p>
                                            <p class="font-semibold">{{ $this->getTotalToShipCount }}</p>
                                        </div>
                                    </div>
                                    <div class="py-2 text-center flex justify-center">
                                        <div class="px-2">
                                            <p class="text-xs font-base text-gray-500 mb-1">Cancellation</p>
                                            <p class="font-semibold">{{ $this->getTotalCancellationCount }}</p>
                                        </div>
                                        <div class="px-2">
                                            <p class="text-xs font-base text-gray-500 mb-1">Return/Refund</p>
                                            <p class="font-semibold">{{ $this->getTotalReturnRefundCount }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{--  order status Filter --}}
                <div x-data="{ isOpen: false }" class="relative inline-block">
                    <!-- Dropdown toggle button -->
                    <button @click="isOpen = !isOpen"
                        class="relative z-10 w-full flex items-center border border-gray-400 p-2 rounded-lg text-xs bg-white text-gray-600 gap-1">
                        <span class="mx-1">Order Status:</span>
                        <svg class="w-5 h-5 mx-1 rotate-180 transition duration-200" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                            :class="{ 'rotate-180 transition duration-300': isOpen }">
                            <path
                                d="M12 15.713L18.01 9.70299L16.597 8.28799L12 12.888L7.40399 8.28799L5.98999 9.70199L12 15.713Z"
                                fill="currentColor"></path>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div x-cloak x-show="isOpen" @click.away="isOpen = false"
                        x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-100"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
                        class="absolute left-0 z-20 mt-1 w-full md:w-96 shadow overflow-hidden origin-top-right bg-transparent rounded-md dark:bg-gray-800 front">
                        <div class="grid grid-cols-3 gap-2 p-2 bg-white rounded border-1 border-gray-300">
                            @foreach ($this->orderstatus_list as $key => $status)
                                <button
                                    class="mb-0 w-full text-start uppercase text-xs p-1.5 tracking-tight rounded hover:bg-gray-300"
                                    type="button"
                                    wire:click.debounce="$set('orderstatus_filter', '{{ $status }}')">
                                    {{ $status }}
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>
                {{-- payment status filter --}}
                <div x-data="{ isOpen: false }" class="relative inline-block ">
                    <!-- Dropdown toggle button -->
                    <button @click="isOpen = !isOpen"
                        class="relative z-10 w-full flex items-center border border-gray-400 p-2 rounded-lg text-xs bg-white text-gray-600 gap-1">
                        <span class="mx-1">Payment Status:</span>
                        <svg class="w-5 h-5 mx-1 rotate-180 transition duration-200" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                            :class="{ 'rotate-180 transition duration-300': isOpen }">
                            <path
                                d="M12 15.713L18.01 9.70299L16.597 8.28799L12 12.888L7.40399 8.28799L5.98999 9.70199L12 15.713Z"
                                fill="currentColor"></path>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div x-cloak x-show="isOpen" @click.away="isOpen = false"
                        x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-100"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
                        class="absolute left-0 z-20 w-full shadow overflow-hidden origin-top-right bg-transparent rounded-md dark:bg-gray-800 front">
                        <div class="bg-white rounded border-1 border-gray-300">
                            <button
                                class="mb-0 w-full text-start uppercase text-xs p-1.5 tracking-tight rounded hover:bg-gray-300"
                                type="button" wire:click.debounce="$set('paymentstatus_filter', 'paid')">
                                Paid
                            </button>
                            <button
                                class="mb-0 w-full text-start uppercase text-xs p-1.5 tracking-tight rounded hover:bg-gray-300"
                                type="button" wire:click.debounce="$set('paymentstatus_filter', 'unpaid')">
                                Unpaid
                            </button>
                        </div>
                    </div>
                </div>
                {{--  payment type Filter --}}
                <div x-data="{ isOpen: false }" class="relative inline-block ">
                    <!-- Dropdown toggle button -->
                    <button @click="isOpen = !isOpen"
                        class="relative z-10 w-full flex items-center border border-gray-400 p-2 rounded-lg text-xs bg-white text-gray-600 gap-1">
                        <span class="mx-1">Payment Type: </span>
                        <svg class="w-5 h-5 mx-1 rotate-180 transition duration-200" viewBox="0 0 24 24"
                            fill="none" xmlns="http://www.w3.org/2000/svg"
                            :class="{ 'rotate-180 transition duration-300': isOpen }">
                            <path
                                d="M12 15.713L18.01 9.70299L16.597 8.28799L12 12.888L7.40399 8.28799L5.98999 9.70199L12 15.713Z"
                                fill="currentColor"></path>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div x-cloak x-show="isOpen" @click.away="isOpen = false"
                        x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-100"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
                        class="absolute left-0 z-20 mt-1 w-full shadow overflow-hidden origin-top-right bg-transparent rounded-md dark:bg-gray-800 front">
                        <div class="bg-white rounded border-1 border-gray-300">
                            <button
                                class="mb-0 w-full text-start uppercase text-xs p-1.5 tracking-tight rounded hover:bg-gray-300"
                                type="button" wire:click.debounce="$set('paymenttype_filter', 'cod')">
                                COD (Cash On Delivery)
                            </button>
                            <button
                                class="mb-0 w-full text-start uppercase text-xs p-1.5 tracking-tight rounded hover:bg-gray-300"
                                type="button" wire:click.debounce="$set('paymenttype_filter', 'gcash')">
                                GCash
                            </button>
                        </div>
                    </div>
                </div>

                {{-- clear filters --}}
                <div x-data="{ isOpen: false }" class="relative inline-block ">
                    <div class="px-2.5 transition ease-in-out duration-300 {{ $orderstatus_filter ? 'block' : 'hidden' }}"
                        x-transition>
                        <button wire:click.debounce="$set('orderstatus_filter', '')">
                            <span class="text-sm text-gray-600 tracking-tight">
                                Clear
                            </span>
                        </button>
                    </div>

                    <div class="px-2.5 transition ease-in-out duration-300 {{ $paymentstatus_filter ? 'block' : 'hidden' }}"
                        x-transition>
                        <button wire:click.debounce="$set('paymentstatus_filter', '')">
                            <span class="text-sm text-gray-600 tracking-tight">
                                Clear
                            </span>
                        </button>
                    </div>
                    <div class="px-2.5 transition ease-in-out duration-300 {{ $paymenttype_filter ? 'block' : 'hidden' }}"
                        x-transition>
                        <button wire:click.debounce="$set('paymenttype_filter', '')">
                            <span class="text-sm text-gray-600 tracking-tight">
                                Clear
                            </span>
                        </button>
                    </div>
                    <div class="px-2.5 transition ease-in-out duration-300 {{ $quick_search_filter ? 'block' : 'hidden' }}"
                        x-transition>
                        <button wire:click.debounce="$set('quick_search_filter', '')">
                            <span class="text-sm text-gray-600 tracking-tight">
                                Clear
                            </span>
                        </button>
                    </div>

                </div>

                <div class="flex flex-column flex-lg-row lg:items-center gap-2.5">
                    {{-- searchning filter --}}
                    <div>
                        <div class="relative text-gray-600">
                            <label for="quick_search" class="sr-only">Search</label>
                            <div class="flex gap-1.5 items-center">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="bi bi-search"></i>
                                    </span>
                                    <input id="quick_search" type="search" name="serch"
                                        placeholder="Quick Search"
                                        class="form-control bg-white w-full h-full border-gray-200 text-sm focus:outline-none"
                                        wire:model.live="quick_search_filter">
                                    <select
                                        class="form-control bg-white w-full h-full border-gray-200 focus:outline-none"
                                        wire:model="search_method" style="max-width: 110px">
                                        <option value="title">Product</option>
                                        <option value="purchase_id">Order #</option>
                                        ...
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            {{--            {{ $quick_search_filter }} --}}
            <hr>
            <div class="bg-white overflow-x-auto rounded-lg p-3">
                <div class="grid grid-cols-12 text-center text-sm">
                    <div class="col-span-1 p-2 !text-gray-400 !font-light border-b-2 border-blue-300">IMG</div>
                    <div class="col-span-1 p-2 !text-gray-400 !font-light border-b-2 border-blue-300">#</div>
                    <div class="col-span-2 p-2 !text-gray-400 !font-light border-b-2 border-blue-300">Product</div>
                    <div class="col-span-2 p-2 !text-gray-400 !font-light border-b-2 border-blue-300">Total Price
                    </div>
                    <div class="col-span-2 p-2 !text-gray-400 !font-light border-b-2 border-blue-300">Payment
                    </div>
                    <div class="col-span-2 p-2 !text-gray-400 !font-light border-b-2 border-blue-300">Purchase</div>
                    <div class="col-span-1 p-2 !text-gray-400 !font-light border-b-2 border-blue-300">Details</div>
                    <div class="col-span-1 p-2 !text-gray-400 !font-light border-b-2 border-blue-300">Update</div>
                </div>
                {{-- loading indicator --}}
                <div class="w-full !hidden " wire:loading.class.remove="!hidden" x-transition>
                    <div class="w-full" wire:loading wire:target="gotoPage, orderstatus_filter, ">
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

                <div wire:loading.remove x-transition>
                    @if ($this->getPurchaseItemList->count() > 0)
                        {{--                    {{ $this->getPurchaseItemList->count() }} --}}
                        @foreach ($this->getPurchaseItemList as $key => $item)
                            {{-- {{ $item->purchase_status }} --}}
                            <form action="{{ route('order-list-update') }}" method="POST">
                                @csrf
                                <div x-data="{ expanded: false }" class="border-b border-gray-100">
                                    <div class="grid grid-cols-12 text-center">
                                        <div class="col-span-1 my-4 !text-gray-800 !font-light">
                                            <img src="{{ asset($item->image) }}"
                                                class="rounded-lg mx-auto d-block w-9 h-9" alt="Product-Thumbnail">
                                        </div>
                                        <div class="col-span-1 my-4 text-sm !text-gray-800 !font-light">
                                            {{ $item->id }}
                                        </div>
                                        <div class="col-span-2 my-4 text-sm !text-gray-800 !font-light">
                                            {{ $item->title }}
                                        </div>
                                        <div class="col-span-2 my-4 !text-gray-800 !font-light">
                                            {{ $item->total_price }}
                                        </div>

                                        <input type="text" name="purchase_id" value="{{ $item->purchase_id }}"
                                            hidden>
                                        <input type="text" name="user_id" value="{{ $item->user_id }}" hidden>
                                        <input type="text" name="payment_type" value="{{ $item->payment_type }}"
                                            hidden>

                                        @if ($item->payment_type == 'cod' && $item->payment_status == 'unpaid')
                                            <select name="payment_status"
                                                class="col-span-2 text-sm m-4 rounded !text-gray-800 !font-light">
                                                @foreach ($this->paymentstatus_options as $key => $status)
                                                    <option value="{{ $status }}" @selected($item->payment_status)>
                                                        {{ $status }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        @else
                                            <div class="col-span-2 text-sm my-4 !text-green-600 !font-light">
                                                <input type="text" name="payment_status" value="paid" hidden>
                                                paid
                                            </div>
                                        @endif

                                        @if ($item->purchase_status == 'completed')
                                            <div class="col-span-2 text-sm my-4 !text-green-600 !font-light">
                                                <input type="text" name="purchase_status" value="completed"
                                                    hidden />
                                                {{ $item->purchase_status }}
                                            </div>
                                        @elseif ($item->purchase_status == 'cancellation')
                                            <div class="col-span-2 text-sm my-4 !text-red-600 !font-light">
                                                <input type="text" name="purchase_status" value="cancellation"
                                                    hidden />
                                                {{ $item->purchase_status }}
                                            </div>
                                        @elseif ($item->purchase_status == 'returnrefund')
                                            <div class="col-span-2 text-sm my-4 !text-red-600 !font-light">
                                                <input type="text" name="purchase_status" value="returnrefund"
                                                    hidden />
                                                {{ $item->purchase_status }}
                                            </div>
                                        @elseif ($item->purchase_status == 'failed_delivery')
                                            <div class="col-span-2 text-sm my-4 !text-red-600 !font-light">
                                                <input type="text" name="purchase_status" value="failed_delivery"
                                                    hidden />
                                                {{ $item->purchase_status }}
                                            </div>
                                        @elseif ($item->purchase_status == 'pending')
                                            <select name="purchase_status"
                                                class="col-span-2 text-sm m-4 rounded !text-gray-800 !font-light">
                                                @foreach ($this->orderstatus_options as $key => $status)
                                                    @if ($item->purchase_status == $status)
                                                        <option value="{{ $status }}" seleted>
                                                        @else
                                                        <option value="{{ $status }}">
                                                    @endif
                                                    {{ $status }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        @elseif ($item->purchase_status == 'to_ship')
                                            <select name="purchase_status"
                                                class="col-span-2 text-sm m-4 rounded !text-gray-800 !font-light">
                                                @foreach ($this->orderstatus_options as $key => $status)
                                                    @if ($key > 0)
                                                        @if ($item->purchase_status == $status)
                                                            <option value="{{ $status }}" seleted>
                                                            @else
                                                            <option value="{{ $status }}">
                                                        @endif
                                                        {{ $status }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        @elseif ($item->purchase_status == 'shipping')
                                            <div class="col-span-2 text-sm m-4 rounded !text-gray-800 !font-light">
                                                <select name="purchase_status">
                                                    @foreach ($this->orderstatus_options as $key => $status)
                                                        @if ($key > 1)
                                                            @if ($item->purchase_status == $status)
                                                                <option value="{{ $status }}" seleted>
                                                                @else
                                                                <option value="{{ $status }}">
                                                            @endif
                                                            {{ $status }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        @else
                                            <div class="col-span-2 text-sm my-4 !text-gray-800 !font-light">
                                                {{ $item->purchase_status }}
                                            </div>
                                        @endif

                                        <div
                                            class="col-span-1 text-sm mx-auto my-auto rounded !text-gray-800 !font-light">
                                            <button id="faqs-title-01" type="button"
                                                class="flex items-center justify-center text-center font-semibold p-1 bg-gray-100 rounded-lg"
                                                @click="expanded = !expanded" :aria-expanded="expanded"
                                                aria-controls="faqs-text-01">
                                                <span class="transform origin-center transition duration-200 ease-out"
                                                    :class="{ '!rotate-180': expanded }">
                                                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M12 15.713L18.01 9.70299L16.597 8.28799L12 12.888L7.40399 8.28799L5.98999 9.70199L12 15.713Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                            </button>
                                        </div>
                                        <div class="col-span-1 text-sm mx-auto my-auto !text-gray-800 !font-light">
                                            <button type="submit"
                                                class="bg-blue-500 hover:bg-blue-700 text-white text-sm p-2 rounded">Update
                                            </button>
                                        </div>
                                    </div>
                                    <div x-cloak id="faqs-text-01" role="region" aria-labelledby="faqs-title-01"
                                        class="grid text-sm border-t-2 border-blue-100 text-slate-600 overflow-hidden rounded transition-all duration-300 ease-in-out bg-background-light "
                                        :class="expanded ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'">
                                        <div class="overflow-hidden">
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
                                                                <input type="text" id="product_name"
                                                                    value="{{ $item->title }}"
                                                                    wire:model.blur="product_name"
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
                                                                        wire:model.blur="product_purchase_date"
                                                                        class="bg-transparent !border-b-2 border-gray-600 text-gray-900 text-xs focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                                                        placeholder="" disabled>
                                                                </div>
                                                                <div>
                                                                    <label for="date_of_payment"
                                                                        class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">
                                                                        Payment Date
                                                                    </label>
                                                                    @if ($item->date_of_payment == null)
                                                                        <input type="text" id="date_of_payment"
                                                                            value="unpaid"
                                                                            wire:model.blur="date_of_payment"
                                                                            class="bg-transparent !border-b-2 border-gray-600 text-red-300 text-xs focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                                                            placeholder="" disabled>
                                                                    @else
                                                                        <input type="text" id="date_of_payment"
                                                                            value="{{ date('d-M-y', strtotime($item->date_of_payment)) }}"
                                                                            wire:model.blur="date_of_payment"
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
                                                                            wire:model.blur="payment_type"
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
                                                                            wire:model.blur="reference_code"
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
                                                                    <input type="text" id="quantity"
                                                                        value="{{ $item->quantity }}"
                                                                        wire:model.blur="quantity"
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
                                                                        wire:model.blur="total__price"
                                                                        class="bg-transparent !border-b-2 border-gray-600 text-gray-900 text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                                                        placeholder="" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="grid lg:grid-cols-2 gap-2">
                                                                <div>
                                                                    <label for="order_status"
                                                                        class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">Order
                                                                        Status
                                                                    </label>
                                                                    <input type="text" id="purchase_status"
                                                                        value="{{ $item->purchase_status }}"
                                                                        wire:model.blur="purchase_status"
                                                                        class="bg-transparent !border-b-2 border-gray-600 text-gray-900 text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                                                        placeholder="" disabled>
                                                                </div>
                                                                <div>
                                                                    <label for="status"
                                                                        class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">Payment
                                                                        Status
                                                                    </label>
                                                                    <input type="text" id="payment_status"
                                                                        value="{{ $item->payment_status }}"
                                                                        wire:model.blur="payment_status"
                                                                        class="bg-transparent !border-b-2 border-gray-600 text-gray-900 text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                                                        placeholder="" disabled>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        @endforeach

                        <div class="content-center pt-3">
                            {{ $this->getPurchaseItemList->links() }}
                        </div>
                    @else
                        <div class="flex content-center text-gray-500 p-6">
                            <h4>No Order Listed</h4>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div
            class="hidden ml-3 d-lg-flex flex-none max-w-[14rem] flex-column gap-3 items-center md:content-center h-full py-4">
            <div class="w-full h-fit py-6 pr-4 rounded-lg shadow pl-3 justify-center bg-white">
                <p class="text-xs text-center font-light uppercase text-gray-700 max-w-7xl">Overview</p>
                <div class="py-2 text-center">
                    <p class="text-sm font-base text-gray-500 mb-1">Total Orders Listed</p>
                    <p class="font-semibold">{{ $this->getTotalPurchaseCount }}</p>
                </div>
                <div class="py-2 text-center flex justify-center">
                    <div class="px-2">
                        <p class="text-xs font-base text-gray-500 mb-1">Pending</p>
                        <p class="font-semibold">{{ $this->getTotalPendingCount }}</p>
                    </div>
                    <div class="px-2">
                        <p class="text-xs font-base text-gray-500 mb-1">Completed</p>
                        <p class="font-semibold">{{ $this->getTotalCompletedCount }}</p>
                    </div>
                </div>
                <div x-data="{ expanded: false }" class="bg-white">
                    <div class="flex flex-column flex-lg-row flex-shrink-0 min-w-full items-center text-center">
                        <div
                            class="w-full flex justify-center mb-0 min-w-[100px] p-2 !text-gray-600 !font-light items-center">
                            <button id="faqs-title-01" type="button"
                                class="flex items-center justify-center text-center p-1 bg-white rounded-lg"
                                @click="expanded = !expanded" :aria-expanded="expanded" aria-controls="faqs-text-01">
                                more..
                            </button>
                        </div>
                    </div>
                    <div x-cloak id="faqs-text-01" role="region" aria-labelledby="faqs-title-01"
                        class="grid text-sm text-slate-600 overflow-hidden rounded transition-all duration-300 ease-in-out "
                        :class="expanded ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'">
                        <div class="overflow-hidden">
                            <div class="py-2 text-center flex justify-center">
                                <div class="px-2">
                                    <p class="text-xs font-base text-gray-500 mb-1">To Ship</p>
                                    <p class="font-semibold">{{ $this->getTotalToShipCount }}</p>
                                </div>
                                <div class="px-2">
                                    <p class="text-xs font-base text-gray-500 mb-1">Shipping</p>
                                    <p class="font-semibold">{{ $this->getTotalShippingCount }}</p>
                                </div>
                            </div>
                            <div class="py-2 text-center flex justify-center">
                                <div class="px-2">
                                    <p class="text-xs font-base text-gray-500 mb-1">Cancellation</p>
                                    <p class="font-semibold">{{ $this->getTotalCancellationCount }}</p>
                                </div>
                                <div class="px-2">
                                    <p class="text-xs font-base text-gray-500 mb-1">Return/Refund</p>
                                    <p class="font-semibold">{{ $this->getTotalReturnRefundCount }}</p>
                                </div>
                            </div>
                            <div class="py-2 text-center">
                                <div class="px-2">
                                    <p class="text-xs font-base text-gray-500 mb-1">Failed Delivery</p>
                                    <p class="font-semibold">{{ $this->getTotalFailedDeliveryCount }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
