<div class="h-full w-full">
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <x-slot:page_header>
        Product Management
    </x-slot:page_header>
    <div class="flex h-full">
        <div class="flex-1 w-64 p-4">
            <div class="flex flex-column flex-lg-row justify-between gap-2">
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
                            <p class="mb-0 uppercase text-sm p-2 tracking-tight">In Stock</p>
                            <p class="mb-0 uppercase text-sm p-2 tracking-tight">test</p>
                        </div>
                    </div>
                </div>
                <div class="flex flex-column flex-lg-row gap-2.5">
                    {{--  Category Filter --}}
                    <div x-data="{ isOpen: false }" class="relative inline-block ">
                        <!-- Dropdown toggle button -->
                        <button @click="isOpen = !isOpen"
                            class="relative z-10 w-full flex items-center border border-gray-400 p-2 rounded-lg text-sm bg-white text-gray-600 gap-1">
                            <span class="mx-1">Category: SLUG</span>
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
                    {{--  Brand Filter --}}
                    <div x-data="{ isOpen: false }" class="relative inline-block ">
                        <!-- Dropdown toggle button -->
                        <button @click="isOpen = !isOpen"
                            class="relative z-10 w-full flex items-center border border-gray-400 p-2 rounded-lg text-sm bg-white text-gray-600 gap-1">
                            <span class="mx-1">Brand: SLUG</span>
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
                    {{--                    searchning filter --}}
                    <div>
                        <form action="">
                            <div class="relative text-gray-600">
                                <label for="quick_search" class="sr-only">Search</label>
                                <input id="quick_search" type="search" name="serch" placeholder="Quick Search"
                                    class="bg-white w-full h-full border-gray-200 rounded-lg text-sm focus:outline-none">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="flex items-center text-blue-500 justify-center gap-1">
                    <i class="bi bi-plus"></i>
                    <a href="{{ route('product-new') }}" class="no-underline decoration-0 text-sm mb-0"
                        wire:navigate>Add
                        Product</a>
                </div>
            </div>
            {{--            there is the table for data --}}
            <hr>
            <div x-data="{ expanded: false }">
                <button @click="expanded = ! expanded">Toggle Content</button>

                <p x-cloak x-show="expanded" x-collapse>
                    tesrtetetetetetetetetet
                </p>
            </div>
            <div class="bg-white overflow-x-auto">
                <div
                    class="flex flex-column flex-lg-row min-w-full  items-center text-center tablelike  border-b-2 border-blue-300">
                    <p class="mb-0 min-w-[40px] !text-gray-400 !font-light">
                        <input class="form-check-input" type="checkbox">
                    </p>
                    <p class="mb-0  min-w-[60px] !text-gray-400 !font-light">
                        IMG
                    </p>
                    <p class="mb-0 min-w-[40px] min-w-max !text-gray-400 !font-light">
                        #
                    </p>
                    <p class="mb-0 min-w-[100px] flex-1 !text-gray-400 !font-light">
                        Name
                    </p>
                    <p class=" mb-0 min-w-[100px] flex-1 !text-gray-400 !font-light">
                        Category
                    </p>
                    <p class=" mb-0  min-w-[100px]  !text-gray-400 !font-light">
                        Price
                    </p>
                    <p class=" mb-0 min-w-[100px]  !text-gray-400 !font-light">
                        Stock
                    </p>
                    <p class=" mb-0 min-w-[100px]  !text-gray-400 !font-light">
                        Action
                    </p>
                </div>

                <div class="flex flex-column flex-lg-row min-w-full  items-center text-center  overflow-x-auto">
                    <p class="mb-0 p-2 !text-gray-400 !font-light">
                        <input class="form-check-input" type="checkbox">
                    </p>
                    <div class="mb-0 !text-gray-800 !font-base">
                        IMG
                    </div>
                    <p class="mb-0 min-w-[100px] flex-1 min-w-max !text-gray-400 !font-light">
                        #
                    </p>
                    <p class="mb-0 min-w-[100px] flex-1 !text-gray-400 !font-light">
                        Name
                    </p>
                    <p class=" mb-0 min-w-[100px] flex-1 !text-gray-400 !font-light">
                        Category
                    </p>
                    <p class=" mb-0  min-w-[100px] flex-1 !text-gray-400 !font-light">
                        Price
                    </p>
                    <p class=" mb-0 min-w-[100px] flex-1 !text-gray-400 !font-light">
                        Stock
                    </p>
                    <p class=" mb-0 min-w-[100px] flex-1 !text-gray-400 !font-light">
                        Action
                    </p>
                </div>
            </div>
            {{--            <div> --}}
            {{--                <div class="table-responsive"> --}}
            {{--                    <table class="table rounded-lg align-middle items-center"> --}}
            {{--                        <thead> --}}
            {{--                            <tr> --}}
            {{--                                <th scope="col" class="!w-3 !text-gray-400 !font-light"><input --}}
            {{--                                        class="form-check-input" type="checkbox"> --}}
            {{--                                </th> --}}
            {{--                                <th scope="col" class="!text-gray-400 !font-light">#</th> --}}
            {{--                                <th scope="col" class="!text-gray-400 !font-light">IMG</th> --}}
            {{--                                <th scope="col" class="!text-gray-400 !font-light">Name</th> --}}
            {{--                                <th scope="col" class="!text-gray-400 !font-light">Category</th> --}}
            {{--                                <th scope="col" class="!text-gray-400 !font-light">Price</th> --}}
            {{--                                <th scope="col" class="!text-gray-400 !font-light">Stock</th> --}}
            {{--                                <th scope="col" class="!text-gray-400 !font-light">Action</th> --}}
            {{--                            </tr> --}}
            {{--                        </thead> --}}
            {{--                        <tbody class="table-group-divider text-blue-300"> --}}
            {{--                            <tr> --}}
            {{--                                <th scope="row" class="w-fit"> --}}
            {{--                                    <input class="form-check-input" type="checkbox"> --}}
            {{--                                </th> --}}
            {{--                                <td>1</td> --}}
            {{--                                <td>IMG</td> --}}
            {{--                                <td>PRODUCT NAME SLUG</td> --}}
            {{--                                <td>PRODUCT CATEGORY SLUG</td> --}}
            {{--                                <td>PRODUCT PRICE SLUG</td> --}}
            {{--                                <td>PRUDUCT STOCK SLUG</td> --}}
            {{--                                <td> --}}
            {{--                                    <button type="button" class="btn border border-gray-200 rounded-full" --}}
            {{--                                        data-bs-toggle="collapse" data-bs-target="#collapseExample" --}}
            {{--                                        aria-expanded="false" aria-controls="collapseExample"> --}}
            {{--                                        <i class="bi bi-caret-up-fill"></i> --}}
            {{--                                    </button> --}}
            {{--                                </td> --}}
            {{--                            </tr> --}}
            {{--                        </tbody> --}}
            {{--                        <tbody> --}}
            {{--                            <tr> --}}
            {{--                                <th colspan="8"> --}}
            {{--                                    <div class="collapse" id="collapseExample"> --}}
            {{--                                        test --}}
            {{--                                    </div> --}}
            {{--                                </th> --}}
            {{--                            </tr> --}}
            {{--                        </tbody> --}}

            {{--                        <tr> --}}
            {{--                            <th scope="row" class="w-fit"> --}}
            {{--                                <input class="form-check-input" type="checkbox"> --}}
            {{--                            </th> --}}
            {{--                            <td>1</td> --}}
            {{--                            <td>IMG</td> --}}
            {{--                            <td>PRODUCT NAME SLUG</td> --}}
            {{--                            <td>PRODUCT CATEGORY SLUG</td> --}}
            {{--                            <td>PRODUCT PRICE SLUG</td> --}}
            {{--                            <td>PRUDUCT STOCK SLUG</td> --}}
            {{--                            <td> --}}
            {{--                                <button class="btn border border-gray-200 rounded-full"> --}}
            {{--                                    <i class="bi bi-caret-up-fill"></i> --}}
            {{--                                </button> --}}
            {{--                            </td> --}}
            {{--                        </tr> --}}
            {{--                        </tbody> --}}
            {{--                    </table> --}}
            {{--                </div> --}}
            {{--            </div> --}}
        </div>
        <div class="flex-none py-12 pr-5 pl-3 justify-start bg-white">
            <p class="text-xs font-light uppercase text-gray-700">Overview</p>
            <div class="py-2">
                <p class="text-sm font-base text-gray-500 mb-1">Total Products Listed</p>
                <p class="font-semibold">{{ $this->getTotalProductCount }}</p>
            </div>
            <div class="py-2">
                <p class="text-sm font-base text-gray-500 mb-1">Total Products Listed</p>
                <p class="font-semibold">{{ $this->getTotalProductCount }}</p>
            </div>
            <div class="py-2">
                <p class="text-sm font-base text-gray-500 mb-1">Stock Issues</p>
                <p class="font-semibold">0</p>
            </div>
            <div>
                <div class="flex items-center justify-center text-red-500 text-sm font-light">
                    <h6>Hot Products</h6>
                </div>
            </div>
        </div>
    </div>
</div>
