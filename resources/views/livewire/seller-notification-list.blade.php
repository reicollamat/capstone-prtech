<div x-transition>
    <div class="tab-wrapper flex-1 w-full" x-data="{ activeTab: 0 }">
        <div class="flex flex-column flex-lg-row justify-between gap-2 ">
            <div
                class="bg-white w-full p-1 h-full border-gray-200 !rounded-lg text-sm focus:outline-none lg:items-center mb-3">
                <div class="grid grid-cols-2">
                    <button @click="activeTab = 0" class="tab-control p-2 rounded"
                        :class="{ 'active bg-blue-300': activeTab === 0 }">Unread</button>
                    <button @click="activeTab = 1" class="tab-control p-2 rounded"
                        :class="{ 'active bg-gray-300': activeTab === 1 }">All Notifications</button>
                </div>
            </div>
        </div>

        <div class="tab-panel" :class="{ 'active': activeTab === 0 }"
            x-show.transition.in.opacity.duration.600="activeTab === 0">

            {{-- if contain notification list --}}
            @forelse ($seller_unread_notifications as $notification)
                <livewire:seller-notification-item :key="$notification->id" :notification="$notification" />
            @empty
                <div class="text-center text-secondary">
                    <i class="bi bi-bell mr-2"></i>
                    No notifications
                </div>
            @endforelse

        </div>

        <div class="tab-panel" :class="{ 'active': activeTab === 1 }"
            x-show.transition.in.opacity.duration.600="activeTab === 1">

            {{-- if contain notification list --}}
            @forelse ($seller_notifications as $notification)
                <livewire:seller-notification-item :key="$notification->id" :notification="$notification" />
            @empty
                <div class="text-center text-secondary">
                    <i class="bi bi-bell mr-2"></i>
                    No notifications
                </div>
            @endforelse

        </div>
    </div>

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
