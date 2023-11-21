<?php

namespace App\Livewire\Cart;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Cartcount extends Component
{
    public string|int|null $user_id;

    /**
     * @var Product[]|\LaravelIdea\Helper\App\Models\_IH_Product_C
     */
    public $cartitems = 0;

    public int $cartiems_count = 0;

    public function placeholder()
    {

    }

    #[On('cartitem-item-change')]
    public function mount()
    {
        if (Auth::check()) {

            $this->user_id = Auth::id();

            $this->cartiems_count = Product::join('cart_items', 'products.id', '=', 'cart_items.product_id')
                ->where('user_id', $this->user_id)
                ->count();

            //            $this->cartiems_count = count($this->cartitems);
            //            dd(Helper::maptopropercatetory('external_storage'));

        }
    }

    public function render()
    {
        return view('livewire..cart.itemcount');
    }
}
