<div>
    @if ($notification->read_at)
        <div class="card mb-2" x-transition x-data="{ isSellerNotificationOpen: false }" @mouseleave="isSellerNotificationOpen = false">
            <div wire:loading wire:target="remove">
                <div class="absolute w-full h-full d-flex justify-center items-center bg-gray-300 opacity-50"
                    x-transition>
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
            <div class="flex">
                <div class="card-body">
                    <div class="flex">
                        <div class="px-2">
                            <i class="bi bi-box-fill text-2xl"></i>
                        </div>
                        <div class="grow">
                            <p class="card-title text-lg">{{ $notification->data['title'] }}</p>
                            <p class="card-subtitle text-muted text-sm mb-2">
                                {{ App\Models\Product::find($notification->data['product_id'])->title }}
                            </p>
                            <p class="card-subtitle text-muted">{{ $notification->data['description'] }}</p>
                        </div>
                    </div>
                </div>
                <button class="flex items-center rounded-r px-2" @mouseover="isSellerNotificationOpen = true">
                    <i class="bi bi-three-dots-vertical text-2xl"></i>
                </button>
                <div x-cloak x-show="isSellerNotificationOpen" @mouseleave="isSellerNotificationOpen = false"
                    x-transition:enter="transition ease-out duration-100" x-transition:enter-start="opacity-0 scale-90"
                    x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-100"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
                    class="absolute right-8 z-20 w-30 overflow-hidden origin-top-right bg-secondary front rounded">
                    <div class="card">
                        <div class="list-group">
                            <a href="{{ route('product-list') }}" class="list-group-item list-group-item-action">View
                                Product</a>
                            <a href="{{ route('analytics-model-report') }}"
                                class="list-group-item list-group-item-action">View
                                StockSense</a>
                            <a href="#" class="list-group-item list-group-item-action text-danger">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="card bg-primary-subtle mb-2" x-transition x-data="{ isSellerNotificationOpen: false }"
            @mouseleave="isSellerNotificationOpen = false">
            <div wire:loading wire:target="remove">
                <div class="absolute w-full h-full d-flex justify-center items-center bg-gray-300 opacity-50"
                    x-transition>
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
            <div class="flex">
                <div class="card-body">
                    <div class="flex">
                        <div class="px-2">
                            <i class="bi bi-box-fill text-2xl"></i>
                        </div>
                        <div class="grow">
                            <p class="card-title text-lg">{{ $notification->data['title'] }}</p>
                            <p class="card-subtitle text-muted text-sm mb-2">
                                {{ App\Models\Product::find($notification->data['product_id'])->title }}
                            </p>
                            <p class="card-subtitle text-muted">{{ $notification->data['description'] }}</p>
                        </div>
                    </div>
                </div>
                <button class="flex items-center rounded-r px-2" @mouseover="isSellerNotificationOpen = true">
                    <i class="bi bi-three-dots-vertical text-2xl"></i>
                </button>
                <div x-cloak x-show="isSellerNotificationOpen" @mouseleave="isSellerNotificationOpen = false"
                    x-transition:enter="transition ease-out duration-100" x-transition:enter-start="opacity-0 scale-90"
                    x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-100"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
                    class="absolute right-8 z-20 w-30 overflow-hidden origin-top-right bg-secondary front rounded">
                    <div class="card">
                        <div class="list-group">
                            <button wire:key="linktoread" wire:click="$parent.mark_as_read('{{ $notification->id }}')"
                                class="list-group-item list-group-item-action">
                                Mark as Read
                            </button>
                            <a href="{{ route('product-list') }}" class="list-group-item list-group-item-action">View
                                Product</a>
                            <a href="{{ route('analytics-model-report') }}"
                                class="list-group-item list-group-item-action">View
                                StockSense</a>
                            <button wire:key="linktodelete"
                                wire:click="$parent.delete_notif('{{ $notification->id }}')"
                                class="list-group-item list-group-item-action">
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
