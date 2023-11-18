<?php

namespace App\Livewire\Seller\Dashboard\ProductLinks;

use App\Models\Product;
use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.seller.seller-layout')]
class ProductList extends Component
{
    use WithPagination;

    //    public $totalProductCount;

    public $stock_filter;
    public $category_filter;
    public $brand_filter;
    public $quick_search_filter;
    public $select_products = [];


    public function mount()
    {

    }

    #[Computed]
    public function getTotalProductCount()
    {
        return $totalProductCount = Product::count();
    }


    //    public function test()
    //    {
    //        $this->nextPage();
    //    }

    //    public function updatedPage($page)
    //    {
    //        //        $this->resetPage();
    //        $this->dispatch('page-updated');
    //    }

    //    public function updatedquick_search_filter()
    //    {
    //        dd('test');
    //    }
    public function updated($quick_search_filter)
    {
        // $property: The name of the current property that was updated

        $this->resetPage();
    }


    #[Computed]
    public function getProductList()
    {

        if ($this->quick_search_filter) {

            return $products = Product::where('title', 'ilike', "%{$this->quick_search_filter}%")->cursorPaginate(10);

        } else {

            return $products = Product::cursorPaginate(10);
        }

    }


    public function render()
    {
        return view('livewire..seller.dashboard.product-links.product-list');
    }
}
