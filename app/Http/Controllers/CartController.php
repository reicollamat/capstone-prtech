<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            $user = Auth::user();
            return view('pages.profile.cart');
        }
        else
        {
            return redirect('login');
        }
        
    }
}
