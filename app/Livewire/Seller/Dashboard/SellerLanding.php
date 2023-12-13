<?php

namespace App\Livewire\Seller\Dashboard;

use App\Models\Comment;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Seller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Component;

#[Layout('layouts.seller.seller-layout')]
class SellerLanding extends Component
{
    #[Locked]
    public $seller_id;

    public function mount()
    {
        $this->seller_id = auth()->user()->seller->id;

        // dd($this->seller_id);

        // $ncount = Comment::wherein('rating', [1, 2])
        //     ->where('created_at', '>=', now()->subDays(30))
        //     ->select('text')
        //     ->get();
        //
        // $commentString = "";
        //
        // foreach ($ncount as $n) {
        //     $commentString .= $n->text;
        // }
        //
        // dd($commentString);

        // dd($ncount[0]->text);

    }

    public function render()
    {

        $salesByDate = []; // Array to store aggregated sales by date

        $salesData = Purchase::where('seller_id', $this->seller_id)->where('purchase_status', 'completed')
            ->select(['total_amount', 'completion_date'])
            // ->groupBy('completion_date')
            ->get();

        // dd($salesData);

        foreach ($salesData as $sale) {
            $date = $sale['completion_date'];
            if (! isset($salesByDate[$date])) {
                $salesByDate[$date] = 0;
            }
            $salesByDate[$date] += $sale['total_amount'];
        }

        // dd($salesData);
        // dd(array_keys($salesByDate), array_values($salesByDate));

        $chart_labels = ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5', 'Day 6'];

        $chart_data = [12, 12, 12, 12, 12, 12];

        return view('livewire..seller.dashboard.seller-landing', [
            'chart_labels' => array_keys($salesByDate),
            'chart_data' => array_values($salesByDate),
        ]);
    }

    // #[Computed]
    // public function renderchart()
    // {
    //     $chart_labels = ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5', 'Day 6'];
    //
    //     $chart_data = [12, 12, 12, 12, 12, 12];
    // }

    #[Computed]
    public function getTotalEarnings()
    {
        // dd($this->seller_id);
        $metrics = Seller::find($this->seller_id)->shopMetrics->first();

        $this->total_earnings_percentage = $metrics->total_earnings / $metrics->target_sales * 100;

        return $metrics;
    }

    #[Computed]
    public function getVisitors()
    {
        return Product::where('seller_id', $this->seller_id)->select('view_count')->sum('view_count');
    }

    #[Computed]
    public function getTotalOrders()
    {
        // dd($this->seller_id);
        // // $metrics =

        // $orders = Product::join('purchase_items', 'products.id', '=', 'purchase_items.product_id')
        //     ->join('purchases', 'purchase_items.purchase_id', '=', 'purchases.id')
        //     ->where('seller_id', $this->seller_id)
        //     ->groupBy('purchase_id')->count();

        $orders = Purchase::where('seller_id', $this->seller_id)->where('purchase_status', 'pending')->count();

        // dd($orders);

        return $orders;
    }

    #[Computed]
    public function getSalesToday()
    {
        $sales = Purchase::where('seller_id', $this->seller_id)
            ->where('purchase_status', 'completed')
            ->where('completion_date', '>=', now()->subDays(1))
            ->sum('total_amount');

        // dd($sales);

        return $sales;
    }

    #[Computed]
    public function getSalesTodayPercentage()
    {
        $metrics = Seller::find($this->seller_id)->shopMetrics->first();

        $sales = Purchase::where('seller_id', $this->seller_id)
            ->where('purchase_status', 'completed')
            ->where('completion_date', '>=', now()->subDays(1))
            ->sum('total_amount');

        $total_sales_percentage = $sales / $metrics->target_sales * 100;

        return $total_sales_percentage;
    }

    #[Computed]
    public function getOrders()
    {
        $sales = Purchase::where('seller_id', $this->seller_id)
            ->where('purchase_status', 'pending')
            ->get();

        return $sales;
    }

    #[Computed]
    public function getNegativeCommentsCount()
    {
        $ncount = Comment::wherein('rating', [1, 2])
            ->where('created_at', '>=', now()->subDays(30))
            ->count();

        return $ncount;
    }

    #[Computed]
    public function getPositveCommentsCount()
    {
        $ncount = Comment::wherein('rating', [3, 4, 5])
            ->where('created_at', '>=', now()->subDays(30))
            ->count();

        return $ncount;
    }

    // #[Computed]
    public function fetchNegativeCommentsApi()
    {
        $ncount = Comment::wherein('rating', [1, 2])
            ->where('created_at', '>=', now()->subDays(30))
            ->count();

        // Get the current date and time using Carbon
        $currentDateTime = Carbon::now();

        $ncount = Comment::wherein('rating', [1, 2])
            ->where('created_at', '>=', now()->subDays(30))
            ->select('text')
            ->get();

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
            $fileName = $currentDateTime->format('Y-m-d').'_1_pw.png'; // Rename it to date and p for positive and w for wordlcloud

            // Save the image to a file
            $imagePath = public_path('storage'); // Change the path as needed
            file_put_contents($imagePath.'/'.$fileName, $imageData);

            return 'storage/'.$fileName;

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
    }

    // #[Computed]
    public function fetchPositiveCommentsApi()
    {
        $ncount = Comment::wherein('rating', [3, 4, 5])
            ->where('created_at', '>=', now()->subDays(30))
            ->count();

        // Get the current date and time using Carbon
        $currentDateTime = Carbon::now();

        // dd(base_path().'/python-scripts/test.py');

        // dd(public_path('storage'));

        $response = Http::post('http://magi001.pythonanywhere.com/generatepositive', [
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
    }
}
