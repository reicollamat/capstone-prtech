<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <form wire:submit.prevent="submit">
        <div class="grid md:grid-cols-2 gap-4">
            <div>
                <!-- Product Name input -->
                <div class="mb-4">
                    <label for="brand"
                        class="block mb-1 text-sm font-medium text-gray-800 dark:text-white pl-1">Product
                        Brand</label>
                    <input type="text" id="brand" wire:model.blur="brand"
                        class="bg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Asus, Acer, Logitech, etc." required>
                    @error('brand')
                        <span class="font-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
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
                    </div>
                </div>
                <div class="grid md:grid-cols-2 md:gap-4">
                    <!-- Product SKU input -->
                    <div class="mb-4">
                        <label for="mouse_tracking_method"
                            class="block mb-1 text-sm font-medium text-gray-800 dark:text-white  pl-1">Mouse Tracking
                            Method</label>
                        <select id="mouse_tracking_method" wire:model.blur="mouse_tracking_method"
                            class="bbg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option disabled selected>Click to Select</option>
                            <option value="Optical">Optical</option>
                            <option value="Laser">Laser</option>
                        </select>
                        @error('mouse_tracking_method')
                            <span class="font-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Product SKU input -->
                    <div class="mb-4">
                        <label for="mouse_connection_type"
                            class="block mb-1 text-sm font-medium text-gray-800 dark:text-white  pl-1">
                            Mouse Connection Type
                            <span class="d-inline-block" tabindex="0" data-bs-toggle="popover"
                                data-bs-trigger="hover focus" data-bs-placement="top"
                                data-bs-content="Hold down the Ctrl or Command key to select multiple options.">
                                <i class="bi bi-patch-question"></i>
                            </span>

                        </label>
                        <select id="mouse_connection_type" wire:model.blur="mouse_connection_type" multiple
                            class="bbg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option disabled selected>Click to Select</option>
                            <option value="available">Wired</option>
                            <option value="unavailable">Wireless</option>
                            <option value="unavailable">Bluetooth</option>
                            <option value="n/a">N/A</option>
                        </select>
                        @error('mouse_connection_type')
                            <span class="font-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <!-- Product Name input -->
                <div class="mb-4">
                    <label for="dpi"
                        class="block mb-1 text-sm font-medium text-gray-800 dark:text-white pl-1">Mouse
                        DPI <span class="d-inline-block" tabindex="0" data-bs-toggle="popover"
                            data-bs-trigger="hover focus" data-bs-placement="top"
                            data-bs-content="Multiple DPI can be separated by commma">
                            <i class="bi bi-patch-question"></i>
                        </span></label>
                    <input type="text" id="dpi" wire:model.blur="dpi"
                        class="bg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="3200, 1600, 800, etc." required>
                    @error('dpi')
                        <span class="font-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="grid md:grid-cols-2 md:gap-4">
                    <!-- Product SKU input -->
                    <div class="mb-4">
                        <label for="orientation"
                            class="block mb-1 text-sm font-medium text-gray-800 dark:text-white  pl-1">Mouse Hand
                            Orientation <span class="d-inline-block" tabindex="0" data-bs-toggle="popover"
                                data-bs-trigger="hover focus" data-bs-placement="top"
                                data-bs-content="The hand placement of the mouse">
                                <i class="bi bi-patch-question"></i>
                            </span></label>
                        <select id="orientation" wire:model.blur="orientation"
                            class="bbg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option disabled selected>Click to Select</option>
                            <option value="Optical">Right</option>
                            <option value="Laser">Left</option>
                            <option value="Laser">Both</option>
                        </select>
                        @error('orientation')
                            <span class="font-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Product SKU input -->
                    <div class="mb-4">
                        <label for="color"
                            class="block mb-1 text-sm font-medium text-gray-800 dark:text-white pl-1">Mouse Color <span
                                class="d-inline-block" tabindex="0" data-bs-toggle="popover"
                                data-bs-trigger="hover focus" data-bs-placement="top"
                                data-bs-content="Multiple colors can be separated by comma">
                                <i class="bi bi-patch-question"></i>
                            </span></label>
                        <input type="text" id="color" wire:model.blur="color"
                            class="bg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Red, Black, Blue, etc." required>
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

                <!-- Add Product Image Div -->
                <div class="pb-3">
                    <p class="block mb-1 text-base font-medium text-gray-600 dark:text-white pl-1">Add Product Image
                    </p>
                    <p class="block mb-1 text-sm font-medium text-gray-500 dark:text-white pl-1">To Upload Multiple
                        Images,
                        Select them all before uploading</p>
                </div>

                <form wire:submit.prevent="submit">
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
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                        class="font-semibold">Click
                                        to
                                        upload</span>
                                    or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX.
                                    800x400px)
                                </p>
                            </div>
                            <input id="dropzone-file" type="file" wire:model="productImages" class="hidden"
                                multiple />
                            @error('productImages.*')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>
                    <button type="submit">
                        Submit
                    </button>
                </form>

                <div wire:loading wire:target="productImages">Uploading...</div>

                <div class="py-3">
                    <p class="block mb-1 text-sm font-medium text-gray-600 dark:text-white  pl-1">Image Preview (Click
                        Image
                        To Preview)</p>
                </div>

                <div class="grid md:grid-cols-3 gap-1 h-auto">
                    @if ($productImages)
                        @foreach ($productImages as $image)
                            <!-- Button trigger modal -->
                            <button type="button" class="" data-bs-toggle="modal"
                                data-bs-target="#exampleModal"
                                wire:click="$set('previewImage', '{{ $image->temporaryUrl() }}')">
                                <img class="h-auto max-w-full border border-gray-400"
                                    src="{{ $image->temporaryUrl() }}" alt="image description">
                            </button>
                        @endforeach
                    @endif
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content p-4">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Image Preview</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img class="h-auto max-w-full border border-gray-400" src="{{ $previewImage }}"
                                    alt="Image Preview">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

