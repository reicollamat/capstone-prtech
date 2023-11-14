<?php

namespace App\Livewire\Seller\Dashboard;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.seller.seller-layout')]
class SellerLanding extends Component
{
    public function render()
    {
        return view('livewire..seller.dashboard.seller-landing');
    }
}
