<?php

namespace App\Livewire\Seller\Auth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('livewire.seller.auth.auth-layout')]
#[Title('Seller Login')]
class LoginPage extends Component
{
    #[Validate('required|string', message: 'Please provide a Username or Email Address')]
    public $email;

    #[Validate('required', message: 'Please provide a Password ')]
    public $password;

    public function render()
    {
        return view('livewire..seller.auth.login-page');
    }

    public function submit()
    {
        //TODO: validate this on the seller table, if account is not found in seller table flash message,
        // no associated seller account is present.

        $validation = $this->validate([
            'email' => 'required|string|exists:users,email',
            'password' => 'required|string'],
            [
                'email.exists' => 'Email already exists. Please try with different email address.',
            ]);

        if ($validation) {
            $user = User::where('email', $validation['email'])->orWhere('name', $validation['email'])->first();

            // dd($user);

            if (! $user) {
                session()->flash('accountlogin', 'Invalid Credentials. Please try again.');
            }
            // dd($user);

            if (Auth::attempt(['email' => $validation['email'], 'password' => $validation['password']]) ||
                Auth::attempt(['name' => $validation['email'], 'password' => $validation['password']])) {
                Auth::loginUsingId($user->id);

                session()->regenerate();

                $this->redirect(route('seller-landing'));
            } else {
                session()->flash('accountlogin', 'Invalid Credentials. Please try again.');
            }

            // if ($user) {
            //
            //     session()->regenerate();
            //
            //     $this->redirect(route('seller-landing'));
            // } else {
            //     // TODO: show error like no record found in database or laravel eloquest where email and password
            //     session()->flash('accountlogin', 'Something went wrong, Please try again.'.$user);
            // }
        } else {
            session()->flash('accountlogin', 'Something went wrong, Please try again.');
        }
    }
}
