<div class="h-full w-full p-3" x-data="">
    {{-- Nothing in the world is as soft and yielding as water. --}}
    {{-- <button wire:click="getOrderList()">test</button> --}}
    <x-slot:page_header>
        Shipment Management
    </x-slot:page_header>
    <div class="flex h-full">
        <div class="tab-wrapper flex-1 w-64" x-data="{ activeTab: 0 }">
            <div class="flex flex-column flex-lg-row justify-between gap-2 ">
                <div
                    class="bg-white w-full p-1 h-full border-gray-200 !rounded-lg text-sm focus:outline-none lg:items-center mb-3">
                    <div class="grid grid-cols-2">
                        <button @click="activeTab = 0" class="tab-control p-2 rounded"
                            :class="{ 'active bg-blue-300': activeTab === 0 }">Unread Cancellations</button>
                        <button @click="activeTab = 1" class="tab-control p-2 rounded"
                            :class="{ 'active bg-gray-300': activeTab === 1 }">Cancellation Records</button>
                    </div>
                </div>
            </div>

            <div class="tab-panel" :class="{ 'active': activeTab === 0 }"
                x-show.transition.in.opacity.duration.600="activeTab === 0">

                {{-- pending requests --}}
                @include('livewire.seller.dashboard.order-links.order-cancellations-tab-0')

            </div>

            <div class="tab-panel" :class="{ 'active': activeTab === 1 }"
                x-show.transition.in.opacity.duration.600="activeTab === 1">

                {{-- cancellation records --}}
                @include('livewire.seller.dashboard.order-links.order-cancellations-tab-1')

            </div>
        </div>
    </div>
</div>
