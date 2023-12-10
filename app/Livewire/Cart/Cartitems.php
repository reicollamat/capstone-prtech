<?php

namespace App\Livewire\Cart;

use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Reactive;
use Livewire\Attributes\Modelable;
use Livewire\Attributes\Renderless;
use Livewire\Component;

class Cartitems extends Component
{
    public string|int|null $user_id;

    // #[Reactive]
    #[Modelable]
    public $cartitem = [];

    public int $testvalue = 0;

    public $item_quantity;

    public function placeholder()
    {
        return <<<'HTML'
            <div>
                <div class="spinner-border spinner-border-sm" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        HTML;
    }

    public function mount($cartitem)
    {
        $this->user_id = Auth::id();

        $this->cartitem = $cartitem;

        $this->testvalue = 0;

        $this->item_quantity = $cartitem->quantity;

        //        dd($this->cartitem);
    }

    public function render()
    {
        return view('livewire..cart.cartitems');
    }

    public function remove()
    {
        $this->dispatch('cartitem-item-change');
    }

    // #[Renderless]
    public function addquantity($cartitem)
    {
        $cart_item = CartItem::find($cartitem['id']);
        $cart_item->increment('quantity');
        $cart_item->total_price = $cart_item->total_price + $cart_item->product->price;
        $cart_item->save();
        $this->item_quantity++;
        sleep(0.500);
        $this->dispatch('cartitem-item-change');
    }

    // #[Renderless]
    public function minusquantity($cartitem)
    {
        if ($cartitem['quantity'] > 1) {
            $cart_item = CartItem::find($cartitem['id']);
            $cart_item->decrement('quantity');
            $cart_item->total_price = $cart_item->total_price - $cart_item->product->price;
            $cart_item->save();
            $this->item_quantity--;
        }
        sleep(.500);
        $this->dispatch('cartitem-item-change');
    }
}
