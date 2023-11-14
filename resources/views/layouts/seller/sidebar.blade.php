<!-- Sidebar-->
<div class="p-3" id="sidebar-wrapper">
    {{--    <div class="list-group list-group-flush py-3"> --}}
    {{--        <a wire:navigate --}}
    {{--            class="list-group-item list-group-item-action p-3 border-0 {{ request()->routeIs('seller-dashboard') ? 'active' : '' }}" --}}
    {{--            href="{{ route('seller-dashboard') }}"> --}}
    {{--            <i class="bi bi-house-fill" aria-hidden="true"></i> --}}
    {{--            Dashboard --}}
    {{--        </a> --}}
    {{--        <a wire:navigate --}}
    {{--            class="list-group-item list-group-item-action p-3 border-0 {{ request()->routeIs('seller-inventory') ? 'active' : '' }}" --}}
    {{--            href="{{ route('seller-inventory') }}"> --}}
    {{--            <i class="bi bi-database-fill" aria-hidden="true"></i> --}}
    {{--            Product Inventory --}}
    {{--        </a> --}}
    {{--        <a class="list-group-item list-group-item-action p-3 border-0" href="#!"> --}}
    {{--            <i class="bi bi-bar-chart-line-fill" aria-hidden="true"></i> --}}
    {{--            Statistics --}}
    {{--        </a> --}}
    {{--        <a class="list-group-item list-group-item-action p-3 border-0" href="#!"> --}}
    {{--            <i class="bi bi-cart-fill" aria-hidden="true"></i> --}}
    {{--            Purchases --}}
    {{--        </a> --}}
    {{--        <a class="list-group-item list-group-item-action p-3 border-0" href="#!"> --}}
    {{--            <i class="bi bi-truck" aria-hidden="true"></i> --}}
    {{--            Deliveries --}}
    {{--        </a> --}}
    {{--        <a class="list-group-item list-group-item-action p-3 border-0" href="#!"> --}}
    {{--            <i class="bi bi-person-circle" aria-hidden="true"></i> --}}
    {{--            Profile --}}
    {{--        </a> --}}
    {{--    </div> --}}
    <ul>
        <li class="py-3">
            <div>
                <a wire:navigate
                    class="list-group-item list-group-item-action text-gray-600 border-0 {{ request()->routeIs('seller-dashboard') ? 'active' : '' }}"
                    href="{{ route('seller-dashboard') }}">
                    <i class="bi bi-house-fill text-xl text-gray-600" aria-hidden="true"></i>
                    Dashboard
                </a>
            </div>
        </li>
        <li class="py-2.5">
            <div x-data="{ open: false }" class="w-full">
                <div class="flex justify-between items-center">
                    <button @click="open=!open" :class="{ '!text-blue-600': open }"
                        class="w-full flex justify-between items-center text-base font-semibold text-gray-600 mb-1.5  transition">
                        <div class="flex items-center gap-2">
                            <i class="bi bi-box2-heart text-xl text-gray-600" :class="{ '!text-blue-600': open }"></i>
                            <p class="mb-0">Product</p>
                        </div>
                        <span class="transition duration-500 rotate-180"
                            :class="{ 'rotate-180 transition duration-500': open }">
                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 15.713L18.01 9.70299L16.597 8.28799L12 12.888L7.40399 8.28799L5.98999 9.70199L12 15.713Z"
                                    fill="currentColor"></path>
                            </svg>
                        </span>
                    </button>
                </div>
                <div x-show="open" x-cloak x-transition>
                    <ul>
                        <li class="p-1.5 text-sm">My Products</li>
                        <li class="p-1.5 text-sm">Add New Product</li>

                    </ul>
                </div>
            </div>

        </li>
        <li class="py-2.5">
            <div x-data="{ open: false }" class="w-full">
                <div class="flex justify-between items-center">
                    <button @click="open=!open" :class="{ '!text-blue-600': open }"
                        class="w-full flex justify-between items-center text-base font-semibold text-gray-600  mb-1.5  transition">
                        <div class="flex items-center gap-2">
                            <i class="bi bi-truck text-xl text-gray-600" :class="{ '!text-blue-600': open }"></i>
                            <p class="mb-0">Shipments</p>
                        </div>
                        <span class="transition duration-500 rotate-180"
                            :class="{ 'rotate-180 transition duration-500': open }">
                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 15.713L18.01 9.70299L16.597 8.28799L12 12.888L7.40399 8.28799L5.98999 9.70199L12 15.713Z"
                                    fill="currentColor"></path>
                            </svg>
                        </span>

                    </button>
                </div>
                <div x-show="open" x-cloak x-transition>
                    <ul>
                        <li class="p-1.5 text-sm">My Shipments</li>
                        <li class="p-1.5 text-sm" text-sm>Shipment Options</li>
                        <li class="p-1.5 text-sm" text-sm>Shipment History</li>
                    </ul>
                </div>
            </div>
        </li>
        <li class="py-2.5">
            <div x-data="{ open: false }" class="w-full">
                <div class="flex justify-between items-center">
                    <button @click="open=!open" :class="{ '!text-blue-600': open }"
                        class="w-full flex justify-between items-center text-base font-semibold text-gray-600  mb-1.5  transition">
                        <div class="flex items-center gap-2">
                            <i class="bi bi-card-checklist text-xl text-gray-600"
                                :class="{ '!text-blue-600': open }"></i>
                            <p class="mb-0">Orders</p>
                        </div>
                        <span class="transition duration-500 rotate-180"
                            :class="{ 'rotate-180 transition duration-500': open }">
                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 15.713L18.01 9.70299L16.597 8.28799L12 12.888L7.40399 8.28799L5.98999 9.70199L12 15.713Z"
                                    fill="currentColor"></path>
                            </svg>
                        </span>

                    </button>
                </div>
                <div x-show="open" x-cloak class="" x-transition>
                    <ul>
                        <li class="p-1.5 text-sm">My Orders</li>
                        <li class="p-1.5 text-sm">Cancellations</li>
                        <li class="p-1.5 text-sm">Refunds / Returns</li>
                        <li class="p-1.5 text-sm">Order History</li>

                    </ul>
                </div>
            </div>
        </li>
        <li class="py-2.5">
            <div x-data="{ open: false }" class="w-full">
                <div class="flex justify-between items-center">
                    <button @click="open=!open" :class="{ '!text-blue-600': open }"
                        class="w-full flex justify-between items-center text-base font-semibold text-gray-600  mb-1.5  transition">
                        <div class="flex items-center gap-2">
                            <i class="bi bi-bar-chart-steps text-xl text-gray-600"
                                :class="{ '!text-blue-600': open }"></i>
                            <p class="mb-0">Analytics</p>
                        </div>
                        <span class="transition duration-500 rotate-180"
                            :class="{ 'rotate-180 transition duration-500': open }">
                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 15.713L18.01 9.70299L16.597 8.28799L12 12.888L7.40399 8.28799L5.98999 9.70199L12 15.713Z"
                                    fill="currentColor"></path>
                            </svg>
                        </span>

                    </button>
                </div>
                <div x-show="open" x-cloak class="" x-transition>
                    <ul>
                        <li class="p-1.5 text-sm">My Orders</li>
                        <li class="p-1.5 text-sm">Cancellations</li>
                        <li class="p-1.5 text-sm">Refunds / Returns</li>
                    </ul>
                </div>
            </div>
        </li>
        <li class="py-2.5">
            <div x-data="{ open: false }" class="w-full">
                <div class="flex justify-between items-center">
                    <button @click="open=!open" :class="{ '!text-blue-600': open }"
                        class="w-full flex justify-between items-center text-base font-semibold text-gray-600 mb-1.5 transition">
                        <div class="flex items-center gap-2">
                            <i class="bi bi-shop-window text-xl text-gray-600" :class="{ '!text-blue-600': open }"></i>
                            <p class="mb-0">Shop</p>
                        </div>
                        <span class="transition duration-500 rotate-180"
                            :class="{ 'rotate-180 transition duration-500': open }">
                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 15.713L18.01 9.70299L16.597 8.28799L12 12.888L7.40399 8.28799L5.98999 9.70199L12 15.713Z"
                                    fill="currentColor"></path>
                            </svg>
                        </span>

                    </button>
                </div>
                <div x-show="open" x-cloak x-transition>
                    <ul>
                        <li class="p-1.5 text-sm">Shop Information</li>
                        <li class="p-1.5 text-sm">Shop Categories</li>
                    </ul>
                </div>
            </div>
        </li>
    </ul>

</div>
