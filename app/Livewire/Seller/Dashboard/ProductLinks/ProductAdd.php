<?php

namespace App\Livewire\Seller\Dashboard\ProductLinks;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.seller.seller-layout')]
class ProductAdd extends Component
{
    public $view = 'component.category-component.placeholder-component';

    public array $categoryViewMap = [

    ];

    public $productCategory;

    public function changeCategoryView($category)
    {
        $this->productCategory = $category;
        $this->view = '';
    }

    public function mount()
    {
        //        $this->view = 'test';
    }

    public function render()
    {
        return view('livewire..seller.dashboard.product-links.product-add');
    }
}
