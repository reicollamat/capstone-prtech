<?php

namespace App\Livewire\Seller\Dashboard\ShopLinks;

use App\Models\Seller;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.seller.seller-layout')]
class ShopManagement extends Component
{
    public User $user;

    public Seller $seller;

    public function mount()
    {
        $this->user = auth()->user();
        $this->seller = $this->user->seller;
    }

    public function render()
    {
        return view('livewire..seller.dashboard.shop-links.shop-management');
    }
}
