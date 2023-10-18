<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BookmarkController extends Controller
{
    public function index_bookmark()
    {
        if (Auth::check()) {
            $user = Auth::user();

//            dd(gettype($user->id));

            $bookmarks = Product::join('bookmarks', 'products.id', '=', 'bookmarks.product_id')
                ->where('user_id', $user->id)
                ->get();


            return view('pages.profile.bookmark', [
                'bookmarks' => $bookmarks,
                'id' => $user->id,
            ]);
        } else {
            return redirect('login');
        }
    }

    public function add_bookmark(Request $request)
    {
        $user_id = $request->user_id;
        $product_id = $request->product_id;

        // dd($product_id);
        Bookmark::create([
            'user_id' => $user_id,
            'product_id' => $product_id,
        ]);

        $category = Product::find($product_id)->category;

        Session::flash('message', 'Add Bookmark Success');
        Session::flash('alert-class', 'alert-danger');

        return redirect(route('product_detail', [
            'product_id' => $product_id,
            'category' => $category,
        ]))->with('message', 'Added to Bookmark!')->with('alert-class', 'alert-danger');
    }

    public function remove_bookmark(Request $request)
    {
        $bookmark_id = $request->bookmark_id;
        $user_id = $request->user_id;
        // dd($bookmark_id);

        $bookmark = Bookmark::find($bookmark_id);

        Bookmark::destroy($bookmark_id);

        return redirect(route('index_bookmark'));
    }
}
