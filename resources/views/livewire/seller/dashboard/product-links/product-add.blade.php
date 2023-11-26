<div class="px-12 py-12">
    <x-slot:page_header>
        Add New Product
    </x-slot:page_header>
    {{-- Be like water. --}}
    <div class="p-4  bg-white border border-gray-200 rounded-lg">
        <div class="flex justify-between items-center">
            <div>
                <h6 class="text-gray-600 mb-0 text-lg tracking-wide text-start">Basic Product Information</h6>
            </div>
            <div>
                <button class="btn btn-outline-dark  tracking-wide">
                    Reset
                </button>
            </div>
        </div>
        <hr>
        <div>
            <div>
                <!-- Product Name input -->
                <div class="mb-3">
                    <label for="product_name"
                        class="block mb-1 text-sm font-medium text-gray-800 dark:text-white pl-1">Product
                        Name</label>
                    <input type="text" id="product_name" wire:model.blur="productName"
                        class="bg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Product Name" required>
                    @error('email')
                        <span class="font-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="grid md:grid-cols-2 md:gap-8 ">
                <div>
                    <!-- Product SKU input -->
                    <div class="mb-3">
                        <label for="sku"
                            class="block mb-1 text-sm font-medium text-gray-800 dark:text-white  pl-1">Product
                            SKU</label>
                        <input type="text" id="sku" wire:model.blur="productSKU"
                            class="bg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="XXX-XXX" required>
                        @error('email')
                            <span class=" font-sm
                            text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div>
                    <!-- Product SLUG input -->
                    <div class="mb-3">
                        <label for="slug"
                            class="block mb-1 text-sm font-medium text-gray-800 dark:text-white pl-1">Product
                            Slug</label>
                        <input type="text" id="slug" wire:model.blur="productSlug"
                            class="bg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="lowercase, no spaces seprated by hyphen " required>
                        @error('email')
                            <span class="font-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="description"
                    class="block mb-1 text-sm font-medium text-gray-800 dark:text-white pl-1">Description</label>
                <textarea id="description" rows="4" wire:model.blur="productDescription"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Write your thoughts here..."></textarea>
            </div>
            <div class="grid md:grid-cols-3 md:gap-8 ">
                <div>
                    <!-- Product Condition input -->
                    <div class="mb-3">
                        <label for="condition"
                            class="block mb-1 text-sm font-medium text-gray-800 dark:text-white  pl-1">Product
                            Condtion</label>
                        <select id="condition" wire:model.blur="productCondition"
                            class="bbg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option disabled selected>Condition</option>
                            <option value="brand_new">Brand New</option>
                            <option value="used">Used</option>
                        </select>
                    </div>
                </div>
                <div>
                    <!-- Product Status input -->
                    <div class="mb-3">
                        <label for="status"
                            class="block mb-1 text-sm font-medium text-gray-800 dark:text-white pl-1">Product
                            Status</label>
                        <select id="status" wire:model.blur="productStatus"
                            class="bbg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option disabled selected>Status</option>
                            <option value="available">Available</option>
                            <option value="unavailable">Unavailable</option>
                        </select>
                    </div>
                </div>
                <div>
                    <!-- Product Category input -->
                    <div class="mb-3">
                        {{--                         <label for="category" --}}
                        {{--                             class="block mb-1 text-sm font-medium text-gray-800 dark:text-white pl-1">Product --}}
                        {{--                             Category</label> --}}
                        {{--                          --}}{{--                          <select id="category" wire:model.live="productCategory"  --}}
                        {{--                         <select id="category" --}}
                        {{--                             class="bbg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"> --}}
                        {{--                             <option disabled selected>Choose a country</option> --}}
                        {{--                             @foreach (Helper::categoryList() as $category_key => $category_value) --}}
                        {{--                                 <option wire:key="{{ $category_key }}" --}}
                        {{--                                     wire:click.debounce="changeCategoryView({{ $category_key }})" --}}
                        {{--                                     value="{{ $category_key }}">{{ $category_value }} --}}
                        {{--                                 </option> --}}
                        {{--                             @endforeach --}}
                        {{--                         </select> --}}
                        {{--  Category Filter --}}
                        <label for="status"
                            class="block mb-1 text-sm font-medium text-gray-800 dark:text-white pl-1">Product
                            Category</label>
                        <div x-data="{ isOpen: false }" class="w-full relative ">
                            <!-- Dropdown toggle button -->
                            <button @click="isOpen = !isOpen"
                                class="relative z-10 w-full flex flex-start border border-gray-400  p-2.5 !rounded text-sm bg-white text-gray-900 gap-1">
                                <span class="mx-1 w-full text-start">Category :
                                    {{ CustomHelper::maptopropercatetory($productCategory) }}</span>
                                <svg class="w-5 h-5 mx-1 rotate-180 transition duration-200" viewBox="0 0 24 24"
                                    fill="none" xmlns="http://www.w3.org/2000/svg"
                                    :class="{ 'rotate-180 transition duration-300': isOpen }">
                                    <path d=" M12 15.713L18.01 9.70299L16.597 8.28799L12 12.888L7.40399 8.28799L5.98999
                            9.70199L12 15.713Z" fill="currentColor"></path>
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div x-cloak x-show="isOpen" @click.away="isOpen = false"
                                x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="opacity-0 scale-90"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-100"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-90"
                                class="absolute right-0 z-20 mt-1 w-full md:w-96 shadow overflow-hidden origin-top-right bg-transparent rounded-md dark:bg-gray-800 front">
                                <div class="grid grid-cols-3 gap-2 p-2 bg-white rounded border-1 border-gray-300">
                                    @foreach (CustomHelper::categoryList() as $category_key => $category_value)
                                        <button
                                            class="mb-0 w-full text-start  text-sm p-1 tracking-tight rounded hover:bg-gray-100"
                                            @click="isOpen = false" type="button"
                                            wire:click.debounce="changeCategoryView('{{ $category_key }}')">
                                            {{ $category_value }}
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-4 p-4 bg-white border border-gray-200 rounded-lg">
        <div class="flex justify-between items-center">
            <div>
                <h6 class="text-gray-600 mb-0 text-lg tracking-wide text-start">Specific Product Information</h6>
            </div>
            <div>
                <button class="btn btn-outline-dark  tracking-wide">
                    Reset
                </button>
            </div>
        </div>
        <hr>
        {{ $productName }}
        {{--        {{ var_dump($productCategory) }} --}}
        {{--        {{ var_dump($view) }} --}}
        <div class="relative my-3">
            {{--            @if (!$productCategory) --}}
            {{--                <h6 class="text-gray-600 text-center">Select A Category To Continue...</h6> --}}
            {{--            @endif --}}
            {{--            {{ var_dump($productCategory) }} --}}
            {{--              Load Dynamic Form after choosing category  --}}
            <livewire:dynamic-component :is="$view" :key="$view" :productName="$productName" :productSlug="$productSlug"
                :productCategory="$productCategory" :productSKU="$productSKU" :productDescription="$productDescription" :productCondition="$productCondition" :productStatus="$productStatus" />
        </div>
    </div>
</div>
