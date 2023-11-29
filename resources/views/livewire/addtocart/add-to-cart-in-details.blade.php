<div>
    {{--    <input type="text" name="product_id" value="{{$product->product_id}}" hidden>--}}
    {{--    <input type="text" name="category" value="{{$product->category}}" hidden>--}}
    {{--    <input type="text" name="user_id" value="{{Auth::user()->id}}" hidden>--}}


    {{-- session flash notification --}}
    {{-- for add-to-cart --}}
    <div class="alert alert-primary rounded alert-dismissible fade show" role="alert" style="display: none; position: fixed; top: 20px; right: 25px; width: 25%; z-index:9999; font-size: 14px;" 
        x-data="{show: false}" 
        x-show="show"
        x-transition:leave.duration.500ms
        x-init="@this.on('notif-alert-cart', () => { show = true; setTimeout(() => { show = false;}, 5000) })">
            {{ session('notification-livewire') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <div class="d-flex gap-3">
        <div class="input-group w-auto border-1 border-gray-300 rounded">
            <button type="button" class="input-group-text font-black btn btn-ghost"
                    wire:click="minusquantity()"
                    wire:key="minusquantitybutton"
                    id="inputGroup-sizingminus-sm">-
            </button>
            <input type="text" class="form-control text-center border-0"
                   aria-label="Sizing example input"
                   value="{{ $quantity }}"
                   style="max-width: 2.5rem!important;"
                   aria-describedby="inputGroup-sizing-sm">
            <button type="button" class="input-group-text font-black btn btn-ghost"
                    wire:click="addquantity()"
                    wire:key="addquantitybutton"
                    id="inputGroup-sizingadd-sm"
                    style="max-width: 2.5rem!important;">+
            </button>
        </div>
        <div>
            <button class="btn btn-outline-primary px-3 w-full" id="addToCartBtn" wire:click="addtocart()" style="min-width: 15rem!important;">
                <div class="">
                    <i class="fa fa-shopping-cart mr-1"></i> Add To Cart
                </div>
            </button>
        </div>
        <div>
            <button class="btn btn-primary px-3 w-full" id="addToCartBtn" wire:click="buynow()" style="min-width: 15rem!important;">
                <div class="text-light">
                    <i class="fa fa-shopping-cart mr-1"></i> Buy Now
                </div>
            </button>
        </div>
    </div>


</div>
