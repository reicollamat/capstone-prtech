<div x-transition>
    @if($wishlist_count > 0)
        {{--        <p>you have {{ $wishlist_count }} items in your wishlist</p>--}}
        @foreach($bookmarks as $bookmark)
            <livewire:wishlist.wishitems :bookmark="$bookmark" :key="$bookmark->id"/>
        @endforeach
    @else
        <div x-transition>
            <p>You don't have any products in the wishlist yet.
                You will find a lot of interesting products on our "Shop" page.</p>
        </div>

    @endif
</div>
