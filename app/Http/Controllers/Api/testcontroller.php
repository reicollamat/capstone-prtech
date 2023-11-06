<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class testcontroller extends Controller
{
    //
    public function index(Request $request)
    {
        //        return Response()->json(Product::all());
        return Product::limit(10)->get();
        //        return 'hello';
    }

    //    public function show($id)
    //    {
    //        //        return Response()->json('hello');
    //        return Product::find($id);
    //    }
}
