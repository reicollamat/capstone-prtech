<?php

namespace App\Livewire\Seller\Dashboard\ProductLinks;

use App\Models\Product;
use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.seller.seller-layout')]
class ProductList extends Component
{
    use WithPagination;

    //    public $totalProductCount;

    public function mount()
    {

    }

    #[Computed]
    public function getTotalProductCount()
    {
        return $totalProductCount = Product::count();
    }

    #[Computed]
    public function getProductList()
    {
        return $products = Product::cursorPaginate(20);
    }

    public function render()
    {
        return view('livewire..seller.dashboard.product-links.product-list');
    }
}
