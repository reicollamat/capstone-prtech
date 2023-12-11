<?php

namespace App\Livewire\Gcash;

use App\Helpers\ReferenceGeneratorHelper;
use App\Models\CartItem;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\UserNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Gcash3 extends Component
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
            return view('livewire.gcash.gcash3', [
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
        // saving purchase per seller for CART (multiple items)
        if ($this->is_cart) {
            // get all CartItems from currect user
            $cartitems = CartItem::join('products', 'cart_items.product_id', '=', 'products.id')
                ->where('user_id', $this->user_id)
                ->get();
            // groupby seller lahat ng cartitems
            $cartitems_per_seller = $cartitems->groupBy('seller_id')->all();

            // dd($cartitems_per_seller);

            // loop for each seller to save purchase per seller
            foreach ($cartitems_per_seller as $key => $seller_items) {
                // dd($seller_items);

                //get total_amount of current seller_items
                $total_amount = $seller_items->sum('total_price');

                //generate reference number for purchase
                $puchase_reference_number = ReferenceGeneratorHelper::generateReferenceString();

                $purchase = new Purchase([
                    'user_id' => $this->user_id,
                    'seller_id' => $key,
                    'reference_number' => $puchase_reference_number,
                    'purchase_date' => now(),
                    'total_amount' => $total_amount,
                    'purchase_status' => 'pending',
                ]);
                $purchase->save();

                $payment = new Payment([
                    'user_id' => $this->user_id,
                    'purchase_id' => $purchase->id,
                    'date_of_payment' => now(),
                    'payment_type' => $this->payment_type,
                    'payment_status' => 'paid',
                    'reference_code' => '#samplecode',
                ]);
                $payment->save();

                //loop for each item to save purchase_items per seller
                foreach ($seller_items as $key => $item) {
                    // dd($item);
                    $purchaseItem = new PurchaseItem([
                        'purchase_id' => $purchase->id,
                        'product_id' => $item->product_id,
                        'quantity' => $item->quantity,
                        'total_price' => $item->total_price,
                    ]);
                    $purchaseItem->save();
                }

                // create usernotification for each purchase
                $notification = new UserNotification([
                    'user_id' => $this->user_id,
                    'purchase_id' => $purchase->id,
                    'tag' => 'order_placed',
                    'title' => 'Order #'.$purchase->id.' Placed',
                    'message' => 'Our logistics partner will attempt parcel delivery within the day.',
                ]);
                $notification->save();
            }

            // remove the current Cart_items in database cuz itz purchased
            $cart_items = CartItem::where('user_id', $this->user_id)->get();
            foreach ($cart_items as $key => $value) {
                CartItem::destroy($value->id);
            }

            session()->flash('notification', 'Order Purchased, Thank you!');

            return redirect(route('index_shop'));
        }
        // saving purchase for ONE item
        else {
            $product = Product::find($this->product_id);

            //generate reference number for purchase
            $puchase_reference_number = ReferenceGeneratorHelper::generateReferenceString();

            $purchase = new Purchase([
                'user_id' => $this->user_id,
                'seller_id' => $product->seller_id,
                'reference_number' => $puchase_reference_number,
                'purchase_date' => now(),
                'total_amount' => $this->total,
                'purchase_status' => 'pending',
            ]);
            $purchase->save();

            $payment = new Payment([
                'user_id' => $this->user_id,
                'purchase_id' => $purchase->id,
                'date_of_payment' => now(),
                'payment_type' => $this->payment_type,
                'payment_status' => 'paid',
                'reference_code' => '#samplecode',
            ]);
            $payment->save();

            $purchaseItem = new PurchaseItem([
                'purchase_id' => $purchase->id,
                'product_id' => $this->product_id,
                'quantity' => $this->quantity,
                'total_price' => $this->subtotal,
            ]);
            $purchaseItem->save();

            $notification = new UserNotification([
                'user_id' => $this->user_id,
                'purchase_id' => $purchase->id,
                'tag' => 'order_placed',
                'title' => 'Order #'.$purchase->id.' Placed',
                'message' => 'Our logistics partner will attempt parcel delivery within the day.',
            ]);
            $notification->save();

            session()->flash('notification', 'Order Purchased, Thank you!');

            return redirect(route('product_detail', [
                'product_id' => $this->product_id,
                'category' => $this->category,
            ]));
        }
    }
}
