<?php

namespace App\Livewire\Seller\Auth;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('livewire.seller.auth.auth-layout')]
#[Title('Seller Login')]
class LoginPage extends Component
{
    #[Rule('required', message: 'Please provide a Email Address')]
    public $email;

    #[Rule('required', message: 'Please provide a Password ')]
    public $password;

    public function render()
    {
        return view('livewire..seller.auth.login-page');
    }

    public function submit()
    {

    }
}
