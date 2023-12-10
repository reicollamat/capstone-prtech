<div class="md:!p-8">
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div>
        <form wire:submit="submit">
            <div class="mb-3 p-4 bg-white border border-gray-200 rounded-lg">
                <p class="mb-0 md:text-2xl p-4 text-gray-500 text-center">Here you can Edit the Baseline Metrics of your
                    Shop.</p>
            </div>
            <div class="mb-3 p-4 bg-white border border-gray-200 rounded-lg">
                <!-- Shop Target Sales input -->
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <div class="mb-4">
                            <label for="shop_target_sales"
                                class="block mb-1.5 text-base font-medium text-gray-600 dark:text-white  pl-1">Target
                                sales value of your Shop
                                <span class="d-inline-block" tabindex="0" data-bs-toggle="popover"
                                    data-bs-trigger="hover focus" data-bs-placement="right"
                                    data-bs-content="This is the target sales value of your shop. Used to calculate the sales history. Defaults is 10,000.00">
                                    <i class="bi bi-question-circle"></i>
                                </span>
                            </label>
                            <input type="number" id="shop_target_sales" wire:model.blur="targetSales" min="1000" step="any"
                                class="bg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="10,000.00" required>
                            @error('targetSales')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <div class="mb-4">
                            <label for="shop_current_target_sales"
                                class="block mb-1.5 text-base font-medium text-gray-600 dark:text-white  pl-1">Current
                                Value
                            </label>
                            <input type="number" id="shop_current_target_sales" wire:model.blur="currentTargetSales"
                                   min="100" step="any" disabled
                                   value="{{ number_format($currentTargetSales, 2)  }}"
                                class="bg-white border border-gray-50 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                        </div>
{{--                        {{ number_format($currentTargetSales, 2) }}--}}
                    </div>
                </div>
            </div>
            <div class="mb-4 p-3 flex justify-end items-center bg-white rounded-lg">
                <div wire:dirty>
                    <span class="text-xs text-gray-400 items-center pr-3">
                        Unsaved changes...
                    </span>
                </div>
                <button type="submit" class="btn btn-outline-danger">Submit Changes</button>
            </div>
        </form>
    </div>
</div>
