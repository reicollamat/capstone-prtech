<?php

namespace App\Livewire\Seller\Dashboard\ProductLinks;

use App\Models\Product;
use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.seller.seller-layout')]
class ProductList extends Component
{
//    public $totalProductCount;

    public function mount()
    {

    }

    #[Computed]
    public function getTotalProductCount()
    {
        return $totalProductCount = Product::count();
    }

    public function render()
    {
        return view('livewire..seller.dashboard.product-links.product-list');
    }
}
