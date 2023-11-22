<div>
    {{-- Success is as dangerous as failure. --}}
    {{--     case fan --}}
    <div class="grid md:grid-cols-2 gap-2 lg:gap-8">
        <div>
            <!-- Product Name input -->
            <div class="mb-3">
                <label for="email" class="block mb-1 text-sm font-medium text-gray-800 dark:text-white pl-1">Product
                    Name</label>
                <input type="email" id="email" wire:model.blur="email"
                    class="bg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="john.doe@company.com" required>
                @error('email')
                    <span class="font-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div>
            <p>test</p>
        </div>
    </div>
</div>
