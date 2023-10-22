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
                    {{ $cartiems_count }}
                    <span class="visually-hidden">Cart items count</span>
                  </span>
    </button>

    <div class="offcanvas offcanvas-end min-w-[450px]" data-bs-scroll="true" tabindex="-1"
         id="offcanvasWithBothOptions_cart"
         aria-labelledby="offcanvasWithBothOptionsLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">SHOPPING CART</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
        </div>
        <div class="offcanvas-body relative">
            @if($cartiems_count >0)
                <p>you have {{ $cartiems_count }} items in your cart</p>
                @foreach($cartitems as $item)
                    <div class="card mb-2" style="max-width: 540px;" wire:key="{{ $item->id }}">
                        <div class="row g-0">
                            <div class="col-md-3 d-flex p-2">

                                <img src="/{{ $item->image }}" class="img-fluid img-thumbnail rounded-start border-0"
                                     alt="item image">

                            </div>
                            <div class="col-md-9">
                                <div class="card-body">
                                    <div class="card-title d-flex justify-between">
                                        <a class="text-lg decoration-0 text-decoration-none text-black"
                                           href="{{route('product_detail', ['product_id' => $item->product_id, 'category' => $item->category])}}">{{ $item->title }}</a>
                                        <h5 class="text-lg text-gray-600">
                                            <small class="text-body-secondary">PHP</small>
                                            {{ $item->price }}</h5>
                                    </div>

                                    <div class="card-text">
                                        <p class="mb-0">{{$item->slug}}</p>
                                        <p><small
                                                class="text-body-secondary">{{ App\Helper\Helper::maptopropercatetory($item->category)  }}
                                                | {{ App\Helper\Helper::maptopropercondition($item->condition) }}</small>
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>You don't have any products in the Cart yet.
                    You will find a lot of interesting products on our "Shop" page.</p>
            @endif
        </div>
        <div class="w-full absolute bottom-0 py-4 px-3">
            <hr>
            <p class="text-gray-500 rounded-lg text-sm ">Shipping is calculated at Checkout</p>
            <button class="btn btn-primary btn-lg text-center w-full py-2">
                Checkout | PHP {{ $total_price }}
            </button>

        </div>
    </div>
</div>
