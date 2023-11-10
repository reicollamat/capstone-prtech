<?php

namespace App\Livewire\Seller\OnBoarding\Form;

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
    public $id;

    public function mount($id = null)
    {
        $this->currentStep = 1;
        $this->id = $id;

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
        // add here the database query for creation of seller shop information
        $this->currentStep = 3;


    }

}
