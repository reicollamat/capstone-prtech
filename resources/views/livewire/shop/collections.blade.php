<div>
    {{--    The whole world belongs to you.--}}
    <div x-data="">
        <div class="container-fluid md:!px-16">
            <p>test</p>

            <div class="row">
                <div class="hidden md:block col-auto col-0">
                    <livewire:shop.collection-filter/>
                </div>
                <div class="col" id="content">
                    2 of 3 (wider)
                    <div wire:loading>
                        <p>loading</p>
                    </div>
                    <div>
                        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 p-3">
                            @foreach ($all_products as $value)
                                {{--                                <x-shop.display_product>--}}
                                {{--                                    <a class="h6 text-decoration-none text-truncate"--}}
                                {{--                                       href="{{route('product_detail', ['product_id' => $value->id, 'category' => $value->category])}}">--}}
                                {{--                                        {{ $value->title }}--}}
                                {{--                                    </a>--}}
                                {{--                                    <x-slot:price>{{ $value->price }}</x-slot:price>--}}
                                {{--                                    <x-slot:image>{{ $value->image }}</x-slot:image>--}}
                                {{--                                    <x-slot:purchasecount>{{ $value->purchase_count }}</x-slot:purchasecount>--}}
                                {{--                                </x-shop.display_product>--}}
                                <div
                                    class="w-full max-w-sm bg-white border border-gray-200 rounded-lg hover:shadow-2xl hover:transition position-relative"
                                >
                                    <div>
                                        <livewire:addtowishlist.add-to-wishlist
                                            :product_id="$value->id" :key="$value->id" wire:key="{{ $value->id }}"/>
                                    </div>


                                    <div
                                        class="position-relative w-auto h-auto bg-center bg-cover content-center min-h-[257px] p-2">
                                        <a href="#">
                                            <img class="h-auto max-h-[257px] w-auto object-center object-contain"
                                                 src="{{ $value->image }}"
                                                 alt="product image"/>
                                        </a>
                                    </div>

                                    <div class="p-2.5">
                                        <a href="#" class="decoration-0 no-underline">
                                            <h5 class="text-lg font-semibold tracking-tight text-gray-900 text-ellipsis overflow-hidden">
                                                {{ $value->title }}</h5>
                                        </a>
                                        <div class="flex items-center mt-2.5 mb-2.5">
                                            <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true"
                                                 xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                 viewBox="0 0 22 20">
                                                <path
                                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                            </svg>
                                            <svg class="w-4 h-4 text-gray-200 dark:text-gray-600" aria-hidden="true"
                                                 xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                 viewBox="0 0 22 20">
                                                <path
                                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                            </svg>
                                            <span
                                                class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3">5.0</span>
                                        </div>
                                        <div class="mb-2.5">
                                            <span
                                                class="text-xl font-medium text-gray-900 ">PHP {{ $value->price }}</span>
                                        </div>
                                        <div class="flex justify-content-center gap-2">
                                            <a href="#"
                                               class="text-white bg-gray-600 hover:bg-blue-800 focus:ring-4 no-underline focus:outline-none focus:ring-blue-300 font-bold text-xl rounded-lg px-5 py-2 text-center ">Buy
                                                Now</a>
                                            <div>
                                                <livewire:addtocart.add-to-cart :product_id="$value->id"
                                                                                :key="$value->id"
                                                                                wire:key="{{ $value->id }}"/>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
