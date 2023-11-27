<?php

namespace App\Livewire\Gcash;

use App\Models\CartItem;
use App\Models\Payment;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Gcash3 extends Component
{
    public $cart_ids;
    public $user_id;
    public $product_id;
    public $quantity;
    public $subtotal;
    public $total;
    public $category;
    public $payment_type;

    public function mount(Request $request)
    {
        $this->cart_ids = $request->cart_ids;
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
        if ($this->cart_ids) {
            // dd($this->cart_ids);
            return view('livewire.gcash.gcash3', [
                'cart_ids' => $this->cart_ids,
                'subtotal' => $this->subtotal,
                'total' => $this->total,
                'payment_type' => $this->payment_type,
                'user_id' => $this->user_id,
            ]);
        }
        // if route came from purchase_one
        else {
            // dd($this->product_id);
            return view('livewire.gcash.gcash3', [
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

    public function save()
    {
        // saving purchase for cart (multiple items)
        if ($this->cart_ids) {
            $cart_items = CartItem::whereIn('id', $this->cart_ids)->get();

            // create a new Purchase instance
            $purchase = new Purchase([
                'user_id' => $this->user_id,
                'purchase_date' => now(),
                'total_amount' => $this->total,
                'purchase_status' => 'pending',
            ]);
            $purchase->save(); // save the Purchase instance

            // create a new Payment instance
            $payment = new Payment([
                'user_id' => $this->user_id,
                'purchase_id' => $purchase->id,
                'date_of_payment' => now(),
                'payment_type' => $this->payment_type,
                'payment_status' => 'paid',
                'reference_code' => 'samplecode',
            ]);
            $payment->save();

            // loop to create new Cart_items instance each
            foreach ($cart_items as $key => $value) {
                $purchaseItem = new PurchaseItem([
                    'purchase_id' => $purchase->id,
                    'product_id' => $value->product_id,
                    'quantity' => $value->quantity,
                    'total_price' => $value->total_price,
                ]);
                $purchaseItem->save();
            }


            // remove the current Cart_items in database cuz itz purchased
            foreach ($cart_items as $key => $value) {
                CartItem::destroy($value->id);
            }

            session()->flash('notification', 'Order Purchased, Thank you!');

            return redirect(route('index_shop'));
        }
        // saving purchase for one item 
        else {
            // Create a new Purchase instance
            $purchase = new Purchase([
                'user_id' => $this->user_id,
                'purchase_date' => now(),
                'total_amount' => $this->total,
                'purchase_status' => 'pending',
            ]);
            // Save the Purchase instance
            $purchase->save();

            $payment = new Payment([
                'user_id' => $this->user_id,
                'purchase_id' => $purchase->id,
                'date_of_payment' => now(),
                'payment_type' => $this->payment_type,
                'payment_status' => 'paid',
                'reference_code' => 'samplecode',
            ]);
            $payment->save();

            $purchaseItem = new PurchaseItem([
                'purchase_id' => $purchase->id,
                'product_id' => $this->product_id,
                'quantity' => $this->quantity,
                'total_price' => $this->subtotal,
            ]);
            $purchaseItem->save();

            session()->flash('notification', 'Order Purchased, Thank you!');

            // dd($this->category);
            return redirect(route('product_detail', [
                'product_id' => $this->product_id,
                'category' => $this->category,
            ]));
        }
    }
}
