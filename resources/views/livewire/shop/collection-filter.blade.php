<div>

    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    {{--    {{ var_dump($queryarray) }}--}}
    {{--    {{ var_dump($category_filter) }}--}}

    <div class="max-w-max">
        <div class="p-2" style="border: 1px solid #FFFFFF">
            <h5 class="section-title position-relative text-uppercase underline underline-offset-4">
                <span class="pr-3">Filter by Category</span>
            </h5>
            <div class="">
                <div class="category">
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                        <input type="checkbox" class="custom-control-input" name="computer_case"
                               value="computer_case"
                               id="computer_case" wire:model.live="category_filter">
                        <label class="custom-control-label" for="computer_case">Computer Case</label>
                        <span
                            class="font-weight-normal">{{ $all_products->where('category', 'computer_case')->count() }}</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                        <input type="checkbox" class="custom-control-input" name="case_fan"
                               value="case_fan" wire:model.live="category_filter"
                               id="case_fan" wire:model.live="category_filter">
                        <label class="custom-control-label" for="case_fan">Case Fan</label>
                        <span
                            class="font-weight-normal">{{ $all_products->where('category', 'case_fan')->count() }}</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                        <input type="checkbox" class="custom-control-input" name="cpu"
                               value="cpu" wire:model.live="category_filter">
                        <label class="custom-control-label" for="cpu">CPU</label>
                        <span class="font-weight-normal">{{ $all_products->where('category', 'cpu')->count() }}</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                        <input type="checkbox" class="custom-control-input" name="cpu_cooler"
                               value="cpu_cooler" wire:model.live="category_filter">
                        <label class="custom-control-label" for="cpu_cooler">CPU Cooler</label>
                        <span
                            class="font-weight-normal">{{ $all_products->where('category', 'cpu_cooler')->count() }}</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                        <input type="checkbox" class="custom-control-input" name="ext_storage"
                               value="ext_storage" wire:model.live="category_filter">
                        <label class="custom-control-label" for="ext_storage">External Storage</label>
                        <span
                            class="font-weight-normal">{{ $all_products->where('category', 'ext_storage')->count() }}</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                        <input type="checkbox" class="custom-control-input" name="int_storage"
                               value="int_storage" wire:model.live="category_filter">
                        <label class="custom-control-label" for="int_storage">Internal Storage</label>
                        <span
                            class="font-weight-normal">{{ $all_products->where('category', 'int_storage')->count() }}</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                        <input type="checkbox" class="custom-control-input" name="headphone"
                               value="headphone" wire:model.live="category_filter">
                        <label class="custom-control-label" for="headphone">Headphone</label>
                        <span
                            class="font-weight-normal">{{ $all_products->where('category', 'headphone')->count() }}</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                        <input type="checkbox" class="custom-control-input" name="keyboard"
                               value="keyboard" wire:model.live="category_filter">
                        <label class="custom-control-label" for="keyboard">Keyboard</label>
                        <span
                            class="font-weight-normal">{{ $all_products->where('category', 'keyboard')->count() }}</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                        <input type="checkbox" class="custom-control-input" name="memory"
                               value="memory" wire:model.live="category_filter">
                        <label class="custom-control-label" for="memory">Memory</label>
                        <span
                            class="font-weight-normal">{{ $all_products->where('category', 'memory')->count() }}</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                        <input type="checkbox" class="custom-control-input" name="monitor"
                               value="monitor" wire:model.live="category_filter">
                        <label class="custom-control-label" for="monitor">Monitor</label>
                        <span
                            class=" font-weight-normal">{{ $all_products->where('category', 'monitor')->count() }}</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                        <input type="checkbox" class="custom-control-input" name="motherboard"
                               value="motherboard" wire:model.live="category_filter">
                        <label class="custom-control-label" for="motherboard">Motherboard</label>
                        <span
                            class="font-weight-normal">{{ $all_products->where('category', 'motherboard')->count() }}</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                        <input type="checkbox" class="custom-control-input" name="mouse"
                               value="mouse" wire:model.live="category_filter">
                        <label class="custom-control-label" for="mouse">Mouse</label>
                        <span class="font-weight-normal">{{ $all_products->where('category', 'mouse')->count() }}</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                        <input type="checkbox" class="custom-control-input" name="psu"
                               value="psu" wire:model.live="category_filter">
                        <label class="custom-control-label" for="psu">Power Supply</label>
                        <span class="font-weight-normal">{{ $all_products->where('category', 'psu')->count() }}</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                        <input type="checkbox" class="custom-control-input" name="speaker"
                               value="speaker" wire:model.live="category_filter">
                        <label class="custom-control-label" for="speaker">Speaker</label>
                        <span
                            class="font-weight-normal">{{ $all_products->where('category', 'speaker')->count() }}</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                        <input type="checkbox" class="custom-control-input" name="video_card"
                               value="video_card" wire:model.live="category_filter">
                        <label class="custom-control-label" for="video_card">Graphics Card</label>
                        <span
                            class="font-weight-normal">{{ $all_products->where('category', 'video_card')->count() }}</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                        <input type="checkbox" class="custom-control-input" name="webcam"
                               value="webcam" wire:model.live="category_filter">
                        <label class="custom-control-label" for="webcam">Webcam</label>
                        <span
                            class="font-weight-normal">{{ $all_products->where('category', 'webcam')->count() }}</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- By Category End -->

        <!-- By Condition Start -->
        <div class="p-2 mt-3" style="border: 1px solid #FFFFFF">
            <h5 class="section-title position-relative text-uppercase mb-3 underline underline-offset-4">
                <span class="pr-3">Filter by condition</span>
            </h5>
            <div class="">
                <div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                        <input type="checkbox" class="custom-control-input" name="" value="brand_new" id="color-1"
                               wire:model.live="conditon_filter"
                        >
                        <label class="custom-control-label" for="color-1">Brand New</label>
                        <span
                            class="font-weight-normal">{{ $all_products->where('condition', 'brand_new')->count() }}</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                        <input type="checkbox" class="custom-control-input" name="" value="used" id="color-2"
                               wire:model.live="conditon_filter">
                        <label class="custom-control-label" for="color-2">Used</label>
                        <span class="font-weight-normal">{{ $all_products->where('condition', 'used')->count() }}</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- By Color End -->

        <!-- By Price Start -->
        <div class="p-2 mt-3" style="border: 1px solid #FFFFFF">
            <h5 class="section-title position-relative text-uppercase underline underline-offset-4">
                <span class="pr-3">Filter by price</span>
            </h5>
            <div class="">
                <div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                        <input type="checkbox" class="custom-control-input" name="" value="" id="price-1"
                               wire:model.live="price_bracket">
                        <label class="custom-control-label" for="price-1">₱0 - ₱5000</label>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                        <input type="checkbox" class="custom-control-input" name="" value="" id="price-2"
                               wire:model.live="price_bracket">
                        <label class="custom-control-label" for="price-2">₱6000 - ₱10000</label>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                        <input type="checkbox" class="custom-control-input" name="" value="" id="price-3"
                               wire:model.live="price_bracket">
                        <label class="custom-control-label" for="price-3">₱11000 - ₱20000</label>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                        <input type="checkbox" class="custom-control-input" name="" value="" id="price-4"
                               wire:model.live="price_bracket">
                        <label class="custom-control-label" for="price-4">₱21000 - ₱30000</label>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                        <input type="checkbox" class="custom-control-input" name="" value="" id="price-5"
                               wire:model.live="price_bracket">
                        <label class="custom-control-label" for="price-5">₱31000 - ₱40000</label>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                        <input type="checkbox" class="custom-control-input" name="" value="" id="price-6"
                               wire:model.live="price_bracket">
                        <label class="custom-control-label" for="price-5">₱41000 - Above</label>
                    </div>
                </div>
            </div>
        </div>


        <!-- By Price End -->

        <!-- By Stars Start -->
        <div class="p-2 mt-3" style="border: 1px solid #FFFFFF">
            <h5 class="section-title position-relative text-uppercase mb-3 underline underline-offset-4 ">
                <span class="pr-3">Filter by Stars</span>
            </h5>
            <div class="">
                <div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                        <input type="checkbox" class="custom-control-input" name="" value="5" id="star-5"
                               wire:model.live="star_rating">
                        <label class="custom-control-label" for="price-4">
                            <div class="flex items-center ">(5)
                                @for($i = 1; $i <= 5; $i++)
                                    <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true"
                                         xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                         viewBox="0 0 22 20">
                                        <path
                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                    </svg>
                                @endfor

                            </div>

                        </label>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                        <input type="checkbox" class="custom-control-input" name="" value="4" id="star-4"
                               wire:model.live="star_rating">
                        <label class="custom-control-label" for="price-4">
                            <div class="flex items-center">(4)
                                @for($i = 1; $i <= 4; $i++)
                                    <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true"
                                         xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                         viewBox="0 0 22 20">
                                        <path
                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                    </svg>
                                @endfor

                                <svg class="w-4 h-4 text-gray-200 dark:text-gray-600 mr-1" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                     viewBox="0 0 22 20">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>

                            </div>

                        </label>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                        <input type="checkbox" class="custom-control-input" name="" value="3" id="star_3"
                               wire:model.live="star_rating">
                        <label class="custom-control-label" for="price-4">
                            <div class="flex items-center">(3)
                                @for($i = 1; $i <= 3; $i++)
                                    <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true"
                                         xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                         viewBox="0 0 22 20">
                                        <path
                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                    </svg>
                                @endfor

                                <svg class="w-4 h-4 text-gray-200 dark:text-gray-600 mr-1" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                     viewBox="0 0 22 20">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>
                                <svg class="w-4 h-4 text-gray-200 dark:text-gray-600 mr-1" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                     viewBox="0 0 22 20">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>

                            </div>

                        </label>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                        <input type="checkbox" class="custom-control-input" name="" value="2" id="star-2"
                               wire:model.live="star_rating">
                        <label class="custom-control-label" for="price-4">
                            <div class="flex items-center">(2)
                                @for($i = 1; $i <= 2; $i++)
                                    <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true"
                                         xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                         viewBox="0 0 22 20">
                                        <path
                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                    </svg>
                                @endfor

                                <svg class="w-4 h-4 text-gray-200 dark:text-gray-600 mr-1" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                     viewBox="0 0 22 20">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>
                                <svg class="w-4 h-4 text-gray-200 dark:text-gray-600 mr-1" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                     viewBox="0 0 22 20">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>
                                <svg class="w-4 h-4 text-gray-200 dark:text-gray-600 mr-1" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                     viewBox="0 0 22 20">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>

                            </div>

                        </label>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                        <input type="checkbox" class="custom-control-input" name="" value="1" id="star-1"
                               wire:model.live="star_rating">
                        <label class="custom-control-label" for="price-4">
                            <div class="flex items-center">(1)
                                <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                     viewBox="0 0 22 20">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>


                                <svg class="w-4 h-4 text-gray-200 dark:text-gray-600 mr-1" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                     viewBox="0 0 22 20">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>
                                <svg class="w-4 h-4 text-gray-200 dark:text-gray-600 mr-1" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                     viewBox="0 0 22 20">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>
                                <svg class="w-4 h-4 text-gray-200 dark:text-gray-600 mr-1" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                     viewBox="0 0 22 20">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>
                                <svg class="w-4 h-4 text-gray-200 dark:text-gray-600 mr-1" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                     viewBox="0 0 22 20">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>

                            </div>

                        </label>
                    </div>

                </div>
            </div>
        </div>
        <!-- By Color End -->

        {{--    <!-- By Size Start -->--}}
        {{--    <div class="p-4 mt-3" style="border: 1px solid #FFFFFF">--}}
        {{--        <h5 class="section-title position-relative text-uppercase mb-3">--}}
        {{--            <span class="pr-3">Filter by size</span>--}}
        {{--        </h5>--}}
        {{--        <div class="">--}}
        {{--            <form>--}}
        {{--                <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">--}}
        {{--                    <input type="checkbox" class="custom-control-input" name="" value="" checked id="size-all">--}}
        {{--                    <label class="custom-control-label" for="size-all">All Size</label>--}}
        {{--                    <span class="font-weight-normal">1000</span>--}}
        {{--                </div>--}}
        {{--                <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">--}}
        {{--                    <input type="checkbox" class="custom-control-input" name="" value="" id="size-1">--}}
        {{--                    <label class="custom-control-label" for="size-1">XS</label>--}}
        {{--                    <span class="font-weight-normal">150</span>--}}
        {{--                </div>--}}
        {{--                <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">--}}
        {{--                    <input type="checkbox" class="custom-control-input" name="" value="" id="size-2">--}}
        {{--                    <label class="custom-control-label" for="size-2">S</label>--}}
        {{--                    <span class="font-weight-normal">295</span>--}}
        {{--                </div>--}}
        {{--                <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">--}}
        {{--                    <input type="checkbox" class="custom-control-input" name="" value="" id="size-3">--}}
        {{--                    <label class="custom-control-label" for="size-3">M</label>--}}
        {{--                    <span class="font-weight-normal">246</span>--}}
        {{--                </div>--}}
        {{--                <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">--}}
        {{--                    <input type="checkbox" class="custom-control-input" name="" value="" id="size-4">--}}
        {{--                    <label class="custom-control-label" for="size-4">L</label>--}}
        {{--                    <span class="font-weight-normal">145</span>--}}
        {{--                </div>--}}
        {{--                <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">--}}
        {{--                    <input type="checkbox" class="custom-control-input" name="" value="" id="size-5">--}}
        {{--                    <label class="custom-control-label" for="size-5">XL</label>--}}
        {{--                    <span class="font-weight-normal">168</span>--}}
        {{--                </div>--}}
        {{--            </form>--}}
        {{--        </div>--}}
        {{--    </div>--}}
    </div>
</div>
