<?php

namespace App\Livewire\Wishlist;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[lazy]
class Wishitems extends Component
{
    public string|int|null $user_id;

    public $bookmark;

    public function placeholder()
    {
        return <<<'HTML'
            <div>
                <div class="spinner-border spinner-border-sm" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        HTML;
    }

    public function mount($bookmark)
    {
        $this->user_id = Auth::id();

        $this->bookmark = $bookmark;
    }

    public function render()
    {
        //        dd($this->bookmark);
        //        sleep(3);
        return view('livewire..wishlist.wishitems');
    }

    public function remove()
    {
        $this->dispatch('wishlist-item-remove');
    }
}
