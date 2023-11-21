<?php

namespace App\Livewire;

use App\Helper\Helper;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use LaravelIdea\Helper\App\Models\_IH_Product_C;
use Livewire\Component;

class CartSidebar extends Component
{
    use AuthorizesRequests;

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
            <!-- Loading spinner... -->
            <button class="btn outline-remove position-relative" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                     class="bi bi-cart"
                     viewBox="0 0 16 16">
                    <path
                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                <span
                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-light border border-info-subtle text-black text-xs">
                            0
                            <span class="visually-hidden">Cart items count</span>
                          </span>
            </button>
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

            if (! empty($this->cartitems)) {
                foreach ($this->cartitems as $item) {
                    $this->total_price += $item->price * $item->quantity;
                }
            }

            //            dd(Helper::maptopropercatetory('external_storage'));

        }
    }

    public function render()
    {
        return view('livewire.cart-sidebar');

    }

    public function removeitem($product_id, $user_id)
    {

        $cartitem = CartItem::where('id', $product_id)->where('user_id', $user_id)->get();

        if (\auth()->check()) {
            CartItem::destroy($cartitem);
        }

        $this->mount();
        //        $this->render();
    }
}
