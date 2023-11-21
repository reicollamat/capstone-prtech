<?php

namespace App\Livewire\Addtocart;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddToCartInDetails extends Component
{
    public $product_id;

    public $quantity = 1;

    public string|int|null $user_id;

    public function mount($product_id)
    {
        $this->user_id = Auth::id();

        $this->product_id = $product_id;
    }

    public function render()
    {
        return view('livewire..addtocart.add-to-cart-in-details');
    }

    public function addtocart()
    {

        if (Auth::check()) {

            // multiply quantity with price of the product
            $total_price = $this->quantity * Product::find($this->product_id)->price;

            CartItem::firstOrCreate([
                'user_id' => $this->user_id,
                'product_id' => $this->product_id,
                'quantity' => $this->quantity,
                'total_price' => $total_price,
            ]);

            $this->dispatch('cartitem-item-change');
        } else {
            $this->redirect(route('login'));
        }

        //        dd($this->quantity, $this->user_id, $this->product_id);
    }

    public function buynow()
    {

        if (Auth::check()) {

            // multiply quantity with price of the product
            $total_price = $this->quantity * Product::find($this->product_id)->price;

            CartItem::firstOrCreate([
                'user_id' => $this->user_id,
                'product_id' => $this->product_id,
                'quantity' => $this->quantity,
                'total_price' => $total_price,
            ]);

            $this->redirect(route('purchase_page'));
        } else {
            $this->redirect(route('login'));
        }

        //        dd($this->quantity, $this->user_id, $this->product_id);
    }

    public function addquantity()
    {
        if ($this->quantity < 100) {
            $this->quantity++;
        }
    }

    public function minusquantity()
    {

        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }
}
