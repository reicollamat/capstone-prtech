<?php

namespace App\Livewire\Addtowishlist;

use App\Models\Bookmark;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;

class AddToWishlist extends Component
{
    public int $count = 0;

    public $product_id;

    public string|int|null $user_id = null;

    public bool $added_to_wishlist = false;

    /**
     * Mounts the product to the user's wishlist.
     *
     * @param  int  $product_id The ID of the product to mount.
     * @return void
     *
     * @throws Some_Exception_Class If the product cannot be mounted.
     */
    #[On('wishlist-item-remount')]
    public function mount($product_id)
    {
        $this->product_id = $product_id;

        $this->count = intval($product_id);

        // Check if there is a user logged in
        $this->user_id = Auth::user()->id ?? null;

        // Check if the product is already in the wishlist
        $bookmark_entry = DB::table('bookmarks')->where('user_id', $this->user_id)->where('product_id', $this->product_id)->first();

        // Check if the product is already in the wishlist and update bool to true
        if ($bookmark_entry) {
            $this->added_to_wishlist = true;
        }

    }

    public function render()
    {
        return view('livewire..addtowishlist.add-to-wishlist');
    }

    public function addtowishlist()
    {
        if (Auth::check()) {

            if (! $this->added_to_wishlist) {
                Bookmark::firstOrCreate(['user_id' => $this->user_id, 'product_id' => $this->product_id]);
                // create an event to update the count of wihshlist items
                $this->dispatch('wishlist-item-change');
            }
        } else {
            $this->redirect(route('login'));
        }
    }
}
