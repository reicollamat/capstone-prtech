<?php

namespace App\Livewire\Seller\OnBoarding\Form;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('livewire.seller.auth.auth-layout')]
#[Title('PR-TECH')]
class ShopSuccess extends Component
{
    public function render()
    {
        return view('livewire..seller.on-boarding.form.shop-success');
    }
}
