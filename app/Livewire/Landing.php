<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Landing extends Component
{
    use WithPagination;

    public int $count = 0;

    public function mount()
    {

    }

    public function placeholder()
    {
        return <<<'HTML'
        <div>
            <p1>loading</p1>
        </div>
        HTML;
    }

    #[Computed]
    public function getProducts()
    {
        return Product::paginate(10);

    }

    public function render()
    {
        return view('livewire.landing');
    }

    #[On('wishlist-item-remount')]
    public function increment()
    {
        $this->count++;
    }
}
