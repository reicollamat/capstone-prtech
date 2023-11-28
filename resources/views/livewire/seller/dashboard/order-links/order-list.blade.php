<div class="h-full w-full p-3" x-data="">
    {{-- Nothing in the world is as soft and yielding as water. --}}
    {{-- <button wire:click="getOrderList()">test</button> --}}
    <x-slot:page_header>
        Order Management
    </x-slot:page_header>
    <div class="flex h-full">

        <div class="flex-1 w-64">
            <div class="flex flex-column flex-lg-row justify-between gap-2 ">
                <div class="flex lg:hidden flex-none  flex-column gap-3 items-center md:content-center h-full py-4 pr-4">
                    <div class="w-full h-fit py-6 pr-4 rounded-lg shadow pl-3 justify-start bg-white">
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
                                <div class="w-full flex justify-center mb-0 min-w-[100px] p-2 !text-gray-600 !font-light items-center">
                                    <button id="faqs-title-01" type="button" class="flex items-center justify-center text-center p-1 bg-white rounded-lg"
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

                <div x-data="{ isOpen: false }" class="relative inline-block ">
                    {{--  order status Filter --}}
                    <div x-data="{ isOpen: false }" class="relative inline-block ">
                        <!-- Dropdown toggle button -->
                        <button @click="isOpen = !isOpen"
                            class="relative z-10 w-full flex items-center border border-gray-400 p-2 rounded-lg text-sm bg-white text-gray-600 gap-1">
                            <span class="mx-1">Order Status:
                                {{ CustomHelper::maptopropercatetory($category_filter) }}</span>
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
                            class="absolute left-0 z-20 mt-1 w-full md:w-96 shadow overflow-hidden origin-top-right bg-transparent rounded-md dark:bg-gray-800 front">
                            <div class="grid grid-cols-3 gap-2 p-2 bg-white rounded border-1 border-gray-300">
                                @foreach (CustomHelper::categoryList() as $category_key => $category_value)
                                    <button
                                        class="mb-0 w-full text-start uppercase text-sm p-1.5 tracking-tight rounded hover:bg-gray-100"
                                        type="button"
                                        wire:click.debounce="$set('category_filter', '{{ $category_key }}')">
                                        {{ $category_value }}
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    {{-- payment status filter --}}
                    <div x-data="{ isOpen: false }" class="relative inline-block ">
                        <!-- Dropdown toggle button -->
                        <button @click="isOpen = !isOpen"
                            class="relative z-10 w-full flex items-center border border-gray-400 p-2 rounded-lg text-sm bg-white text-gray-600 gap-1">
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
                                    wire:click.debounce="$set('category_filter', 'paid')"
                                    class="mb-0 w-full text-start uppercase text-sm p-2.5 tracking-tight rounded hover:bg-gray-100"
                                    @click="isOpen = false">Paid
                                </button>
                                <button
                                    class="mb-0 w-full text-start uppercase text-sm p-2.5 tracking-tight rounded hover:bg-gray-100"
                                    @click="isOpen = false">Unpaid
                                </button>
                            </div>
                        </div>
                    </div>
                    {{--  payment type Filter --}}
                    <div x-data="{ isOpen: false }" class="relative inline-block ">
                        <!-- Dropdown toggle button -->
                        <button @click="isOpen = !isOpen"
                            class="relative z-10 w-full flex items-center border border-gray-400 p-2 rounded-lg text-sm bg-white text-gray-600 gap-1">
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
                                <p class="mb-0 uppercase text-sm p-2 tracking-tight">SLUG</p>
                                <p class="mb-0 uppercase text-sm p-2 tracking-tight">SLUG</p>
                            </div>
                        </div>
                    </div>
                    <div class="px-2.5 transition ease-in-out duration-300 {{ $category_filter ? 'block' : 'hidden' }}"
                        x-transition>
                        <button wire:click.debounce="$set('category_filter', '')">
                            <span class="text-sm text-gray-600 tracking-tight">
                                Clear Filter
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
                                <input id="quick_search" type="search" name="serch" placeholder="Quick Search"
                                    class="bg-white w-full p-1 h-full border-gray-200 !rounded-lg text-sm focus:outline-none"
                                    wire:model.live="quick_search_filter">
                            </div>

                        </div>
                    </div>
                </div>
                {{-- <div class="flex items-center text-blue-500 justify-center gap-1">
                    <i class="bi bi-plus"></i>
                    <a href="{{ route('product-new') }}" class="no-underline decoration-0 text-sm mb-0"
                        wire:navigate>Add
                        Product</a>
                </div> --}}
            </div>
            {{--            {{ $quick_search_filter }} --}}
            <hr>
            <div class="bg-white overflow-x-auto rounded-lg p-3">
                <div id="table-headers" class="mb-1">
                    <div
                        class="flex flex-column flex-sm-row flex-shrink-0 min-w-full  items-center text-center tablelike">
                        {{-- <p class="mb-0 min-w-[40px] !text-gray-400 !font-light border-b-2 border-blue-300">
                            <input class="form-check-input" type="checkbox">
                        </p> --}}
                        <p class="mb-0  min-w-[60px] !text-gray-400 !font-light border-b-2 border-blue-300">
                            IMG
                        </p>
                        <p class="mb-0 min-w-[40px]  !text-gray-400 !font-light border-b-2 border-blue-300">
                            #
                        </p>
                        <p class="mb-0 min-w-[100px] flex-1 text-start !text-gray-400 !font-light border-b-2 border-blue-300">
                            Product
                        </p>
                        {{-- <p class=" mb-0 min-w-[100px]  !text-gray-400 !font-light border-b-2 border-blue-300">
                            Quantity
                        </p> --}}
                        <p class=" mb-0  min-w-[100px]  !text-gray-400 !font-light border-b-2 border-blue-300">
                            Total Price
                        </p>

                        <p class=" mb-0  min-w-[100px] flex-1  !text-gray-400 !font-light border-b-2 border-blue-300">
                            Payment Status
                        </p>
                        <p class=" mb-0 min-w-[100px]  !text-gray-400 !font-light border-b-2 border-blue-300">
                            Order Status
                        </p>
                        <p class=" mb-0 min-w-[100px]  !text-gray-400 !font-light border-b-2 border-blue-300">
                            Action
                        </p>
                    </div>
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

                <div wire:loading.remove x-transition>
                    @if ($this->getPurchaseItemList->count() > 0)
                        {{--                    {{ $this->getPurchaseItemList->count() }} --}}
                        @foreach ($this->getPurchaseItemList as $item)
                            {{-- @dd($item) --}}
                            <livewire:component.order-list-component :item="$item" :itemProductInfo="$item"
                                :key="$item->id" />
                            {{--                        {{ $item->slug }} --}}
                        @endforeach
                        <div class="content-center pt-3">
                            {{ $this->getPurchaseItemList->links() }}
                        </div>
                    @else
                        <div class="flex content-center text-gray-500 p-6">
                            <h4>No Product Listed</h4>
                        </div>
                    @endif
                </div>

                {{--                {{ $this->getPurchaseItemList->count() }} --}}
                {{--                 <button wire:click="$dispatch('openModal', { component: 'livewire.modals.sample-modal' })">Edit User --}}
                {{--                 </button> --}}
                {{--                 <button onclick="Livewire.dispatch('openModal', { component: 'livewire.modals.samplemodal' })">Edit --}}
                {{--                     User --}}
                {{--                 </button> --}}
                {{--                 <button wire:click="$dispatch('openModal', { component: 'edit-user' })">Edit User</button> --}}
            </div>
        </div>
        <div class="hidden ml-3 d-lg-flex flex-none max-w-[14rem] flex-column gap-3 items-center md:content-center h-full py-4">
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
                        <div class="w-full flex justify-center mb-0 min-w-[100px] p-2 !text-gray-600 !font-light items-center">
                            <button id="faqs-title-01" type="button" class="flex items-center justify-center text-center p-1 bg-white rounded-lg"
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
