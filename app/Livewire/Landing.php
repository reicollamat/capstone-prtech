<?php

namespace App\Livewire;

use App\Helpers\EmailHelper;
use App\Helpers\ReferenceGeneratorHelper;
use App\Mail\OrderShipped;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Jantinnerezo\LivewireAlert\LivewireAlert;
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

    public $readyToLoad = false;

    public function mount()
    {
        $this->purchase = Purchase::find(2);

        // dd($this->purchase_items);

        // $this->testapi();
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
            $fileName = $currentDateTime->format('Y-m-d').'_1_pw.png'; // Rename it to date and p for positive and w for wordlcloud

            // Save the image to a file
            $imagePath = public_path('storage'); // Change the path as needed
            file_put_contents($imagePath.'/'.$fileName, $imageData);

            $this->asset = 'storage/'.$fileName;

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
    // public function readyLoad()
    // {
    //     $this->readyToLoad = true;
    //     $this->testapi();
    // }
}
