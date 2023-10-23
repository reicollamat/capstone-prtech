<?php

namespace App\Livewire\Cart;

use App\Models\Bookmark;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use LaravelIdea\Helper\App\Models\_IH_Product_C;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[lazy]
class CartList extends Component
{

    public string|int|null $user_id;
    /**
     * @var Product[]|_IH_Product_C
     */
    public $cartitems = [];
    public int $cartiems_count = 0;

    public float $total_price = 0;

    public function placeholder()
    {
        return <<<'HTML'
            <div>
                <p1>loading</p1>
            </div>
            HTML;
    }

    public function mount()
    {
        $this->total_price = 0;

        if (Auth::check()) {
            $this->user_id = Auth::id();


            $this->cartitems = Product::join('cart_items', 'products.id', '=', 'cart_items.product_id')
                ->where('user_id', $this->user_id)
                ->get();

            $this->cartiems_count = count($this->cartitems);

            if (!empty($this->cartitems)) {
                foreach ($this->cartitems as $item) {
                    $this->total_price += $item->price * $item->quantity;
                }
            }

            //            dd(Helper::maptopropercatetory('external_storage'));

        }
    }

    public function render()
    {
        return view('livewire..cart.cart-list');
    }

    public function removecartitem(CartItem $cartitem, $user_id)
    {
        //        dd($cartitem, $user_id);
        $cartitem = CartItem::where('id', $cartitem->id)->where('user_id', $user_id)->get();

        if (Auth::check()) {

            CartItem::destroy($cartitem);

            sleep(1);
            $this->mount();

        }
    }
}
