<div x-transition>
    @if ($wishlist_count > 0)
        {{--        <p>you have {{ $wishlist_count }} items in your wishlist</p> --}}
        @foreach ($bookmarks as $bookmark)
            {{--            {{ $bookmark->id }} --}}
            {{-- @dd($bookmark) --}}
            <livewire:wishlist.wishitems :key="$bookmark->id" :bookmark_id="$bookmark->id" />

            {{--            <div class="card mb-2" style="max-width: 540px;" x-transition> --}}
            {{--                <div class="row g-0 relative" x-transition> --}}
            {{--                    <div wire:loading wire:target="remove"> --}}
            {{--                        <div class="absolute w-full h-full d-flex justify-center items-center bg-gray-300 opacity-50" --}}
            {{--                             x-transition> --}}
            {{--                            <div class="spinner-border text-primary" role="status"> --}}
            {{--                                <span class="visually-hidden">Loading...</span> --}}
            {{--                            </div> --}}
            {{--                        </div> --}}
            {{--                    </div> --}}
            {{--                    <div class="col-md-3 d-flex p-2 justify-center"> --}}
            {{--                        <img src="/{{ $bookmark->image }}" --}}
            {{--                             class="img-fluid img-thumbnail rounded-start border-0 self-center" --}}
            {{--                             alt="item image" style="height: 80%!important;"> --}}
            {{--                    </div> --}}
            {{--                    <div class="col-md-9 self-center"> --}}
            {{--                        <div class="card-body mb-0" style="padding: 0.75rem!important;"> --}}
            {{--                            <div class="card-title d-flex justify-between mb-0"> --}}
            {{--                                <a class="text-lg decoration-0 text-decoration-none text-black" --}}
            {{--                                   href="{{route('product_detail', ['product_id' => $bookmark->product_id, 'category' => $bookmark->category])}}">{{ $bookmark->title }}</a> --}}
            {{--                                <h5 class="text-lg text-gray-600 mb-0"> --}}
            {{--                                    <small class="text-body-secondary text-sm">PHP</small> --}}
            {{--                                    {{ $bookmark->price }}</h5> --}}
            {{--                            </div> --}}
            {{--                            <div class="card-text"> --}}
            {{--                                <p class="mb-0 mt-0">{{$bookmark->slug}}</p> --}}
            {{--                                <p class="mb-2"><small --}}
            {{--                                        class="text-body-secondary">{{ App\Helper\Helper::maptopropercatetory($bookmark->category)  }} --}}
            {{--                                        | {{ App\Helper\Helper::maptopropercondition($bookmark->condition) }} --}}
            {{--                                        | {{ strtoupper($bookmark->status) }}</small> --}}
            {{--                                </p> --}}
            {{--                                <a href="#" wire:click="remove" --}}
            {{--                                   wire:click.prevent="removebookmark({{ $bookmark->id }}, {{ $user_id  }})" --}}
            {{--                                   class="small decoration-0 no-underline text-gray-700 rounded border-gray-400 border-1 p-1">Remove</a> --}}
            {{--                            </div> --}}

            {{--                        </div> --}}
            {{--                    </div> --}}
            {{--                </div> --}}
            {{--            </div> --}}
        @endforeach
    @else
        <div x-transition>
            <div class="flex flex-column justify-center items-center m-8 gap-2">
                <div>
                    <p>Wishlist is empty</p>
                </div>
                <div>
                    <a href="{{ route('index_shop') }}" class="btn btn-primary btn-lg text-center w-full ">
                        Start Shopping
                    </a>
                </div>
            </div>
        </div>

    @endif
</div>
