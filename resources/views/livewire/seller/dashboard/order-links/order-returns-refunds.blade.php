<div class="h-full w-full p-3" x-data="">
    {{-- Nothing in the world is as soft and yielding as water. --}}
    {{-- <button wire:click="getOrderList()">test</button> --}}
    <x-slot:page_header>
        Order Return/Refund
    </x-slot:page_header>

    
    {{-- session flash notification --}}
    @if (session('notification-livewire'))
        <div id="notif-alert" class="alert alert-primary rounded alert-dismissible fade show" role="alert" style="position: fixed; top: 20px; right: 25px; width: 25%; z-index:9999; font-size: 14px;" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" x-transition:leave.duration.500ms>
            {{session('notification-livewire')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="tab-wrapper flex h-full" x-data="{ activeTab: 0 }">
        <div class="flex-1 w-64">
            <div class="flex flex-column flex-lg-row justify-between gap-2 ">
                <div
                    class="bg-white w-full p-1 h-full border-gray-200 !rounded-lg text-sm focus:outline-none lg:items-center mb-3">
                    <div class="grid grid-cols-6">
                        <button @click="activeTab = 0" class="tab-control p-2 rounded"
                            :class="{ 'active bg-blue-300': activeTab === 0 }">Pending
                        </button>
                        <button @click="activeTab = 1" class="tab-control p-2 rounded"
                            :class="{ 'active bg-orange-300': activeTab === 1 }">Return Product
                        </button>
                        <button @click="activeTab = 2" class="tab-control p-2 rounded"
                            :class="{ 'active bg-orange-300': activeTab === 2 }">Partial Refund
                        </button>
                        <button @click="activeTab = 3" class="tab-control p-2 rounded"
                            :class="{ 'active bg-orange-300': activeTab === 3 }">Full Refund
                        </button>
                        <button @click="activeTab = 4" class="tab-control p-2 rounded"
                            :class="{ 'active bg-orange-300': activeTab === 4 }">Replacement
                        </button>
                        <button @click="activeTab = 5" class="tab-control p-2 rounded"
                            :class="{ 'active bg-gray-300': activeTab === 5 }">Records
                        </button>
                    </div>
                </div>
            </div>

            <div class="tab-panel" :class="{ 'active': activeTab === 0 }"
                x-show.transition.in.opacity.duration.600="activeTab === 0">
                @include('livewire.seller.dashboard.order-links.return-refund.pending')
            </div>

            <div class="tab-panel" :class="{ 'active': activeTab === 1 }"
                x-show.transition.in.opacity.duration.600="activeTab === 1">
                @include('livewire.seller.dashboard.order-links.return-refund.return_product')
            </div>

            <div class="tab-panel" :class="{ 'active': activeTab === 2 }"
                x-show.transition.in.opacity.duration.600="activeTab === 2">
                @include('livewire.seller.dashboard.order-links.return-refund.partial_refund')
            </div>

            <div class="tab-panel" :class="{ 'active': activeTab === 3 }"
                x-show.transition.in.opacity.duration.600="activeTab === 3">
                @include('livewire.seller.dashboard.order-links.return-refund.full_refund')
            </div>

            <div class="tab-panel" :class="{ 'active': activeTab === 4 }"
                x-show.transition.in.opacity.duration.600="activeTab === 4">
                @include('livewire.seller.dashboard.order-links.return-refund.replacement')
            </div>

            <div class="tab-panel" :class="{ 'active': activeTab === 5 }"
                x-show.transition.in.opacity.duration.600="activeTab === 5">
                @include('livewire.seller.dashboard.order-links.return-refund.records')
            </div>
        </div>

        <div
            class="hidden ml-3 d-lg-flex flex-none max-w-[14rem] flex-column gap-3 items-center md:content-center h-full py-4 pr-4">
            <div class="w-full h-fit py-6 pr-4 rounded-lg shadow pl-3 justify-center bg-white">
                <p class="text-xs text-center font-light uppercase text-gray-700 max-w-7xl">Overview</p>
                <div class="py-2 text-center">
                    <p class="text-sm font-base text-gray-500 mb-1">Total Return/Refund Records</p>
                    <input type="text" class="font-semibold bg-transparent w-full text-center"
                        wire:model="total_returnrefund" disabled>
                </div>
                <div class="py-2 text-center flex justify-center">
                    <div class="px-2">
                        <p class="text-sm font-base text-gray-500 mb-1">Pending Return/Refund</p>
                        <input type="text" class="font-semibold bg-transparent w-full text-center"
                            wire:model="total_pending" disabled>
                    </div>
                </div>
                <div class="py-2 text-center flex justify-center">
                    <div class="px-2">
                        <p class="text-sm font-base text-gray-500 mb-1">Return Product</p>
                        <input type="text" class="font-semibold bg-transparent w-full text-center"
                            wire:model="total_return_product" disabled>
                    </div>
                </div>
                <div class="py-2 text-center flex justify-center">
                    <div class="px-2">
                        <p class="text-sm font-base text-gray-500 mb-1">Partial Refund</p>
                        <input type="text" class="font-semibold bg-transparent w-full text-center"
                            wire:model="total_partial_refund" disabled>
                    </div>
                </div>
                <div class="py-2 text-center flex justify-center">
                    <div class="px-2">
                        <p class="text-sm font-base text-gray-500 mb-1">Full Refund</p>
                        <input type="text" class="font-semibold bg-transparent w-full text-center"
                            wire:model="total_full_refund" disabled>
                    </div>
                </div>
                <div class="py-2 text-center flex justify-center">
                    <div class="px-2">
                        <p class="text-sm font-base text-gray-500 mb-1">Replacement</p>
                        <input type="text" class="font-semibold bg-transparent w-full text-center"
                            wire:model="total_replacement" disabled>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
