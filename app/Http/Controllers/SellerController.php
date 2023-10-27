<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function index()
    {
        return view('pages.seller-register');
    }

    public function dashboard()
    {
        return view('pages.seller.dashboard');
    }

    public function inventory()
    {
        $all_products = Product::paginate(10);

        return view('pages.seller.inventory', [
            'products' => $all_products,
        ]);
    }
}
