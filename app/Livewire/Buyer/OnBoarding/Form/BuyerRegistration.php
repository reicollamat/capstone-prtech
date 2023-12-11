<?php

namespace App\Livewire\Buyer\OnBoarding\Form;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('livewire.seller.auth.auth-layout')]
#[Title('Account Registration')]
class BuyerRegistration extends Component
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
    #[Rule('date', message: 'Please provide a valid Birthdate')]
    #[Rule('before: today', message: 'Your Birthdate cannot be in the future or today')]
    #[Rule('before_or_equal: -18 years', message: 'You must be at least 18 years old')]
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
        //        $this->userid = 1;

        $user = Auth::user();

        // lastly for checking, if not signed in user tries to access this page redirect them so signup
        if ($user == null) {
            return redirect()->route('register');
        }

        // get the email value of user and set it to user_email input and disables it
        if ($user != null) {
            $this->user_email = $user->email;
        }

        // this will check if first_name and last_name in the database has been filled and will redirect to landing
        // if not page will be displayed

        //         redirect the user if the information here is already filled
        if ($user->first_name != null | $user->last_name != null) {
            return redirect()->route('index_landing');
        }

    }

    public function render()
    {
        return view('livewire..buyer.on-boarding.form.buyer-registration');
    }

    public function RegistrationForm()
    {
        //        dd('im clicked');
        //        sleep(10);
        $validator = $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'user_email' => 'required',
            'user_phone' => 'required',
            'user_birthdate' => 'required|date|before: today|before_or_equal: -18 years',
            'user_sex' => 'required',
            'user_address_1' => 'required',
            'user_address_2' => '',
            'user_city' => 'required',
            'user_state_province' => 'required',
            'user_zip_postal' => 'required',
        ]);

        // dd($validator);

        if ($validator) {
            $user = User::find($this->userid)->update([
                'first_name' => $validator['first_name'],
                'last_name' => $validator['last_name'],
                'email' => $validator['user_email'],
                'phone_number' => $validator['user_phone'],
                'birthdate' => $validator['user_birthdate'],
                'sex' => $validator['user_sex'],
                'street_address' => $validator['user_address_1'],
                'street_address_1' => $validator['user_address_1'],
                'street_address_2' => $validator['user_address_2'],
                'city' => $validator['user_city'],
                'postal_code' => $validator['user_zip_postal'],
                'state_province' => $validator['user_state_province'],
            ]);
            if ($user) {
                // TODO: add a modal or confirmaiton on ui that query is sucess before redirecting to shop information page
                $this->redirect(route('index_landing'));
            } else {
                $this->redirect(abort(505, 'Something went wrong!'));
            }
        }
    }

    public function delete(User $user)
    {

    }
}
