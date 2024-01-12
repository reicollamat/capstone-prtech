<div>
    {{-- Success is as dangerous as failure. --}}
    {{-- THIS SHOULD BE REMOVE IF ALL INPUT IS WORKING, FOR DEBUG ONLY --}}
    <form wire:submit="submit">

        <div class="mb-4 p-4 bg-white border border-gray-200 rounded-lg">
            <div>
                <!-- Product Name input -->
                <div class="mb-4">
                    <label for="product_name"
                        class="block mb-1 text-sm font-medium text-gray-800 dark:text-white pl-1">Product
                        Name</label>
                    <input type="text" id="product_name" wire:model.blur="productName"
                        class="bg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Product Name" required>
                    @error('productName')
                    <span class="font-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <!-- Product Description -->
            <div class="mb-4">
                <label for="description"
                    class="block mb-1 text-sm font-medium text-gray-800 dark:text-white pl-1">Description</label>
                <textarea id="description" rows="4" wire:model.blur="productDescription"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Write your thoughts here..." required></textarea>
                @error('productDescription')
                <span class="font-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="grid md:grid-cols-3 md:gap-8 ">
                <div>
                    <!-- Product Condition input -->
                    <div class="mb-4">
                        <label for="condition"
                            class="block mb-1 text-sm font-medium text-gray-800 dark:text-white  pl-1">Product
                            Condtion</label>
                        <select id="condition" wire:model.blur="productCondition" name="condition"
                            class="bbg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                            <option>Select Condition</option>
                            <option value="brand_new">Brand New</option>
                            <option value="used">Used</option>
                        </select>
                        @error('productCondition')
                        <span class="font-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div>
                    <!-- Product Status input -->
                    <div class="mb-4">
                        <label for="status"
                            class="block mb-1 text-sm font-medium text-gray-800 dark:text-white pl-1">Product
                            Status</label>
                        <select id="status" wire:model.blur="productStatus" name="status"
                            class="bbg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                            <option>Select Status</option>
                            <option value="available">Available</option>
                            <option value="unavailable">Unavailable</option>
                        </select>
                        @error('productStatus')
                        <span class="font-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- Product Weight -->
                <div class="mb-4">
                    <label for="product_weight"
                        class="block mb-1 text-sm font-medium text-gray-800 dark:text-white  pl-1">Product Weight (in
                        KG)
                    </label>
                    <input type="number" id="product_weight" wire:model.blur="product_weight" min="0.01" step="0.01"
                        class="bg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="0.30" required>
                    @error('product_weight')
                    <span class="font-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="mb-4 p-4 bg-white border border-gray-200 rounded-lg">
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

                    <!-- Color -->
                    <div class="mb-4">
                        <label for="keyboard_color"
                            class="block mb-1 text-sm font-medium text-gray-800 dark:text-white  pl-1">Color</label>
                        <input type="text" id="keyboard_color" wire:model.blur="keyboard_color"
                            class="bg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="White" required>
                        @error('keyboard_color')
                        <span class="font-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Keyboard Connection Type -->
                    <div class="mb-4">
                        <label for="keyboard_conn"
                            class="block mb-1 text-sm font-medium text-gray-800 dark:text-white pl-1">Connection</label>
                        <select id="keyboard_type" wire:model.blur="keyboard_conn"
                            class="bg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                            <option>Click to Select</option>
                            <option value="Wired">Wired</option>
                            <option value="Dual Mode">Dual Mode (Wired + Bluetooth)</option>
                            <option value="Tri-Mode">Tri-Mode (Wired + Bluetooth + 2.4Ghz Dongle)</option>
                        </select>
                        @error('keyboard_conn')
                        <span class="font-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Keyboard Layout -->
                    <div class="mb-4">
                        <label for="keyboard_layout"
                            class="block mb-1 text-sm font-medium text-gray-800 dark:text-white pl-1">Keyboard
                            Layout</label>
                        <select id="keyboard_layout" wire:model.blur="keyboard_layout"
                            class="bg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                            <option>Click to Select</option>
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
                            class="block mb-1 text-sm font-medium text-gray-800 dark:text-white pl-1">Keyboard
                            Switch</label>
                        <select id="keyboard_switch" wire:model.blur="keyboard_switch"
                            class="bg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                            <option disabled selected>Click to Select</option>
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
                            class="block mb-1 text-sm font-medium text-gray-800 dark:text-white pl-1">Keyboard
                            Lighting</label>
                        <select id="keyboard_lighting" wire:model.blur="keyboard_lighting"
                            class="bg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                            <option>Click to Select</option>
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
                        <p class="block mb-1 text-base font-medium text-gray-600 dark:text-white pl-1">Add Product
                            Image
                        </p>
                        <p class="block mb-1 text-sm font-medium text-gray-500 dark:text-white pl-1">To Upload
                            Multiple
                            Images,
                            Select them all before uploading</p>
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
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                        class="font-semibold">Click
                                        to
                                        upload</span>
                                    or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX.
                                    800x400px)
                                </p>
                            </div>
                            <input id="dropzone-file" type="file" wire:model="productImages" class="hidden" multiple />
                            @error('productImages.*')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>

                    <div wire:loading wire:target="productImages">Uploading...</div>

                    <div class="py-3">
                        <p class="block mb-1 text-sm font-medium text-gray-600 dark:text-white  pl-1">Image Preview
                            (Click
                            Image
                            To Preview)</p>
                    </div>

                    <div x-data="{ showModal: false }" @keydown.window.escape="showModal = false">
                        <div class="grid md:grid-cols-3 gap-1 h-auto">
                            @if ($productImages)
                                @foreach ($productImages as $image)
                                    <!-- Button trigger modal -->
                                    <button type="button" @click="showModal = !showModal" data-bs-target="#exampleModal"
                                            wire:key="{{ $loop->index }}"
                                            wire:click="setImage('{{ $image->temporaryUrl() }}', {{ $loop->index }})">
                                        <img class="h-auto max-w-full border border-gray-400" src="{{ $image->temporaryUrl() }}"
                                             alt="image description">
                                    </button>
                                @endforeach
                            @endif
                        </div>

                        <div x-cloak x-transition.opacity x-show="showModal" class="fixed inset-0 bg-black/50"></div>

                        <div x-cloak x-transition.duration.500ms x-show="showModal"
                             class="fixed inset-0 z-50 grid place-content-center">
                            <div @click.away="showModal = false"
                                 class="min-h-full rounded-xl min-w-[500px] bg-white items-end justify-center p-4 text-center sm:items-center sm:p-0">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            {{-- <h1 class="modal-title fs-5" id="exampleModalLabel">Image Preview</h1>
                                            --}}
                                        </div>
                                        <div class="flex justify-center modal-body" x-transition.opacity>
                                            <img class="h-auto max-w-full border border-gray-400"
                                                 src="{{ $previewImage }}" alt="Image Preview">
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full flex gap-2 pt-3 justify-end">
                                    <button type="button" class="btn btn-outline-danger"
                                            wire:click="removePhoto({{ $previewImageIndex }})" @click="showModal = false">
                                        Remove
                                        Photo
                                    </button>
                                    <button type="button" class="btn btn-outline-secondary" @click="showModal = false">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-4 py-3 flex justify-center items-center bg-white rounded-lg">
            <button type="submit" class="btn btn-outline-danger">Create Product</button>
        </div>
    </form>
</div>
