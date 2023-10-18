<div>
    {{--cart button--}}
    <button class="btn outline-remove position-relative" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasWithBothOptions_cart" aria-controls="offcanvasWithBothOptions">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
             class="bi bi-cart"
             viewBox="0 0 16 16">
            <path
                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </svg>
        <span
            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-light border border-info-subtle text-black text-xs">
                    0
                    <span class="visually-hidden">unread messages</span>
                  </span>
    </button>

    <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1"
         id="offcanvasWithBothOptions_cart"
         aria-labelledby="offcanvasWithBothOptionsLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">SHOPPING CART</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <p>Your cart is empty.</p>
        </div>
    </div>
</div>
