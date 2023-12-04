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

    <button wire:click="sendMail">
        <p>Click me to test email </p>
    </button>
    {{ $mailStatus }}
    {{ public_path() }}
    {{--    {{ storage_path('') }} --}}
    {{--    {{ Storage::url('/product-image-uploads/UuCISu2FNIoCMbbu03GT1NwU0hTG2V2NWs9hAeXr.jpg') }} --}}
    <img src="{{ asset('/product-image-uploads/UuCISu2FNIoCMbbu03GT1NwU0hTG2V2NWs9hAeXr.jpg') }}" alt="">


    <button type="button" wire:click="tryAlert">
        <p>Try Alert</p>
    </button>
</div>
