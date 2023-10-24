<?php

namespace App\Livewire\Cart;

use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Attributes\Reactive;
use Livewire\Attributes\Renderless;
use Livewire\Component;

class Cartitems extends Component
{
    public string|int|null $user_id;

    #[Reactive]
    public $cartitem = [];

    public int $testvalue = 0;

    protected $listeners = ['rerenderSidebar' => '$refresh'];

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

    public function archive()
    {
        $this->reset();
    }

    public function remove()
    {
        $this->dispatch('cartitem-item-remove');
    }

    #[Renderless]
    public function addquantity($cartitem)
    {

        CartItem::where('id', $cartitem['id'])->increment('quantity');
        sleep(0.750);
        $this->dispatch('cartitem-item-change');


    }

    #[Renderless]
    public function minusquantity($cartitem)
    {
        CartItem::where('id', $cartitem['id'])->decrement('quantity');
        sleep(.750);
        $this->dispatch('cartitem-item-change');
    }
}
