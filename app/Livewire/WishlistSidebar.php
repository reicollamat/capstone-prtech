<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WishlistSidebar extends Component
{


    public $user_id;
    public $wishlist_count = 0;

    public $bookmarks = [];

    public function mount()
    {

        if (Auth::check()) {
            $this->user_id = Auth::id();

            $this->bookmarks = Product::join('bookmarks', 'products.id', '=', 'bookmarks.product_id')
                ->where('user_id', $this->user_id)
                ->get();

            $this->wishlist_count = count($this->bookmarks);
        }


    }

    public function render()
    {
        return view('livewire.wishlist-sidebar');
    }
}
