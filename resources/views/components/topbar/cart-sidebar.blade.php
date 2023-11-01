<div>
    {{--cart button--}}
    <button class="btn outline-remove position-relative" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasWithBothOptions_cart"
            aria-controls="offcanvasWithBothOptions">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor"
             class="bi bi-cart" viewBox="0 0 16 16">
            <path
                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </svg>
        <span class="position-absolute top-0 start-100 translate-middle badge bg-transparent  text-black">
            <livewire:cart.cartcount/>
            <span class="visually-hidden">Cart items count</span>
      </span>
    </button>

    <div class="offcanvas offcanvas-end min-w-[450px]" data-bs-scroll="true" tabindex="-1"
         id="offcanvasWithBothOptions_cart"
         aria-labelledby="offcanvasWithBothOptionsLabel">
        <div class="offcanvas-header px-4">
            <div class="d-flex align-middle self-center items-center text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart2"
                     viewBox="0 0 16 16">
                    <path
                        d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                </svg>
                <h5 class="offcanvas-title pl-2 text-xl" id="offcanvasWithBothOptionsLabel">
                    Cart Item/s
                </h5>
            </div>

            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
        </div>
        <hr class="mt-1.5 mb-1.5">
        <div class="offcanvas-body my-0 py-0">
            <div>
                <livewire:cart.cart-list/>
            </div>
        </div>

    </div>
</div>
