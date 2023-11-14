<?php

namespace App\Livewire\Seller\Dashboard\ProductLinks;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.seller.seller-layout')]
class ProductAdd extends Component
{
    public function render()
    {
        return view('livewire..seller.dashboard.product-links.product-add');
    }
}
