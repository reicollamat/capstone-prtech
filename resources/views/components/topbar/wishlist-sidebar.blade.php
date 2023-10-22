<div>
    {{--wishlist heart button--}}
    <button class="btn  outline-remove position-relative" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasWithBothOptions_wishlist"
            aria-controls="offcanvasWithBothOptions">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
             class="bi bi-suit-heart" viewBox="0 0 16 16">
            <path
                d="m8 6.236-.894-1.789c-.222-.443-.607-1.08-1.152-1.595C5.418 2.345 4.776 2 4 2 2.324 2 1 3.326 1 4.92c0 1.211.554 2.066 1.868 3.37.337.334.721.695 1.146 1.093C5.122 10.423 6.5 11.717 8 13.447c1.5-1.73 2.878-3.024 3.986-4.064.425-.398.81-.76 1.146-1.093C14.446 6.986 15 6.131 15 4.92 15 3.326 13.676 2 12 2c-.777 0-1.418.345-1.954.852-.545.515-.93 1.152-1.152 1.595L8 6.236zm.392 8.292a.513.513 0 0 1-.784 0c-1.601-1.902-3.05-3.262-4.243-4.381C1.3 8.208 0 6.989 0 4.92 0 2.755 1.79 1 4 1c1.6 0 2.719 1.05 3.404 2.008.26.365.458.716.596.992a7.55 7.55 0 0 1 .596-.992C9.281 2.049 10.4 1 12 1c2.21 0 4 1.755 4 3.92 0 2.069-1.3 3.288-3.365 5.227-1.193 1.12-2.642 2.48-4.243 4.38z"/>
        </svg>
        <span
            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-light border border-info-subtle text-black text-xs">
{{--            {{ $wishlist_count ?? 0 }}--}}
            <livewire:wishlist.wishlistcount />
            <span class="visually-hidden">unread messages</span>
      </span>
    </button>

    <div class="offcanvas offcanvas-end min-w-[450px]" data-bs-scroll="true" tabindex="-1"
         id="offcanvasWithBothOptions_wishlist"
         aria-labelledby="offcanvasWithBothOptionsLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">WISHLIST</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            @if($wishlist_count ?? 0 >0)
                <p>you have {{ $wishlist_count }} items in your wishlist</p>
                @foreach($bookmarks as $item)
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
                                                | {{ App\Helper\Helper::maptopropercondition($item->condition) }}
                                                | {{ strtoupper($item->status) }}</small>
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>You don't have any products in the wishlist yet.
                    You will find a lot of interesting products on our "Shop" page.</p>
            @endif
        </div>
    </div>
</div>
