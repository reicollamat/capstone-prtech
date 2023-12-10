<?php

namespace App\Livewire\Seller\Dashboard\ShopLinks;

use Livewire\Attributes\Layout;
use Livewire\Component;
#[Layout('layouts.seller.seller-layout')]
class ShopMetricSettings extends Component
{
    public function render()
    {
        return view('livewire.seller.dashboard.shop-links.shop-metric-settings');
    }
}
