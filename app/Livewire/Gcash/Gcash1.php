<?php

namespace App\Livewire\Gcash;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Gcash1 extends Component
{
    public $user_id;
    public $product_id;
    public $quantity;
    public $subtotal;
    public $total;
    public $category;
    public $payment_type;

    public function mount(Request $request)
    {
        // dd($request);
        $this->user_id = Auth::id();
        $this->quantity = $request->quantity;
        $this->subtotal = $request->subtotal;
        $this->total = $request->total;
        $this->category = $request->category;
        $this->payment_type = $request->payment_type;
    }

    public function render()
    {
        // dd($this->product_id);
        return view('livewire.gcash.gcash1', [
            'user_id' => $this->user_id,
            'product_id' => $this->product_id,
            'quantity' => $this->quantity,
            'subtotal' => $this->subtotal,
            'total' => $this->total,
            'category' => $this->category,
            'payment_type' => $this->payment_type,
        ]);
    }

    public function gcash2()
    {
        $this->redirect(route('gcash2'), navigate: true);
    }
}
