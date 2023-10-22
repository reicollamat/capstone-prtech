<?php

namespace App\Livewire\Wishlist;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Wishlistcount extends Component
{
    public string|int|null $user_id;
    public int $wishlist_count = 0;
    /**
     * @var Product[]|\LaravelIdea\Helper\App\Models\_IH_Product_C
     */
    public $bookmarks = [];

    public function placeholder()
    {

    }
    public function mount()
    {
        if (Auth::check()) {
            $this->user_id = Auth::id();

            $this->wishlist_count = Product::join('bookmarks', 'products.id', '=', 'bookmarks.product_id')
                ->where('user_id', $this->user_id)
                ->count();
//            $this->wishlist_count = count($this->bookmarks);
        }

    }
    public function render()
    {
        return view('livewire..wishlist.wishlistcount');
    }
}
