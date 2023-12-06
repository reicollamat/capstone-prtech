<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\User;
use App\Models\UserNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function purchase_page(Request $request)
    {
        // dd($request->cartitems);
        if ($request->cart) {
            // dd($request);
            $cartitems = $request->cartitems;
            $user = User::find($request->user);
            $shipping_value = $request->shipping_value;
            $subtotal = $request->subtotal;
            $total = $request->total;
            // dd($user);

            return view('pages.cartpurchase', [
                'cartitems' => $cartitems,
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
            $shipping_value = 13;
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
        $subtotal = $request->subtotal;
        $total = $request->total;
        $category = $request->category;
        $payment_type = $request->payment_type;
        $user_id = $request->user_id;

        // redirect here if payment = gcash
        if ($payment_type == 'gcash') {
            return redirect(route('gcash1', [
                'product_id' => $product_id,
                'quantity' => $quantity,
                'subtotal' => $subtotal,
                'total' => $total,
                'category' => $category,
                'payment_type' => $payment_type,
                'user_id' => $user_id,
            ]));
        }

        // Create a new Purchase instance
        $purchase = new Purchase([
            'user_id' => $user_id,
            'purchase_date' => now(),
            'total_amount' => $total,
            'purchase_status' => 'pending',
        ]);
        // Save the Purchase instance
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

        $purchaseItem = new PurchaseItem([
            'purchase_id' => $purchase->id,
            'product_id' => $product_id,
            'quantity' => $quantity,
            'total_price' => $subtotal,
        ]);
        $purchaseItem->save();

        $notification = new UserNotification([
            'user_id' => $user_id,
            'purchase_id' => $purchase->id,
            'tag' => 'order_placed',
            'title' => 'Order #' . $purchase->id . ' Placed',
            'message' => 'Our logistics partner will attempt parcel delivery within the day. Keep your lines open and prepare exact payment for COD transaction.',
        ]);
        $notification->save();

        Session::flash('notification', 'Order Purchased, Thank you!');

        return redirect(route('product_detail', [
            'product_id' => $product_id,
            'category' => $category,
        ]));
    }

    public function purchase_cart(Request $request)
    {
        // dd($request->payment_type);
        $cart_ids = $request->cart_ids;
        $subtotal = $request->subtotal;
        $total = $request->total;
        $payment_type = $request->payment_type;
        $user_id = $request->user_id;

        // redirect here if payment = gcash
        if ($payment_type == 'gcash') {
            // dd($cart_ids);
            return redirect(route('gcash1', [
                'cart_ids[]' => $cart_ids,
                'subtotal' => $subtotal,
                'total' => $total,
                'payment_type' => $payment_type,
                'user_id' => $user_id,
            ]));
        }

        $cart_items = CartItem::whereIn('id', $cart_ids)->get();

        // create a new Purchase instance
        $purchase = new Purchase([
            'user_id' => $user_id,
            'purchase_date' => now(),
            'total_amount' => $total,
            'purchase_status' => 'pending',
        ]);
        $purchase->save(); // save the Purchase instance

        // create a new Payment instance
        $payment = new Payment([
            'user_id' => $user_id,
            'purchase_id' => $purchase->id,
            'date_of_payment' => null,
            'payment_type' => $payment_type,
            'payment_status' => 'unpaid',
            'reference_code' => '#samplecode',
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

        $notification = new UserNotification([
            'user_id' => $user_id,
            'purchase_id' => $purchase->id,
            'tag' => 'order_placed',
            'title' => 'Order #' . $purchase->id . ' Placed',
            'message' => 'Our logistics partner will attempt parcel delivery within the day. Keep your lines open and prepare exact payment for COD transaction.',
        ]);
        $notification->save();

        // remove the current Cart_items in database cuz itz purchased
        foreach ($cart_items as $key => $value) {
            CartItem::destroy($value->id);
        }

        Session::flash('notification', 'Order Purchased, Thank you!');

        return redirect(route('index_shop'));
    }
}
