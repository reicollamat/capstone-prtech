<?php

namespace App\Livewire\Seller\Dashboard\ShipmentLinks;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.seller.seller-layout')]
class ShipmentList extends Component
{
    public function render()
    {
        return view('livewire..seller.dashboard.shipment-links.shipment-list');
    }
}
