<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{
    public function index()
    {
        return view('pages.home');
    }


    // redirect to admin panel if the account has permission
    public function redirect()
    {
        $permissions = Auth::user()->permissions ?? '';

        // check permissions column
        if($permissions['platform.index'] == 0)
        {
            return redirect('/');
        }
        else
        {
            return redirect('/admin');
        }
    }
}
