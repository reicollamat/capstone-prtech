<?php

namespace App\Livewire\Cart;

use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Cartitems extends Component
{
    public string|int|null $user_id;
    public $cartitem = [];

    public int $testvalue = 0;

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
    }

    public function render()
    {
        return view('livewire..cart.cartitems');


    }

    public function remove()
    {
        $this->dispatch('cartitem-item-remove');
    }

    public function addquantity($cartitem)
    {
        //        sleep(1);
        //        dd($cartitem['id']);

        CartItem::where('id', $cartitem['id'])->increment('quantity');
        $this->dispatch('cartitem-item-change');
        $this->render();
        //        $this->dispatch('cartitem-item-remove');
        //        dd('add clicked');
    }

    public function minusquantity($cartitem)
    {
        //        sleep(1);

        CartItem::where('id', $cartitem['id'])->decrement('quantity');
        $this->dispatch('cartitem-item-change');
        //        dd('minus clicked');
    }
}
