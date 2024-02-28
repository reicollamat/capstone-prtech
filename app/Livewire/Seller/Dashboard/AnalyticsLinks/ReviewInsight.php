<?php

namespace App\Livewire\Seller\Dashboard\AnalyticsLinks;

use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

#[Layout('layouts.seller.seller-layout')]
class ReviewInsight extends Component
{
    use WithoutUrlPagination, WithPagination;

    #[Locked]
    public $sellerId;

    public $search;

    public $sentiment;

    public $category;

    public string $p_asset;

    public string $n_asset;

    public function mount()
    {
        $this->sellerId = auth()->user()->seller->id;

        // $this->getReviews();

    }

    public function render()
    {
        return view('livewire..seller.dashboard.analytics-links.review-insight');
    }

    #[Computed]
    public function getReviews()
    {
        $query = Comment::join('products', 'comments.product_id', '=', 'products.id')
            ->where('comments.seller_id', '=', $this->sellerId);

        if ($this->search !== null) {
            $query->where('comments.text', 'like', '%'.$this->search.'%');
        }

        if ($this->sentiment === 'Positive') {
            $query->wherein('comments.rating', [3, 4, 5]);
        } elseif ($this->sentiment === 'Negative') {
            $query->wherein('comments.rating', [1, 2]);
        }

        if ($this->category !== null) {
            // dd($this->category);
            $query->where('category', '=', $this->category);
        }

        return $query->orderBy('comments.created_at', 'desc')
            ->paginate(10);
    }

    public function sentimentChange(string $sentiment)
    {
        $this->sentiment = $sentiment;
    }

    public function categoryChange(string $category)
    {
        // dd($category);
        $this->category = $category;
    }

    public function resetFilter()
    {
        $this->category = null;
        $this->search = null;
        $this->sentiment = null;
    }

    public function fetchNegativeCommentsApi()
    {
        // sleep(10);

        // Get the current date and time using Carbon
        $currentDateTime = Carbon::now();

        $ncount = Comment::wherein('rating', [1, 2])
            ->where('seller_id', '=', $this->sellerId)
            // ->where('created_at', '>=', now()->subDays(30))
            ->select('text')
            ->get();

        // dd($ncount);

        // Get the file path and name using glob
        $files = glob(public_path('storage').'/*.png');

        // dd($files);

        // check if there is no data
        if ($ncount->isEmpty()) {
            // if there is no data then set the image to notenoughdata.png
            $this->n_asset = 'img/notenoughdata.png';
        } else {

            // else fetch to api and set the image
            $commentString = '';

            foreach ($ncount as $n) {
                $commentString .= $n->text;
            }

            // dd($commentString);

            $response = Http::post('http://magi001.pythonanywhere.com/generatenegative', [
                'reviews' => $commentString,
            ]);

            // Check if the request was successful
            if ($response->successful()) {
                // Access the response body as an array or JSON
                $data = $response->headers(); // If the response is in JSON format

                $imageData = $response->body(); // Get the image data
                // dd($imageData);

                // Format the date and time to be used in the file name
                $fileName = $currentDateTime->format('Y-m-d').'_'.$this->sellerId.'_nw.png'; // Rename it to date and p for positive and w for wordlcloud

                // Save the image to a file
                $imagePath = public_path('storage'); // Change the path as needed
                file_put_contents($imagePath.'/'.$fileName, $imageData);

                // return 'storage/'.$fileName;

                $this->n_asset = 'storage/'.$fileName;
                // dd(asset('storage/'.$fileName));
                // dd($data);

            } else {
                // Handle the failed request
                $statusCode = $response->status(); // Get the status code
                $errorBody = $response->body(); // Get the error body

                $this->alert('error', 'Something went wrong'.$errorBody, [
                    'position' => 'top-end',
                    'timer' => 3000,
                    'toast' => true,
                ]);
            }
        }
    }

    public function fetchPositiveCommentsApi()
    {
        $pcount = Comment::wherein('rating', [3, 4, 5])
            ->where('seller_id', '=', $this->sellerId)
            // ->where('created_at', '>=', now()->subDays(30))
            ->select('text')
            ->get();

        // check if there is no data
        if ($pcount->isEmpty()) {

            // if no data show not enough data
            $this->p_asset = 'img/notenoughdata.png';
        } else {
            // else fetch and show data
            $commentString = '';

            foreach ($pcount as $n) {
                $commentString .= $n->text;
            }

            // Get the current date and time using Carbon
            $currentDateTime = Carbon::now();

            $response = Http::post('http://magi001.pythonanywhere.com/generatepositive', [
                'reviews' => $commentString,
            ]);

            // Check if the request was successful
            if ($response->successful()) {
                // Access the response body as an array or JSON
                $data = $response->headers(); // If the response is in JSON format

                $imageData = $response->body(); // Get the image data
                // dd($imageData);

                // Format the date and time to be used in the file name
                $fileName = $currentDateTime->format('Y-m-d').'_'.$this->sellerId.'_pw.png'; // Rename it to date and p for positive and w for wordlcloud

                // Save the image to a file
                $imagePath = public_path('storage'); // Change the path as needed
                file_put_contents($imagePath.'/'.$fileName, $imageData);

                $this->p_asset = 'storage/'.$fileName;

                // dd(asset('storage/'.$fileName));

                // dd($data);
                // Process the data
            } else {
                // Handle the failed request
                $statusCode = $response->status(); // Get the status code
                $errorBody = $response->body(); // Get the error body
                $this->alert('error', 'Something went wrong'.$errorBody, [
                    'position' => 'top-end',
                    'timer' => 3000,
                    'toast' => true,
                ]);

                // dd($statusCode, $errorBody);
                // Handle the error
            }
        }
    }
}
