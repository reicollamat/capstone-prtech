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


    public function redirect()
    {
        $permissions = Auth::user()->permissions;

        if($permissions == null)
        {
            return view('pages.home');
        }
        else
        {
            return redirect('/admin');
        }

    }
}
