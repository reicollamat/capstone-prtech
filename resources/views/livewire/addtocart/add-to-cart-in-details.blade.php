<div>
    {{--    <input type="text" name="product_id" value="{{$product->product_id}}" hidden>--}}
    {{--    <input type="text" name="category" value="{{$product->category}}" hidden>--}}
    {{--    <input type="text" name="user_id" value="{{Auth::user()->id}}" hidden>--}}
    <div class="d-flex gap-3 items-center self-center align-middle">
        <div class="input-group  w-auto border-1 border-gray-300 rounded">
            <button type="button" class="input-group-text font-black btn btn-ghost"
                    wire:click="addquantity()"
                    wire:key="addquantitybutton"
                    id="inputGroup-sizingadd-sm">+
            </button>
            <input type="text" class="form-control text-center border-0"
                   aria-label="Sizing example input"
                   value="{{ $quantity }}"
                   style="max-width: 2.5rem!important;"
                   aria-describedby="inputGroup-sizing-sm">
            <button type="button" class="input-group-text font-black btn btn-ghost"
                    wire:click="minusquantity()"
                    wire:key="minusquantitybutton"
                    id="inputGroup-sizingminus-sm">-
            </button>
        </div>
        <div>
            <button class="btn btn-primary px-3" id="addToCartBtn" wire:click="addtocart()">
                <div class="text-light">
                    <i class="fa fa-shopping-cart mr-1"></i> Add To Cart
                </div>
            </button>
        </div>
        <div>
            <button class="btn btn-primary px-3" id="addToCartBtn">
                <div class="text-light">
                    <i class="fa fa-shopping-cart mr-1"></i> Buy It Now
                </div>
            </button>
        </div>
    </div>


</div>
