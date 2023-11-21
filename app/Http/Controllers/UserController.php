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
        // dd($request->query());
        $product_id = $request->product_id;
        $quantity = $request->quantity;
        $user_id = $request->user_id;

        $user = User::find($user_id);

        $product = Product::find($product_id);
        $shipping_value = 13;
        $subtotal = $product->price * $quantity;
        $total = $subtotal + $shipping_value;
        dd($quantity);

        return view('pages.purchase', [
            'product' => $product,
            'quantity' => $quantity,
            'user' => $user,
            'shipping_value' => $shipping_value,
            'subtotal' => $subtotal,
            'total' => $total,
        ]);
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

        Session::flash('message', 'Purchased Order');
        Session::flash('alert-class', 'alert-danger');

        return redirect(route('product_detail', [
            'product_id' => $product_id,
            'category' => $category,
        ]))->with('message', 'Purchased Order, Thank you!')->with('alert-class', 'alert-danger');
    }

    public function purchasecart_page(Request $request)
    {
        // dd($request->cart_ids);
        $cart_ids = $request->cart_ids;
        $user_id = $request->user_id;

        $user = User::find($user_id);
        $cart_items = CartItem::whereIn('id', $cart_ids)->get();
        $products = Product::all();
        $shipping_value = 13;
        $subtotal = $cart_items->sum('total_price');
        $total = $subtotal + $shipping_value;

        return view('pages.profile.cartpurchase', [
            'products' => $products,
            'cart_items' => $cart_items,
            'user' => $user,
            'shipping_value' => $shipping_value,
            'subtotal' => $subtotal,
            'total' => $total,
        ]);
    }

    public function purchase_cart(Request $request)
    {
        $cart_ids = $request->cart_ids;
        // $quantity = $request->quantity;
        $subtotal = $request->subtotal;
        $total = $request->total;
        // $category = $request->category;
        $payment_type = $request->payment_type;
        $user_id = $request->user_id;

        $cart_items = CartItem::whereIn('id', $cart_ids)->get();

        // Create a new Purchase instance
        $purchase = new Purchase([
            'user_id' => $user_id,
            'purchase_date' => now(),
            'total_amount' => $total,
            'purchase_status' => 'processing',
        ]);
        // Save the Purchase instance
        $purchase->save();

        foreach ($cart_items as $key => $value) {
            $purchaseItem = new PurchaseItem([
                'purchase_id' => $purchase->id,
                'product_id' => $value->product_id,
                'quantity' => $value->quantity,
                'total_price' => $value->total_price,
            ]);
            $purchaseItem->save();
        }

        $purchaseItem = new Payment([
            'user_id' => $user_id,
            'purchase_id' => $purchase->id,
            'date_of_payment' => now(),
            'payment_type' => $payment_type,
            'payment_status' => 'paid',
        ]);
        $purchaseItem->save();

        foreach ($cart_items as $key => $value) {
            CartItem::destroy($value->id);
        }

        Session::flash('message', 'Purchased Order');
        Session::flash('alert-class', 'alert-danger');

        return redirect(route('index_cart', [
            'user_id' => $user_id,
        ]))->with('message', 'Purchased Order, Thank you!')->with('alert-class', 'alert-danger');
    }
}
