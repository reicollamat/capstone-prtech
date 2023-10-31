<?php

namespace App\Livewire\Addtowishlist;

use App\Models\Bookmark;
use Auth;
use Livewire\Component;

/*
 * @todo add an effect to notify the user if tthe item is already in wishlist
 * */

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
        //        dd($this->quantity, $this->user_id, $this->product_id);

        if (Auth::check()) {
            $user = Auth::user()->id;

            //            dd($this->product_id);

            Bookmark::firstOrCreate(['user_id' => $user, 'product_id' => $this->product_id]);

            // create an event to update the count of wihshlist items
            $this->dispatch('wishlist-item-change');
        } else {
            $this->redirect(route('login'));
        }
    }
}
