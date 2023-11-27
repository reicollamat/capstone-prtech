<div>
    <div x-data="{ expanded: false }" class="py-2 bg-white border-b border-gray-100">
        <div class="flex flex-column flex-lg-row flex-shrink-0 min-w-full items-center text-center">
            <div class="relative items-center  mb-0 min-w-[60px] p-2 !text-gray-800 !font-light">
                <img src="{{ asset($item->image) }}" class="rounded-lg mx-auto d-block w-9 h-9" alt="Product-Thumbnail">
            </div>
            <div class="mb-0 min-w-[40px] p-2 !text-gray-800 !font-light">
                {{ $item->id }}
            </div>
            <div class="mb-0 min-w-[100px] text-start p-2 flex-1 !text-gray-800 !font-light">
                {{ $item->title }}
            </div>
            {{-- <div class=" mb-0 min-w-[100px] p-2 !text-gray-800 !font-light">
                {{ $item->quantity }}
            </div> --}}
            <div class=" mb-0 min-w-[100px] p-2 !text-gray-800 !font-light">
                {{ $item->total_price }}
            </div>
            <div class=" mb-0 min-w-[100px] p-2 flex-1 !text-gray-800 !font-light">
                {{ $item->payment_status }}
            </div>
            <div class=" mb-0 min-w-[100px] p-2 !text-gray-800 !font-light">
                {{ $item->purchase_status }}
            </div>
            <div class="flex justify-center mb-0 min-w-[100px] p-2 !text-gray-600 !font-light items-center">
                <button id="faqs-title-01" type="button"
                    class="flex items-center justify-center text-center font-semibold p-1 bg-white rounded-lg"
                    @click="expanded = !expanded" :aria-expanded="expanded" aria-controls="faqs-text-01">
                    <span class="transform origin-center transition duration-200 ease-out"
                        :class="{ '!rotate-180': expanded }">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 15.713L18.01 9.70299L16.597 8.28799L12 12.888L7.40399 8.28799L5.98999 9.70199L12 15.713Z"
                                fill="currentColor"></path>
                        </svg>
                    </span>
                </button>
            </div>
        </div>
        <div x-cloak id="faqs-text-01" role="region" aria-labelledby="faqs-title-01"
            class="grid text-sm border-t-2 border-blue-100 text-slate-600 overflow-hidden rounded transition-all duration-300 ease-in-out bg-background-light "
            :class="expanded ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'">
            <div class="overflow-hidden">
                <div class="p-2 flex flex-col lg:flex-row">
                    <div class="px-6 content-center">
                        <div class="flex flex-col justify-center items-center p-2.5 gap-2">
                            <img src="{{ asset($item->image) }}"
                                class="rounded-xl border border-gray-600 p-2.5 mx-auto d-block w-28 h-28"
                                alt="Product-Thumbnail">
                        </div>
                    </div>
                    <div class="flex-1">
                        <div class="w-full flex flex-col lg:flex-row gap-1.5">
                            <div class="p-1.5 lg:w-1/2">
                                <div class="mb-3">
                                    <label for="product_name"
                                        class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">
                                        Product Name
                                    </label>
                                    <input type="text" id="product_name" value="{{ $item->title }}"
                                        wire:model.blur="product_name"
                                        class="bg-transparent !border-b-2 border-gray-600 text-gray-900 text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                        placeholder="" disabled>
                                    {{-- @error('product_name')
                                        <span class="text-sm text-red-600 space-y-1">{{ $message }}</span>
                                    @enderror --}}
                                </div>
                                <div class="grid lg:grid-cols-2 mb-3 gap-4">
                                    <div>
                                        <label for="purchase_date"
                                            class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">
                                            Purchase Date
                                        </label>
                                        <input type="text" id="purchase_date" value="{{ date('d-M-y', strtotime($item->purchase_date)) }}"
                                            wire:model.blur="product_purchase_date"
                                            class="bg-transparent !border-b-2 border-gray-600 text-gray-900 text-xs focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                            placeholder="" disabled>
                                        {{-- @error('product_sku')
                                            <span class="text-sm text-red-600 space-y-1">{{ $message }}</span>
                                        @enderror --}}
                                    </div>
                                    <div>
                                        <label for="date_of_payment"
                                            class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">
                                            Payment Date
                                        </label>
                                        @if ($item->date_of_payment == null)
                                            <input type="text" id="date_of_payment" value=""
                                                wire:model.blur="date_of_payment"
                                                class="bg-transparent !border-b-2 border-gray-600 text-gray-900 text-xs focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                                placeholder="" disabled>
                                        @else
                                            <input type="text" id="date_of_payment" value="{{ date('d-M-y', strtotime($item->date_of_payment)) }}"
                                                wire:model.blur="date_of_payment"
                                                class="bg-transparent !border-b-2 border-gray-600 text-gray-900 text-xs focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                                placeholder="" disabled>
                                        @endif
                                        {{-- @error('product_slug')
                                            <span class="text-sm text-red-600 space-y-1">{{ $message }}</span>
                                        @enderror --}}
                                    </div>
                                </div>
                                <div>
                                    <div class="grid lg:grid-cols-2 gap-4">
                                        <div>
                                            <label for="payment_type"
                                                class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">Payment Type
                                            </label>
                                            <input type="text" id="payment_type"
                                                value="{{ $item->payment_type }}"
                                                wire:model.blur="payment_type"
                                                class="bg-transparent !border-b-2 border-gray-600 text-gray-900 text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                                placeholder="" disabled>
                                            {{-- @error('product_stock')
                                                <span class="text-sm text-red-600 space-y-1">{{ $message }}</span>
                                            @enderror --}}
                                        </div>
                                        <div>
                                            <label for="reference_code"
                                                class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">Reference Code

                                            </label>
                                            <input type="text" id="reference_code"
                                                value="{{ $item->reference_code }}"
                                                wire:model.blur="reference_code"
                                                class="bg-transparent !border-b-2 border-gray-600  text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                                placeholder="" disabled>
                                            {{-- @error('product_reserve')
                                                <span class="text-sm text-red-600 space-y-1">{{ $message }}</span>
                                            @enderror --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- second half --}}
                            <div class="p-1.5 lg:w-1/2">

                                <div class="mb-3 grid lg:grid-cols-2 gap-4">
                                    <div>
                                        <label for="quantity"
                                            class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">Quantity
                                        </label>
                                        <input type="text" id="quantity" value="{{ $item->quantity }}"
                                            wire:model.blur="quantity"
                                            class="bg-transparent !border-b-2 border-gray-600 text-gray-900 text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                            placeholder="" disabled>
                                        {{-- @error('product_price')
                                            <span class="text-sm text-red-600 space-y-1">{{ $message }}</span>
                                        @enderror --}}
                                    </div>
                                    <div>
                                        <label for="total_price"
                                            class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">Total Price
                                        </label>
                                        <input type="text" id="total_price" value="{{ $item->total_price }}"
                                            wire:model.blur="total__price"
                                            class="bg-transparent !border-b-2 border-gray-600 text-gray-900 text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                            placeholder="" disabled>
                                        {{-- @error('product_price')
                                            <span class="text-sm text-red-600 space-y-1">{{ $message }}</span>
                                        @enderror --}}
                                    </div>
                                </div>
                                <div class="grid lg:grid-cols-2 gap-2">
                                    <div>
                                        <label for="order_status"
                                            class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">Order Status
                                        </label>
                                        <select id="order_status" wire:model.blur="order_status"
                                            class="bg-transparent text-gray-600 !border-b-2 border-gray-600  text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5" >
                                            @foreach ($this->orderstatus_options as $status)
                                                <option value="{{$status}}"
                                                @if ($status == $item->purchase_status)
                                                    selected>
                                                @endif
                                                {{$status}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="status"
                                            class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">Payment Status
                                        </label>
                                        <select id="status" wire:model.blur="product_status"
                                            class="bg-transparent text-gray-600 !border-b-2 border-gray-600  text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5">
                                            @foreach ($this->paymentstatus_options as $status)
                                                <option value="{{$status}}"
                                                @if ($status == $item->payment_status)
                                                    selected
                                                @endif
                                                >{{$status}}</option>
                                            @endforeach
                                        </select>
                                        {{-- @error('product_status')
                                            <span class="text-sm text-red-600 space-y-1">{{ $message }}</span>
                                        @enderror --}}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <hr class="my-2">
                <div class="px-8 flex justify-end !pb-2">
                    <div>
                        <button type="submit"
                            class="bg-transparent border-0 hover:bg-blue-700 text-gray-800 font-bold py-1.5 px-4 rounded">
                            Reset
                        </button>
                        <span class="mx-1.5">|</span>
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1.5 px-4 rounded">Update
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
    {{--    {{ $item->SKU }} --}}
</div>
