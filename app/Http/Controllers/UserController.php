<?php

namespace App\Http\Controllers;

use App\Helpers\EmailHelper;
use App\Helpers\ReferenceGeneratorHelper;
use App\Helpers\ShippingHelper;
use App\Models\CartItem;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\User;
use App\Models\UserNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public string $mailStatus;

    public function purchase_page(Request $request)
    {
        // dd($request->cartitems);
        if ($request->cart) {
            // dd($request);
            $user = User::find($request->user);

            // get all CartItems from currect user
            $cartitems = CartItem::join('products', 'cart_items.product_id', '=', 'products.id')
                ->where('user_id', $user->id)
                ->get();
            // groupby seller lahat ng cartitems
            $cartitems_per_seller = $cartitems->groupBy('seller_id')->all();

            $cartitems_shippingfee_per_seller_sum = 0;

            // loop for each seller to sum product weight per purchase
            foreach ($cartitems_per_seller as $key => $seller_items) {
                // dd($seller_items);

                $seller_items_weight_sum = 0;

                //loop for each item to save purchase_items per seller
                foreach ($seller_items as $key => $item) {
                    // sum of weight of all items
                    $seller_items_weight_sum += $item->product->weight;
                }

                $cartitems_shippingfee_per_seller_sum += ShippingHelper::computeShipping($seller_items_weight_sum);
            }

            $shipping_value = $cartitems_shippingfee_per_seller_sum;
            $subtotal = $request->subtotal;
            $total = $subtotal + $shipping_value;

            return view('pages.cartpurchase', [
                'user' => $user,
                'shipping_value' => $shipping_value,
                'subtotal' => $subtotal,
                'total' => $total,
            ]);
        } else {
            $product_id = $request->product_id;
            $quantity = $request->quantity;
            $user_id = $request->user_id;

            $user = User::find($user_id);

            $product = Product::find($product_id);

            $shipping_value = ShippingHelper::computeShipping($product->weight); // Value displayed on the Cartpurchase page

            $subtotal = $product->price * $quantity;
            $total = $subtotal + $shipping_value;

            return view('pages.purchase', [
                'product' => $product,
                'quantity' => $quantity,
                'user' => $user,
                'shipping_value' => $shipping_value,
                'subtotal' => $subtotal,
                'total' => $total,
            ]);
        }
    }

    public function purchase_one(Request $request)
    {
        $product_id = $request->product_id;
        $quantity = $request->quantity;
        $shipping_value = $request->shipping_value;
        $subtotal = $request->subtotal;
        $total = $request->total;
        $category = $request->category;
        $payment_type = $request->payment_type;
        $user_id = $request->user_id;
        $user_email = Auth::user()->email; // Get the user Email

        // dd($subtotal);

        // redirect here if payment = gcash
        if ($payment_type == 'gcash') {
            return redirect(route('gcash1', [
                'product_id' => $product_id,
                'quantity' => $quantity,
                'shipping_value' => $shipping_value,
                'subtotal' => $subtotal,
                'total' => $total,
                'category' => $category,
                'payment_type' => $payment_type,
                'user_id' => $user_id,
            ]));
        }

        $product = Product::find($product_id);

        //generate reference number for purchase
        $puchase_reference_number = ReferenceGeneratorHelper::generateReferenceString();

        $purchase = new Purchase([
            'user_id' => $user_id,
            'seller_id' => $product->seller_id,
            'reference_number' => $puchase_reference_number,
            'purchase_date' => now(),
            'total_amount' => $total,
            'shipping_fee' => $shipping_value,
            'purchase_status' => 'pending',
        ]);
        $purchase->save();

        // dd($this->mailStatus);

        $payment = new Payment([
            'user_id' => $user_id,
            'purchase_id' => $purchase->id,
            'date_of_payment' => null,
            'payment_type' => $payment_type,
            'payment_status' => 'unpaid',
            'reference_code' => '#samplecode',
        ]);
        $payment->save();

        $purchaseItem = new PurchaseItem([
            'purchase_id' => $purchase->id,
            'product_id' => $product_id,
            'quantity' => $quantity,
            'total_price' => $subtotal,
        ]);
        $purchaseItem->save();

        // minus 1 to product stock
        $product->update([
            'stock' => $product->stock - 1,
        ]);

        // This handles the Email Creation and Sending of the Email to the respective User
        // first parameter is the email of the user
        // second parameter is the id of the Purchase
        // It will return a string of confirmation // TODO: handle the return string and show it or display it to the user
        // the returned string will be save to mailStatus property
        $this->mailStatus = EmailHelper::sendEmail(email: $user_email, orderId: $purchase->id);

        // dd($user_email . ' ' . $purchase->id);

        $notification = new UserNotification([
            'user_id' => $user_id,
            'purchase_id' => $purchase->id,
            'tag' => 'order_placed',
            'title' => 'Order #' . $purchase->id . ' Placed',
            'message' => 'An order has been placed' . $this->mailStatus,
        ]);
        $notification->save();

        Session::flash('notification', 'Order Purchased, Thank you! ' . $this->mailStatus);

        return redirect(route('product_detail', [
            'product_id' => $product_id,
            'category' => $category,
        ]));
    }

    public function purchase_cart(Request $request)
    {
        // dd($request->is_cart);
        $is_cart = $request->is_cart;
        $subtotal = $request->subtotal;
        $total = $request->total;
        $payment_type = $request->payment_type;
        $user_id = $request->user_id;
        $user_email = Auth::user()->email; // Get the user Email

        // redirect here if payment is GCASH
        if ($payment_type == 'gcash') {
            return redirect(route('gcash1', [
                'is_cart' => $is_cart,
                'subtotal' => $subtotal,
                'total' => $total,
                'payment_type' => $payment_type,
                'user_id' => $user_id,
            ]));
        }

        // get all CartItems from currect user
        $cartitems = CartItem::join('products', 'cart_items.product_id', '=', 'products.id')
            ->where('user_id', $user_id)
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
            // dd($seller_items_subtotal);
            $total_amount = $seller_items_subtotal + $cartitems_shippingfee_per_seller;
            // dd($total_amount);


            $purchase = new Purchase([
                'user_id' => $user_id,
                'seller_id' => $key,
                'reference_number' => $puchase_reference_number,
                'purchase_date' => now(),
                'shipping_fee' => $cartitems_shippingfee_per_seller,
                'total_amount' => $total_amount,
                'purchase_status' => 'pending',
            ]);
            $purchase->save();

            $payment = new Payment([
                'user_id' => $user_id,
                'purchase_id' => $purchase->id,
                'date_of_payment' => null,
                'payment_type' => $payment_type,
                'payment_status' => 'unpaid',
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

            // This handles the Email Creation and Sending of the Email to the respective User
            // first parameter is the email of the user
            // second parameter is the id of the Purchase
            // It will return a string of confirmation // TODO: handle the return string and show it or display it to the user
            // the returned string will be save to mailStatus property
            $this->mailStatus = EmailHelper::sendEmail(email: $user_email, orderId: $purchase->id);

            // create usernotification for each purchase
            $notification = new UserNotification([
                'user_id' => $user_id,
                'purchase_id' => $purchase->id,
                'tag' => 'order_placed',
                'title' => 'Order #' . $purchase->id . ' Placed',
                'message' => 'An order has been placed' . $this->mailStatus,
            ]);
            $notification->save();
        }

        // remove the current Cart_items in database cuz itz purchased
        $cart_items = CartItem::where('user_id', $user_id)->get();
        foreach ($cart_items as $key => $value) {
            CartItem::destroy($value->id);
        }

        Session::flash('notification', 'Order Purchased, Thank you!');

        return redirect(route('index_shop'));
    }
}
