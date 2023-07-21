<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            $user = Auth::user();
            $products = Product::all();
            $shipping_value = 13;

            $cart_items = CartItem::where('user_id', $user->id)->get();
            $subtotal = $cart_items->sum('total_price');
            $total = $subtotal + $shipping_value;


            return view('pages.profile.cart', [
                'cart_items' => $cart_items,
                'products' => $products,
                'shipping_value' => $shipping_value,
                'subtotal' => $subtotal,
                'total' => $total,
            ]);
        }
        else
        {
            return redirect('login');
        }
        
    }

    public function add_to_cart(Request $request)
    {
        // dd($request->query());
        $product_id = $request->product_id;
        $quantity = $request->quantity;
        $category = $request->category;
        $user_id = $request->user_id;

        $total_price = $quantity * Product::find($product_id)->price;

        CartItem::create([
            'user_id' => $user_id,
            'product_id' => $product_id,
            'quantity' => $quantity,
            'total_price' => $total_price,
        ]);


        Session::flash('message', 'Add Cart Success');
        Session::flash('alert-class', 'alert-danger');

        return redirect(route('product_detail', [
            'product_id' => $product_id,
            'category' => $category,
        ]))->with('message', 'Added to Cart!')->with('alert-class', 'alert-danger');
    }

    public function remove_cart(Request $request)
    {
        $cart_id = $request->cart_id;
        $user_id = $request->user_id;
        // dd($cart_id);

        $cart_item = CartItem::find($cart_id);
        // dd($cart_item);
        CartItem::destroy($cart_id);

        return redirect(route('index_cart', [
            'user_id' => $user_id,
        ]));
    }
}
