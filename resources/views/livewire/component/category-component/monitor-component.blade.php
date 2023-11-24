<div>
    {{-- Success is as dangerous as failure. --}}
    <div class="grid md:grid-cols-2 gap-4">
        <div>
            {{-- First Columm --}}

            <!-- Product Name input -->
            <div class="mb-4">
                <label for="brand" class="block mb-1 text-sm font-medium text-gray-800 dark:text-white pl-1">Product
                    Brand</label>
                <input type="text" id="brand" wire:model.blur="brand"
                    class="bg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Acer, LG, Asus, etc." required>
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
                    <label for="native_resolution"
                        class="block mb-1 text-sm font-medium text-gray-800 dark:text-white  pl-1">
                        Display Resolution
                        <span class="d-inline-block" tabindex="0" data-bs-toggle="popover"
                            data-bs-trigger="hover focus" data-bs-placement="top"
                            data-bs-content="The number of pixels in each dimension that can be displayed on a screen.">
                            <i class="bi bi-patch-question"></i>
                        </span></label>
                    <select id="native_resolution"
                        class="bbg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option disabled selected>Select Below</option>
                        <option value="wide1">1920x1080 [16:9]</option>
                        <option value="wide2">2560x1440 [16:9]</option>
                        <option value="wide4k">3840x2160 (4K) [16:9]</option>
                        <option value="wide5k">5120x2880 (5K) [16:9]</option>
                        <option value="uwide1">2560x1080 [21:9]</option>
                        <option value="uwide2">3440x1440 [21:9]</option>
                        <option value="uwide3">3840x1600 [21:9]</option>
                        <option value="uwide5k">5120x2160 (5K) [21:9]</option>
                        <option value="suwide1">3840x1200 [32:9]</option>
                        <option value="suwide2">3840x1080 [32:9]</option>
                        <option value="suwide3">5120x1440 [32:9]</option>
                    </select>
                    @error('native_resolution')
                        <span class="font-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-4">

                <!-- Product SKU input -->
                <div class="mb-4">
                    <label for="input_signal"
                        class="block mb-1 text-sm font-medium text-gray-800 dark:text-white  pl-1">
                        Input Signal
                        <span class="d-inline-block" tabindex="0" data-bs-toggle="popover"
                            data-bs-trigger="hover focus" data-bs-placement="top"
                            data-bs-content="Hold down the Ctrl or Command key to select multiple options.">
                            <i class="bi bi-patch-question"></i>
                        </span>

                    </label>
                    <select id="input_signal" multiple
                        class="bbg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option disabled selected>Choose One or Many</option>
                        <option value="hdmi">HDMI</option>
                        <option value="2hdmi">2xHDMI</option>
                        <option value="vga">VGA</option>
                        <option value="dport">Display Port</option>
                        <option value="usbC">USB-C</option>
                    </select>
                    @error('input_signal')
                        <span class="font-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Product SKU input -->
                <div class="mb-4">
                    <label for="refresh_rate"
                        class="block mb-1 text-sm font-medium text-gray-800 dark:text-white  pl-1">
                        Refresh Rate
                        <span class="d-inline-block" tabindex="0" data-bs-toggle="popover"
                            data-bs-trigger="hover focus" data-bs-placement="top"
                            data-bs-content="The frequency that a display updates the onscreen image.">
                            <i class="bi bi-patch-question"></i>
                        </span></label>
                    <select id="refresh_rate"
                        class="bbg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option disabled selected>Select Below</option>
                        <option value="<70">Up to 70 Hz</option>
                        <option value="70_100">70 to 100 Hz</option>
                        <option value="100_150">100 to 150 Hz</option>
                        <option value="150_200">150 to 200 Hz</option>
                        <option value=">200">200 Hz & above</option>
                    </select>

                    @error('refresh_rate')
                        <span class="font-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="grid md:grid-cols-2 md:gap-4">

                <!-- Product SKU input -->
                <div class="mb-4">
                    <label for="screen_size"
                        class="block mb-1 text-sm font-medium text-gray-800 dark:text-white pl-1">Screen Size <span
                            class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus"
                            data-bs-placement="top" data-bs-content="Enter the accurate screen size">
                            <i class="bi bi-patch-question"></i>
                        </span></label>
                    <input type="text" id="screen_size"
                        class="bg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="22.9, 17.9, 39.9 etc." required>
                    @error('screen_size')
                        <span class="font-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Product SKU input -->
                <div class="mb-4">
                    <label for="monitor_color"
                        class="block mb-1 text-sm font-medium text-gray-800 dark:text-white pl-1">Color <span
                            class="d-inline-block" tabindex="0" data-bs-toggle="popover"
                            data-bs-trigger="hover focus" data-bs-placement="top"
                            data-bs-content="Multiple colors can be separated by comma">
                            <i class="bi bi-patch-question"></i>
                        </span></label>
                    <input type="text" id="color"
                        class="bg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="White, Black, Gray, etc." required>
                    @error('monitor_color')
                        <span class="font-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

            </div>
        </div>

        <div>
            <!-- Add Product Image Div -->
            <div class="pb-3">
                <p class="block mb-1 text-sm font-medium text-gray-600 dark:text-white  pl-1">Add Product Image (Max of
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
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to
                                upload</span>
                            or drag and drop</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
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

