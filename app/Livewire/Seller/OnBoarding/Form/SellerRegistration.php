<?php

namespace App\Livewire\Seller\OnBoarding\Form;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('livewire.seller.auth.auth-layout')]
#[Title('Seller Registration')]
class SellerRegistration extends Component
{
    #[Locked]
    public $userid;

    #[Rule('required', message: 'Please provide First Name')]
    public $first_name;

    #[Rule('required', message: 'Please provide Last Name')]
    public $last_name;

    #[Rule('required', message: 'Please provide Email Address')]
    public $user_email;

    #[Rule('required', message: 'Please provide Phone Number')]
    public $user_phone;

    #[Rule('required', message: 'Please provide you Birthdate')]
    public $user_birthdate;

    #[Rule('required', message: 'Please provide Sex/Gender')]
    public $user_sex;

    #[Rule('required', message: 'Please provide Valid Address')]
    public $user_address_1;

    public $user_address_2;

    #[Rule('required', message: 'Please provide your City Name')]
    public $user_city;

    #[Rule('required', message: 'Please provide your State/Province')]
    public $user_state_province;

    #[Rule('required', message: 'Please provide your Zip/Postal Code')]
    public $user_zip_postal;


    public function mount()
    {
        $this->userid = Auth::user()->id ?? null;

        $user = User::find($this->userid);

        if ($user != null) {
            $this->user_email = $user->email;
        }
    }

    public function render()
    {
        return view('livewire..seller.on-boarding.form.seller-registration');
    }

    public function RegistrationForm()
    {
        $validator = $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'user_email' => 'required',
            'user_phone' => 'required',
            'user_birthdate' => 'required',
            'user_sex' => 'required',
            'user_address_1' => 'required',
            'user_city' => 'required',
            'user_state_province' => 'required',
            'user_zip_postal' => 'required',
        ]);

        if ($validator) {
            //            dd($validator['user_address_1'] . $this->user_address_2);
            $user = User::find($this->userid)->update([
                'first_name' => $validator['first_name'],
                'last_name' => $validator['last_name'],
                'email' => $validator['user_email'],
                'phone_number' => $validator['user_phone'],
                //                'birthdate' => $validator['user_birthdate'],
                //                'sex' => $validator['user_sex'],
                'street_address' => $validator['user_address_1'],
                'city' => $validator['user_city'],
                'postal_code' => $validator['user_zip_postal'],
                //                'country' => $validator['user_state_province'],
            ]);
            if ($user) {
                // TODO: add a modal or confirmaiton on ui that query is sucess before redirecting to shop information page
                dd($user);
            }
        }


    }
}
