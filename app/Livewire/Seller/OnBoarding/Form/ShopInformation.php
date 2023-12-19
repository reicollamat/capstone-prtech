<?php

namespace App\Livewire\Seller\OnBoarding\Form;

use App\Models\SellerShopMetrics;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Computed;
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

    // list for address select component
    #[Computed]
    public function getAddressList()
    {
        $address_list = [
            [
                'province' => 'select',
            ],
            [
                'province' => 'NCR',
                'cities' => [
                    'Caloocan', 'Las Piñas', 'Makati', 'Malabon', 'Mandaluyong', 'Manila',
                    'Marikina', 'Muntinlupa', 'Navotas', 'Parañaque', 'Pasay', 'Pasig',
                    'Pateros', 'Quezon City', 'San Juan', 'Taguig', 'Valenzuela',
                ],
            ],
            [
                'province' => 'Batangas',
                'cities' => [
                    'Agoncillo', 'Alitagtag', 'Balayan', 'Balete', 'Bauan', 'Calatagan',
                    'Cuenca', 'Ibaan', 'Laurel', 'Lemery', 'Lian', 'Lobo', 'Mabini',
                    'Malvar', 'Mataas na Kahoy', 'Nasugbu', 'Padre Garcia', 'Rosario',
                    'San Jose', 'San Juan', 'San Luis', 'San Nicolas', 'San Pascual',
                    'Santa Teresita', 'Taal', 'Talisay', 'Taysan', 'Tingloy', 'Tuy',
                ],
            ],
            [
                'province' => 'Benguet',
                'cities' => [
                    'Atok', 'Bakun', 'Bokod', 'Buguias', 'Itogon', 'Kabayan', 'Kapangan',
                    'Kibungan', 'La Trinidad', 'Mankayan', 'Sablan', 'Tuba', 'Tublay',
                ],
            ],
            [
                'province' => 'Bulacan',
                'cities' => [
                    'Angat', 'Balagtas', 'Baliwag', 'Bocaue', 'Bulakan', 'Bustos',
                    'Calumpit', 'Dona Remedios Trinidad', 'Guiguinto', 'Hagonoy',
                    'Malolos', 'Marilao', 'Meycauayan', 'Norzagaray', 'Obando',
                    'Pandi', 'Paombong', 'Plaridel', 'Pulilan', 'San Ildefonso',
                    'San Jose Del Monte', 'San Miguel', 'San Rafael', 'Santa Maria',
                ],
            ],
            [
                'province' => 'Cavite',
                'cities' => [
                    'Alfonso', 'Amadeo', 'Bacoor', 'Carmona', 'Cavite', 'Dasmariñas',
                    'General Emilio Aguinaldo', 'General Mariano Alvarez', 'General Trias',
                    'Imus', 'Indang', 'Kawit', 'Magallanes', 'Maragondon', 'Mendez',
                    'Naic', 'Noveleta', 'Rosario', 'Silang', 'Tagaytay', 'Tanza',
                    'Ternate', 'Trece Martires',
                ],
            ],
            [
                'province' => 'Cebu',
                'cities' => [
                    'Alcantara', 'Alcoy', 'Alegria', 'Aloguinsan', 'Argao', 'Asturias',
                    'Badian', 'Balamban', 'Bantayan', 'Barili', 'Boljoon', 'Borbon',
                    'Carmen', 'Catmon', 'Compostela', 'Consolacion', 'Cordova',
                    'Daanbantayan', 'Dalaguete', 'Dumanjug', 'Ginatilan', 'Liloan',
                    'Madridejos', 'Malabuyoc', 'Medellin', 'Minglanilla', 'Moalboal',
                    'Oslob', 'Pilar', 'Pinamungajan', 'Poro', 'Ronda', 'Samboan',
                    'San Fernando', 'San Francisco', 'San Remigio', 'Santa Fe',
                    'Santander', 'Sibonga', 'Sogod', 'Tabogon', 'Tabuelan', 'Tuburan',
                    'Tudela',
                ],
            ],
            [
                'province' => 'Davao',
                'cities' => [
                    'Asuncion', 'Baganga', 'Banaybanay', 'Boston', 'Braulio E. Dujali', 'Carmen', 'Caraga',
                    'Cateel', 'Compostela', 'Davao City', 'Digos', 'Don Marcelino', 'Governor', 'Hagonoy',
                    'Jose Abad', 'Kapalong', 'Lupon', 'Malita', 'Magsaysay', 'Manay', 'Mati', 'Panabo',
                    'San Isidro', 'Tagum',
                ],
            ],
            [
                'province' => 'Ilocos Norte',
                'cities' => [
                    'Adams', 'Bacarra', 'Badoc', 'Bangui', 'Banna', 'Batac',
                    'Burgos (IN)', 'Carasi', 'Currimao', 'Dingras', 'Dumalneg',
                    'Laoag', 'Marcos', 'Nueva Era', 'Pagudpud', 'Paoay',
                    'Pasuquin', 'Piddig', 'Pinili', 'San Nicolas (IN)', 'Sarrat',
                    'Solsona', 'Vintar',
                ],
            ],
            [
                'provice' => 'Ilocos Sur',
                'cities' => [
                    'Alilem', 'Banayoyo', 'Bantay', 'Burgos (IS)', 'Cabugao',
                    'Candon', 'Caoayan', 'Cervantes', 'Galimuyod', 'Gregorio Del Pilar',
                    'Lidlidda', 'Magsingal', 'Nagbukel', 'Narvacan', 'Quirino (IS)',
                    'Salcedo (IS)', 'San Emilio', 'San Esteban', 'San Ildefonso (IS)',
                    'San Juan (IS)', 'San Vicente (IS)', 'Santa', 'Santa Catalina (IS)',
                    'Santa Cruz (IS)', 'Santa Lucia', 'Santa Maria (IS)', 'Santiago (IS)',
                    'Santo Domingo (IS)', 'Sigay', 'Sinait', 'Sugpon', 'Suyo', 'Tagudin',
                    'Vigan',
                ],
            ],
            [
                'province' => 'Iloilo',
                'cities' => [
                    'Ajuy', 'Alimodian', 'Anilao', 'Badiangan', 'Balasan', 'Banate', 'Barotac Nuevo',
                    'Barotac Viejo', 'Batad', 'Bingawan', 'Cabatuan (IO)', 'Calinog', 'Carles',
                    'Concepcion (IO)', 'Dingle', 'Duenas', 'Dumangas', 'Estancia', 'Guimbal',
                    'Igbaras', 'Janiuay', 'Lambunao', 'Leganes', 'Lemery (IO)', 'Leon', 'Maasin (IO)',
                    'Miag-ao', 'Mina', 'New Lucena', 'Oton', 'Passi', 'Pavia', 'Pototan',
                    'San Dionisio', 'San Enrique (IO)', 'San Joaquin', 'San Miguel (IO)',
                    'San Rafael (IO)', 'Santa Barbara (IO)', 'Sara', 'Tigbauan', 'Tubungan', 'Zarraga',
                ],

            ],
            [
                'province' => 'Isabela',
                'cities' => [
                    'Alicia (IA)', 'Angadanan', 'Aurora (IA)', 'Benito Soliven', 'Burgos (IA)',
                    'Cabagan', 'Cabatuan (IA)', 'Cauayan (IA)', 'Cordon', 'Delfin Albano',
                    'Dinapigue', 'Divilacan', 'Echague', 'Gamu', 'Ilagan', 'Jones', 'Luna (IA)',
                    'Maconacon', 'Mallig', 'Naguilian (IA)', 'Palanan', 'Quezon (IA)',
                    'Quirino (IA)', 'Ramon', 'Reina Mercedes', 'Roxas (IA)', 'San Agustin (IA)',
                    'San Guillermo', 'San Isidro (IA)', 'San Manuel (IA)', 'San Mariano',
                    'San Mateo (IA)', 'San Pablo (IA)', 'Santa Maria (IA)', 'Santiago (IA)',
                    'Santo Tomas (IA)', 'Tumauini',
                ],
            ],
            [
                'province' => 'Laguna',
                'cities' => [
                    'Alaminos', 'Bay', 'Calauan', 'Cavinti', 'Famy', 'Kalayaan',
                    'Liliw', 'Los Baños', 'Luisiana', 'Lumban', 'Mabitac',
                    'Magdalena', 'Majayjay', 'Nagcarlan', 'Paete', 'Pagsanjan',
                    'Pakil', 'Pangil', 'Pila', 'Rizal', 'Santa Cruz', 'Santa Maria',
                    'Siniloan', 'Victoria',
                ],
            ],
            [
                'province' => 'Pampanga',
                'cities' => [
                    'Apalit', 'Arayat', 'Bacolor', 'Candaba', 'Floridablanca', 'Guagua', 'Lubao',
                    'Mabalacat', 'Macabebe', 'Magalang', 'Masantol', 'Mexico', 'Minalin', 'Porac',
                    'San Fernando (PA)', 'San Luis (PA)', 'San Simon', 'Santa Ana (PA)', 'Santa Rita (PA)',
                    'Santo Tomas (PA)', 'Sasmuan',
                ],
            ],
            [
                'province' => 'Quezon',
                'cities' => [
                    'Agdangan', 'Alabat', 'Atimonan', 'Buenavista', 'Burdeos', 'Calauag', 'Candelaria',
                    'Catanauan', 'Dolores', 'General Luna', 'General Nakar', 'Guinayangan', 'Gumaca',
                    'Infanta', 'Jomalig', 'Lopez', 'Lucban', 'Macalelon', 'Mauban', 'Mulanay',
                    'Padre Burgos', 'Pagbilao', 'Panukulan', 'Patnanungan', 'Perez', 'Pitogo',
                    'Plaridel', 'Polillo', 'Quezon', 'Real', 'Sampaloc', 'San Andres', 'San Antonio',
                    'San Francisco', 'San Narciso', 'Sariaya', 'Tagkawayan', 'Tayabas', 'Tiaong', 'Unisan',
                ],
            ],
            [
                'province' => 'Rizal',
                'cities' => [
                    'Angono', 'Antipolo', 'Baras (RL)', 'Binangonan', 'Cainta', 'Cardona',
                    'Jalajala', 'Morong (RL)', 'Pililla', 'Rodriguez', 'San Mateo (RL)',
                    'Tanay', 'Taytay (RL)', 'Teresa',
                ],
            ],
            [
                'province' => 'Zambales',
                'cities' => [
                    'Botolan', 'Cabangan', 'Candelaria (ZA)', 'Castillejos', 'Iba', 'Masinloc', 'Palauig',
                    'San Antonio (ZA)', 'San Felipe', 'San Marcelino', 'San Narciso (ZA)', 'Santa Cruz (ZA)', 'Subic',
                ],
            ],
        ];

        return $address_list;
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

        // set default registerd address == shop address
        $this->registered_address = $this->shop_address;
        $this->registered_state_province = $this->shop_state_province;
        $this->registered_city = $this->shop_city;
        $this->registered_zip_code = $this->shop_zip_code;

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
                $this->alert('success', 'Shop information created successfully', [
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
