<?php

namespace App\Livewire;

use App\Helpers\EmailHelper;
use App\Helpers\ReferenceGeneratorHelper;
use App\Mail\OrderShipped;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Landing extends Component
{
    use LivewireAlert;
    use WithPagination;

    public $asset;

    public int $count = 0;

    public string $mailStatus;

    public $purchase;

    public string $teststring = '[4199,3000]';

    public string $price_bracket = '';

    public $readyToLoad = false;

    // public $all_products;

    public function mount()
    {
        $this->purchase = Purchase::find(2);

        // dd($this->purchase_items);

        // $this->testapi();
    }

    #[Computed]
    public function getproducts()
    {
        if ($this->price_bracket != '') {
            return Product::with('product_images')
                ->whereBetween('price', json_decode($this->price_bracket, true))
                ->paginate(5);
        }

        return Product::with('product_images')
            ->orderBy('rating', 'desc')
            ->paginate(5);
    }

    // public function rendered()
    // {
    //     $this->testapi();
    //     // dd('test');
    // }

    public function placeholder()
    {
        return <<<'HTML'
        <div>
            <p1>loading</p1>
        </div>
        HTML;
    }

    public $product;

    public function testmodal()
    {
        // Get the absolute path to the public directory
        $publicPath = public_path('stocksense');

        // dd($publicPath . '/data249_new.json');

        // $data =

        // $response = Http::post('http://127.0.0.1:5000/getprediction', [
        //     'data' =>
        // ]);
        //
        // // Check if the request was successful
        // if ($response->successful()) {
        //     dd($response->json());
        // }
    }

    public function render()
    {
        return view('livewire.landing');
    }

    #[On('wishlist-item-remount')]
    public function increment()
    {
        $this->count++;
    }

    public function sendMail()
    {
        // // hinde ko alam kung bakit pero pag unang pindot dito nag rereload ung page, pero minsan inde naman
        // // TODO: pass the id of order inside OrderShipped function, then query the order based on that id on the OrderShipped.php to display the items and total??
        // try {
        //     Mail::to('richmond.billones@gmail.com')->send(new OrderShipped());
        //     $this->mailStatus = 'Email Sent';
        // } catch (Exception $e) {
        //     $this->mailStatus = 'There was an error sending the email: '.$e->getMessage();
        // }

        $this->mailStatus = EmailHelper::sendEmail('richmondjohnbillones@gmail.com', 4);

        $orders = Purchase::find(2);

        // $purchase_items_product_information = P::find($orders->id);

        // $this->purchase_items = PurchaseItem::all();

        // dd($this->purchase_items);

        // dd($orders->purchase_items);
        // dd($purchase_items->product);
        // dd($purchase_items_product_information);

        //
        // $reference = ReferenceGeneratorHelper::generateReferenceString();
        //
        // dd($reference);

        // generate 16 unique reference string that consist of numberes and letters

    }

    public function tryAlert()
    {
        $this->alert('question', 'How are you today?', [
            'showConfirmButton' => true,
            'confirmButtonText' => 'Good',
            'onConfirmed' => 'confirmed',
        ]);
        // $this->alert('success', 'Successssssssssssssssssssssss', [
        //     'position' => 'top-end']);
        //
        // $this->redirectRoute('collections');
        // $this->alert('error', 'Success', [
        //     'position' => 'top-end']);
        // $this->alert('success', 'Success is approaching!');
        // dd('tse');
    }

    public function testapi()
    {
        // Get the current date and time using Carbon
        $currentDateTime = Carbon::now();

        // dd(base_path().'/python-scripts/test.py');

        // dd(public_path('storage'));

        $response = Http::post('http://magi001.pythonanywhere.com/generatenegative', [
            'reviews' => 'John',
        ]);

        // Check if the request was successful
        if ($response->successful()) {
            // Access the response body as an array or JSON
            $data = $response->headers(); // If the response is in JSON format

            $imageData = $response->body(); // Get the image data
            // dd($imageData);

            // Format the date and time to be used in the file name
            $fileName = $currentDateTime->format('Y-m-d') . '_1_pw.png'; // Rename it to date and p for positive and w for wordlcloud

            // Save the image to a file
            $imagePath = public_path('storage'); // Change the path as needed
            file_put_contents($imagePath . '/' . $fileName, $imageData);

            $this->asset = 'storage/' . $fileName;

            // dd(asset('storage/'.$fileName));

            // dd($data);
            // Process the data
        } else {
            // Handle the failed request
            $statusCode = $response->status(); // Get the status code
            $errorBody = $response->body(); // Get the error body
            // dd($statusCode, $errorBody);
            // Handle the error
        }

        // sleep(30);
    }

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

    public $response;
    public $response2;

    public function testmodel()
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer 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',
        ])
            ->post('https://api-inference.huggingface.co/models/magixxixx/pr-tech-sentiment-analyzer', [
                'inputs' => 'handy Value For Moneylegit super fast transfering datas Must buy',
            ]);

        if ($response->successful()) {

            // Access the response data
            $data = $response->json();

            // dd($data);

            $result1 = $data[0][0];
            $result2 = $data[0][1];

            // Accessing scores
            $score1 = $result1['score'];
            $score2 = $result2['score'];

            // Determine the higher score and its label
            if ($score1 > $score2) {
                $higherLabel = $result1['label'];
                $higherScore = $score1;
            } else {
                $higherLabel = $result2['label'];
                $higherScore = $score2;
            }

            // Determine the result based on the higher label
            $this->response2 = ($higherLabel === 'POSITIVE') ? 1 : 0;

            // Do something with the response data
            $this->response = [$score1, $score2, $higherLabel, round($higherScore, 0)];
        }
    }
}
