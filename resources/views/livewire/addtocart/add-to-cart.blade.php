<div>
    {{-- session flash notification --}}
    {{-- for add-to-cart --}}
    <div class="alert alert-primary rounded alert-dismissible fade show" role="alert"
        style="display: none; position: fixed; top: 20px; right: 25px; width: 25%; z-index:9999; font-size: 14px;"
        x-data="{ show: false }" x-show="show" x-transition:leave.duration.500ms x-init="@this.on('notif-alert-cart', () => { show = true;
            setTimeout(() => { show = false; }, 5000) })">
        {{ session('notification-livewire') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <button wire:click="addtocart"
        class="text-white bg-gray-600 hover:bg-blue-800 focus:ring-4 no-underline focus:outline-none focus:ring-blue-300 font-medium rounded-lg p-1.5 text-sm  items-center text-center">
        <i class="bi bi-cart-plus" style="font-size: 1.5rem"></i>
    </button>
</div>
