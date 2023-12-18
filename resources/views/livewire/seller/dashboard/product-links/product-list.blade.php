<div class="h-full w-full p-4" x-data="">
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <x-slot:page_header>
        Product Management
    </x-slot:page_header>
    <div class="flex h-full">

        <div class="flex-1 w-64">
            <div class="flex flex-column flex-lg-row justify-between gap-2 ">
                <div
                    class="flex lg:hidden flex-none  flex-column gap-3 items-center md:content-center h-full py-4 pr-4">
                    <div class="w-full h-fit py-6 pr-4 rounded-lg shadow pl-3 justify-start bg-white">
                        <p class="text-xs text-center font-light uppercase text-gray-700 max-w-7xl">Overview</p>
                        <div class="py-2">
                            <p class="text-sm text-center font-base text-gray-500 mb-1">Total Products Listed</p>
                            <input type="text" class="font-semibold bg-transparent w-full text-center form-control-lg"
                                wire:model="total_products_count" disabled>
                        </div>
                        <div class="py-2 text-center">
                            <div class="px-2">
                                <p class="text-xs font-base text-gray-500 mb-1">Available Products</p>
                                <input type="text" class="font-semibold bg-transparent w-full text-center"
                                    wire:model="total_available_count" disabled>
                            </div>
                        </div>
                        <div class="py-2 text-center flex justify-center">
                            <div class="px-2">
                                <p class="text-xs font-base text-gray-500 mb-1">Brand New</p>
                                <input type="text" class="font-semibold bg-transparent w-full text-center"
                                    wire:model="total_brandnew_count" disabled>
                            </div>
                            <div class="px-2">
                                <p class="text-xs font-base text-gray-500 mb-1">Used</p>
                                <input type="text" class="font-semibold bg-transparent w-full text-center"
                                    wire:model="total_used_count" disabled>
                            </div>
                        </div>
                        <div class="py-2 text-center flex justify-center">
                            <div class="px-2">
                                <p class="text-xs font-base text-gray-500 mb-1">Overall Products Rating</p>
                                <div class="flex w-50 mx-auto px-5">
                                    <i class="bi bi-star-fill text-yellow-400 my-auto"></i>
                                    <input type="text" class="font-semibold bg-transparent w-fit"
                                        wire:model="total_products_rating" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="py-2 text-center">
                            <p class="text-sm font-base text-gray-500 mb-1">Stock Issues</p>
                            <p class="font-semibold">0</p>
                        </div>
                    </div>
                    <div class="h-fit py-6 pr-4 rounded-lg shadow pl-3 justify-start bg-white">
                        <div class="w-full content-center text-red-500 text-sm font-light">
                            <h6>Hot Products</h6>
                        </div>
                        {{-- hot product items display --}}
                        <div class="grid md:grid-cols-3 gap-1.5">
                            {{-- <button class="content-center p-2 border rounded border-gray-100"> --}}
                                {{-- <img src="{{ asset($item->image) }}" class="rounded-lg mx-auto d-block w-8 h-8"
                                    --}} {{-- alt="Product-Thumbnail"> --}}
                                {{-- </button> --}}
                            {{-- <button class="content-center p-2 border rounded border-gray-100"> --}}
                                {{-- <img src="{{ asset($item->image) }}" class="rounded-lg mx-auto d-block w-8 h-8"
                                    --}} {{-- alt="Product-Thumbnail"> --}}
                                {{-- </button> --}}
                            {{-- <button class="content-center p-2 border rounded border-gray-100"> --}}
                                {{-- <img src="{{ asset($item->image) }}" class="rounded-lg mx-auto d-block w-8 h-8"
                                    --}} {{-- alt="Product-Thumbnail"> --}}
                                {{-- </button> --}}
                            {{-- <button class="content-center p-2 border rounded border-gray-100"> --}}
                                {{-- <img src="{{ asset($item->image) }}" class="rounded-lg mx-auto d-block w-8 h-8"
                                    --}} {{-- alt="Product-Thumbnail"> --}}
                                {{-- </button> --}}
                            {{-- <button class="content-center p-2 border rounded border-gray-100"> --}}
                                {{-- <img src="{{ asset($item->image) }}" class="rounded-lg mx-auto d-block w-8 h-8"
                                    --}} {{-- alt="Product-Thumbnail"> --}}
                                {{-- </button> --}}
                        </div>
                    </div>
                </div>
                {{-- stock filter --}}
                <div x-data="{ isOpen: false }" class="relative inline-block ">
                    <!-- Dropdown toggle button -->
                    <button @click="isOpen = !isOpen"
                        class="relative z-10 w-full flex items-center p-2 text-sm text-gray-600 gap-1">
                        <span class="mx-1">IN STOCK</span>
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
                                class="mb-0 w-full text-start uppercase text-sm p-2.5 tracking-tight rounded hover:bg-gray-100"
                                @click="isOpen = false">In Stock
                            </button>
                            <button
                                class="mb-0 w-full text-start uppercase text-sm p-2.5 tracking-tight rounded hover:bg-gray-100"
                                @click="isOpen = false">Out of Stock
                            </button>
                        </div>
                    </div>
                </div>
                <div class="flex flex-column flex-lg-row lg:items-center gap-2.5">
                    {{-- Category Filter --}}
                    <div x-data="{ isOpen: false }" class="relative inline-block ">
                        <!-- Dropdown toggle button -->
                        <button @click="isOpen = !isOpen"
                            class="relative z-10 w-full flex items-center border border-gray-400 p-2 rounded-lg text-sm bg-white text-gray-600 gap-1">
                            <span class="mx-1">Category:
                                {{ CustomHelper::maptopropercatetory($category_filter) }}</span>
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
                                @foreach (CustomHelper::categoryList() as $category_key => $category_value)
                                <button
                                    class="mb-0 w-full text-start uppercase text-sm p-1.5 tracking-tight rounded hover:bg-gray-100"
                                    type="button" wire:click.debounce="$set('category_filter', '{{ $category_key }}')">
                                    {{ $category_value }}
                                </button>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    {{-- Brand Filter --}}
                    {{-- <div x-data="{ isOpen: false }" class="relative inline-block "> --}}
                        {{-- <!-- Dropdown toggle button --> --}}
                        {{-- <button @click="isOpen = !isOpen" --}} {{--
                            class="relative z-10 w-full flex items-center border border-gray-400 p-2 rounded-lg text-sm bg-white text-gray-600 gap-1">
                            --}}
                            {{-- <span class="mx-1">Brand: SLUG</span> --}}
                            {{-- <svg class="w-5 h-5 mx-1 rotate-180 transition duration-200" viewBox="0 0 24 24" --}}
                                {{-- fill="none" xmlns="http://www.w3.org/2000/svg" --}} {{--
                                :class="{ 'rotate-180 transition duration-300': isOpen }"> --}}
                                {{-- <path --}} {{--
                                    d="M12 15.713L18.01 9.70299L16.597 8.28799L12 12.888L7.40399 8.28799L5.98999 9.70199L12 15.713Z"
                                    --}} {{-- fill="currentColor"></path> --}}
                                {{-- </svg> --}}
                            {{-- </button> --}}
                        {{-- <!-- Dropdown menu --> --}}
                        {{-- <div x-cloak x-show="isOpen" @click.away="isOpen = false" --}} {{--
                            x-transition:enter="transition ease-out duration-100" --}} {{--
                            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                            --}} {{-- x-transition:leave="transition ease-in duration-100" --}} {{--
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
                            --}} {{--
                            class="absolute left-0 z-20 mt-1 w-full shadow overflow-hidden origin-top-right bg-transparent rounded-md dark:bg-gray-800 front">
                            --}}
                            {{-- <div class="bg-white rounded border-1 border-gray-300"> --}}
                                {{-- <p class="mb-0 uppercase text-sm p-2 tracking-tight">SLUG</p> --}}
                                {{-- <p class="mb-0 uppercase text-sm p-2 tracking-tight">SLUG</p> --}}
                                {{-- </div> --}}
                            {{-- </div> --}}
                        {{-- </div> --}}
                    <div class="px-2.5 transition ease-in-out duration-300 {{ $category_filter ? 'block' : 'hidden' }}"
                        x-transition>
                        <button wire:click.debounce="$set('category_filter', '')">
                            <span class="text-sm text-gray-600 tracking-tight">
                                Clear Filter
                            </span>
                        </button>
                    </div>
                    {{-- searchning filter --}}
                    <div>
                        <div class="relative text-gray-600">
                            <label for="quick_search" class="sr-only">Search</label>
                            <div class="flex gap-1.5 items-center">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="bi bi-search"></i>
                                    </span>
                                    <input id="quick_search" type="search" name="serch" placeholder="Quick Search"
                                        class="form-control bg-white w-full h-full border-gray-200 !rounded-r-lg text-sm focus:outline-none"
                                        wire:model.live="quick_search_filter">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="flex items-center text-blue-500 justify-center gap-1">
                    <i class="bi bi-plus"></i>
                    <a href="{{ route('product-new') }}" class="no-underline decoration-0 text-sm mb-0"
                        wire:navigate>Add
                        Product</a>
                </div>
            </div>
            {{-- {{ $quick_search_filter }} --}}
            <hr>
            <div class="bg-white overflow-x-auto rounded-lg p-3 my-4">
                <div id="table-headers" class="mb-1">
                    <div
                        class="flex flex-column flex-sm-row flex-shrink-0 min-w-full  items-center text-center tablelike">
                        <p class="mb-0 min-w-[40px] !text-gray-400 !font-light border-b-2 border-blue-300">
                            <input class="form-check-input" type="checkbox">
                        </p>
                        <p class="mb-0  min-w-[60px] !text-gray-400 !font-light border-b-2 border-blue-300">
                            IMG
                        </p>
                        <p class="mb-0 min-w-[40px]  !text-gray-400 !font-light border-b-2 border-blue-300">
                            #
                        </p>
                        <p class="mb-0 min-w-[100px] flex-1 !text-gray-400 !font-light border-b-2 border-blue-300">
                            Name
                        </p>
                        <p class=" mb-0 min-w-[100px] flex-1 !text-gray-400 !font-light border-b-2 border-blue-300">
                            Category
                        </p>
                        <p class=" mb-0  min-w-[100px]  !text-gray-400 !font-light border-b-2 border-blue-300">
                            Price
                        </p>
                        <p class=" mb-0 min-w-[100px]  !text-gray-400 !font-light border-b-2 border-blue-300">
                            Stock
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
                    @if ($this->getProductList->count() > 0)
                    {{-- {{ $this->getProductList->count() }} --}}
                    @foreach ($this->getProductList as $item)
                    {{-- <div wire:key="{{ $item->id }}" x-data="{ expanded: false }" class="py-2 bg-white"> --}}
                        {{-- <div
                            class="flex flex-column flex-lg-row flex-shrink-0 min-w-full items-center text-center"> --}}
                            {{-- <span class="mb-0 p-2 min-w-[40px] !text-gray-400 !font-light"> --}}
                                {{-- <input class="form-check-input" wire:model.live="select_products" --}} {{--
                                    value="{{ $item->id }}" type="checkbox"> --}}
                                {{-- </span> --}}
                            {{-- <div class="relative items-center  mb-0 min-w-[60px] p-2 !text-gray-800 !font-light">
                                --}}
                                {{-- --}}{{-- <img
                                    src="https://images.unsplash.com/photo-1523779917675-b6ed3a42a561?ixid=MnwxMjA3fDB8MHxzZWFyY2h8N3x8d29tYW4lMjBibHVlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=face&w=500&q=200"
                                    --}} {{-- <img src="{{ asset($item->image) }}"
                                    class="rounded-lg mx-auto d-block w-9 h-9" --}} {{-- alt="Product-Thumbnail"> --}}
                                {{-- </div> --}}
                            {{-- <div class="mb-0 min-w-[40px] p-2 !text-gray-800 !font-light"> --}}
                                {{-- {{ $item->id }} --}}
                                {{-- </div> --}}
                            {{-- <div class="mb-0 min-w-[100px] text-start p-2 flex-1 !text-gray-800 !font-light"> --}}
                                {{-- {{ $item->title }} --}}
                                {{-- </div> --}}
                            {{-- <div class=" mb-0 min-w-[100px] p-2 flex-1 !text-gray-800 !font-light"> --}}
                                {{-- {{ \App\Helper\Helper::maptopropercatetory($item->category) }} --}}
                                {{-- </div> --}}
                            {{-- <div class=" mb-0  min-w-[100px] p-2 !text-gray-800 !font-light"> --}}
                                {{-- {{ $item->price }} --}}
                                {{-- </div> --}}
                            {{-- <div class=" mb-0 min-w-[100px] p-2 !text-gray-800 !font-light"> --}}
                                {{-- Stock --}}
                                {{-- </div> --}}
                            {{-- <div --}} {{--
                                class="flex justify-center mb-0 min-w-[100px] p-2 !text-gray-600 !font-light items-center">
                                --}}
                                {{-- <button id="faqs-title-01" type="button" --}} {{--
                                    class="flex items-center justify-center text-center font-semibold p-1 bg-white rounded-lg"
                                    --}} {{-- @click="expanded = !expanded" :aria-expanded="expanded" --}} {{--
                                    aria-controls="faqs-text-01"> --}}
                                    {{-- <span class="transform origin-center transition duration-200 ease-out" --}}
                                        {{-- :class="{ '!rotate-180': expanded }"> --}}
                                        {{-- <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" --}} {{--
                                            xmlns="http://www.w3.org/2000/svg"> --}}
                                            {{-- <path --}} {{--
                                                d="M12 15.713L18.01 9.70299L16.597 8.28799L12 12.888L7.40399 8.28799L5.98999 9.70199L12 15.713Z"
                                                --}} {{-- fill="currentColor"></path> --}}
                                            {{-- </svg> --}}
                                        {{-- </span> --}}
                                    {{-- </button> --}}
                                {{-- </div> --}}
                            {{-- </div> --}}
                        {{-- <div id="faqs-text-01" role="region" aria-labelledby="faqs-title-01" --}} {{--
                            class="grid text-sm text-slate-600 overflow-hidden transition-all duration-300 ease-in-out"
                            --}} {{-- :class="expanded ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'">
                            --}}
                            {{-- <div class="overflow-hidden"> --}}
                                {{-- <p class="pb-3"> --}}
                                    {{-- If you go over your organisations or user limit, a member of the team will
                                    reach out --}}
                                    {{-- about --}}
                                    {{-- bespoke pricing. In the meantime, our collaborative features won't appear in
                                    --}}
                                    {{-- accounts or --}}
                                    {{-- users that are over the 100-account or 1,000-user limit. --}}
                                    {{-- If you go over your organisations or user limit, a member of the team will
                                    reach out --}}
                                    {{-- about --}}
                                    {{-- bespoke pricing. In the meantime, our collaborative features won't appear in
                                    --}}
                                    {{-- accounts or --}}
                                    {{-- users that are over the 100-account or 1,000-user limit. If you go over your
                                    --}}
                                    {{-- organisations --}}
                                    {{-- or user limit, a member of the team will reach out about --}}
                                    {{-- bespoke pricing. In the meantime, our collaborative features won't appear in
                                    --}}
                                    {{-- accounts or --}}
                                    {{-- users that are over the 100-account or 1,000-user limit. --}}
                                    {{-- </p> --}}
                                {{-- </div> --}}
                            {{-- </div> --}}
                        {{-- </div> --}}
                    {{-- @dd($item) --}}
                    <livewire:component.product-list-component :item="$item" :itemProductInfo="$item"
                        :key="$item->id" />
                    {{-- {{ $item->slug }} --}}
                    @endforeach
                    <div class="content-center pt-3">
                        {{ $this->getProductList->links() }}
                    </div>
                    @else
                    <div class="flex content-center text-gray-500 p-6">
                        <h4>No Product Listed</h4>
                    </div>
                    @endif
                </div>

                {{-- {{ $this->getProductList->count() }} --}}
                {{-- <button wire:click="$dispatch('openModal', { component: 'livewire.modals.sample-modal' })">Edit
                    User --}}
                    {{-- </button> --}}
                {{-- <button onclick="Livewire.dispatch('openModal', { component: 'livewire.modals.samplemodal' })">Edit
                    --}}
                    {{-- User --}}
                    {{-- </button> --}}
                {{-- <button wire:click="$dispatch('openModal', { component: 'edit-user' })">Edit User</button> --}}
            </div>
        </div>
        <div
            class="hidden ml-3 d-lg-flex flex-none max-w-[14rem] flex-column gap-3 items-center md:content-center h-full py-4 pr-4">
            <div class="w-full h-fit py-6 pr-4 rounded-lg shadow pl-3 justify-start bg-white">
                <p class="text-xs text-center font-light uppercase text-gray-700 max-w-7xl">Overview</p>
                <div class="py-2">
                    <p class="text-sm text-center font-base text-gray-500 mb-1">Total Products Listed</p>
                    <input type="text" class="font-semibold bg-transparent w-full text-center form-control-lg"
                        wire:model="total_products_count" disabled>
                </div>
                <div class="py-2 text-center">
                    <div class="px-2">
                        <p class="text-xs font-base text-gray-500 mb-1">Available Products</p>
                        <input type="text" class="font-semibold bg-transparent w-full text-center"
                            wire:model="total_available_count" disabled>
                    </div>
                </div>
                <div class="py-2 text-center flex justify-center">
                    <div class="px-2">
                        <p class="text-xs font-base text-gray-500 mb-1">Brand New</p>
                        <input type="text" class="font-semibold bg-transparent w-full text-center"
                            wire:model="total_brandnew_count" disabled>
                    </div>
                    <div class="px-2">
                        <p class="text-xs font-base text-gray-500 mb-1">Used</p>
                        <input type="text" class="font-semibold bg-transparent w-full text-center"
                            wire:model="total_used_count" disabled>
                    </div>
                </div>
                <div class="py-2 text-center flex flex-column justify-center">

                        <p class="text-xs font-base text-gray-500 mb-2">Overall Products Rating</p>
                        <div class="flex gap-2 mx-auto px-5">
                            <i class="bi bi-star-fill text-yellow-400 my-auto"></i>
                            <label>

                                <p class="mb-0">{{ $total_products_rating }}</p>
                            </label>
                        </div>

                </div>
                <div class="py-2 text-center">
                    <p class="text-sm font-base text-gray-500 mb-1">Stock Issues</p>
                    <p class="font-semibold">0</p>
                </div>
            </div>
            <div class="h-fit py-6 pr-4 rounded-lg shadow pl-3 justify-start bg-white">
                <div class="w-full content-center text-red-500 text-sm font-light">
                    <h6>Hot Products</h6>
                </div>
                {{-- hot product items display --}}
                 <div class="grid md:grid-cols-3 gap-1.5">
                  {{--   <button class="content-center p-2 border rounded border-gray-100">
                        <img src="{{ asset($item->product) }}" class="rounded-lg mx-auto d-block w-8 h-8"
                            alt="Product-Thumbnail">
                         </button>
                     <button class="content-center p-2 border rounded border-gray-100">
                         <img src="{{ asset($item->image) }}" class="rounded-lg mx-auto d-block w-8 h-8"
                            alt="Product-Thumbnail">
                         </button>
                     <button class="content-center p-2 border rounded border-gray-100">
                         <img src="{{ asset($item->image) }}" class="rounded-lg mx-auto d-block w-8 h-8"
                            alt="Product-Thumbnail">
                         </button>
                     <button class="content-center p-2 border rounded border-gray-100">
                         <img src="{{ asset($item->image) }}" class="rounded-lg mx-auto d-block w-8 h-8"
                            alt="Product-Thumbnail">
                         </button>
                     <button class="content-center p-2 border rounded border-gray-100">
                         <img src="{{ asset($item->image) }}" class="rounded-lg mx-auto d-block w-8 h-8"
                            alt="Product-Thumbnail">
                        </button> --}}
                     <div wire:init="getPopularProducts"></div>
                </div>
            </div>
        </div>
    </div>
</div>
