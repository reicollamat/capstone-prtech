<div class="px-12 py-12">
    <x-slot:page_header>
        Add New Product
    </x-slot:page_header>
    {{-- Be like water. --}}
    <div class="mb-2 gap-1.5 flex justify-start  items-center">
        <div>
            <h6 class="text-gray-600 mb-0 text-lg tracking-wide text-start">Select
                Product
                Category
                To Start</h6>
        </div>
        <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus"
            data-bs-placement="right"
            data-bs-content="Selecting Category first make us dynamically change specific product fields.">
            <i class="bi bi-question-circle"></i>
        </span></label>
    </div>
    <div class="mb-3 p-4 bg-white border border-gray-200 rounded-lg">
        <div class="flex justify-center items-center">
            <!-- Product Category input -->
            <div>
                <label for="prodoct_category" class="block mb-1 text-sm sr-only font-medium text-gray-800  pl-1">Select
                    Product
                    Category
                    To Start</label>
                <div x-data="{ isOpen: false }" class="w-full relative ">
                    <!-- Dropdown toggle button -->
                    <button @click="isOpen = !isOpen"
                        class="relative z-10 w-72 flex flex-start border p-2.5 !rounded text-base bg-white text-gray-900 gap-1">
                        <span class="mx-1 w-full text-start">Category :
                            {{ CustomHelper::maptopropercatetory($productCategory) }}</span>
                        <svg class="w-6 h-6 mx-1 rotate-180 transition duration-200" viewBox="0 0 28 28" fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                            :class="{ 'rotate-180 transition duration-300': isOpen }">
                            <path d=" M12 15.713L18.01 9.70299L16.597 8.28799L12 12.888L7.40399 8.28799L5.98999
                             9.70199L12 15.713Z" fill="currentColor"></path>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div x-cloak x-show="isOpen" @click.away="isOpen = false"
                        x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-100"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
                        class="absolute start-50 translate-middle-x z-20 mt-1 w-full md:w-[30rem] shadow overflow-hidden origin-top-right bg-transparent rounded-md dark:bg-gray-800 front">
                        <div class="grid md:grid-cols-4 gap-2.5 p-2.5 bg-white rounded border-1 border-gray-300">
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

    <form wire:submit.prevent="save">
        {{-- <div class="p-4  bg-white border border-gray-200 rounded-lg"> --}}
        {{--     <div class="flex justify-between items-center"> --}}
        {{--         <div> --}}
        {{--             <h6 class="text-gray-600 mb-0 text-lg tracking-wide text-start">Basic Product Information</h6> --}}
        {{--         </div> --}}
        {{--         <div> --}}
        {{--             <button type="button" class="btn btn-outline-dark tracking-wide"> --}}
        {{--                 Reset --}}
        {{--             </button> --}}
        {{--         </div> --}}
        {{--     </div> --}}
        {{--     <hr> --}}
        {{--     <div> --}}
        {{--         <div> --}}
        {{--             <!-- Product Name input --> --}}

        {{--             <div class="mb-3"> --}}
        {{--                 <label for="product_name" --}}
        {{--                     class="block mb-1 text-sm font-medium text-gray-800 dark:text-white pl-1">Product --}}
        {{--                     Name</label> --}}
        {{--                 <input type="text" id="product_name" wire:model.blur="productName" --}}
        {{--                     class="bg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" --}}
        {{--                     placeholder="Product Name" required> --}}
        {{--                 @if ($productName < 0) --}}
        {{--                     <span class="font-sm text-red-500">This field is required</span> --}}
        {{--                 @endif --}}
        {{--             </div> --}}
        {{--              --}}{{--                {{ $productName }} --}}

        {{--         </div> --}}
        {{--         <div class="grid md:grid-cols-2 md:gap-8 "> --}}
        {{--             <div> --}}
        {{--                 <!-- Product SKU input --> --}}
        {{--                 <div class="mb-3"> --}}
        {{--                     <label for="sku" --}}
        {{--                         class="block mb-1 text-sm font-medium text-gray-800 dark:text-white  pl-1">Product --}}
        {{--                         SKU</label> --}}
        {{--                     <input type="text" id="sku" wire:model.blur="productSKU" --}}
        {{--                         class="bg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" --}}
        {{--                         placeholder="XXX-XXX" required> --}}
        {{--                     @if ($productSKU < 0) --}}
        {{--                         <span class="font-sm text-red-500">This field is required</span> --}}
        {{--                     @endif --}}
        {{--                 </div> --}}
        {{--             </div> --}}
        {{--             <div> --}}
        {{--                 <!-- Product SLUG input --> --}}
        {{--                 <div class="mb-3"> --}}
        {{--                     <label for="slug" --}}
        {{--                         class="block mb-1 text-sm font-medium text-gray-800 dark:text-white pl-1">Product --}}
        {{--                         Slug</label> --}}
        {{--                     <input type="text" id="slug" wire:model.blur="productSlug" --}}
        {{--                         class="bg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" --}}
        {{--                         placeholder="lowercase, no spaces seprated by hyphen " required> --}}
        {{--                     @if ($productSlug < 0) --}}
        {{--                         <span class="font-sm text-red-500">This field is required</span> --}}
        {{--                     @endif --}}
        {{--                 </div> --}}
        {{--             </div> --}}
        {{--         </div> --}}
        {{--         <div class="mb-3"> --}}
        {{--             <label for="description" --}}
        {{--                 class="block mb-1 text-sm font-medium text-gray-800 dark:text-white pl-1">Description</label> --}}
        {{--             <textarea id="description" rows="4" wire:model.blur="productDescription" --}}
        {{--                 class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" --}}
        {{--                 placeholder="Write your thoughts here..." required></textarea> --}}
        {{--             @if ($productDescription < 0) --}}
        {{--                 <span class="font-sm text-red-500">This field is required</span> --}}
        {{--             @endif --}}
        {{--         </div> --}}
        {{--         <div class="grid md:grid-cols-3 md:gap-8 "> --}}
        {{--             <div> --}}
        {{--                 <!-- Product Condition input --> --}}
        {{--                 <div class="mb-3"> --}}
        {{--                     <label for="condition" --}}
        {{--                         class="block mb-1 text-sm font-medium text-gray-800 dark:text-white  pl-1">Product --}}
        {{--                         Condtion</label> --}}
        {{--                     <select id="condition" wire:model.blur="productCondition" required name="condition" --}}
        {{--                         class="bbg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"> --}}
        {{--                         <option value="">Select Condition</option> --}}
        {{--                         <option value="brand_new">Brand New</option> --}}
        {{--                         <option value="used">Used</option> --}}
        {{--                     </select> --}}
        {{--                     @if ($productCondition < 0 || $productCondition == 'Select Condition') --}}
        {{--                         <span class="font-sm text-red-500">This field is required</span> --}}
        {{--                     @endif --}}
        {{--                 </div> --}}
        {{--             </div> --}}
        {{--             <div> --}}
        {{--                 <!-- Product Status input --> --}}
        {{--                 <div class="mb-3"> --}}
        {{--                     <label for="status" --}}
        {{--                         class="block mb-1 text-sm font-medium text-gray-800 dark:text-white pl-1">Product --}}
        {{--                         Status</label> --}}
        {{--                     <select id="status" wire:model.blur="productStatus" required name="status" --}}
        {{--                         class="bbg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"> --}}
        {{--                         <option value="">Select Status</option> --}}
        {{--                         <option value="available">Available</option> --}}
        {{--                         <option value="unavailable">Unavailable</option> --}}
        {{--                     </select> --}}
        {{--                     @if ($productStatus < 0 || $productStatus == 'Select Status') --}}
        {{--                         <span class="font-sm text-red-500">This field is required</span> --}}
        {{--                     @endif --}}
        {{--                 </div> --}}
        {{--             </div> --}}
        {{--             <div> --}}
        {{--                 <!-- Product Category input --> --}}
        {{--                 <div class="mb-3"> --}}
        {{--                     <label for="prodoct_category" --}}
        {{--                         class="block mb-1 text-sm font-medium text-gray-800 dark:text-white pl-1">Product --}}
        {{--                         Category</label> --}}
        {{--                     <div x-data="{ isOpen: false }" class="w-full relative "> --}}
        {{--                         <!-- Dropdown toggle button --> --}}
        {{--                         <button @click="isOpen = !isOpen" --}}
        {{--                             class="relative z-10 w-full flex flex-start border border-gray-400  p-2.5 !rounded text-sm bg-white text-gray-900 gap-1"> --}}
        {{--                             <span class="mx-1 w-full text-start">Category : --}}
        {{--                                 {{ CustomHelper::maptopropercatetory($productCategory) }}</span> --}}
        {{--                             <svg class="w-5 h-5 mx-1 rotate-180 transition duration-200" viewBox="0 0 24 24" --}}
        {{--                                 fill="none" xmlns="http://www.w3.org/2000/svg" --}}
        {{--                                 :class="{ 'rotate-180 transition duration-300': isOpen }"> --}}
        {{--                                 <path d=" M12 15.713L18.01 9.70299L16.597 8.28799L12 12.888L7.40399 8.28799L5.98999 --}}
        {{--                      9.70199L12 15.713Z" fill="currentColor"></path> --}}
        {{--                             </svg> --}}
        {{--                         </button> --}}
        {{--                         <!-- Dropdown menu --> --}}
        {{--                         <div x-cloak x-show="isOpen" @click.away="isOpen = false" --}}
        {{--                             x-transition:enter="transition ease-out duration-100" --}}
        {{--                             x-transition:enter-start="opacity-0 scale-90" --}}
        {{--                             x-transition:enter-end="opacity-100 scale-100" --}}
        {{--                             x-transition:leave="transition ease-in duration-100" --}}
        {{--                             x-transition:leave-start="opacity-100 scale-100" --}}
        {{--                             x-transition:leave-end="opacity-0 scale-90" --}}
        {{--                             class="absolute right-0 z-20 mt-1 w-full md:w-96 shadow overflow-hidden origin-top-right bg-transparent rounded-md dark:bg-gray-800 front"> --}}
        {{--                             <div class="grid grid-cols-3 gap-2 p-2 bg-white rounded border-1 border-gray-300"> --}}
        {{--                                 @foreach (CustomHelper::categoryList() as $category_key => $category_value) --}}
        {{--                                     <button --}}
        {{--                                         class="mb-0 w-full text-start  text-sm p-1 tracking-tight rounded hover:bg-gray-100" --}}
        {{--                                         @click="isOpen = false" type="button" --}}
        {{--                                         wire:click.debounce="changeCategoryView('{{ $category_key }}')"> --}}
        {{--                                         {{ $category_value }} --}}
        {{--                                     </button> --}}
        {{--                                 @endforeach --}}
        {{--                             </div> --}}
        {{--                         </div> --}}
        {{--                     </div> --}}
        {{--                 </div> --}}
        {{--             </div> --}}
        {{--         </div> --}}
        {{--     </div> --}}
        {{-- </div> --}}
        {{-- <button type="submit"> --}}
        {{--     test --}}
        {{-- </button> --}}
    </form>
    <div class="mb-2 gap-1.5 flex justify-start  items-center">
        <div>
            <h6 class="text-gray-600 mb-0 text-lg tracking-wide text-start">Product Information
                {{ 'For ' . CustomHelper::maptopropercatetory($productCategory) }}</h6>
        </div>
    </div>
    <div class="p-4 bg-white border border-gray-200 rounded-lg">
        <div class="relative my-3">
            <livewire:dynamic-component :is="$view" :key="$view" :productCategory="$productCategory" />
        </div>
    </div>

</div>
