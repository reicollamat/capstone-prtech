<?php

namespace App\Livewire\Cart;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use LaravelIdea\Helper\App\Models\_IH_Product_C;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\On;
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

            $this->cartitems = CartItem::with('product')
                ->where('user_id', $this->user_id)
                ->get();

            $this->cartiems_count = count($this->cartitems);

            if (! empty($this->cartitems)) {
                // dd($this->cartitems);
                foreach ($this->cartitems as $item) {
                    // dd($item);
                    $this->total_price += $item->total_price * $item->quantity;
                }
            }

            //            dd($this->cartitems);

        }
    }

    public function render()
    {
        return view('livewire..cart.cart-list');
    }

    public function removecartitem(CartItem $cartitem, $user_id)
    {
        //        dd($cartitem, $user_id);

        if (Auth::check()) {

            $cartitem = CartItem::where('id', $cartitem->id)->where('user_id', $user_id)->get();

            CartItem::destroy($cartitem);

            sleep(0.5);
            $this->mount();
        }
    }

    public function cart_checkout($cartitems)
    {

        // dd('test');
        $cart_items = collect($cartitems);
        $user = Auth::user();
        $shipping_value = 13;
        $subtotal = $this->total_price;
        $total = $subtotal + $shipping_value;

        session()->flash('cart');
        $this->redirect(route('purchase_page', [
            'cart' => true,
            'cartitems' => $cartitems,
            'user' => $user,
            'shipping_value' => $shipping_value,
            'subtotal' => $subtotal,
            'total' => $total,
        ]));

    }

    #[On('cartitem-item-change')]
    public function callfromchild()
    {
        $this->mount();
    }
}
