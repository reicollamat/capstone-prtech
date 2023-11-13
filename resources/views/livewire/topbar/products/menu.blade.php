<div class="d-flex h-full z-50">
    <div>
        <div class="d-flex justify-evenly p-3 hover:bg-gray-100 transition duration-300" style="width: 15rem!important;">
            <button type="button" class="dropdown-item hover:font-bold" href="#" x-transition
                wire:mouseover.debounce="componentsbutton">
                Components
            </button>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
            </svg>
        </div>
        <div class="d-flex justify-evenly p-3 hover:bg-gray-100 transition duration-300"
            style="width: 15rem!important;">
            <button type="button" class="dropdown-item hover:font-bold" href="#"
                wire:mouseover.debounce="peripheralsbutton">
                Peripherals
            </button>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
            </svg>
        </div>
        <div class="d-flex justify-evenly p-3 hover:bg-gray-100 transition duration-300"
            style="width: 15rem!important;">
            <button type="button" class="dropdown-item hover:font-bold" href="#"
                wire:mouseover.debounce="accessoriesbutton">
                Accessories
            </button>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
            </svg>
        </div>
        <div class="d-flex justify-evenly p-3 hover:bg-gray-100 transition duration-300"
            style="width: 15rem!important;">
            <button type="button" class="dropdown-item hover:font-bold" href="#"
                wire:mouseover.debounce="bestsellersbutton">Best
                Sellers
            </button>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
            </svg>
        </div>
        <div class="d-flex justify-evenly p-3 hover:bg-gray-100 transition duration-300"
            style="width: 15rem!important;">
            <button class="dropdown-item hover:font-bold" wire:mouseover.debounce="allproductsbutton"
                wire:click="allproductsbuttonclick">All Products
            </button>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
            </svg>
        </div>

    </div>
    <div class="vr" style="opacity: .10 !important">

    </div>
    <div class="p-2 flex-grow-1 max-w-full scroll-x">

        <div class="d-flex flex-row gap-2 " x-transition>
            @foreach ($itemdisplay as $item)
                <div wire:key="{{ $item->id }}" x-transition wire:loading.remove>
                    <a href="{{ route('product_detail', ['product_id' => $item->id, 'category' => $item->category]) }}"
                        class="no-underline decoration-0">
                        <div class="card h-100 w-[230px] max-w-[230px] border-0">
                            <div class="card-img-top w-full h-[100px] d-flex justify-center">
                                <img src="{{ asset($item->image) }}" class="img-fluid w-[100px] " alt="...">
                            </div>
                            <div class="card-body p-2">
                                <div class="position-relative">
                                    <div>
                                        <p class="text-sm text-gray-600 mb-1 text-center">
                                            {{ \App\Helper\Helper::maptopropercatetory($item->category) }}</p>
                                        <div class="card-title d-flex justify-center">
                                            <h5 class="card-title text-base text-center">{{ $item->title }}</h5>
                                        </div>
                                        <div class="card-title d-flex justify-center">
                                            <h6 class="card-title !text-red-600">PHP {{ $item->price }}</h6>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="card-text d-flex justify-between">
                                            <p class="card-text mb-0">{{ $item->status }}</p>
                                            <p class="card-text mb-0">stars??</p>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </a>

                </div>
            @endforeach
        </div>
        <div wire:loading>
            <div class="spinner-border text-black" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>

    </div>
</div>
