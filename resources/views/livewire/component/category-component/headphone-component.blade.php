<div>
    {{-- Success is as dangerous as failure. --}}
    <form wire:submit.prevent="submit">
        <div class="grid md:grid-cols-2 gap-4">
            <div>
                {{-- First Columm --}}
                <!-- Product Name input -->
                <div class="mb-4">
                    <label for="brand"
                        class="block mb-1 text-sm font-medium text-gray-800 dark:text-white pl-1">Product
                        Brand</label>
                    <input type="text" id="brand" wire:model.blur="brand"
                        class="bg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Sony, JBL, Logitech, etc." required>
                    @error('brand')
                        <span class="font-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="grid md:grid-cols-2 gap-4">

                    <!-- Product SKU input -->
                    <div class="mb-4">
                        <label for="price"
                            class="block mb-1 text-sm font-medium text-gray-800 dark:text-white  pl-1">Product
                            Price</label>
                        <input type="text" id="price" wire:model.blur="price"
                            class="bg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="In Pesos, 1000.00" required>
                        @error('price')
                            <span class="font-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Product SKU input -->
                    <div class="mb-4">
                        <label for="sensitivity"
                            class="block mb-1 text-sm font-medium text-gray-800 dark:text-white  pl-1">
                            Audio Output Sensitivity
                            <span class="d-inline-block" tabindex="0" data-bs-toggle="popover"
                                data-bs-trigger="hover focus" data-bs-placement="top"
                                data-bs-content="The loudness of the headphone's speaker">
                                <i class="bi bi-patch-question"></i>
                            </span></label>
                        <select id="sensitivity" wire:model.blur="sensitivity"
                            class="bbg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option disabled selected>Click to Select</option>
                            <option value="<99">Up to 99 dB</option>
                            <option value="100_103">100 to 103 dB</option>
                            <option value="104_107">104 to 107 dB</option>
                            <option value=">108">108 dB & above</option>
                        </select>
                        @error('sensitivity')
                            <span class="font-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- Product SKU input -->
                <div class="mb-4">
                    <label for="headphone_connection_type"
                        class="block mb-1 text-sm font-medium text-gray-800 dark:text-white  pl-1">
                        Headphones Connection Type
                        <span class="d-inline-block" tabindex="0" data-bs-toggle="popover"
                            data-bs-trigger="hover focus" data-bs-placement="top"
                            data-bs-content="Hold down the Ctrl or Command key to select multiple options.">
                            <i class="bi bi-patch-question"></i>
                        </span>

                    </label>
                    <select id="headphone_connection_type" wire:model.blur="headphone_connection_type" multiple
                        class="bbg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option disabled selected>Click to Select</option>
                        <option value="jack">3.5mm audio jack</option>
                        <option value="usb">USB</option>
                        <option value="bluetooth">Bluetooth</option>

                    </select>
                    @error('headphone_connection_type')
                        <span class="font-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Product SKU input -->
                <div class="mb-4">
                    <label for="noise_control"
                        class="block mb-1 text-sm font-medium text-gray-800 dark:text-white  pl-1">Noise Control
                        <span class="d-inline-block" tabindex="0" data-bs-toggle="popover"
                            data-bs-trigger="hover focus" data-bs-placement="top"
                            data-bs-content="Hold down the Ctrl or Command key to select multiple options.">
                            <i class="bi bi-patch-question"></i>
                        </span>

                    </label>
                    <select id="noise_control" wire:model.blur="noise_control" multiple
                        class="bbg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option disabled selected>Click to Select</option>
                        <option value="hybrid"> Hybrid Noise Cancellation</option>
                        <option value="active">Active Noise Cancellation</option>
                        <option value="isolate">Sound Isolation</option>
                        <option value="n/a">N/A</option>
                    </select>
                    @error('noise_control')
                        <span class="font-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="grid md:grid-cols-2 md:gap-4">

                    <!-- Product SKU input -->
                    <div class="mb-4">
                        <label for="mic_availability"
                            class="block mb-1 text-sm font-medium text-gray-800 dark:text-white  pl-1">
                            Microphone Availability
                            <span class="d-inline-block" tabindex="0" data-bs-toggle="popover"
                                data-bs-trigger="hover focus" data-bs-placement="top"
                                data-bs-content="The availability of microphone on the headphones.">
                                <i class="bi bi-patch-question"></i>
                            </span></label>
                        <select id="mic_availability" wire:model.blur="mic_availability"
                            class="bbg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option disabled selected>Click to Select</option>
                            <option value="available">Yes</option>
                            <option value="unavailable">None</option>
                        </select>
                        @error('mic_availability')
                            <span class="font-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Product SKU input -->
                    <div class="mb-4">
                        <label for="color"
                            class="block mb-1 text-sm font-medium text-gray-800 dark:text-white pl-1">Color <span
                                class="d-inline-block" tabindex="0" data-bs-toggle="popover"
                                data-bs-trigger="hover focus" data-bs-placement="top"
                                data-bs-content="Multiple colors can be separated by comma">
                                <i class="bi bi-patch-question"></i>
                            </span></label>
                        <input type="text" id="color" wire:model.blur="color"
                            class="bg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="White, Black, Gray, etc." required>
                        @error('color')
                            <span class="font-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div>
                <!-- Stocks and Reserved -->
                <div class="grid md:grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="stocks"
                            class="block mb-1 text-sm font-medium text-gray-800 dark:text-white  pl-1">Stocks
                        </label>
                        <input type="text" id="stocks" wire:model.blur="stocks"
                            class="bg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Stock Currently On-Hand" required>
                        @error('stocks')
                            <span class="font-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="reserve_stocks"
                            class="block mb-1 text-sm font-medium text-gray-800 dark:text-white  pl-1">Reserved
                            Stocks</label>
                        <input type="text" id="reserve_stocks" wire:model.blur="reserve_stocks"
                            class="bg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Stock to Hold" required>
                        @error('reserve_stocks')
                            <span class="font-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div>
                <!-- Add Product Image Div -->
                <div class="pb-3">
                    <p class="block mb-1 text-sm font-medium text-gray-600 dark:text-white  pl-1">Add Product Image
                        (Max of
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
    </form>
</div>

