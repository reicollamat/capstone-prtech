<!-- Sidebar-->
<div class="w-full h-full p-2.5" id="sidebar-wrapper">
    {{-- <ul> --}}
    {{--     <li class="py-2.5"> --}}
    {{--         <div class="flex justify-between items-center"> --}}
    {{--             <a wire:navigate href="{{ route('seller-landing') }}" --}}
    {{--                 class="w-full no-underline flex justify-between items-center text-base font-medium {{ Route::is('seller-landing') ? '!text-blue-600' : 'text-gray-600' }} mb-1.5  transition"> --}}
    {{--                 <div class="flex items-center gap-2"> --}}
    {{--                     <i --}}
    {{--                         class="bi bi-house-fill text-xl {{ Route::is('seller-landing') ? '!text-blue-600' : 'text-gray-600' }}"></i> --}}
    {{--                     <p class="mb-0">Dashboard</p> --}}
    {{--                 </div> --}}
    {{--             </a> --}}
    {{--         </div> --}}
    {{--     </li> --}}
    {{-- </ul> --}}
    <div class="mt-3">
        <div class="flex items-center gap-1.5 mb-1.5">
            <p class="mb-0 text-xs  text-gray-500 font-semibold">Dashboard</p>
        </div>
        <ul>
            <li class="p-1.5 text-sm rounded-sm">
                <a href="{{ route('seller-landing') }}"
                    class="no-underline decoration-0 {{ Route::is('seller-landing') ? '!text-blue-800 font-semibold' : 'text-gray-800' }} "
                    wire:navigate>
                    <div class="flex items-center gap-1.5">
                        <i
                            class="bi bi-house-fill text-xl {{ Route::is('seller-landing') ? '!text-blue-600' : 'text-gray-600' }}"></i>
                        <span>Overview</span>
                    </div>
                </a>
            </li>
        </ul>
    </div>
    <div>
        <div class="flex items-center gap-1.5 mb-1.5">
            <p class="mb-0 text-sm  text-gray-500 font-semibold">Shop Sense Analytics</p>
        </div>
        <ul>
            <li class="p-1.5 text-sm rounded-sm">
                <a href="{{ route('product-list') }}"
                    class="no-underline decoration-0 {{ Route::is('product-list') ? '!text-blue-800 font-semibold' : 'text-gray-800' }} "
                    wire:navigate>
                    <div class="flex items-center gap-1.5">
                        <svg height="1.5rem" width="1.5rem" version="1.1" id="Layer_1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            viewBox="0 0 491.522 491.522" xml:space="preserve">
                            <polygon style="fill:#FCD462;"
                                points="311.509,269.164 265.297,125.658 229.512,181.004 166.902,181.004 166.902,159.443
                            217.774,159.443 271.887,75.777 309.677,193.132 343.12,69.113 374.966,159.454 477.865,159.454 477.865,181.014 359.701,181.014
                            345.866,141.755 " />
                            <path style="fill:#E1E6E9;"
                                d="M442.648,284.862c65.165-65.166,65.165-170.82-0.001-235.987S271.826-16.291,206.66,48.875
                             c-60.306,60.306-64.686,155.226-13.375,220.704l-21.801,21.801c-10.597-8.148-20.225-12.812-24.027-9.009l-18.393,18.393
                             l61.696,61.695l18.392-18.392c3.803-3.803-0.86-13.431-9.009-24.028l21.801-21.801C287.421,349.548,382.342,345.168,442.648,284.862
                             z M235.124,256.4c-49.368-49.368-49.372-129.693-0.004-179.061s129.7-49.371,179.068-0.004
                             c49.368,49.368,49.365,129.7-0.003,179.069C364.816,305.772,284.491,305.767,235.124,256.4z" />
                            <path style="fill:#3A556A;" d="M163.919,335.618L27.485,472.052c14.452,13.497,30.269,23.412,35.751,17.931L190.76,362.458
                             L163.919,335.618z" />
                            <path style="fill:#64798A;" d="M129.064,300.764L1.541,428.287c-6.527,6.528,8.737,27.692,25.944,43.765l136.434-136.434
                             L129.064,300.764z" />
                        </svg>
                        <span>StockSense</span>
                    </div>
                </a>
            </li>
        </ul>
    </div>
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
