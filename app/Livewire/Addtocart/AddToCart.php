<?php

namespace App\Livewire\Addtocart;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddToCart extends Component
{
    public int|null|string $product_id;
    public int|null|string $user_id;

    public function mount($product_id)
    {
        $this->product_id = $product_id;

        $this->user_id = Auth::user()->id ?? null;
    }

    public function render()
    {
        return view('livewire..addtocart.add-to-cart');
    }

    public function addtocart()
    {

        if (Auth::check()) {

            CartItem::firstOrCreate([
                'user_id' => $this->user_id,
                'product_id' => $this->product_id,
                'quantity' => 1,
                'total_price' => Product::find($this->product_id)->price
            ]);

            $this->dispatch('cartitem-item-change');
        } else {
            $this->redirect(route('login'));
        }


        //        dd($this->quantity, $this->user_id, $this->product_id);
    }
}
