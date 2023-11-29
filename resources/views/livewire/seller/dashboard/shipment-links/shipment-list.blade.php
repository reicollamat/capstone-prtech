<div class="h-full w-full p-3" x-data="">
    {{-- Nothing in the world is as soft and yielding as water. --}}
    {{-- <button wire:click="getOrderList()">test</button> --}}
    <x-slot:page_header>
        Shipment Management
    </x-slot:page_header>
    <div class="flex h-full">
        <div class="tab-wrapper flex-1 w-64" x-data="{ activeTab: 0 }">
            <div class="flex flex-column flex-lg-row justify-between gap-2 ">
                <div class="flex lg:hidden flex-none  flex-column gap-3 items-center md:content-center h-full py-4 pr-4">
                    <div class="w-full h-fit py-6 pr-4 rounded-lg shadow pl-3 justify-start bg-white">
                        <p class="text-xs text-center font-light uppercase text-gray-700 max-w-7xl">Overview</p>
                        <div class="py-2 text-center">
                            <p class="text-sm font-base text-gray-500 mb-1">Total Shipment Listed</p>
                            <p class="font-semibold">
                                {{ $this->getTotalShipmentCount }}
                            </p>
                        </div>
                        <div class="py-2 text-center flex justify-center">
                            <div class="px-2">
                                <p class="text-xs font-base text-gray-500 mb-1">To Ship</p>
                                <p class="font-semibold">
                                    {{ $this->getTotalToShipCount }}
                                </p>
                            </div>
                            <div class="px-2">
                                <p class="text-xs font-base text-gray-500 mb-1">Shipping</p>
                                <p class="font-semibold">
                                    {{ $this->getTotalShippingCount }}
                                </p>
                            </div>
                            <div class="px-2">
                                <p class="text-xs font-base text-gray-500 mb-1">Delivered</p>
                                <p class="font-semibold">
                                    {{ $this->getTotalFailedDeliveryCount }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white w-full p-1 h-full border-gray-200 !rounded-lg text-sm focus:outline-none lg:items-center mb-3">
                    <div class="grid grid-cols-3">
                        <button @click="activeTab = 0" class="tab-control p-2 rounded"
                            :class="{ 'active bg-blue-300': activeTab === 0 }">To Ship</button>
                        <button @click="activeTab = 1" class="tab-control p-2 rounded"
                            :class="{ 'active bg-blue-300': activeTab === 1 }">Shipping</button>
                        <button @click="activeTab = 2" class="tab-control p-2 rounded"
                            :class="{ 'active bg-blue-300': activeTab === 2 }">Delivered</button>
                    </div>
                </div>
            </div>

            <div class="tab-panel" :class="{ 'active': activeTab === 0 }"
                x-show.transition.in.opacity.duration.600="activeTab === 0">

                @include('livewire.seller.dashboard.shipment-links.shipment-list-tab-0')

            </div>

            <div class="tab-panel" :class="{ 'active': activeTab === 1 }"
                x-show.transition.in.opacity.duration.600="activeTab === 1">

                @include('livewire.seller.dashboard.shipment-links.shipment-list-tab-1')

            </div>
            <div class="tab-panel" :class="{ 'active': activeTab === 2 }"
                x-show.transition.in.opacity.duration.600="activeTab === 2">

                @include('livewire.seller.dashboard.shipment-links.shipment-list-tab-2')

            </div>
        </div>
        <div
            class="hidden ml-3 d-lg-flex flex-none max-w-[14rem] flex-column gap-3 items-center md:content-center h-full py-4 pr-4">
            <div class="w-full h-fit py-6 pr-4 rounded-lg shadow pl-3 justify-center bg-white">
                <p class="text-xs text-center font-light uppercase text-gray-700 max-w-7xl">Overview</p>
                <div class="py-2 text-center">
                    <p class="text-sm font-base text-gray-500 mb-1">Total Shipment Listed</p>
                    <p class="font-semibold">{{ $this->getTotalShipmentCount }}</p>
                </div>
                <div class="py-2 text-center flex justify-center">
                    <div class="px-2">
                        <p class="text-sm font-base text-gray-500 mb-1">To Ship</p>
                        <p class="font-semibold">{{ $this->getTotalToShipCount }}</p>
                    </div>
                </div>
                <div class="py-2 text-center flex justify-center">
                    <div class="px-2">
                        <p class="text-sm font-base text-gray-500 mb-1">Shipping</p>
                        <p class="font-semibold">{{ $this->getTotalShippingCount }}</p>
                    </div>
                </div>
                <div class="py-2 text-center flex justify-center">
                    <div class="px-2">
                        <p class="text-sm font-base text-gray-500 mb-1">Delivered</p>
                        <p class="font-semibold">{{ $this->getTotalCompletedCount }}</p>
                    </div>
                </div>
                <div class="py-2 text-center flex justify-center">
                    <div class="px-2">
                        <p class="text-sm font-base text-gray-500 mb-1">Failed Delivery</p>
                        <p class="font-semibold">{{ $this->getTotalFailedDeliveryCount }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
