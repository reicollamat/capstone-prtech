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

    <div class="border-1 border-green-600">
        {{ $mailStatus }}
    </div>

    {{ $purchase }}

    {{--    @foreach ($purchase->purchase_items as $items) --}}

    {{--        <div style="width: 100%"> --}}
    {{--            {{ $items->quantity }} --}}
    {{--            {{ $items->product->title }} --}}
    {{--            <span style="text-align: right"> --}}
    {{--                {{ $items->total_price }} --}}
    {{--            </span> --}}

    {{--        </div> --}}

    {{--    @endforeach --}}
    {{--       <form action="{{ route('generate_positive_word_cloud') }}" method="POST"> --}}
    {{--          @csrf --}}
    {{--           <button type="submit"> --}}
    {{--               Submit --}}
    {{--           </button> --}}
    {{--       </form> --}}
    <button wire:click="testapi">
        <p>click me to test api</p>
    </button>

    <div class="d-block w-48">
        <div wire:loading wire:target="testapi" class="w-full">
            <div role="status"
                 class="flex items-center justify-center h-56 w-full bg-gray-300 rounded-lg animate-pulse dark:bg-gray-700">
                <svg class="w-10 h-10 text-gray-200 dark:text-gray-600" aria-hidden="true"
                     xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                    <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.98 2.98 0 0 0 .13 5H5Z" />
                    <path
                        d="M14.066 0H7v5a2 2 0 0 1-2 2H0v11a1.97 1.97 0 0 0 1.934 2h12.132A1.97 1.97 0 0 0 16 18V2a1.97 1.97 0 0 0-1.934-2ZM9 13a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-2a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v2Zm4 .382a1 1 0 0 1-1.447.894L10 13v-2l1.553-1.276a1 1 0 0 1 1.447.894v2.764Z" />
                </svg>
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <div wire:loading.remove wire:target="testapi">
            <img src="{{ asset($asset) }}" class="img-fluid img-thumbnail rounded-start border-0 self-center" alt="">
        </div>
    </div>


    <div>

    </div>

    <div wire:init="testapi">
        {{ $readyToLoad }}
    </div>


</div>
