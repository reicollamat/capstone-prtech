<div x-transition>
    @if($wishlist_count > 0)
        {{--        <p>you have {{ $wishlist_count }} items in your wishlist</p>--}}
        @foreach($bookmarks as $bookmark)
            <livewire:wishlist.wishitems :bookmark="$bookmark" :key="$bookmark->id"/>
        @endforeach
    @else
        <div x-transition>
            <div class="flex flex-column justify-center items-center m-8 gap-2">
                <div>
                    <p>Wishlist is empty</p>
                </div>
                <div>
                    <a href="{{ route('index_shop') }}"
                       class="btn btn-primary btn-lg text-center w-full ">
                        Start Shopping
                    </a>
                </div>
            </div>
        </div>

    @endif
</div>
