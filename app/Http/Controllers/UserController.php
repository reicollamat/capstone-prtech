<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function purchase_page(Request $request)
    {
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

        // dd($payment_type);

        // Create a new Purchase instance
        $purchase = new Purchase([
            'user_id' => $user_id,
            'purchase_date' => now(),
            'total_amount' => $total,
            'purchase_status' => 'processing',
        ]);
        // Save the Purchase instance
        $purchase->save();

        $purchaseItem = new PurchaseItem([
            'purchase_id' => $purchase->id,
            'product_id' => $product_id,
            'quantity' => $quantity,
            'total_price' => $subtotal,
        ]);
        $purchaseItem->save();

        $purchaseItem = new Payment([
            'user_id' => $user_id,
            'purchase_id' => $purchase->id,
            'date_of_payment' => now(),
            'payment_type' => $payment_type,
            'payment_status' => 'paid',
        ]);
        $purchaseItem->save();

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

        $cart_items = CartItem::whereIn('id', $cart_ids)->get();

        // create a new Purchase instance
        $purchase = new Purchase([
            'user_id' => $user_id,
            'purchase_date' => now(),
            'total_amount' => $total,
            'purchase_status' => 'processing',
        ]);
        $purchase->save(); // save the Purchase instance

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

        // create a new Payment instance
        $purchaseItem = new Payment([
            'user_id' => $user_id,
            'purchase_id' => $purchase->id,
            'date_of_payment' => now(),
            'payment_type' => $payment_type,
            'payment_status' => 'paid',
        ]);
        $purchaseItem->save(); // save the Payment instance

        // remove the current Cart_items in database cuz itz purchased
        foreach ($cart_items as $key => $value) {
            CartItem::destroy($value->id);
        }

        Session::flash('notification', 'Order Purchased, Thank you!');

        return redirect(route('index_shop'));
    }
}
