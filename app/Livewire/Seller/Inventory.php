<?php

namespace App\Livewire\Seller;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Inventory extends Component
{
    use WithPagination;

    public function render()
    {
        $all_products = Product::paginate(10);

        return view('livewire.seller.inventory', [
            'products' => $all_products,
        ]);
    }
}
