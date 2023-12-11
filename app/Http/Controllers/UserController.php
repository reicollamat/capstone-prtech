<?php

namespace App\Http\Controllers;

use App\Helpers\ReferenceGeneratorHelper;
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
            $user = User::find($request->user);
            $shipping_value = $request->shipping_value;
            $subtotal = $request->subtotal;
            $total = $request->total;

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

            $shipping_value = 13; // Value displayed on the Cartpurchase page

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

        $product = Product::find($product_id);

        //generate reference number for purchase
        $puchase_reference_number = ReferenceGeneratorHelper::generateReferenceString();

        $purchase = new Purchase([
            'user_id' => $user_id,
            'seller_id' => $product->seller_id,
            'reference_number' => $puchase_reference_number,
            'purchase_date' => now(),
            'total_amount' => $total,
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
            'title' => 'Order #'.$purchase->id.' Placed',
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
        // dd($request->is_cart);
        $is_cart = $request->is_cart;
        $subtotal = $request->subtotal;
        $total = $request->total;
        $payment_type = $request->payment_type;
        $user_id = $request->user_id;

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

        // loop for each seller to save purchase per seller
        foreach ($cartitems_per_seller as $key => $seller_items) {
            // dd($seller_items);

            //get total_amount of current seller_items
            $total_amount = $seller_items->sum('total_price');

            //generate reference number for purchase
            $puchase_reference_number = ReferenceGeneratorHelper::generateReferenceString();

            $purchase = new Purchase([
                'user_id' => $user_id,
                'seller_id' => $key,
                'reference_number' => $puchase_reference_number,
                'purchase_date' => now(),
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
            }

            // create usernotification for each purchase
            $notification = new UserNotification([
                'user_id' => $user_id,
                'purchase_id' => $purchase->id,
                'tag' => 'order_placed',
                'title' => 'Order #'.$purchase->id.' Placed',
                'message' => 'Our logistics partner will attempt parcel delivery within the day. Keep your lines open and prepare exact payment for COD transaction.',
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
