<div>
    {{--    The whole world belongs to you.--}}
    <div>
        <div class="container-fluid px-5">
            <p>test</p>

            <div class="row">
                <div class="hidden md:block col-auto col-0">
                    <livewire:shop.collection-filter/>
                </div>
                <div class="col" id="content">
                    2 of 3 (wider)
                    <div wire:loading>
                        <p>loading</p>
                    </div>
                    <div>
                        <div class="row ">
                            @foreach ($all_products as $value)
                                <x-shop.display_product>
                                    <a class="h6 text-decoration-none text-truncate"
                                       href="{{route('product_detail', ['product_id' => $value->id, 'category' => $value->category])}}">
                                        {{ $value->title }}
                                    </a>
                                    <x-slot:price>{{ $value->price }}</x-slot:price>
                                    <x-slot:image>{{ $value->image }}</x-slot:image>
                                    <x-slot:purchasecount>{{ $value->purchase_count }}</x-slot:purchasecount>
                                </x-shop.display_product>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
