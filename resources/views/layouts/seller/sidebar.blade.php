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
                    class="list-group-item list-group-item-action bborder-0 {{ request()->routeIs('seller-dashboard') ? 'active' : '' }}"
                    href="{{ route('seller-dashboard') }}">
                    <i class="bi bi-house-fill" aria-hidden="true"></i>
                    Dashboard
                </a>
            </div>
        </li>
        <li class="py-3">
            <div x-data="{ open: false }" class="w-full">
                <div class="flex justify-between items-center">
                    <button @click="open=!open"
                        class="w-full flex justify-between items-center text-base font-semibold text-gray-700  transition">
                        <div class="flex items-center gap-2">
                            <i class="bi bi-box2-heart text-xl"></i>
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
                <div x-show="open" x-cloak class="" x-transition>
                    Lorem ipsum dolor sit amet consectetur, adipisicing
                    elit. Dicta repudiandae ut dolores totam nobis molestias!
                </div>
            </div>

        </li>
        <li class="py-3">
            <div x-data="{ open: false }" class="w-full">
                <div class="flex justify-between items-center">
                    <button @click="open=!open"
                        class="w-full flex justify-between items-center text-base font-semibold text-gray-700  transition">
                        <div class="flex items-center gap-2">
                            <i class="bi bi-box2-heart text-xl"></i>
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
                <div x-show="open" x-cloak class="" x-transition>
                    Lorem ipsum dolor sit amet consectetur, adipisicing
                    elit. Dicta repudiandae ut dolores totam nobis molestias!
                </div>
            </div>
        </li>
        <li class="py-3">
            <div x-data="{ open: false }" class="w-full">
                <div class="flex justify-between items-center">
                    <button @click="open=!open"
                        class="w-full flex justify-between items-center text-base font-semibold text-gray-700  transition">
                        <div class="flex items-center gap-2">
                            <i class="bi bi-box2-heart text-xl"></i>
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
                    Lorem ipsum dolor sit amet consectetur, adipisicing
                    elit. Dicta repudiandae ut dolores totam nobis molestias!
                </div>
            </div>
        </li>
        <li class="py-3">
            <div x-data="{ open: false }" class="w-full">
                <div class="flex justify-between items-center">
                    <button @click="open=!open"
                        class="w-full flex justify-between items-center text-base font-semibold text-gray-700  transition">
                        <div class="flex items-center gap-2">
                            <i class="bi bi-box2-heart text-xl"></i>
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
                    Lorem ipsum dolor sit amet consectetur, adipisicing
                    elit. Dicta repudiandae ut dolores totam nobis molestias!
                </div>
            </div>
        </li>
        <li class="py-3">
            <div x-data="{ open: false }" class="w-full">
                <div class="flex justify-between items-center">
                    <button @click="open=!open"
                        class="w-full flex justify-between items-center text-base font-semibold text-gray-700  transition">
                        <div class="flex items-center gap-2">
                            <i class="bi bi-box2-heart text-xl"></i>
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
                <div x-show="open" x-cloak class="" x-transition>
                    Lorem ipsum dolor sit amet consectetur, adipisicing
                    elit. Dicta repudiandae ut dolores totam nobis molestias!
                </div>
            </div>
        </li>
    </ul>

</div>
