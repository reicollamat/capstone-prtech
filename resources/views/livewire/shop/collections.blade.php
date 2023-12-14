<div>

    {{-- session flash notification --}}
    <x-notification-alert>
        @if (session('notification-livewire'))
            {{ session('notification-livewire') }}
        @else
            {{ session('notification') }}
        @endif
    </x-notification-alert>

    {{-- session flash notification --}}
    {{-- for add-to-wishlist --}}
    <div class="alert alert-primary rounded alert-dismissible fade show" role="alert"
        style="display: none; position: fixed; top: 20px; right: 25px; width: 25%; z-index:9999; font-size: 14px;"
        x-data="{ show: false }" x-show="show" x-transition:leave.duration.500ms x-init="@this.on('notif-alert-wishlist', () => {
            show = true;
            setTimeout(() => { show = false; }, 5000)
        })">
        {{ session('notification-livewire') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <span>
        {{--        {{ $sortingby }} --}}
        {{--        {{ $sortdirection }} --}}
        {{--        {{ $sortname }} --}}
        {{--        {{ $search }} --}}
        {{--        {{ $category }} --}}
    </span>

    <div>
        <div class="container-fluid sm:!px-16 py-4">
            <div class="d-flex justify-end ">
                <div class="position-relative">
                    <div x-data="{ open: false }" @mouseleave="open = false">
                        <button class="btn btn-outline-dark hover:! hover:!text-black bg-white  min-w-[175px]"
                            @mouseover="open = true">
                            <div class="d-flex justify-between" @class(['bg-blue-50 text-blue-900' => true === 'default'])>
                                {{ $sortname }}
                                <span class="ml-1" :class="{ 'rotated': open }">
                                    <i class="bi bi-caret-up"></i>
                                </span>
                            </div>
                        </button>
                        <ul x-cloak x-show="open"
                            class="position-absolute w-full min-w-[170px] z-50 end-0 !pl-0 bg-white shadow text-sm mt-2 rounded"
                            x-transition.origin.top>
                            {{--                            @foreach ($sortoptions as $key => $value) --}}
                            {{--                                <button class="w-full p-2.5 hover:bg-blue-50 hover:text-blue-900 text-start" --}}
                            {{--                                    @class(['text-blue-900' => $key == $sortingby]) wire:key="{{ $key }}" --}}
                            {{--                                    x-on:click="open = !open">{{ $value }} --}}
                            {{--                                </button> --}}
                            {{--                            @endforeach --}}
                            <div @class([
                                '!bg-blue-50 !text-blue-900' =>
                                    $sortingby === 'title' and $sortdirection === 'desc',
                            ])>
                                <button class="w-full p-2.5 hover:bg-blue-50 hover:text-blue-900 text-start"
                                    wire:key="price-desc" x-on:click="open = !open"
                                    wire:click.debounce="sortBy('Bestselling','purchase_count', 'desc')">
                                    Best selling
                                </button>
                            </div>
                            <div @class([
                                '!bg-blue-50 !text-blue-900' =>
                                    $sortingby === 'title' and $sortdirection === 'asc',
                            ])>
                                <button class="w-full p-2.5 hover:bg-blue-50 hover:text-blue-900 text-start"
                                    wire:key="price-asc" x-on:click="open = !open"
                                    wire:click.debounce="sortBy('Alphabetically: A to Z','title', 'asc')">
                                    Alphabetically: A to Z
                                </button>
                            </div>
                            <div @class([
                                '!bg-blue-50 !text-blue-900' =>
                                    $sortingby === 'title' and $sortdirection === 'desc',
                            ])>
                                <button class="w-full p-2.5 hover:bg-blue-50 hover:text-blue-900 text-start"
                                    wire:key="price-desc" x-on:click="open = !open"
                                    wire:click.debounce="sortBy('Alphabetically: Z to A','title', 'desc')">
                                    Alphabetically: Z to A
                                </button>
                            </div>

                            <div @class([
                                '!bg-blue-50 !text-blue-900' =>
                                    $sortingby === 'price' and $sortdirection === 'asc',
                            ])>
                                <button class="w-full p-2.5 hover:bg-blue-50 hover:text-blue-900 text-start"
                                    wire:key="price-asc" x-on:click="open = !open"
                                    wire:click.debounce="sortBy('Price: Low to High','price', 'asc')">
                                    Price: Low to High
                                </button>
                            </div>
                            <div @class([
                                '!bg-blue-50 !text-blue-900' =>
                                    $sortingby === 'price' and $sortdirection === 'desc',
                            ])>
                                <button class="w-full p-2.5 hover:bg-blue-50 hover:text-blue-900 text-start"
                                    wire:key="price-desc" x-on:click="open = !open"
                                    wire:click.debounce="sortBy('Price: High to Low','price', 'desc')">
                                    Price: High to Low
                                </button>
                            </div>

                            <div @class([
                                '!bg-blue-50 !text-blue-900' =>
                                    $sortingby === 'created_at' and $sortdirection === 'asc',
                            ])>
                                <button class="w-full p-2.5 hover:bg-blue-50 hover:text-blue-900 text-start"
                                    wire:key="date-asc" x-on:click="open = !open"
                                    wire:click.debounce="sortBy('Date: Old to New','created_at', 'asc')">
                                    Date: Old to New
                                </button>
                            </div>
                            <div @class([
                                '!bg-blue-50 !text-blue-900' =>
                                    $sortingby === 'created_at' and $sortdirection === 'desc',
                            ])>
                                <button class="w-full p-2.5 hover:bg-blue-50 hover:text-blue-900 text-start"
                                    wire:key="date-desc" x-on:click="open = !open"
                                    wire:click.debounce="sortBy('Date: New to Old','created_at', 'desc')">
                                    Date: New to Old
                                </button>
                            </div>

                            <div @class([
                                '!bg-blue-50 !text-blue-900' =>
                                    $sortingby === 'rating' and $sortdirection === 'asc',
                            ])>
                                <button class="w-full p-2.5 hover:bg-blue-50 hover:text-blue-900 text-start"
                                    wire:key="rating-asc" x-on:click="open = !open"
                                    wire:click.debounce="sortBy('Rating: Low to High','rating', 'asc')">
                                    Rating: Low to High
                                </button>
                            </div>
                            <div @class([
                                '!bg-blue-50 !text-blue-900' =>
                                    $sortingby === 'rating' and $sortdirection === 'desc',
                            ])>
                                <button class="w-full p-2.5 hover:bg-blue-50 hover:text-blue-900 text-start"
                                    wire:key="rating-desc" x-on:click="open = !open"
                                    wire:click.debounce="sortBy('Rating: High to Low','rating', 'desc')">
                                    Rating: High to Low
                                </button>
                            </div>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="row" x-transition>
                <div class="hidden md:block col-auto col-0">
                    {{--                     <livewire:shop.collection-filter /> --}}
                    <div class="max-w-max">
                        <div class="p-2" style="border: 1px solid #FFFFFF">
                            <h5 class="section-title position-relative text-uppercase underline underline-offset-4">
                                <span class="pr-3">Filter by Category</span>
                            </h5>
                            <div class="">
                                <div class="category">
                                    <div
                                        class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                                        <input type="checkbox" class="custom-control-input" name="computer_case"
                                            value="computer_case" id="computer_case" wire:model.live="category_filter">
                                        <label class="custom-control-label" for="computer_case">Computer Case</label>
                                        <span
                                            class="font-weight-normal">{{ $all_products->where('category', 'computer_case')->count() }}</span>
                                    </div>
                                    <div
                                        class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                                        <input type="checkbox" class="custom-control-input" name="case_fan"
                                            value="case_fan" wire:model.live="category_filter" id="case_fan">
                                        <label class="custom-control-label" for="case_fan">Case Fan</label>
                                        <span
                                            class="font-weight-normal">{{ $all_products->where('category', 'case_fan')->count() }}</span>
                                    </div>
                                    <div
                                        class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                                        <input type="checkbox" class="custom-control-input" name="cpu"
                                            id="cpu" value="cpu" wire:model.live="category_filter">
                                        <label class="custom-control-label" for="cpu">CPU</label>
                                        <span
                                            class="font-weight-normal">{{ $all_products->where('category', 'cpu')->count() }}</span>
                                    </div>
                                    <div
                                        class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                                        <input type="checkbox" class="custom-control-input" name="cpu_cooler"
                                            value="cpu_cooler" wire:model.live="category_filter">
                                        <label class="custom-control-label" for="cpu_cooler">CPU Cooler</label>
                                        <span
                                            class="font-weight-normal">{{ $all_products->where('category', 'cpu_cooler')->count() }}</span>
                                    </div>
                                    <div
                                        class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                                        <input type="checkbox" class="custom-control-input" name="ext_storage"
                                            value="ext_storage" wire:model.live="category_filter">
                                        <label class="custom-control-label" for="ext_storage">External Storage</label>
                                        <span
                                            class="font-weight-normal">{{ $all_products->where('category', 'ext_storage')->count() }}</span>
                                    </div>
                                    <div
                                        class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                                        <input type="checkbox" class="custom-control-input" name="int_storage"
                                            value="int_storage" wire:model.live="category_filter">
                                        <label class="custom-control-label" for="int_storage">Internal Storage</label>
                                        <span
                                            class="font-weight-normal">{{ $all_products->where('category', 'int_storage')->count() }}</span>
                                    </div>
                                    <div
                                        class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                                        <input type="checkbox" class="custom-control-input" name="headphone"
                                            value="headphone" wire:model.live="category_filter">
                                        <label class="custom-control-label" for="headphone">Headphone</label>
                                        <span
                                            class="font-weight-normal">{{ $all_products->where('category', 'headphone')->count() }}</span>
                                    </div>
                                    <div
                                        class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                                        <input type="checkbox" class="custom-control-input" name="keyboard"
                                            value="keyboard" wire:model.live="category_filter">
                                        <label class="custom-control-label" for="keyboard">Keyboard</label>
                                        <span
                                            class="font-weight-normal">{{ $all_products->where('category', 'keyboard')->count() }}</span>
                                    </div>
                                    <div
                                        class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                                        <input type="checkbox" class="custom-control-input" name="memory"
                                            value="memory" wire:model.live="category_filter">
                                        <label class="custom-control-label" for="memory">Memory</label>
                                        <span
                                            class="font-weight-normal">{{ $all_products->where('category', 'memory')->count() }}</span>
                                    </div>
                                    <div
                                        class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                                        <input type="checkbox" class="custom-control-input" name="monitor"
                                            value="monitor" wire:model.live="category_filter">
                                        <label class="custom-control-label" for="monitor">Monitor</label>
                                        <span
                                            class=" font-weight-normal">{{ $all_products->where('category', 'monitor')->count() }}</span>
                                    </div>
                                    <div
                                        class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                                        <input type="checkbox" class="custom-control-input" name="motherboard"
                                            value="motherboard" wire:model.live="category_filter">
                                        <label class="custom-control-label" for="motherboard">Motherboard</label>
                                        <span
                                            class="font-weight-normal">{{ $all_products->where('category', 'motherboard')->count() }}</span>
                                    </div>
                                    <div
                                        class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                                        <input type="checkbox" class="custom-control-input" name="mouse"
                                            value="mouse" wire:model.live="category_filter">
                                        <label class="custom-control-label" for="mouse">Mouse</label>
                                        <span
                                            class="font-weight-normal">{{ $all_products->where('category', 'mouse')->count() }}</span>
                                    </div>
                                    <div
                                        class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                                        <input type="checkbox" class="custom-control-input" name="psu"
                                            value="psu" wire:model.live="category_filter">
                                        <label class="custom-control-label" for="psu">Power Supply</label>
                                        <span
                                            class="font-weight-normal">{{ $all_products->where('category', 'psu')->count() }}</span>
                                    </div>
                                    <div
                                        class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                                        <input type="checkbox" class="custom-control-input" name="speaker"
                                            value="speaker" wire:model.live="category_filter">
                                        <label class="custom-control-label" for="speaker">Speaker</label>
                                        <span
                                            class="font-weight-normal">{{ $all_products->where('category', 'speaker')->count() }}</span>
                                    </div>
                                    <div
                                        class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                                        <input type="checkbox" class="custom-control-input" name="video_card"
                                            value="video_card" wire:model.live="category_filter">
                                        <label class="custom-control-label" for="video_card">Graphics Card</label>
                                        <span
                                            class="font-weight-normal">{{ $all_products->where('category', 'video_card')->count() }}</span>
                                    </div>
                                    <div
                                        class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                                        <input type="checkbox" class="custom-control-input" name="webcam"
                                            value="webcam" wire:model.live="category_filter">
                                        <label class="custom-control-label" for="webcam">Webcam</label>
                                        <span
                                            class="font-weight-normal">{{ $all_products->where('category', 'webcam')->count() }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- By Category End -->

                        <!-- By Condition Start -->
                        <div class="p-2 mt-3" style="border: 1px solid #FFFFFF">
                            <h5
                                class="section-title position-relative text-uppercase mb-3 underline underline-offset-4">
                                <span class="pr-3">Filter by condition</span>
                            </h5>
                            <div class="">
                                <div>
                                    <div
                                        class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                                        <input type="checkbox" class="custom-control-input" name=""
                                            value="brand_new" id="color-1" wire:model.live="conditon_filter">
                                        <label class="custom-control-label" for="color-1">Brand New</label>
                                        <span
                                            class="font-weight-normal">{{ $all_products->where('condition', 'brand_new')->count() }}</span>
                                    </div>
                                    <div
                                        class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                                        <input type="checkbox" class="custom-control-input" name=""
                                            value="used" id="color-2" wire:model.live="conditon_filter">
                                        <label class="custom-control-label" for="color-2">Used</label>
                                        <span
                                            class="font-weight-normal">{{ $all_products->where('condition', 'used')->count() }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- By Color End -->

                        <!-- By Price Start -->
                        <div class="p-2 mt-3" style="border: 1px solid #FFFFFF">
                            <h5 class="section-title position-relative text-uppercase underline underline-offset-4">
                                <span class="pr-3">Filter by price</span>
                            </h5>
                            <div class="">
                                <div>
                                    <div
                                        class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                                        <input type="checkbox" class="custom-control-input" name=""
                                            value="" id="price-1" wire:model.live="price_bracket">
                                        <label class="custom-control-label" for="price-1">₱0 - ₱5000</label>
                                    </div>
                                    <div
                                        class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                                        <input type="checkbox" class="custom-control-input" name=""
                                            value="" id="price-2" wire:model.live="price_bracket">
                                        <label class="custom-control-label" for="price-2">₱6000 - ₱10000</label>
                                    </div>
                                    <div
                                        class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                                        <input type="checkbox" class="custom-control-input" name=""
                                            value="" id="price-3" wire:model.live="price_bracket">
                                        <label class="custom-control-label" for="price-3">₱11000 - ₱20000</label>
                                    </div>
                                    <div
                                        class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                                        <input type="checkbox" class="custom-control-input" name=""
                                            value="" id="price-4" wire:model.live="price_bracket">
                                        <label class="custom-control-label" for="price-4">₱21000 - ₱30000</label>
                                    </div>
                                    <div
                                        class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                                        <input type="checkbox" class="custom-control-input" name=""
                                            value="" id="price-5" wire:model.live="price_bracket">
                                        <label class="custom-control-label" for="price-5">₱31000 - ₱40000</label>
                                    </div>
                                    <div
                                        class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                                        <input type="checkbox" class="custom-control-input" name=""
                                            value="" id="price-6" wire:model.live="price_bracket">
                                        <label class="custom-control-label" for="price-5">₱41000 - Above</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- By Price End -->

                        <!-- By Stars Start -->
                        <div class="p-2 mt-3" style="border: 1px solid #FFFFFF">
                            <h5
                                class="section-title position-relative text-uppercase mb-3 underline underline-offset-4 ">
                                <span class="pr-3">Filter by Stars</span>
                            </h5>
                            <div class="">
                                <div>
                                    <div
                                        class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                                        <input type="checkbox" class="custom-control-input" name=""
                                            value="5" id="star-5" wire:model.live="star_rating">
                                        <label class="custom-control-label" for="price-4">
                                            <div class="flex items-center ">(5)
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 22 20">
                                                        <path
                                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                    </svg>
                                                @endfor

                                            </div>

                                        </label>
                                    </div>
                                    <div
                                        class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                                        <input type="checkbox" class="custom-control-input" name=""
                                            value="4" id="star-4" wire:model.live="star_rating">
                                        <label class="custom-control-label" for="price-4">
                                            <div class="flex items-center">(4)
                                                @for ($i = 1; $i <= 4; $i++)
                                                    <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 22 20">
                                                        <path
                                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                    </svg>
                                                @endfor

                                                <svg class="w-4 h-4 text-gray-200 dark:text-gray-600 mr-1"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" viewBox="0 0 22 20">
                                                    <path
                                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                </svg>

                                            </div>

                                        </label>
                                    </div>
                                    <div
                                        class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                                        <input type="checkbox" class="custom-control-input" name=""
                                            value="3" id="star_3" wire:model.live="star_rating">
                                        <label class="custom-control-label" for="price-4">
                                            <div class="flex items-center">(3)
                                                @for ($i = 1; $i <= 3; $i++)
                                                    <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 22 20">
                                                        <path
                                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                    </svg>
                                                @endfor

                                                <svg class="w-4 h-4 text-gray-200 dark:text-gray-600 mr-1"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" viewBox="0 0 22 20">
                                                    <path
                                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                </svg>
                                                <svg class="w-4 h-4 text-gray-200 dark:text-gray-600 mr-1"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" viewBox="0 0 22 20">
                                                    <path
                                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                </svg>

                                            </div>

                                        </label>
                                    </div>
                                    <div
                                        class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                                        <input type="checkbox" class="custom-control-input" name=""
                                            value="2" id="star-2" wire:model.live="star_rating">
                                        <label class="custom-control-label" for="price-4">
                                            <div class="flex items-center">(2)
                                                @for ($i = 1; $i <= 2; $i++)
                                                    <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 22 20">
                                                        <path
                                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                    </svg>
                                                @endfor

                                                <svg class="w-4 h-4 text-gray-200 dark:text-gray-600 mr-1"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" viewBox="0 0 22 20">
                                                    <path
                                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                </svg>
                                                <svg class="w-4 h-4 text-gray-200 dark:text-gray-600 mr-1"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" viewBox="0 0 22 20">
                                                    <path
                                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                </svg>
                                                <svg class="w-4 h-4 text-gray-200 dark:text-gray-600 mr-1"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" viewBox="0 0 22 20">
                                                    <path
                                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                </svg>

                                            </div>

                                        </label>
                                    </div>
                                    <div
                                        class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                                        <input type="checkbox" class="custom-control-input" name=""
                                            value="1" id="star-1" wire:model.live="star_rating">
                                        <label class="custom-control-label" for="price-4">
                                            <div class="flex items-center">(1)
                                                <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 22 20">
                                                    <path
                                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                </svg>

                                                <svg class="w-4 h-4 text-gray-200 dark:text-gray-600 mr-1"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" viewBox="0 0 22 20">
                                                    <path
                                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                </svg>
                                                <svg class="w-4 h-4 text-gray-200 dark:text-gray-600 mr-1"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" viewBox="0 0 22 20">
                                                    <path
                                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                </svg>
                                                <svg class="w-4 h-4 text-gray-200 dark:text-gray-600 mr-1"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" viewBox="0 0 22 20">
                                                    <path
                                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                </svg>
                                                <svg class="w-4 h-4 text-gray-200 dark:text-gray-600 mr-1"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" viewBox="0 0 22 20">
                                                    <path
                                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                </svg>

                                            </div>

                                        </label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- SHOP ITEMS --}}

                <div class="col" id="content" x-transition>
                    {{--                    2 of 3 (wider) --}}
                    <div wire:loading.delay wire:target="none" x-transition class="w-full">
                        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 p-3">
                            @for ($i = 0; $i < 8; $i++)
                                <div role="status"
                                    class="max-w-sm p-3 border border-gray-200 rounded shadow animate-pulse md:p-6 dark:border-gray-700">
                                    <div
                                        class="flex items-center justify-center h-48 mb-4 bg-gray-300 rounded dark:bg-gray-300">
                                        <svg class="w-10 h-10 text-gray-100 dark:text-gray-600" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 16 20">
                                            <path
                                                d="M14.066 0H7v5a2 2 0 0 1-2 2H0v11a1.97 1.97 0 0 0 1.934 2h12.132A1.97 1.97 0 0 0 16 18V2a1.97 1.97 0 0 0-1.934-2ZM10.5 6a1.5 1.5 0 1 1 0 2.999A1.5 1.5 0 0 1 10.5 6Zm2.221 10.515a1 1 0 0 1-.858.485h-8a1 1 0 0 1-.9-1.43L5.6 10.039a.978.978 0 0 1 .936-.57 1 1 0 0 1 .9.632l1.181 2.981.541-1a.945.945 0 0 1 .883-.522 1 1 0 0 1 .879.529l1.832 3.438a1 1 0 0 1-.031.988Z" />
                                            <path
                                                d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.98 2.98 0 0 0 .13 5H5Z" />
                                        </svg>
                                    </div>
                                    <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-300 w-48 mb-4"></div>
                                    <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-300 mb-2.5"></div>
                                    <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-300 mb-2.5"></div>
                                    <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-300"></div>
                                    <div class="flex items-center mt-4 space-x-3">
                                        <div>
                                            <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-300 w-full mb-2">
                                            </div>
                                            <div class="w-48 h-2 bg-gray-200 rounded-full dark:bg-gray-300"></div>
                                        </div>
                                    </div>
                                    <span class="sr-only">Loading...</span>
                                </div>
                            @endfor
                        </div>
                    </div>

                    <div x-transition>
                        <div class="grid grid-cols-2  lg:grid-cols-4 gap-3 p-3">

                            {{-- product showcases --}}
                            @foreach ($this->getProducts as $product)
                                <div wire:key="{{ $product->id }}">
                                    <div
                                        class="w-full h-full max-w-sm bg-white border border-gray-200 rounded-lg hover:shadow-2xl hover:transition position-relative">
                                        <div>
                                            <div class="position-absolute top-0 end-0 mt-1 mr-2.5 z-[30]">
                                                @if ($this->check_bookmark($product->id))
                                                    <button type="button" wire:click="removefromwishlist({{ $product->id }})">
                                                        <i class="bi bi-heart-fill" style="font-size: 1.5rem"></i>
                                                    </button>
                                                @else
                                                    <button type="button" wire:click="addtowishlist({{ $product->id }})">
                                                        <i class="bi bi-heart" style="font-size: 1.5rem"></i>
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="btn w-full"
                                            wire:click="to_details_page({{ $product->id }}, '{{ $product->category }}')">
                                            <div
                                                class="position-relative w-auto h-auto bg-center bg-cover content-center min-h-[257px] p-2">
                                                <img class="h-auto max-h-[200px] w-auto object-center object-contain"
                                                    src="{{ asset($product->product_images[0]->image_paths) }}"
                                                    alt="product image" />
                                            </div>

                                            <div class="p-2.5">
                                                <h5
                                                    class="text-lg font-semibold tracking-tight text-gray-900 text-ellipsis overflow-hidden">
                                                    {{ $product->title }}</h5>
                                                <h6 class="text-sm italic text-gray-600 text-ellipsis overflow-hidden">
                                                    <i class="bi bi-shop"></i> {{ $product->seller->shop_name }}
                                                </h6>
                                                <div class="d-flex content-center mt-2.5 mb-2.5">
                                                    @for ($i = 0; $i < intval($product->rating); $i++)
                                                        <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                            viewBox="0 0 22 20">
                                                            <path
                                                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                        </svg>
                                                    @endfor
                                                    <span
                                                        class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3">{{ $product->rating }}</span>
                                                </div>
                                                <div class="mb-2.5">
                                                    <span class="text-xl font-medium text-gray-900 ">PHP
                                                        {{ $product->price }}</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex justify-content-center gap-2 pb-4">
                                            <button wire:click="buynow({{ $product->id }})"
                                                class="text-white bg-gray-600 hover:bg-blue-800 focus:ring-4 no-underline focus:outline-none text-sm focus:ring-blue-300 font-bold sm:text-xl rounded-lg !px-5 text-center">
                                                Buy Now
                                            </button>
                                            <div>
                                                <livewire:addtocart.add-to-cart :product_id="$product->id" :key="$product->id"
                                                    wire:key="{{ $product->id }}" />
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            @endforeach
                            {{-- product showcases --}}
                        </div>

                        <div class="p-3 flex justify-center">
                            {{ $this->getProducts->links() }}
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
