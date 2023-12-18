<?php

namespace App\Livewire\Buyer\OnBoarding\Form;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
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
        $this->user_birthdate = 0;

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

    // list for address select component
    #[Computed]
    public function getAddressList()
    {
        $address_list = [
            [
                'province' => 'select',
            ],
            [
                'province' => "NCR",
                'cities' => [
                    "Caloocan", "Las Piñas", "Makati", "Malabon", "Mandaluyong", "Manila",
                    "Marikina", "Muntinlupa", "Navotas", "Parañaque", "Pasay", "Pasig",
                    "Pateros", "Quezon City", "San Juan", "Taguig", "Valenzuela"
                ]
            ],
            [
                'province' => "Batangas",
                'cities' => [
                    "Agoncillo", "Alitagtag", "Balayan", "Balete", "Bauan", "Calatagan",
                    "Cuenca", "Ibaan", "Laurel", "Lemery", "Lian", "Lobo", "Mabini",
                    "Malvar", "Mataas na Kahoy", "Nasugbu", "Padre Garcia", "Rosario",
                    "San Jose", "San Juan", "San Luis", "San Nicolas", "San Pascual",
                    "Santa Teresita", "Taal", "Talisay", "Taysan", "Tingloy", "Tuy"
                ]
            ],
            [
                'province' => "Benguet",
                'cities' => [
                    "Atok", "Bakun", "Bokod", "Buguias", "Itogon", "Kabayan", "Kapangan",
                    "Kibungan", "La Trinidad", "Mankayan", "Sablan", "Tuba", "Tublay"
                ]
            ],
            [
                'province' => "Bulacan",
                'cities' => [
                    "Angat", "Balagtas", "Baliwag", "Bocaue", "Bulakan", "Bustos",
                    "Calumpit", "Dona Remedios Trinidad", "Guiguinto", "Hagonoy",
                    "Malolos", "Marilao", "Meycauayan", "Norzagaray", "Obando",
                    "Pandi", "Paombong", "Plaridel", "Pulilan", "San Ildefonso",
                    "San Jose Del Monte", "San Miguel", "San Rafael", "Santa Maria"
                ]
            ],
            [
                'province' => "Cavite",
                'cities' => [
                    "Alfonso", "Amadeo", "Bacoor", "Carmona", "Cavite", "Dasmariñas",
                    "General Emilio Aguinaldo", "General Mariano Alvarez", "General Trias",
                    "Imus", "Indang", "Kawit", "Magallanes", "Maragondon", "Mendez",
                    "Naic", "Noveleta", "Rosario", "Silang", "Tagaytay", "Tanza",
                    "Ternate", "Trece Martires"
                ]
            ],
            [
                'province' => "Cebu",
                'cities' => [
                    "Alcantara", "Alcoy", "Alegria", "Aloguinsan", "Argao", "Asturias",
                    "Badian", "Balamban", "Bantayan", "Barili", "Boljoon", "Borbon",
                    "Carmen", "Catmon", "Compostela", "Consolacion", "Cordova",
                    "Daanbantayan", "Dalaguete", "Dumanjug", "Ginatilan", "Liloan",
                    "Madridejos", "Malabuyoc", "Medellin", "Minglanilla", "Moalboal",
                    "Oslob", "Pilar", "Pinamungajan", "Poro", "Ronda", "Samboan",
                    "San Fernando", "San Francisco", "San Remigio", "Santa Fe",
                    "Santander", "Sibonga", "Sogod", "Tabogon", "Tabuelan", "Tuburan",
                    "Tudela"
                ]
            ],
            [
                'province' => "Davao",
                'cities' => [
                    "Asuncion", "Baganga", "Banaybanay", "Boston", "Braulio E. Dujali", "Carmen", "Caraga",
                    "Cateel", "Compostela", "Davao City", "Digos", "Don Marcelino", "Governor", "Hagonoy",
                    "Jose Abad", "Kapalong", "Lupon", "Malita", "Magsaysay", "Manay", "Mati", "Panabo",
                    "San Isidro", "Tagum"
                ]
            ],
            [
                'province' => "Ilocos Norte",
                'cities' => [
                    "Adams", "Bacarra", "Badoc", "Bangui", "Banna", "Batac",
                    "Burgos (IN)", "Carasi", "Currimao", "Dingras", "Dumalneg",
                    "Laoag", "Marcos", "Nueva Era", "Pagudpud", "Paoay",
                    "Pasuquin", "Piddig", "Pinili", "San Nicolas (IN)", "Sarrat",
                    "Solsona", "Vintar"
                ]
            ],
            [
                'provice' => "Ilocos Sur",
                'cities' => [
                    "Alilem", "Banayoyo", "Bantay", "Burgos (IS)", "Cabugao",
                    "Candon", "Caoayan", "Cervantes", "Galimuyod", "Gregorio Del Pilar",
                    "Lidlidda", "Magsingal", "Nagbukel", "Narvacan", "Quirino (IS)",
                    "Salcedo (IS)", "San Emilio", "San Esteban", "San Ildefonso (IS)",
                    "San Juan (IS)", "San Vicente (IS)", "Santa", "Santa Catalina (IS)",
                    "Santa Cruz (IS)", "Santa Lucia", "Santa Maria (IS)", "Santiago (IS)",
                    "Santo Domingo (IS)", "Sigay", "Sinait", "Sugpon", "Suyo", "Tagudin",
                    "Vigan"
                ]
            ],
            [
                'province' => "Iloilo",
                'cities' => [
                    "Ajuy", "Alimodian", "Anilao", "Badiangan", "Balasan", "Banate", "Barotac Nuevo",
                    "Barotac Viejo", "Batad", "Bingawan", "Cabatuan (IO)", "Calinog", "Carles",
                    "Concepcion (IO)", "Dingle", "Duenas", "Dumangas", "Estancia", "Guimbal",
                    "Igbaras", "Janiuay", "Lambunao", "Leganes", "Lemery (IO)", "Leon", "Maasin (IO)",
                    "Miag-ao", "Mina", "New Lucena", "Oton", "Passi", "Pavia", "Pototan",
                    "San Dionisio", "San Enrique (IO)", "San Joaquin", "San Miguel (IO)",
                    "San Rafael (IO)", "Santa Barbara (IO)", "Sara", "Tigbauan", "Tubungan", "Zarraga"
                ]

            ],
            [
                'province' => "Isabela",
                'cities' => [
                    "Alicia (IA)", "Angadanan", "Aurora (IA)", "Benito Soliven", "Burgos (IA)",
                    "Cabagan", "Cabatuan (IA)", "Cauayan (IA)", "Cordon", "Delfin Albano",
                    "Dinapigue", "Divilacan", "Echague", "Gamu", "Ilagan", "Jones", "Luna (IA)",
                    "Maconacon", "Mallig", "Naguilian (IA)", "Palanan", "Quezon (IA)",
                    "Quirino (IA)", "Ramon", "Reina Mercedes", "Roxas (IA)", "San Agustin (IA)",
                    "San Guillermo", "San Isidro (IA)", "San Manuel (IA)", "San Mariano",
                    "San Mateo (IA)", "San Pablo (IA)", "Santa Maria (IA)", "Santiago (IA)",
                    "Santo Tomas (IA)", "Tumauini"
                ]
            ],
            [
                'province' => "Laguna",
                'cities' => [
                    "Alaminos", "Bay", "Calauan", "Cavinti", "Famy", "Kalayaan",
                    "Liliw", "Los Baños", "Luisiana", "Lumban", "Mabitac",
                    "Magdalena", "Majayjay", "Nagcarlan", "Paete", "Pagsanjan",
                    "Pakil", "Pangil", "Pila", "Rizal", "Santa Cruz", "Santa Maria",
                    "Siniloan", "Victoria"
                ]
            ],
            [
                'province' => "Pampanga",
                'cities' => [
                    "Apalit", "Arayat", "Bacolor", "Candaba", "Floridablanca", "Guagua", "Lubao",
                    "Mabalacat", "Macabebe", "Magalang", "Masantol", "Mexico", "Minalin", "Porac",
                    "San Fernando (PA)", "San Luis (PA)", "San Simon", "Santa Ana (PA)", "Santa Rita (PA)",
                    "Santo Tomas (PA)", "Sasmuan"
                ]
            ],
            [
                'province' => "Quezon",
                'cities' => [
                    "Agdangan", "Alabat", "Atimonan", "Buenavista", "Burdeos", "Calauag", "Candelaria",
                    "Catanauan", "Dolores", "General Luna", "General Nakar", "Guinayangan", "Gumaca",
                    "Infanta", "Jomalig", "Lopez", "Lucban", "Macalelon", "Mauban", "Mulanay",
                    "Padre Burgos", "Pagbilao", "Panukulan", "Patnanungan", "Perez", "Pitogo",
                    "Plaridel", "Polillo", "Quezon", "Real", "Sampaloc", "San Andres", "San Antonio",
                    "San Francisco", "San Narciso", "Sariaya", "Tagkawayan", "Tayabas", "Tiaong", "Unisan"
                ]
            ],
            [
                'province' => "Rizal",
                'cities' => [
                    "Angono", "Antipolo", "Baras (RL)", "Binangonan", "Cainta", "Cardona",
                    "Jalajala", "Morong (RL)", "Pililla", "Rodriguez", "San Mateo (RL)",
                    "Tanay", "Taytay (RL)", "Teresa"
                ]
            ],
            [
                'province' => "Zambales",
                'cities' => [
                    "Botolan", "Cabangan", "Candelaria (ZA)", "Castillejos", "Iba", "Masinloc", "Palauig",
                    "San Antonio (ZA)", "San Felipe", "San Marcelino", "San Narciso (ZA)", "Santa Cruz (ZA)", "Subic"
                ]
            ],
        ];

        return $address_list;
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
