<?php

namespace App\Livewire\Gcash;

use App\Helpers\ReferenceGeneratorHelper;
use App\Helpers\ShippingHelper;
use App\Models\CartItem;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\Shipments;
use App\Models\UserNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Gcash3 extends Component
{
    public $is_cart;

    public $user_id;

    public $user;

    public $product_id;

    public $quantity;

    public $shipping_value_purchaseone;

    public $subtotal;

    public $total;

    public $category;

    public $payment_type;

    public function mount(Request $request)
    {
        $this->is_cart = $request->is_cart;
        $this->user_id = Auth::id();
        $this->user = Auth::user($this->user_id);
        $this->product_id = $request->product_id;
        $this->quantity = $request->quantity;
        $this->shipping_value_purchaseone = $request->shipping_value_purchaseone;
        $this->subtotal = $request->subtotal;
        $this->total = $request->total;
        $this->category = $request->category;
        $this->payment_type = $request->payment_type;

        // dd($this->shipping_value_purchaseone);
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
            $cartitems_shippingfee_per_seller = 0;

            //generate reference number for purchase
            $puchase_reference_number = ReferenceGeneratorHelper::generateReferenceString();

            // loop for each seller to save purchase per seller
            foreach ($cartitems_per_seller as $key => $seller_items) {
                // dd($seller_items);

                $seller_items_weight_sum = 0;
                $seller_items_subtotal = 0;

                //loop for each item to save purchase_items per seller
                foreach ($seller_items as $sum_key => $item) {
                    // sum of weight of all items
                    $seller_items_weight_sum += $item->product->weight;
                    $seller_items_subtotal += $item->total_price;
                }

                $cartitems_shippingfee_per_seller = ShippingHelper::computeShipping($seller_items_weight_sum);

                //get total_amount of current seller_items
                $seller_items_subtotal = $seller_items_subtotal;
                // dd($cartitems_shippingfee_per_seller);
                $total_amount = $seller_items_subtotal + $cartitems_shippingfee_per_seller;
                // dd($total_amount);


                $purchase = new Purchase([
                    'user_id' => $this->user_id,
                    'seller_id' => $key,
                    'reference_number' => $puchase_reference_number,
                    'purchase_date' => now(),
                    'shipping_fee' => $cartitems_shippingfee_per_seller,
                    'total_amount' => $total_amount,
                    'purchase_status' => 'pending',
                ]);
                $purchase->save();


                $shipment = new Shipments([
                    'shipment_number' => random_int(10000000, 99999999),
                    'purchase_id' => $purchase->id,
                    'user_id' => $this->user->id,
                    'seller_id' => $key,
                    'email' => $this->user->email,
                    'phone_number' => $this->user->phone_number,
                    'shipment_status' => 'to_ship',
                    'street_address_1' => $this->user->street_address_1,
                    'state_province' => $this->user->state_province,
                    'city' => $this->user->city,
                    'postal_code' => $this->user->postal_code,
                    'country' => $this->user->country,
                ]);
                $shipment->save();


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

                    // minus 1 to product stock
                    $item->product->update([
                        'stock' => $item->stock - 1,
                    ]);
                }

                // create usernotification for each purchase
                $notification = new UserNotification([
                    'user_id' => $this->user_id,
                    'purchase_id' => $purchase->id,
                    'tag' => 'order_placed',
                    'title' => 'Order #' . $purchase->id . ' Placed',
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
                'shipping_fee' => $this->shipping_value_purchaseone,
                'total_amount' => $this->total,
                'purchase_status' => 'pending',
            ]);
            $purchase->save();


            $shipment = new Shipments([
                'shipment_number' => random_int(10000000, 99999999),
                'purchase_id' => $purchase->id,
                'user_id' => $this->user->id,
                'seller_id' => $product->seller_id,
                'email' => $this->user->email,
                'phone_number' => $this->user->phone_number,
                'shipment_status' => 'to_ship',
                'street_address_1' => $this->user->street_address_1,
                'state_province' => $this->user->state_province,
                'city' => $this->user->city,
                'postal_code' => $this->user->postal_code,
                'country' => $this->user->country,
            ]);
            $shipment->save();


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

            // minus 1 to product stock
            $product->update([
                'stock' => $product->stock - 1,
            ]);


            $notification = new UserNotification([
                'user_id' => $this->user_id,
                'purchase_id' => $purchase->id,
                'tag' => 'order_placed',
                'title' => 'Order #' . $purchase->id . ' Placed',
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
