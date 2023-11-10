<?php

namespace App\Livewire\Seller\Auth;

use App\Models\SellerAccount;
use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('livewire.seller.auth.auth-layout')]
#[Title('Seller Signup')]
class RegisterPage extends Component
{
    #[Rule('required|min:3', message: 'Please provide a Username')]
    public $username;

    #[Rule('required', message: 'Please provide a Email Address')]
    public $email;

    #[Rule('required', message: 'Please provide a Password ')]
    public $password;
    #[Rule('required|same:password', message: 'Please provide the same Password as above')]
    public $confirm_password;


    public function rules()
    {
        return [
            'username' => 'required|min:3',
            'email' => 'required|unique:users,email|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'The :attribute are missing.',
            'email.required' => 'The :attribute are missing.',
            'password.required' => 'The :attribute are missing.',
            'confirm_password.required' => 'The :attribute are missing.',
            'confirm_password.same' => 'The :attribute does not match.',
        ];
    }

    public function save()
    {

        $validation = $this->validate([
            'email' => 'required',
            'password' => 'required',
        ]);


        if ($validation) {

            // check if email is already exist
            if (User::where('email', $this->email)->exists()) {
                session()->flash('accountregistration', 'Email Already Exists. Please Sign In Instead.');
            } else {
                $account = User::create([
                    'name' => $this->username,
                    'email' => $this->email,
                    'password' => Hash::make($this->password),
                ]);
                if ($account) {
                    $user = Auth::attempt($validation);
                    if ($user) {

                        // redirect to comlpete account details in seller
                        $this->redirect(route('seller-registration'));
                    } else {
                        // TODO: show error like no record found in database or laravel eloquest where email and password
                        session()->flash('accountregistration', 'Something went wrong, Please try again.');
                    }
                }
            }
            //            dd($validation);
        } else {
            session()->flash('accountregistration', 'An error occurred. Please try again.');
        }


    }

    public function render()
    {
        return view('livewire..seller.auth.register-page');
    }
}
