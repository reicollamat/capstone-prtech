<?php

namespace App\Livewire\Seller\Auth;

use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Session;
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


    public function rules()
    {
        return [
            'email' => 'required|unique:users,email|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'The :attribute are missing.',
            'password.required' => 'The :attribute are missing.',
            'confirm_password.required' => 'The :attribute are missing.',
            'confirm_password.same' => 'The :attribute does not match.',
        ];
    }

    public function save()
    {
        // failsafe when server error internally
        if ($this->validate()->fails()) {
            $this->redirect(abort(500, 'Something went wrong'));
        }

        // check if email is already exist
        if (User::where('email', $this->email)->exists()) {
            session()->flash('accountregistration', 'Email Already Exists. Please Sign In Instead.');
        }


    }

    public function render()
    {
        return view('livewire..seller.auth.register-page');
    }
}
