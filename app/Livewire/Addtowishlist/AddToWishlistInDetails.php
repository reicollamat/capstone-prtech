<?php

namespace App\Livewire\Addtowishlist;

use App\Models\Bookmark;
use Auth;
use Livewire\Component;
use function Sodium\increment;

class AddToWishlistInDetails extends Component
{
    public $product_id;

    public function mount($product_id)
    {
        $this->product_id = $product_id;
    }

    public function render()
    {
        return view('livewire..addtowishlist.add-to-wishlist-in-details');
    }

    public function addToWishlist()
    {
        if (Auth::check()) {
            $user = Auth::user()->id;

            //            sleep(2);

            Bookmark::firstOrCreate(['user_id' => $user, 'product_id' => $this->product_id]);

            // create an event to update the count of wihshlist items
            $this->dispatch('wishlist-item-change');
        }
    }
}
