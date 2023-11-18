<div>
    <div x-data="{ expanded: false }" class="py-2 bg-white">
        <div class="flex flex-column flex-lg-row flex-shrink-0 min-w-full items-center text-center">
            <span class="mb-0 p-2 min-w-[40px] !text-gray-400 !font-light">
                <input class="form-check-input" wire:model.live="select_products" value="{{ $item->id }}"
                    type="checkbox">
            </span>
            <div class="relative items-center  mb-0 min-w-[60px] p-2 !text-gray-800 !font-light">
                {{--                 <img src="https://images.unsplash.com/photo-1523779917675-b6ed3a42a561?ixid=MnwxMjA3fDB8MHxzZWFyY2h8N3x8d29tYW4lMjBibHVlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=face&w=500&q=200" --}}
                <img src="{{ asset($item->image) }}" class="rounded-lg mx-auto d-block w-9 h-9" alt="Product-Thumbnail">
            </div>
            <div class="mb-0 min-w-[40px] p-2 !text-gray-800 !font-light">
                {{ $item->id }}
            </div>
            <div class="mb-0 min-w-[100px] text-start p-2 flex-1 !text-gray-800 !font-light">
                {{ $item->name }}
            </div>
            <div class=" mb-0 min-w-[100px] p-2 flex-1 !text-gray-800 !font-light">
                {{ \App\Helper\Helper::maptopropercatetory($item->category) }}
            </div>
            <div class=" mb-0  min-w-[100px] p-2 !text-gray-800 !font-light">
                {{ $item->price }}
            </div>
            <div class=" mb-0 min-w-[100px] p-2 !text-gray-800 !font-light">
                Stock
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
            class="grid text-sm border-t-2 border-blue-100 text-slate-600 overflow-hidden transition-all duration-300 ease-in-out"
            :class="expanded ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'">
            <div class="overflow-hidden">
                <div class="p-3 flex">
                    <div class="px-2.5">
                        <div class="flex justify-center items-center p-2.5">
                            <img src="{{ asset($item->image) }}"
                                class="rounded-xl border border-gray-600 p-2.5 mx-auto d-block w-28 h-28"
                                alt="Product-Thumbnail">
                        </div>
                        <p class="text-center">+ Add Image</p>
                    </div>
                    <div class="flex-1">
                        <div class="grid grid-cols-2">
                            <div>
                                <div class="mb-3">
                                    <label for="username"
                                        class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">Display
                                        Name
                                    </label>
                                    <input type="text" id="username" value="{{ $item->name }}"
                                        class="bg-white !border-b-2 border-gray-600 text-gray-900 text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                        placeholder="" required>
                                    @error('username')
                                        <span class="text-sm text-red-600 space-y-1">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--    {{ $item->id }} --}}
</div>
