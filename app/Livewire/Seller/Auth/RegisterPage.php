<?php

namespace App\Livewire\Seller\Auth;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('livewire.seller.auth.auth-layout')]
#[Title('Seller Signup')]
class RegisterPage extends Component
{
    #[Rule('required', message: 'Please provide a Email Address')]
    public $email;

    #[Rule('required', message: 'Please provide a Password ')]
    public $password;
    #[Rule('required|same:password', message: 'Please provide the same Password as above')]
    public $confirm_password;

    public function save()
    {
        sleep(2);
    }

    public function render()
    {
        return view('livewire..seller.auth.register-page');
    }
}
