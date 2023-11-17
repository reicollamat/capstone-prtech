<!-- Sidebar-->
<div class="p-2.5" id="sidebar-wrapper">
    <ul>
        <li class="py-2.5">
            <div class="flex justify-between items-center">
                <a wire:navigate href="{{ route('seller-landing') }}"
                    class="w-full no-underline flex justify-between items-center text-base font-medium {{ Route::is('seller-landing') ? '!text-blue-600' : 'text-gray-600' }} mb-1.5  transition">
                    <div class="flex items-center gap-2">
                        <i
                            class="bi bi-house-fill text-xl {{ Route::is('seller-landing') ? '!text-blue-600' : 'text-gray-600' }}"></i>
                        <p class="mb-0">Dashboard</p>
                    </div>
                </a>
            </div>
        </li>
        {{--         <li class="py-2.5"> --}}
        {{--             <div x-data="{ open_1: $persist(false) }" class="w-full"> --}}
        {{--                 <div class="flex justify-between transition items-center"> --}}
        {{--                     <button @click="open_1=!open_1" --}}
        {{--                         class="w-full flex justify-between items-center text-base font-medium text-gray-600 mb-1.5 transition"> --}}
        {{--                         <div class="flex items-center gap-2"> --}}
        {{--                             <i class="bi bi-box2-heart text-xl text-gray-600" :class="{ '!text-blue-600': open_1 }"></i> --}}
        {{--                             <p class="mb-0" :class="{ '!text-blue-600 text-base': open_1 }">Products</p> --}}
        {{--                         </div> --}}
        {{--                         <span class="transition  duration-500 rotate-180" :class="{ 'rotate-180': open_1 }"> --}}
        {{--                             <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"> --}}
        {{--                                 <path --}}
        {{--                                     d="M12 15.713L18.01 9.70299L16.597 8.28799L12 12.888L7.40399 8.28799L5.98999 9.70199L12 15.713Z" --}}
        {{--                                     fill="currentColor"></path> --}}
        {{--                             </svg> --}}
        {{--                         </span> --}}
        {{--                     </button> --}}
        {{--                 </div> --}}

        {{--                 <div x-cloak x-show="open_1" x-transition> --}}
        {{--                     <ul> --}}
        {{--                         <li class="p-1.5 text-sm"> --}}
        {{--                             <a href="{{ route('product-list') }}" --}}
        {{--                                 class="no-underline decoration-0 {{ Route::is('product-list') ? '!text-blue-800 font-semibold' : 'text-gray-800' }} " --}}
        {{--                                 wire:navigate wire:ignore> --}}
        {{--                                 My Products --}}
        {{--                             </a> --}}
        {{--                         </li> --}}
        {{--                         <li class="p-1.5 text-sm"> --}}
        {{--                             <a href="{{ route('product-new') }}" --}}
        {{--                                 class="no-underline decoration-0 {{ Route::is('product-new') ? '!text-blue-800 font-semibold' : 'text-gray-800' }}" --}}
        {{--                                 wire:navigate wire:ignore> --}}
        {{--                                 Add New Product --}}
        {{--                             </a> --}}
        {{--                         </li> --}}
        {{--                     </ul> --}}
        {{--                 </div> --}}
        {{--             </div> --}}

        {{--         </li> --}}

        {{--        <li class="py-2.5"> --}}
        {{--            <div x-data="{ open_2: $persist(false), get isOpen_2() { return this.open_2 }, toggle_2() { this.open_2 = !this.open_2 } }" class="w-full"> --}}
        {{--                <div class="flex justify-between items-center"> --}}
        {{--                    <button @click="toggle_2()" --}}
        {{--                        class="w-full flex justify-between items-center text-base font-medium text-gray-600  mb-1.5  transition"> --}}
        {{--                        <div class="flex items-center gap-2"> --}}
        {{--                            <i class="bi bi-truck text-xl text-gray-600" :class="{ '!text-blue-600': open_2 }"></i> --}}
        {{--                            <p class="mb-0" :class="{ '!text-blue-600 text-base': open_2 }">Shipments</p> --}}
        {{--                        </div> --}}
        {{--                        <span class="transition duration-500 rotate-180" --}}
        {{--                            :class="{ 'rotate-180 transition duration-500': open_2 }"> --}}
        {{--                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"> --}}
        {{--                                <path --}}
        {{--                                    d="M12 15.713L18.01 9.70299L16.597 8.28799L12 12.888L7.40399 8.28799L5.98999 9.70199L12 15.713Z" --}}
        {{--                                    fill="currentColor"></path> --}}
        {{--                            </svg> --}}
        {{--                        </span> --}}
        {{--                    </button> --}}
        {{--                </div> --}}
        {{--                <div x-show="isOpen_2" x-transition> --}}
        {{--                    <ul> --}}
        {{--                        <li class="p-1.5 text-sm"> --}}
        {{--                            <a href="{{ route('shipment-list') }}" --}}
        {{--                                class="no-underline transition decoration-0 text-gray-800" --}}
        {{--                                :class="{ '!text-blue-600 transition duration-300 !font-semibold ': {{ request()->routeIs('shipment-list') }} }" --}}
        {{--                                wire:navigate> --}}
        {{--                                My Shipments --}}
        {{--                            </a> --}}
        {{--                        </li> --}}
        {{--                        <li class="p-1.5 text-sm" text-sm> --}}
        {{--                            <a href="{{ route('shipment-options') }}" --}}
        {{--                                class="no-underline transition decoration-0 text-gray-800" --}}
        {{--                                :class="{ '!text-blue-600 transition duration-300 !font-semibold ': {{ request()->routeIs('shipment-options') }} }" --}}
        {{--                                wire:navigate> --}}
        {{--                                Shipment Options --}}
        {{--                            </a> --}}
        {{--                        </li> --}}
        {{--                        <li class="p-1.5 text-sm" text-sm> --}}
        {{--                            <a href="{{ route('shipment-history') }}" --}}
        {{--                                class="no-underline transition decoration-0 text-gray-800" --}}
        {{--                                :class="{ '!text-blue-600 transition duration-300 !font-semibold ': {{ request()->routeIs('shipment-history') }} }" --}}
        {{--                                wire:navigate> --}}
        {{--                                Shipment History --}}
        {{--                            </a> --}}
        {{--                        </li> --}}
        {{--                    </ul> --}}
        {{--                </div> --}}
        {{--            </div> --}}
        {{--        </li> --}}
        {{--        <li class="py-2.5"> --}}
        {{--            <div x-data="{ open_3: $persist(false) }" class="w-full"> --}}
        {{--                <div class="flex justify-between items-center"> --}}
        {{--                    <button @click="open_3=!open_3" :class="{ '!text-blue-600 !font-semibold': open_3 }" --}}
        {{--                        class="w-full flex justify-between items-center text-base font-medium text-gray-600  mb-1.5  transition"> --}}
        {{--                        <div class="flex items-center gap-2"> --}}
        {{--                            <i class="bi bi-card-checklist text-xl text-gray-600" --}}
        {{--                                :class="{ '!text-blue-600': open_3 }"></i> --}}
        {{--                            <p class="mb-0">Orders</p> --}}
        {{--                        </div> --}}
        {{--                        <span class="transition duration-500 rotate-180" --}}
        {{--                            :class="{ 'rotate-180 transition duration-500': open_3 }"> --}}
        {{--                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"> --}}
        {{--                                <path --}}
        {{--                                    d="M12 15.713L18.01 9.70299L16.597 8.28799L12 12.888L7.40399 8.28799L5.98999 9.70199L12 15.713Z" --}}
        {{--                                    fill="currentColor"></path> --}}
        {{--                            </svg> --}}
        {{--                        </span> --}}

        {{--                    </button> --}}
        {{--                </div> --}}
        {{--                <div x-show="open_3" x-transition> --}}
        {{--                    <ul> --}}
        {{--                        <li class="p-1.5 text-sm"> --}}
        {{--                            <a href="{{ route('order-list') }}" class="no-underline decoration-0 text-gray-800" --}}
        {{--                                :class="{ '!text-blue-600 transition duration-300 !font-semibold ': {{ request()->routeIs('order-list') }} }" --}}
        {{--                                wire:navigate> --}}
        {{--                                My Orders --}}
        {{--                            </a> --}}
        {{--                        </li> --}}
        {{--                        <li class="p-1.5 text-sm"> --}}
        {{--                            <a href="{{ route('order-cancellations') }}" --}}
        {{--                                class="no-underline decoration-0 text-gray-800" --}}
        {{--                                :class="{ '!text-blue-600 transition duration-300 !font-semibold ': {{ request()->routeIs('order-cancellations') }} }" --}}
        {{--                                wire:navigate>Cancellations</a> --}}
        {{--                        </li> --}}
        {{--                        <li class="p-1.5 text-sm"> --}}
        {{--                            <a href="{{ route('order-returns') }}" class="no-underline decoration-0 text-gray-800" --}}
        {{--                                :class="{ '!text-blue-600 transition duration-300 !font-semibold ': {{ request()->routeIs('order-returns') }} }" --}}
        {{--                                wire:navigate>Refunds / Returns</a> --}}
        {{--                        </li> --}}
        {{--                        <li class="p-1.5 text-sm"> --}}
        {{--                            <a href="{{ route('order-history') }}" class="no-underline decoration-0 text-gray-800" --}}
        {{--                                :class="{ '!text-blue-600 transition duration-300 !font-semibold ': {{ request()->routeIs('order-history') }} }" --}}
        {{--                                wire:navigate>Order History</a> --}}
        {{--                        </li> --}}

        {{--                    </ul> --}}
        {{--                </div> --}}
        {{--            </div> --}}
        {{--        </li> --}}
        {{--        <li class="py-2.5"> --}}
        {{--            <div x-data="{ open_4: $persist(false) }" class="w-full"> --}}
        {{--                <div class="flex justify-between items-center"> --}}
        {{--                    <button @click="open_4=!open_4" :class="{ '!text-blue-600 !font-semibold': open_4 }" --}}
        {{--                        class="w-full flex justify-between items-center text-base font-medium text-gray-600  mb-1.5  transition"> --}}
        {{--                        <div class="flex items-center gap-2"> --}}
        {{--                            <i class="bi bi-bar-chart-steps text-xl text-gray-600" --}}
        {{--                                :class="{ '!text-blue-600': open_4 }"></i> --}}
        {{--                            <p class="mb-0">Analytics</p> --}}
        {{--                        </div> --}}
        {{--                        <span class="transition duration-500 rotate-180" --}}
        {{--                            :class="{ 'rotate-180 transition duration-500': open_4 }"> --}}
        {{--                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"> --}}
        {{--                                <path --}}
        {{--                                    d="M12 15.713L18.01 9.70299L16.597 8.28799L12 12.888L7.40399 8.28799L5.98999 9.70199L12 15.713Z" --}}
        {{--                                    fill="currentColor"></path> --}}
        {{--                            </svg> --}}
        {{--                        </span> --}}

        {{--                    </button> --}}
        {{--                </div> --}}
        {{--                <div x-show="open_4" class="" x-transition> --}}
        {{--                    <ul> --}}
        {{--                        <li class="p-1.5 text-sm"> --}}
        {{--                            <a href="#" class="no-underline decoration-0 text-gray-800">My Orders</a> --}}
        {{--                        </li> --}}
        {{--                        <li class="p-1.5 text-sm"> --}}
        {{--                            <a href="#" class="no-underline decoration-0 text-gray-800">Cancellations</a> --}}
        {{--                        </li> --}}
        {{--                        <li class="p-1.5 text-sm"> --}}
        {{--                            <a href="#" class="no-underline decoration-0 text-gray-800">Refunds / --}}
        {{--                                Returns</a> --}}
        {{--                        </li> --}}
        {{--                    </ul> --}}
        {{--                </div> --}}
        {{--            </div> --}}
        {{--        </li> --}}
        {{--        <li class="py-2.5"> --}}
        {{--            <div x-data="{ open_5: $persist(false) }" class="w-full"> --}}
        {{--                <div class="flex justify-between items-center"> --}}
        {{--                    <button @click="open_5=!open_5" :class="{ '!text-blue-600 !font-semibold': open_5 }" --}}
        {{--                        class="w-full flex justify-between items-center text-base font-medium text-gray-600 mb-1.5 transition"> --}}
        {{--                        <div class="flex items-center gap-2"> --}}
        {{--                            <i class="bi bi-shop-window text-xl text-gray-600" --}}
        {{--                                :class="{ '!text-blue-600': open_5 }"></i> --}}
        {{--                            <p class="mb-0">Shop</p> --}}
        {{--                        </div> --}}
        {{--                        <span class="transition duration-500 rotate-180" --}}
        {{--                            :class="{ 'rotate-180 transition duration-500': open_5 }"> --}}
        {{--                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"> --}}
        {{--                                <path --}}
        {{--                                    d="M12 15.713L18.01 9.70299L16.597 8.28799L12 12.888L7.40399 8.28799L5.98999 9.70199L12 15.713Z" --}}
        {{--                                    fill="currentColor"></path> --}}
        {{--                            </svg> --}}
        {{--                        </span> --}}

        {{--                    </button> --}}
        {{--                </div> --}}
        {{--                <div x-show="open_5" x-transition> --}}
        {{--                    <ul> --}}
        {{--                        <li class="p-1.5 text-sm"> --}}
        {{--                            <a href="#" class="no-underline decoration-0 text-gray-800">Shop --}}
        {{--                                Information</a> --}}
        {{--                        </li> --}}
        {{--                        <li class="p-1.5 text-sm"> --}}
        {{--                            <a href="#" class="no-underline decoration-0 text-gray-800">Shop Categories</a> --}}
        {{--                        </li> --}}
        {{--                    </ul> --}}
        {{--                </div> --}}
        {{--            </div> --}}
        {{--        </li> --}}
    </ul>
    <div>
        <div class="flex items-center gap-1.5 mb-1.5">
            <p class="mb-0 text-xs  text-gray-500 font-semibold">Product Management</p>
        </div>

        <ul>
            <li class="p-1.5 text-sm rounded-sm">
                <a href="{{ route('product-list') }}"
                    class="no-underline decoration-0 {{ Route::is('product-list') ? '!text-blue-800 font-semibold' : 'text-gray-800' }} "
                    wire:navigate>
                    <div class="flex items-center gap-1.5">
                        <i class="bi bi-box2-heart text-lg"></i>
                        <span>My Products</span>
                    </div>
                </a>
            </li>
            <li class="p-1.5 text-sm">
                <a href="{{ route('product-new') }}"
                    class="no-underline decoration-0 {{ Route::is('product-new') ? '!text-blue-800 font-semibold transition duration-500' : 'text-gray-800' }}"
                    wire:navigate>
                    <div class="flex items-center gap-1.5">
                        <i class="bi bi-plus-square text-lg"></i>
                        <span>Add New Product</span>
                    </div>
                </a>
            </li>
        </ul>
    </div>
    <div>
        <div class="flex items-center gap-1.5 mb-1.5">
            <p class="mb-0 text-xs  text-gray-500 font-semibold">Shipment Management</p>
        </div>
        <ul>
            <li class="p-1.5 text-sm rounded-sm">
                <a href="{{ route('shipment-list') }}" class="no-underline transition decoration-0 text-gray-800"
                    wire:navigate>
                    <div class="flex items-center gap-1.5">
                        <i class="bi bi-truck text-lg"></i>
                        <span>My Shipments</span>
                    </div>

                </a>
            </li>
            <li class="p-1.5 text-sm" text-sm>
                <a href="{{ route('shipment-options') }}" class="no-underline transition decoration-0 text-gray-800"
                    wire:navigate>
                    <div class="flex items-center gap-1.5">
                        <i class="bi bi-gear text-lg"></i>
                        <span>Shipment Options</span>
                    </div>

                </a>
            </li>
            <li class="p-1.5 text-sm" text-sm>
                <a href="{{ route('shipment-history') }}" class="no-underline transition decoration-0 text-gray-800"
                    wire:navigate>
                    <div class="flex items-center gap-1.5">
                        <i class="bi bi-plus-square  text-lg"></i>
                        <span>Shipment History</span>
                    </div>

                </a>
            </li>
        </ul>
    </div>
    <div>
        <div class="flex items-center gap-1.5 mb-1.5">
            <p class="mb-0 text-xs  text-gray-500 font-semibold">Order Management</p>
        </div>
        <ul>
            <li class="p-1.5 text-sm">
                <a href="{{ route('order-list') }}" class="no-underline decoration-0 text-gray-800" wire:navigate>
                    <div class="flex items-center gap-1.5">
                        <i class="bi bi-truck text-lg"></i>
                        <span>My Orders</span>
                    </div>
                </a>
            </li>
            <li class="p-1.5 text-sm">
                <a href="{{ route('order-cancellations') }}" class="no-underline decoration-0 text-gray-800"
                    wire:navigate>
                    <div class="flex items-center gap-1.5">
                        <i class="bi bi-truck text-lg"></i>
                        <span>Cancellations</span>
                    </div>

                </a>
            </li>
            <li class="p-1.5 text-sm">
                <a href="{{ route('order-returns') }}" class="no-underline decoration-0 text-gray-800" wire:navigate>
                    <div class="flex items-center gap-1.5">
                        <i class="bi bi-truck text-lg"></i>
                        <span> Refunds / Returns</span>
                    </div>

                </a>
            </li>
            <li class="p-1.5 text-sm">
                <a href="{{ route('order-history') }}" class="no-underline decoration-0 text-gray-800" wire:navigate>
                    <div class="flex items-center gap-1.5">
                        <i class="bi bi-truck text-lg"></i>
                        <span>Order History</span>
                    </div>

                </a>
            </li>
        </ul>

    </div>
    <div>
        <div class="flex items-center gap-1.5 mb-1.5">
            <p class="mb-0 text-xs text-gray-500 font-semibold">Shop Management</p>
        </div>
        <ul>
            <li class="p-1.5 text-sm">
                <a href="{{ route('shop-management') }}" class="no-underline decoration-0 text-gray-800" wire:navigate>
                    <div class="flex items-center gap-1.5">
                        <i class="bi bi-truck text-lg"></i>
                        <span> Shop Information</span>
                    </div>

                </a>
            </li>
            <li class="p-1.5 text-sm">
                <a href="{{ route('shop-management-category') }}" class="no-underline decoration-0 text-gray-800"
                    wire:navigate>
                    <div class="flex items-center gap-1.5">
                        <i class="bi bi-truck text-lg"></i>
                        <span>Shop Categories</span>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</div>
