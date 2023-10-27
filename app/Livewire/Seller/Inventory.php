<?php

namespace App\Livewire\Seller;

use App\Models\Product;
use Livewire\Component;

class Inventory extends Component
{
    public function render()
    {
        $all_products = Product::paginate(10);

        return view('livewire.seller.inventory', [
            'products' => $all_products,
        ]);
    }
}
