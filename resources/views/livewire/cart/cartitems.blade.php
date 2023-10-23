<div class="card mb-2" style="max-width: 540px;" x-transition>
    <div class="row g-0 relative" x-transition>
        <div wire:loading wire:target="remove">
            <div class="absolute w-full h-full d-flex justify-center items-center bg-gray-300 opacity-50" x-transition>
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 d-flex p-2">
            <img src="/{{ $cartitem->image }}" class="img-fluid img-thumbnail rounded-start border-0 self-center"
                 alt="item image" style="height: 80%!important;">
        </div>
        <div class="col-md-9">
            <div class="card-body mb-0" style="padding: 0.50rem!important;">
                <div class="card-title d-flex justify-between mb-0">
                    <a class="text-lg decoration-0 text-decoration-none text-black"
                       href="{{route('product_detail', ['product_id' => $cartitem->id, 'category' => $cartitem->category])}}">{{ $cartitem->title }}</a>
                    <h5 class="text-lg text-gray-600">
                        <small class="text-body-secondary">PHP</small>
                        {{ $cartitem->price }}</h5>
                </div>

                <div class="card-text">
                    <p class="mb-0 mt-0">{{$cartitem->slug}}</p>
                    <p class="mb-1 "><small
                            class="text-body-secondary">{{ App\Helper\Helper::maptopropercatetory($cartitem->category)  }}
                            | {{ App\Helper\Helper::maptopropercondition($cartitem->condition) }}</small>
                    </p>
                    <a href="#" wire:click="remove"
                       wire:click.prevent="$parent.removecartitem({{ $cartitem->id }}, {{ $user_id }})"
                       class="small decoration-0 no-underline text-gray-700 rounded border-gray-400 border-1 p-1">Remove</a>
                </div>

            </div>
        </div>
    </div>
</div>
