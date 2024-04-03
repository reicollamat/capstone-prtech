<div x-transition>
    {{-- if contain notification list --}}
    @forelse ($seller_notifications as $notification)
        <livewire:seller-notification-item :key="$notification->id" :notification="$notification" />
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
