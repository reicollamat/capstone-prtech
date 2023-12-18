<div>
    <div x-data="{ expanded: false }" class="py-2 bg-white border-b border-gray-100">
        <div class="flex flex-column flex-lg-row flex-shrink-0 min-w-full items-center text-center">
            <span class="mb-0 p-2 min-w-[40px] !text-gray-400 !font-light">
                <input class="form-check-input" wire:model.live="select_products" value="{{ $item->id }}"
                    type="checkbox" id="select_products">
            </span>
            <label for="select_products" class="sr-only"></label>
            <div class="relative items-center  mb-0 min-w-[60px] p-2 !text-gray-800 !font-light">
                {{--                 <img src="https://images.unsplash.com/photo-1523779917675-b6ed3a42a561?ixid=MnwxMjA3fDB8MHxzZWFyY2h8N3x8d29tYW4lMjBibHVlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=face&w=500&q=200" --}}
                {{-- @dd($itemproductinfo) --}}
                <img src="{{ asset($itemproductinfo->product_images[0]->image_paths) }}"
                    class="rounded-lg mx-auto d-block w-9 h-9" alt="Product-Thumbnail">
            </div>
            {{--            @dd($item) --}}
            <div class="mb-0 min-w-[40px] p-2 !text-gray-800 !font-light">
                {{ $item->id }}
            </div>
            <div class="mb-0 min-w-[100px] text-start p-2 flex-1 !text-gray-800 !font-light">
                {{ $item->name }}
            </div>
            <div class=" mb-0 min-w-[100px] p-2 flex-1 !text-gray-800 !font-light">
                {{ CustomHelper::maptopropercatetory($item->category) }}
            </div>
            <div class=" mb-0  min-w-[100px] p-2 !text-gray-800 !font-light">
                {{ $item->price }}
            </div>
            <div class=" mb-0 min-w-[100px] p-2 !text-gray-800 !font-light">
                {{ $itemproductinfo->stock }}
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
        <form wire:submit="submit">
            <div x-cloak id="faqs-text-01" role="region" aria-labelledby="faqs-title-01"
                class="grid text-sm border-t-2 border-blue-100 text-slate-600 overflow-hidden rounded transition-all duration-300 ease-in-out bg-background-light "
                :class="expanded ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'">

                <div class="overflow-hidden">

                    <div class="p-2 flex flex-col lg:flex-row">
                        <div class="px-6 content-center">
                            <div class="flex flex-col justify-center items-center p-2.5 gap-2">
                                <img src="{{ asset($itemproductinfo->product_images[0]->image_paths) }}"
                                    class="rounded-xl border border-gray-600 p-2.5 mx-auto d-block w-28 h-28"
                                    alt="Product-Thumbnail">
                                <p class="text-center">+ Add Image</p>
                            </div>

                        </div>
                        <div class="flex-1">
                            <div class="w-full flex flex-col lg:flex-row gap-1.5">
                                <div class="p-1.5 lg:w-1/2">
                                    <div class="mb-3">
                                        <label for="product_name"
                                            class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">Display
                                            Name
                                        </label>
                                        <input type="text" id="product_name" value="{{ $itemproductinfo->title }}"
                                            wire:model.blur="product_name"
                                            class="bg-transparent !border-b-2 border-gray-600 text-gray-900 text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                            placeholder="" required>
                                        @error('product_name')
                                            <span class="text-sm text-red-600 space-y-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 gap-4">
                                        {{-- <div> --}}
                                        {{--     <label for="sku" --}}
                                        {{--         class="block text-sm font-light text-gray-500 tracking-tight dark:text-white"> --}}
                                        {{--         SKU --}}
                                        {{--     </label> --}}
                                        {{--     <input type="text" id="sku" value="{{ $itemproductinfo->SKU }}" --}}
                                        {{--         wire:model.blur="product_sku" --}}
                                        {{--         class="bg-transparent !border-b-2 border-gray-600 text-gray-900 text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5" --}}
                                        {{--         placeholder="" required> --}}
                                        {{--     @error('product_sku') --}}
                                        {{--         <span class="text-sm text-red-600 space-y-1">{{ $message }}</span> --}}
                                        {{--     @enderror --}}
                                        {{-- </div> --}}
                                        <div>
                                            <label for="product_slug"
                                                class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">Product
                                                Slug
                                            </label>
                                            <input type="text" id="product_slug"
                                                value="{{ $itemproductinfo->slug }}" wire:model.blur="product_slug"
                                                class="bg-transparent !border-b-2 border-gray-600 text-gray-900 text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                                placeholder="" required>
                                            @error('product_slug')
                                                <span class="text-sm text-red-600 space-y-1">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div>
                                        <div class="grid lg:grid-cols-2 gap-4">
                                            <div class="grid lg:grid-cols-2 gap-2">
                                                <div>
                                                    <label for="stock"
                                                        class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">Stock
                                                    </label>
                                                    <input type="text" id="stock"
                                                        value="{{ $itemproductinfo->stock }}"
                                                        wire:model.blur="product_stock"
                                                        class="bg-transparent !border-b-2 border-gray-600 text-gray-900 text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                                        placeholder="" required>
                                                    @error('product_stock')
                                                        <span
                                                            class="text-sm text-red-600 space-y-1">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div>
                                                    <label for="reserve"
                                                        class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">Reserve

                                                    </label>
                                                    <input type="text" id="reserve"
                                                        value="{{ $itemproductinfo->reserve }}"
                                                        wire:model.blur="product_reserve"
                                                        class="bg-transparent text-red-600 !border-b-2 border-gray-600  text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                                        placeholder="" required>
                                                    @error('product_reserve')
                                                        <span
                                                            class="text-sm text-red-600 space-y-1">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                {{-- second half --}}
                                <div class="p-1.5 lg:w-1/2">

                                    <div class="mb-3 grid lg:grid-cols-2 gap-4">
                                        <div>
                                            <label for="price"
                                                class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">Price
                                            </label>
                                            <input type="text" id="price" value="{{ $item->price }}"
                                                wire:model.blur="product_price"
                                                class="bg-transparent !border-b-2 border-gray-600 text-gray-900 text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                                placeholder="" required>
                                            @error('product_price')
                                                <span class="text-sm text-red-600 space-y-1">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="category"
                                                class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">Category
                                            </label>
                                            <select id="category" wire:model.blur="product_category"
                                                class="bg-transparent text-gray-600 !border-b-2 border-gray-600  text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5">
                                                <option disabled default>Category</option>
                                                @foreach (CustomHelper::categoryList() as $category_key => $category_value)
                                                    <option value="{{ $category_key }}">{{ $category_value }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="grid lg:grid-cols-2 gap-2">
                                        <div>
                                            <label for="conditon"
                                                class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">Condition
                                            </label>
                                            <select id="conditon" wire:model.blur="product_condition"
                                                class="bg-transparent text-gray-600 !border-b-2 border-gray-600  text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5">
                                                <option disabled selected>Condition</option>
                                                <option value="brand_new">Brand New</option>
                                                <option value="used">Used</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="status"
                                                class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">Status
                                            </label>
                                            <select id="status" wire:model.blur="product_status"
                                                class="bg-transparent text-gray-600 !border-b-2 border-gray-600  text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5">
                                                <option disabled selected>Status</option>
                                                <option value="available">Available</option>
                                                <option value="unavailable">Unavailable</option>
                                            </select>
                                            @error('product_status')
                                                <span class="text-sm text-red-600 space-y-1">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <hr class="my-2">
                    <div class="px-8 flex justify-between !pb-2">
                        <div class="content-center gap-1.5">
                            <i class="bi bi-pencil"></i>
                            <a href="#" class="mb-0 no-underline text-gray-600 text-sm tracking-normal">Advance
                                Edit</a>
                        </div>
                        <div>
                            <button type="reset"
                                class="bg-transparent border-0 hover:bg-blue-700 text-gray-800 font-bold py-1.5 px-4 rounded">
                                Reset
                            </button>
                            <span class="mx-1.5">|</span>
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1.5 px-4 rounded">
                                Update
                            </button>
                            {{--                         <span class="text-gray-400 text-sm tracking-wide"> --}}
                            {{--                             Changes Saved --}}
                            {{--                         </span> --}}
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    {{--    {{ $item->SKU }} --}}
</div>
