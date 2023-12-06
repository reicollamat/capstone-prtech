<?php

namespace App\Livewire\Seller\OnBoarding\Form;

use App\Models\SellerShopMetrics;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('livewire.seller.auth.auth-layout')]
#[Title('Shop Information')]
class ShopInformation extends Component
{
    use LivewireAlert;

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
        // check if the user is already a seller and
        // if (Auth::user()->is_seller) {
        //     // if (User::find($user->id)->seller == null) {
        //     //     dd('test');
        //     //     // $this->redirect(route('seller-landing'));
        //     //
        //     // }
        // } else {
        //     // return $this->redirect(route('seller-signup'));
        // }

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
        $validator = $this->validate(
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

        // dd($user);

        try {
            // create a seller information account using the $user model
            $seller = $user->seller()->create(
                [
                    'shop_name' => $this->shop_name,
                    'shop_email' => $user->email,
                    'shop_phone_number' => $this->shop_phone,
                    'shop_address' => $this->shop_address,
                    'shop_city' => $this->shop_city,
                    'shop_state_province' => $this->shop_state_province,
                    'shop_postal_code' => $this->shop_zip_code,
                    'registered_business_name' => $this->registered_name,
                    'registered_address' => $this->registered_address,
                    'registered_city' => $this->registered_city,
                    'registered_state_province' => $this->registered_state_province,
                    'registered_postal_code' => $this->registered_zip_code,
                ]
            );

            $seller_metrics = SellerShopMetrics::create([
                'seller_id' => $seller->id,
            ]);

            if ($seller && $seller_metrics) {
                $this->alert('success', 'Shop information created successfully',[
                    'position' => 'center',
                    'toast' => false,
                ]);

                // change the form to 3rd step if validation is passed
                $this->currentStep = 3;

            } else {
                $this->redirect(abort(500, 'Something went wrong!'));
            }

            //         set the is_seller to true
            $user->update(['is_seller' => true]);

        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }



    }

    // public function testalert()
    // {
    //     $this->alert('success', 'Shop information created successfully',[
    //         'position' => 'center',
    //         'toast' => false,
    //     ]);
    // }
}
