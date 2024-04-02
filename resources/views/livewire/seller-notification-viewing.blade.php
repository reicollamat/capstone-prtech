<div wire:ignore>
    {{-- notification button --}}
    <button class="btn outline-remove relative" type="button" data-bs-toggle="offcanvas" data-bs-target="#sellernotif"
        aria-controls="offcanvasWithBothOptions">
        <i class="bi bi-bell-fill text-lg"></i>
        @if ($this->getTotalUnreadSellerNotifications)
            <span class="absolute translate-middle badge bg-transparent text-danger">
                {{ $this->getTotalUnreadSellerNotifications }}
                <span class="visually-hidden">Notification</span>
            </span>
        @endif
    </button>

    <div class="offcanvas offcanvas-end min-w-[500px]" data-bs-scroll="false" tabindex="-1" id="sellernotif"
        aria-labelledby="offcanvasWithBothOptionsLabel">
        <div class="offcanvas-header px-4">
            <div class="d-flex align-middle self-center items-center text-gray-600">
                <i class="bi bi-bell-fill text-lg"></i>
                <h5 class="offcanvas-title pl-2 text-xl" id="offcanvasWithBothOptionsLabel">
                    @if ($this->getTotalUnreadSellerNotifications)
                        Seller Notifications
                        <span class="absolute badge rounded-pill bg-danger ml-1">
                            {{ $this->getTotalUnreadSellerNotifications }}
                            <span class="visually-hidden">unread messages</span>
                        </span>
                    @else
                        Seller Notifications
                    @endif
                </h5>
            </div>

            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body bg-secondary-subtle mb-30">
            {{-- if contain notification list --}}
            @forelse ($this->getSellerNotifications as $notification)
                @if ($notification->read_at)
                    <div class="card mb-2" x-transition x-data="{ isSellerNotificationOpen: false }"
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
                            <button class="flex items-center rounded-r px-2"
                                @mouseover="isSellerNotificationOpen = true">
                                <i class="bi bi-three-dots-vertical text-2xl"></i>
                            </button>
                            <div x-cloak x-show="isSellerNotificationOpen"
                                @mouseleave="isSellerNotificationOpen = false"
                                x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="opacity-0 scale-90"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-100"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-90"
                                class="absolute right-8 z-20 w-30 overflow-hidden origin-top-right bg-secondary front rounded">
                                <div class="card">
                                    <div class="list-group">
                                        <a href="#"
                                            class="list-group-item list-group-item-action text-danger">Delete</a>
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
                            <button class="flex items-center rounded-r px-2"
                                @mouseover="isSellerNotificationOpen = true">
                                <i class="bi bi-three-dots-vertical text-2xl"></i>
                            </button>
                            <div x-cloak x-show="isSellerNotificationOpen"
                                @mouseleave="isSellerNotificationOpen = false"
                                x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="opacity-0 scale-90"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-100"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-90"
                                class="absolute right-8 z-20 w-30 overflow-hidden origin-top-right bg-secondary front rounded">
                                <div class="card">
                                    <div class="list-group">
                                        <button wire:click="$set('markread', '{{ $notification->id }}')"
                                            wire:key="{{ $notification->id }}-mark"
                                            class="list-group-item list-group-item-action">Mark as
                                            Read</button>
                                        <a href="#"
                                            class="list-group-item list-group-item-action text-danger">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @empty
                <div class="text-center text-secondary">
                    <i class="bi bi-bell mr-2"></i>
                    No notifications
                </div>
            @endforelse

            <div class="w-full absolute bottom-0 start-0 pb-4 px-4 bg-white mt-0">
                <hr>
                <div class="flex space-x-2">
                    <button class="btn btn-danger" wire:click="cart_checkout()">
                        <i class="bi bi-trash-fill"></i>
                    </button>
                    <button class="btn btn-primary w-full" wire:click="cart_checkout()">
                        Mark All as Read
                    </button>
                </div>

            </div>
        </div>

    </div>
</div>
