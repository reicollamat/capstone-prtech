<!-- Sidebar-->
<div class="w-full h-full p-2.5" id="sidebar-wrapper">
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
