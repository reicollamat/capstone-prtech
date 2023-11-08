<?php

namespace App\Livewire\Seller\OnBoarding\Form;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('livewire.seller.auth.auth-layout')]
#[Title('Seller Registration')]
class SellerRegistration extends Component
{
    public function render()
    {
        return view('livewire..seller.on-boarding.form.seller-registration');
    }
}
