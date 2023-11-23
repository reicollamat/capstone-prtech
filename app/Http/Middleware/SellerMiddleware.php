<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SellerMiddleware
{
    /**
     * Handle an incoming request.
     * this will handle the seller middleware if user is seller and will redirect to dashbaord if user is seller
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is logged in
        if (Auth::check()) {
            // Check if the user is a seller
            if (Auth::user()->is_seller) {
                // Check if the user has a seller account information, if none then redirect to seller information page to fill necessary infos
                if (User::find(Auth::user()->id)->seller == null) {
                    return redirect()->route('seller-shop-information');
                }

                return $next($request);
            } else {
                // Redirect to the seller registration page
                return redirect()->route('seller-shop-information');
            }
        }

        // Redirect to login if the user is not authenticated
        return redirect()->route('seller-signup');
    }
}
