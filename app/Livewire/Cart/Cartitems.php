<?php

namespace App\Livewire\Cart;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Cartitems extends Component
{
    public string|int|null $user_id;
    public $cartitem = [];

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
    }

    public function render()
    {
        return view('livewire..cart.cartitems');
    }

    public function remove()
    {
        $this->dispatch('cartitem-item-remove');
    }
}
