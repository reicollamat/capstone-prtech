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
                        placeholder="Corsair, Logitech, Razer, etc." required>
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

            <!-- Keyboard Connection Type -->
            <div class="mb-4">
                <label for="keyboard_conn"
                    class="block mb-1 text-sm font-medium text-gray-800 dark:text-white pl-1">Connection</label>
                <select id="keyboard_type" wire:model.blur="keyboard_type"
                    class="bg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required>
                    <option disabled selected>Select Below</option>
                    <option value="Wired">Wired</option>
                    <option value="Dual Mode">Dual Mode (Wired + Bluetooth)</option>
                    <option value="Tri-Mode">Tri-Mode (Wired + Bluetooth + 2.4Ghz Dongle)</option>
                </select>
                @error('keyboard_type')
                    <span class="font-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Keyboard Type -->
            <div class="mb-4">
                <label for="keyboard_type"
                    class="block mb-1 text-sm font-medium text-gray-800 dark:text-white pl-1">Keyboard Type</label>
                <select id="keyboard_type" wire:model.blur="keyboard_type"
                    class="bg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required>
                    <option disabled selected>Select Below</option>
                    <option value="Membrane">Membrane</option>
                    <option value="Mechanical">Mechanical</option>
                    <option value="Optical">Optical</option>
                </select>
                @error('keyboard_type')
                    <span class="font-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Keyboard Layout -->
            <div class="mb-4">
                <label for="keyboard_layout"
                    class="block mb-1 text-sm font-medium text-gray-800 dark:text-white pl-1">Keyboard Layout</label>
                <select id="keyboard_layout" wire:model.blur="keyboard_layout"
                    class="bg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required>
                    <option disabled selected>Select Below</option>
                    <option value="60%">60%</option>
                    <option value="65%">65%</option>
                    <option value="75%">75%</option>
                    <option value="TKL">TKL</option>
                    <option value="96%">96%</option>
                    <option value="Full Sized">Full Sized</option>
                </select>
                @error('keyboard_layout')
                    <span class="font-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Keyboard Switch -->
            <div class="mb-4">
                <label for="keyboard_switch"
                    class="block mb-1 text-sm font-medium text-gray-800 dark:text-white pl-1">Keyboard Switch</label>
                <select id="keyboard_switch" wire:model.blur="keyboard_switch"
                    class="bg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required>
                    <option disabled selected>Select Below</option>
                    <option value="Linear">Linear</option>
                    <option value="Tactile">Tactile</option>
                    <option value="Clicky">Clicky</option>
                </select>
                @error('keyboard_switch')
                    <span class="font-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Keyboard Lighting -->
            <div class="mb-4">
                <label for="keyboard_lighting"
                    class="block mb-1 text-sm font-medium text-gray-800 dark:text-white pl-1">Keyboard Lighting</label>
                <select id="keyboard_lighting" wire:model.blur="keyboard_lighting"
                    class="bg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required>
                    <option disabled selected>Select Below</option>
                    <option value="No RGB">No RGB</option>
                    <option value="Single LED">Single LED</option>
                    <option value="RGB">RGB</option>
                </select>
                @error('keyboard_lighting')
                    <span class="font-sm text-red-500">{{ $message }}</span>
                @enderror
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
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
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

