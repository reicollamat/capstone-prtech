<?php

namespace App\Livewire\Wishlist;

use App\Models\Bookmark;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\On;
use Livewire\Component;

#[lazy]
class WishList extends Component
{
    public $user_id;
    public $wishlist_count = 0;

    public $bookmarks = [];

    public function placeholder()
    {
        return <<<'HTML'
            <div>
                <p1>loading...</p1>
            </div>
            HTML;
    }

    #[On('wishlist-item-change')]
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
        return view('livewire..wishlist.wish-list');
    }

    public function removebookmark(Bookmark $bookmark, $user_id)
    {
        //        dd($bookmark . $user_id);
        $bookmarkitem = Bookmark::where('id', $bookmark->id)->where('user_id', $user_id)->get();

        if (Auth::check()) {
            //            dd($bookmarkitem);

            Bookmark::destroy($bookmarkitem);

            sleep(0.5);
            $this->mount();

        }
    }
}
