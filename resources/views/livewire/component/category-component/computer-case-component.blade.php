<div>
    {{-- Success is as dangerous as failure. --}}
    <div class="grid md:grid-cols-2 gap-4">
        <div>
            <!-- Brand and Price -->
            <div class="grid md:grid-cols-2 gap-4">
                <div class="mb-4">
                    <label for="brand"
                        class="block mb-1 text-sm font-medium text-gray-800 dark:text-white  pl-1">Brand</label>
                    <input type="text" id="brand" wire:model.blur="brand"
                        class="bg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Asus, Darkflash, Deepcool, etc." required>
                    @error('brand')
                        <span class="font-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="price"
                        class="block mb-1 text-sm font-medium text-gray-800 dark:text-white  pl-1">Price</label>
                    <input type="text" id="price" wire:model.blur="price"
                        class="bg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="In Pesos" required>
                    @error('price')
                        <span class="font-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Size and Dimensions -->
            <div class="grid md:grid-cols-2 gap-4">
                <div class="mb-4">
                    <label for="size"
                        class="block mb-1 text-sm font-medium text-gray-800 dark:text-white pl-1">Size</label>
                    <select id="size" wire:model.blur="size"
                        class="bg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                        <option disabled selected>Select Below</option>
                        <option value="ATX">ATX</option>
                        <option value="mATX">mATX</option>
                        <option value="eATX">eATX</option>
                        <option value="ITX">ITX</option>
                    </select>
                    @error('size')
                        <span class="font-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="dimensions_lwh"
                        class="block mb-1 text-sm font-medium text-gray-800 dark:text-white  pl-1">Dimensions
                        (mm)</label>
                    <input type="text" id="dimensions_lwh" wire:model.blur="dimensions_lwh"
                        class="bg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="L x W x H" required>
                    @error('dimensions_lwh')
                        <span class="font-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Color and Sidepanel -->
            <div class="grid md:grid-cols-2 gap-4">
                <div class="mb-4">
                    <label for="case_color"
                        class="block mb-1 text-sm font-medium text-gray-800 dark:text-white  pl-1">Color</label>
                    <input type="text" id="case_color" wire:model.blur="case_color"
                        class="bg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Black" required>
                    @error('case_color')
                        <span class="font-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="sidepanel"
                        class="block mb-1 text-sm font-medium text-gray-800 dark:text-white pl-1">Sidepanel</label>
                    <select id="sidepanel" wire:model.blur="sidepanel"
                        class="bg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                        <option disabled selected>Select Below</option>
                        <option value="Steel">Steel</option>
                        <option value="Acrylic">Acrylic</option>
                        <option value="Glass">Glass</option>
                        <option value="Tempered Glass">Tempered Glass</option>
                    </select>
                    @error('sidepanel')
                        <span class="font-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- HDD and SSD bays -->
            <div class="grid md:grid-cols-2 gap-4">
                <div class="mb-4">
                    <label for="ssd_bays" class="block mb-1 text-sm font-medium text-gray-800 dark:text-white  pl-1">#
                        of SSD Bays</label>
                    <input type="text" id="ssd_bays" wire:model.blur="ssd_bays"
                        class="bg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="2" required>
                    @error('ssd_bays')
                        <span class="font-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="hdd_bays" class="block mb-1 text-sm font-medium text-gray-800 dark:text-white  pl-1">#
                        of HDD Bays</label>
                    <input type="text" id="ssd_bays" wire:model.blur="hdd_bays"
                        class="bg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="2" required>
                    @error('hdd_bays')
                        <span class="font-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Compatible PSU & GPU Length -->
            <div class="grid md:grid-cols-2 gap-4">
                <div class="mb-4">
                    <label for="length_psu"
                        class="block mb-1 text-sm font-medium text-gray-800 dark:text-white  pl-1">Compatible PSU
                        Length (mm)</label>
                    <input type="text" id="length_psu" wire:model.blur="length_psu"
                        class="bg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="175mm" required>
                    @error('length_psu')
                        <span class="font-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="length_gpu"
                        class="block mb-1 text-sm font-medium text-gray-800 dark:text-white  pl-1">Compatible GPU Length
                        (mm)</label>
                    <input type="text" id="length_gpu" wire:model.blur="length_gpu"
                        class="bg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="340mm" required>
                    @error('length_gpu')
                        <span class="font-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div>
            <!-- Add Product Image Div -->
            <div class="pb-3">
                <p class="block mb-1 text-sm font-medium text-gray-600 dark:text-white  pl-1">Add Product Image (Max
                    of
                    3)</p>
            </div>

            <div class="flex items-center justify-center w-full">
                <label for="dropzone-file"
                    class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click
                                to
                                upload</span>
                            or drag and drop</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)
                        </p>
                    </div>
                    <input id="dropzone-file" type="file" class="hidden" multiple />
                </label>
            </div>

            <div class="py-3">
                <p class="block mb-1 text-sm font-medium text-gray-600 dark:text-white  pl-1">Image Preview</p>
            </div>
            <div class="grid md:grid-cols-3 gap-1 h-auto">

                <img class="h-auto max-w-full" src="https://flowbite.com/docs/images/examples/image-1@2x.jpg"
                    alt="image description">
                <img class="h-auto max-w-full" src="https://flowbite.com/docs/images/examples/image-1@2x.jpg"
                    alt="image description">
                <img class="h-auto max-w-full" src="https://flowbite.com/docs/images/examples/image-1@2x.jpg"
                    alt="image description">
            </div>
        </div>
    </div>
</div>

