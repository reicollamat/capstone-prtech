<div>
    {{-- In work, do what you enjoy. --}}
    <div class="container-fluid lg:!p-12">
        <div class="bg-white rounded-lg p-6 shadow">
            <h6 class="tracking-tight text-base mb-0 text-gray-700 text-start">Shop Information</h6>
            <hr class="text-blue-800">
            <div>
                <form>
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <label for="shop_name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Shop
                                name</label>
                            <input type="text" id="shop_name" value="{{ $seller->shop_name }}"
                                class="bg-gray-50 border rounded border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="John" required>
                        </div>
                        <div>
                            <label for="shop_email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email
                                Address</label>

                            <input type="email" id="shop_email" value="{{ $seller->shop_email }}"
                                @disabled($seller->shop_email)
                                class="bg-gray-50 border rounded border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Doe" required>
                        </div>
                        <div>
                            <label for="shop_phone"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Shop
                                Phone</label>
                            <input type="text" id="shop_phone" value="{{ $seller->shop_phone_number }}"
                                name="shop_phone"
                                class="bg-gray-50 border rounded border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Flowbite" required>
                        </div>

                    </div>
                    <div class="mb-6">
                        <label for="shop_address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Address</label>
                        <input type="text" id="shop_address" value="{{ $seller->shop_address }}"
                            class="bg-gray-50 border rounded border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="john.doe@company.com" required>
                    </div>
                    <div class="grid gap-6 mb-6 md:grid-cols-3">
                        <div>
                            <label for="shop_city" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                City </label>
                            <input type="text" id="shop_city" value="{{ $seller->shop_city }}" name="shop_city"
                                class="bg-gray-50 border rounded border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>
                        <div>
                            <label for="shop_state_province"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">

                                State/Province</label>
                            <input type="text" id="shop_state_province" value="{{ $seller->shop_state_province }}"
                                name="shop_state_province"
                                class="bg-gray-50 border rounded border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>
                        <div>
                            <label for="shop_zip_postal"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Zip/Postal
                                code</label>
                            <input type="tel" id="shop_zip_postal" value="{{ $seller->shop_postal_code }}"
                                name="shop_postal_code"
                                class="bg-gray-50 border rounded border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>
                    </div>

                    <div class="">
                        <h6 class="tracking-tight text-base mb-0 text-gray-700 text-start">Business Information</h6>
                        <hr class="text-blue-800">
                        <div class="mb-6 ">
                            <label for="registered_name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Registered
                                Business Name</label>
                            <input type="text" id="registered_name" value="{{ $seller->registered_business_name }}"
                                class="bg-gray-50 border rounded border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="John" required>
                        </div>
                        <div class="mb-6 ">
                            <label for="registered_address"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Registered
                                Business Address</label>
                            <input type="text" id="registered_address" value="{{ $seller->registered_address }}"
                                class="bg-gray-50 border rounded border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="John" required>
                        </div>
                        <div class="grid gap-6 mb-6 md:grid-cols-3">
                            <div>
                                <label for="regsitered_city"
                                    class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                    City </label>
                                <input type="text" id="regsitered_city" value="{{ $seller->registered_city }}"
                                    class="bg-gray-50 border rounded border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required>
                            </div>
                            <div>
                                <label for="shop_state_province"
                                    class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">

                                    State/Province</label>
                                <input type="text" id="shop_state_province"
                                    value="{{ $seller->registered_state_province }}"
                                    class="bg-gray-50 border rounded border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required>
                            </div>
                            <div>
                                <label for="shop_zip_postal"
                                    class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Zip/Postal
                                    code</label>
                                <input type="tel" id="shop_zip_postal"
                                    value="{{ $seller->registered_postal_code }}"
                                    class="bg-gray-50 border rounded border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
            <div class="flex justify-end gap-3 items-center">
                <p class="mb-0 text-gray-500 text-sm">Changes Saved</p>
                <button class="btn btn-danger uppercase">SAVE</button>
            </div>
        </div>
    </div>
</div>
