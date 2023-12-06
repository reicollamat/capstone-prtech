<div class="card mb-2 " style="max-width: 540px;" x-transition>
    <div class="row g-0 relative" x-transition>
        <div wire:loading wire:target="remove">
            <div class="absolute w-full h-full d-flex justify-center items-center bg-gray-300 opacity-50" x-transition>
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 d-flex p-2 justify-center">
            {{-- @dd($cartitem->product->product_images[0]->image_paths) --}}
            <img src="/{{ $cartitem->product->product_images[0]->image_paths }}"
                class="img-fluid img-thumbnail rounded-start border-0 self-center" alt="item image"
                style="height: 80%!important;">
        </div>
        <div class="col-md-9 self-center">
            <div class="card-body mb-0" style="padding: 0.50rem!important;">
                <div class="card-title d-flex justify-between mb-0">
                    <a class="text-lg decoration-0 text-decoration-none text-black"
                        href="/collections/{{ $cartitem->product->id }}/{{ $cartitem->product->category }}/details">{{ $cartitem->product->title }}
                    </a>
                    <h5 class="text-lg text-gray-600 mb-0">
                        <small class="text-body-secondary text-sm">PHP</small>
                        {{ $cartitem->product->price }}
                    </h5>

                </div>
                <div class="card-text">
                    <p class="mb-0 mt-0">{{ $cartitem->product->slug }}</p>
                    <p class="mb-2"><small
                            class="text-body-secondary">{{ CustomHelper::maptopropercatetory($cartitem->product->category) }}
                            | {{ CustomHelper::maptopropercondition($cartitem->product->condition) }}</small>
                    </p>
                    <div class="d-flex items-center justify-start self-center gap-3">
                        <div class="input-group input-group-sm w-auto border-1 border-gray-300 rounded">
                            <button type="button" class="input-group-text font-black btn btn-ghost"
                                wire:click.prevent="addquantity({{ $cartitem }})" wire:click="remove"
                                wire:key="addquantitybutton" id="inputGroup-sizingadd-sm">+
                            </button>
                            <input type="text" class="form-control text-center border-0"
                                aria-label="Sizing example input" value="{{ $cartitem->quantity }}"
                                style="max-width: 2.5rem!important;" aria-describedby="inputGroup-sizing-sm">
                            <button type="button" class="input-group-text font-black btn btn-ghost"
                                wire:click.prevent="minusquantity({{ $cartitem }})" wire:click="remove"
                                wire:key="minusquantitybutton" id="inputGroup-sizingminus-sm">-
                            </button>
                        </div>
                        <button href="#" wire:click.prevent="remove" wire:key="linktoremove"
                            wire:click="$parent.removecartitem({{ $cartitem->id }}, {{ $user_id }})"
                            class="small decoration-0 no-underline text-gray-700 rounded border-gray-400 border-1 p-1">
                            Remove
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
