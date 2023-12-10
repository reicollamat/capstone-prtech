<?php

namespace App\Livewire\Gcash;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Gcash2 extends Component
{
    public $is_cart;
    public $user_id;
    public $product_id;
    public $quantity;
    public $subtotal;
    public $total;
    public $category;
    public $payment_type;

    public function mount(Request $request)
    {
        $this->is_cart = $request->is_cart;
        $this->user_id = Auth::id();
        $this->product_id = $request->product_id;
        $this->quantity = $request->quantity;
        $this->subtotal = $request->subtotal;
        $this->total = $request->total;
        $this->category = $request->category;
        $this->payment_type = $request->payment_type;
    }

    public function render()
    {
        // if route came from purchase_cart
        if ($this->is_cart) {
            // dd($this->is_cart);
            return view('livewire.gcash.gcash2', [
                'is_cart' => $this->is_cart,
                'subtotal' => $this->subtotal,
                'total' => $this->total,
                'payment_type' => $this->payment_type,
                'user_id' => $this->user_id,
            ]);
        }
        // if route came from purchase_one
        else {
            // dd($this->product_id);
            return view('livewire.gcash.gcash2', [
                'user_id' => $this->user_id,
                'product_id' => $this->product_id,
                'quantity' => $this->quantity,
                'subtotal' => $this->subtotal,
                'total' => $this->total,
                'category' => $this->category,
                'payment_type' => $this->payment_type,
            ]);
        }
    }

    public function gcash3()
    {
        if ($this->is_cart) {
            $this->redirect(route('gcash3', [
                'is_cart' => $this->is_cart,
                'subtotal' => $this->subtotal,
                'total' => $this->total,
                'payment_type' => $this->payment_type,
                'user_id' => $this->user_id,
            ]), navigate: true);
        } else {
            $this->redirect(route('gcash3', [
                'user_id' => $this->user_id,
                'product_id' => $this->product_id,
                'quantity' => $this->quantity,
                'subtotal' => $this->subtotal,
                'total' => $this->total,
                'category' => $this->category,
                'payment_type' => $this->payment_type,
            ]), navigate: true);
        }
    }
}
