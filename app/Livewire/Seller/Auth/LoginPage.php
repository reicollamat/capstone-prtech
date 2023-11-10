<?php

namespace App\Livewire\Seller\Auth;

use Illuminate\Support\Facades\Auth;
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
        $validation = $this->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validation) {
            $user = Auth::attempt($validation);
            if ($user) {
                $this->redirect(route('seller_dashboard'));
            } else {
                // TODO: show error like no record found in database or laravel eloquest where email and password
                session()->flash('accountlogin', 'Something went wrong, Please try again.');
            }
        } else {
            session()->flash('accountlogin', 'Something went wrong, Please try again.');
        }
    }
}
