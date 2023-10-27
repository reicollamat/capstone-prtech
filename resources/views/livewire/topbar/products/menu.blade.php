<div class="d-flex h-full z-50">
    <div>
        <div
            class="d-flex justify-evenly p-3 hover:bg-gray-100 transition duration-300"
            style="width: 15rem!important;">
            <button type="button" class="dropdown-item hover:font-bold" href="#"
                    x-transition
                    wire:mouseover.debounce="componentsbutton">
                Components
            </button>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                 fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                      d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
            </svg>
        </div>
        <div
            class="d-flex justify-evenly p-3 hover:bg-gray-100 transition duration-300"
            style="width: 15rem!important;">
            <button type="button" class="dropdown-item hover:font-bold" href="#"
                    wire:mouseover.debounce="peripheralsbutton">
                Peripherals
            </button>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                 fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                      d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
            </svg>
        </div>
        <div
            class="d-flex justify-evenly p-3 hover:bg-gray-100 transition duration-300"
            style="width: 15rem!important;">
            <button type="button" class="dropdown-item hover:font-bold" href="#"
                    wire:mouseover.debounce="accessoriesbutton">
                Accessories
            </button>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                 fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                      d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
            </svg>
        </div>
        <div
            class="d-flex justify-evenly p-3 hover:bg-gray-100 transition duration-300"
            style="width: 15rem!important;">
            <button type="button" class="dropdown-item hover:font-bold" href="#"
                    wire:mouseover.debounce="bestsellersbutton">Best
                Sellers
            </button>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                 fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                      d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
            </svg>
        </div>
        <div
            class="d-flex justify-evenly p-3 hover:bg-gray-100 transition duration-300"
            style="width: 15rem!important;">
            <button class="dropdown-item hover:font-bold"
                    wire:mouseover.debounce="allproductsbutton"
                    wire:click="allproductsbuttonclick">All Products
            </button>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                 fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                      d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
            </svg>
        </div>

    </div>
    <div class="vr" style="opacity: .10 !important">

    </div>
    <div class="p-2 flex-grow-1">

        {{--        <p>test</p>--}}

        {{--        <p> {{ $value }}</p>--}}
        <div class="d-flex flex-row gap-3 ">
            <div class="card h-100 w-[230px] max-w-[230px]">
                <div class="card-img-top w-full h-auto d-flex justify-center">
                    <img src="/img/components/case/case%20(1).png"
                         class="img-fluid w-[100px] "
                         alt="...">
                </div>
                <div class="card-body p-2">
                    <p class="text-sm text-gray-600 mb-1 text-center">category</p>
                    <div class="card-title d-flex justify-center">
                        <h5 class="card-title">product name</h5>
                    </div>
                    <div class="card-title d-flex justify-center">
                        <h6 class="card-title">product price</h6>
                    </div>

                    <div class="card-text d-flex justify-between">
                        <p class="card-text">stock info</p>
                        <p class="card-text">stars??</p>
                    </div>
                </div>
            </div>
            <div class="card h-100 w-[230px] max-w-[230px]">
                <div class="card-img-top w-full h-auto d-flex justify-center">
                    <img src="/img/components/case/case%20(1).png"
                         class="img-fluid w-[100px] "
                         alt="...">
                </div>
                <div class="card-body p-2">
                    <p class="text-sm text-gray-600 mb-1 text-center">category</p>
                    <div class="card-title d-flex justify-center">
                        <h5 class="card-title">product name</h5>
                    </div>
                    <div class="card-title d-flex justify-center">
                        <h6 class="card-title">product price</h6>
                    </div>

                    <div class="card-text d-flex justify-between">
                        <p class="card-text">stock info</p>
                        <p class="card-text">stars??</p>
                    </div>
                </div>
            </div>
            <div class="card h-100 w-[230px] max-w-[230px]">
                <div class="card-img-top w-full h-auto d-flex justify-center">
                    <img src="/img/components/case/case%20(1).png"
                         class="img-fluid w-[100px] "
                         alt="...">
                </div>
                <div class="card-body p-2">
                    <p class="text-sm text-gray-600 mb-1 text-center">category</p>
                    <div class="card-title d-flex justify-center">
                        <h5 class="card-title">product name</h5>
                    </div>
                    <div class="card-title d-flex justify-center">
                        <h6 class="card-title">product price</h6>
                    </div>

                    <div class="card-text d-flex justify-between">
                        <p class="card-text">stock info</p>
                        <p class="card-text">stars??</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
