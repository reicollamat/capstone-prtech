<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use Illuminate\Support\Facades\Auth;

class PurchaseListController extends Controller
{
    public function purchase_list()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $products = Product::all();
            $purchase_items = PurchaseItem::all();

            $purchases = Purchase::where('user_id', $user->id)->get();

            return view('pages.profile.purchase_list', [
                'purchases' => $purchases,
                'products' => $products,
                'purchase_items' => $purchase_items,
            ]);
        } else {
            return redirect('login');
        }
    }
}
