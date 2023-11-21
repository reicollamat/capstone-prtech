<?php

namespace App\Livewire\Seller\OnBoarding\Form;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('livewire.seller.auth.auth-layout')]
#[Title('Shop Information')]
class ShopInformation extends Component
{
    public $currentStep;

    public $minStep = 1;

    public $totalSteps = 3;

    public $shop_name;

    public $shop_email;

    public $shop_phone;

    public $shop_address;

    public $shop_city;

    public $shop_state_province;

    public $shop_zip_code;

    public $registered_name;

    public $registered_address;

    public $registered_city;

    public $registered_state_province;

    public $registered_zip_code;

    #[Locked]
    public $user_id;

    public function mount()
    {
        $this->currentStep = 1;

        $user = Auth::user() ?? null;

        //         get the email value of user and set it to user_email input and disables it
        if ($user) {
            $this->user_id = $user->id;
            $this->shop_email = $user->email;
        }

    }

    public function render()
    {
        return view('livewire..seller.on-boarding.form.shop-information');
    }

    public function move()
    {
        if ($this->currentStep < $this->totalSteps) {
            $this->currentStep++;
        } else {
            $this->currentStep = $this->minStep;
        }
    }

    public function FirstStepSubmit()
    {
        $this->validate(
            [
                'shop_name' => 'required',
                'shop_email' => 'required',
                'shop_phone' => 'required',
                'shop_address' => 'required',
                'shop_city' => 'required',
                'shop_state_province' => 'required',
                'shop_zip_code' => 'required',
            ]
        );

        // change the form to 2nd step if validation is passed
        $this->currentStep = 2;

    }

    public function SecondStepSubmit()
    {
        $this->validate(
            [
                'registered_name' => 'required',
                'registered_address' => 'required',
                'registered_city' => 'required',
                'registered_state_province' => 'required',
                'registered_zip_code' => 'required',
            ]
        );
        sleep(0.5);

        // add here the database query for creation of seller shop information.
        //        dd($this->user_id);

        $user = User::find($this->user_id);

        try {
            // create a seller information account using the $user model
            $user->seller()->create(
                [
                    'shop_name' => 'required',
                    'shop_email' => $user->email,
                    'shop_phone_number' => 'required',
                    'shop_address' => 'required',
                    'shop_city' => 'required',
                    'shop_state_province' => 'required',
                    'shop_postal_code' => 'required',
                    'registered_business_name' => 'required',
                    'registered_address' => 'required',
                    'registered_city' => 'required',
                    'registered_state_province' => 'required',
                    'registered_postal_code' => 'required',
                ]
            );

            //         set the is_seller to true
            $user->update(['is_seller' => true]);

        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }

        // change the form to 3rd step if validation is passed
        $this->currentStep = 3;

    }
}
