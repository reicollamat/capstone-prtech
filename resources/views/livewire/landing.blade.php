<div>
    {{--    {{ $count }} --}}
    {{--    <livewire:shop.collections/> --}}
    {{--    {{ $collection->title }} --}}
    {{--    @dd(Auth::user()) --}}

    <div x-data="{ count: 0 }">
        <button x-on:click="count = count > 0 ? count-1 : count">-</button>
        <span x-text="count"></span>
        <button x-on:click="count++">+</button>
    </div>
</div>
