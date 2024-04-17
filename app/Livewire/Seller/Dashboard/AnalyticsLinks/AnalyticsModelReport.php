<?php

namespace App\Livewire\Seller\Dashboard\AnalyticsLinks;

use App\Models\Product;
use App\Models\Seller;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use InvalidArgumentException;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use JetBrains\PhpStorm\NoReturn;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.seller.seller-layout')]
class AnalyticsModelReport extends Component
{
    use LivewireAlert, WithPagination;

    public $predict_done = false;

    public $summary;

    public $productselectedid;

    public $productselectedname;

    public $productselectedprice;

    public $searchquery;

    public $test_a;

    public $test_b;

    public $combinedArray;

    public $combinedArray2;

    public int $test;

    public $starting_date;

    public $userStartingDate;

    public $userEndingDate;

    public $ending_date;

    public $monthSelect;

    public $userArray = [];

    public $chartArray = [];

    // FOR API POST REQUEST
    public $predictinterval;

    public $predictrange;

    public $custompredictrange;

    public $sales_accuracy_apiresponse;

    public $sales_futureapiresponse;

    public $accuracy_report;

    public $prediction_report;

    public $search_product = '';

    public $return_search_product;

    #[Locked]
    public $seller;

    public $prediction_oneshot_run = false;

    public $restock_now_predict;

    public $restock_soon_predict;

    public function mount()
    {
        $this->seller = Seller::where('user_id', Auth::id())->get()->first();

        $this->summary = 'Monthly';

        $this->test = 0;

        $this->ending_date = date('Y-m-d');

        $this->userEndingDate = date('Y-m-d');

        $this->userStartingDate = Carbon::now()->subDays(30)->format('Y-m-d');

        // Defaults to a Daily interval
        $this->predictinterval = 'daily';

        // Defaults to a 7-day range
        $this->predictrange = 'month';

        $this->restock_now_predict = $this->restock_now();
        $this->restock_soon_predict = $this->restock_soon();
    }

    #[Computed]
    public function all_products()
    {
        if (strlen($this->search_product) > 1) {
            $this->return_search_product = Product::where('seller_id', $this->seller->id)
                ->where(strtolower('title'), 'like', "%{$this->search_product}%")
                ->orderBy('stock', 'asc')
                ->get();
            // dd($this->return_search_product);
        } else {
            $this->return_search_product = '';
        }

        return Product::where('seller_id', $this->seller->id)
            ->orderBy('stock', 'asc')
            ->get();
    }

    public function selectProduct($product): void
    {

        $this->productselectedid = $product;
        $_product = Product::findOrFail($product);

        $this->productselectedname = $_product->title;
        $this->productselectedprice = $_product->price;

        $this->makeChart($product);
    }

    private function makeChart($product_id): void
    {
        // dd($product_id);

        if ($product_id) {
            $products2 = DB::table('purchase_items')
                ->select(DB::raw('SUM(quantity) as quantity'), 'created_at')
                ->where('product_id', $product_id)->groupBy('created_at')
                ->whereBetween('created_at', [$this->userStartingDate, $this->userEndingDate])
                ->get();
        } else {
            // dd('No product selected');
            $products2 = Collection::make([]);
        }

        $startDate = Carbon::parse($this->userStartingDate);
        $endDate = Carbon::parse($this->userEndingDate);

        // dd($this->prepareSalesChartDataForWeek($products2, $startDate, $endDate));

        $this->chartArray = $this->prepareSalesChartDataForWeek($products2, $startDate, $endDate);

        $this->dispatch('update-chart');
    }

    public function prepareSalesChartDataForWeek(Collection $sales, Carbon $startDate, Carbon $endDate): array
    {
        // $startDate = $startDate ?? Carbon::now()->subDays(7);
        // $endDate = $endDate ?? Carbon::now();

        // convert a collection to array
        $sales = $sales->toArray();

        $sales = array_filter($sales, function ($sale) use ($startDate, $endDate) {
            return Carbon::parse($sale->created_at)->betweenIncluded($startDate, $endDate);
        });

        // if a date is missing between the start and end date, add it with a quantity of 0
        $dates = $this->changeDate();

        $fixedSales = [];

        foreach ($dates as $date) {
            $found = false;
            foreach ($sales as $sale) {
                if (Carbon::parse($sale->created_at)->format('Y-m-d') == $date) {
                    $fixedSales[$date] = $sale->quantity;
                    $found = true;
                    break;
                }
            }
            if (! $found) {
                $fixedSales[$date] = 0;
            }
        }

        return $fixedSales;

        // $salesData = $sales->groupBy('created_at')
        //     ->map(function ($productSales) {
        //         return $productSales->first()['quantity'] ?? 0;
        //     });
        //
        // return $dates->mapWithKeys(function ($date) use ($salesData) {
        //     return [$date->format('Y-m-d') => $salesData->get($date->format('Ymd')) ?? 0];
        // })->toArray();
    }

    private function changeDate(): array
    {
        // Parse starting and ending dates
        $start = Carbon::parse($this->userStartingDate);
        $end = Carbon::parse($this->userEndingDate);

        return $this->generateDatesArray($start, $end);
    }

    private function generateDatesArray($startingDate, $endingDate): array
    {
        $datesArray = [];

        // // Parse starting and ending dates
        // $start = Carbon::parse($startingDate);
        // $end = Carbon::parse($endingDate);

        // Include the starting date and the ending date
        while ($startingDate->lte($endingDate)) {
            $datesArray[] = $startingDate->toDateString();
            $startingDate->addDay();
        }

        return $datesArray;
    }

    public function updatedMonthSelect()
    {
        // $property: The name of the current property that was updated

        // dd($this->monthSelect);
        $year = Carbon::now()->year;

        if ($this->monthSelect != 0) {
            $this->userStartingDate = Carbon::createFromDate($year, $this->monthSelect, 1)->startOfMonth()->format('Y-m-d');
            $this->userEndingDate = Carbon::createFromDate($year, $this->monthSelect, 1)->endOfMonth()->format('Y-m-d');
        } else {
            $this->userStartingDate = Carbon::now()->subDays(30)->format('Y-m-d');
            $this->userEndingDate = Carbon::now()->format('Y-m-d');
        }

        $this->userArray = $this->changeDate();

        $this->makeChart($this->productselectedname);

        $this->dispatch('update-chart');
        // dd($this->user_starting_date, $this->user_ending_date);
    }

    public function updatedUserStartingDate()
    {
        // $property: The name of the current property that was updated

        // dd($this->user_starting_date, $this->user_ending_date);
        // $this->user_starting_date = Carbon::createFromDate($year, $this->monthSelect, 1)->startOfMonth()->format('Y-m-d');
        // $this->user_ending_date = Carbon::createFromDate($year, $this->monthSelect, 1)->endOfMonth()->format('Y-m-d');

        $this->userArray = $this->changeDate();

        // dd($this->userArray);

    }

    public function updatedUserEndingDate()
    {
        // $property: The name of the current property that was updated

        // dd($this->user_starting_date, $this->user_ending_date);
        // $this->user_starting_date = Carbon::createFromDate($year, $this->monthSelect, 1)->startOfMonth()->format('Y-m-d');
        // $this->user_ending_date = Carbon::createFromDate($year, $this->monthSelect, 1)->endOfMonth()->format('Y-m-d');

        $this->userArray = $this->changeDate();

        // dd($this->userArray);
    }

    public function summaryChange(string $summary)
    {
        $this->summary = $summary;

        if ($summary == 'Weekly') {
            $this->userStartingDate = Carbon::now()->subDays(7)->format('Y-m-d');
        } elseif ($summary == 'Monthly') {
            $this->userStartingDate = Carbon::now()->subDays(30)->format('Y-m-d');
        }

        $this->monthSelect = 0;

        $this->userEndingDate = Carbon::now()->format('Y-m-d');

        $this->userArray = $this->changeDate();

        $this->test = rand(1, 30);

        $this->dispatch('update-chart');
    }

    public function restock_soon()
    {
        $array = [];

        $products = Product::where('seller_id', $this->seller->id)
            ->whereColumn('stock', '<', DB::raw('reserve + 10'))
            ->whereColumn('stock', '>', 'reserve')
            ->orderBy('stock', 'asc')
            ->get()
            ->toArray();

        foreach ($products as $key => $product) {
            $array[] = $product;
            $array[$key]['prediction'] = $this->generate_onedshot_prediction($product['id']);
        }

        // dd($array[0]['prediction']['prediction_report'][0]['predicted']);

        return $array;
    }

    public function restock_now()
    {
        $array = [];

        $products = Product::where('seller_id', $this->seller->id)
            ->whereColumn('stock', '<=', 'reserve')
            ->orderBy('stock', 'asc')
            ->get()
            ->toArray();

        foreach ($products as $key => $product) {
            $array[] = $product;
            $array[$key]['prediction'] = $this->generate_onedshot_prediction($product['id']);
        }

        // dd($array[0]['prediction']['prediction_report'][0]['predicted']);

        return $array;
    }

    public function render()
    {
        return view('livewire..seller.dashboard.analytics-links.analytics-model-report');
    }

    #[Computed]
    public function restock_soon_list()
    {
        return Product::where('seller_id', $this->seller->id)
            ->whereColumn('stock', '<', DB::raw('reserve + 10'))
            ->whereColumn('stock', '>', 'reserve')
            ->orderBy('stock', 'asc')
            ->get();
    }

    #[Computed]
    public function restock_now_list()
    {
        return Product::where('seller_id', $this->seller->id)
            ->whereColumn('stock', '<=', 'reserve')
            ->orderBy('stock', 'asc')
            ->get();
    }

    public function reset_all()
    {
        $this->userStartingDate = Carbon::now()->subDays(30)->format('Y-m-d');
        $this->userEndingDate = Carbon::now()->format('Y-m-d');
        $this->monthSelect = 0;
        $this->productselectedid = null;
        $this->productselectedname = null;
        $this->productselectedprice = null;
        $this->userArray = $this->changeDate();
        $this->chartArray = [];

        $this->alert('info', 'Chart data reset', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'text' => 'Data Cleared',
            'showCancelButton' => false,
            'showConfirmButton' => false,
        ]);

        $this->dispatch('update-chart');
    }

    public function runforall()
    {
        // sleep(3);
        $producttest = DB::table('purchase_items as p')
            ->select(
                DB::raw('SUM(p.quantity) as quantity'),
                'p.created_at',
                DB::raw('COUNT(CASE WHEN c.sentiment = 1 THEN 1 END) as positive'),
                DB::raw('COUNT(CASE WHEN c.sentiment = 0 THEN 1 END) as negative')
            )
            ->join('comments as c', 'c.id', '=', 'p.comment_id')
            ->where('p.product_id', $this->productselectedid)
            ->groupBy('p.created_at')
            ->get();

        // dd($product);

        if ($this->predictrange == 'custom') {
            if ($this->custompredictrange == null) {

                $this->notify('warning', 'Custom range selected', 'Custom range selected, Please input valid number');

                return;
            }
        }

        if ($this->predictrange == 'week' || $this->predictrange == 'month' || $this->predictrange == 'year') {
            $this->custompredictrange = null;
        }

        $this->alert('success', 'This is a success message', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'text' => 'This is a success message',
            'showCancelButton' => false,
            'showConfirmButton' => false,
        ]);
    }

    private function notify($type, $mesage, $text): void
    {
        $this->alert($type, $mesage, [
            'position' => 'top-end',
            'timer' => 6000,
            'toast' => true,
            'text' => $text,
            'showCancelButton' => false,
            'showConfirmButton' => false,
        ]);
    }

    #[NoReturn]
    public function runforone(): void
    {
        $this->alert('info', 'Running Prediction', [
            'position' => 'top-end',
            'timer' => 6000,
            'toast' => true,
            'text' => 'The prediction may take a while depending on the amount of data and available resource.',
            'showCancelButton' => false,
            'showConfirmButton' => false,
        ]);

        // sleep(3);
        $product = DB::table('purchase_items as p')
            ->select(
                DB::raw('SUM(p.quantity) as quantity'),
                'p.created_at',
                DB::raw('COUNT(CASE WHEN c.sentiment = 1 THEN 1 END) as positive'),
                DB::raw('COUNT(CASE WHEN c.sentiment = 0 THEN 1 END) as negative')
            )
            ->join('comments as c', 'c.id', '=', 'p.comment_id')
            ->where('p.product_id', $this->productselectedid)
            ->groupBy('p.created_at')
            ->get();

        // dd(count($product));

        if (count($product) < 14) {
            $this->notify('warning', 'Insufficient data', 'Product has only '.count($product).' days worth of sales, at least 14 days is recommended for accurate future predictions');

            return;
        }

        if ($this->predictrange == 'custom') {
            if ($this->custompredictrange == null) {

                $this->notify('warning', 'Custom range selected', 'Custom range selected, Please input valid number');

                return;
            }
        }

        if ($this->predictrange == 'week' || $this->predictrange == 'month' || $this->predictrange == 'year') {
            $this->custompredictrange = null;
        }

        try {

            // send the data to the API with the following parameters, change the link to the correct API endpoint
            $response = Http::timeout(300)->post('http://127.0.0.1:8484/api/v1/predict', [
                'product_id' => $this->productselectedid,
                'interval' => $this->predictinterval,
                'range' => $this->predictrange,
                'custom_range' => $this->custompredictrange,
                'data' => $product->toArray(),
            ]);

            if ($response->ok()) {

                $data = $response->json();

                // $this->sales_apiresponse = $data['filtered_data'];

                $this->sales_futureapiresponse = $data['future_dates'];

                $this->accuracy_report = $data['accuracy_report'];

                $this->sales_accuracy_apiresponse = $data['accuracy_test_report'];

                $this->prediction_report = $data['prediction_report'];


                $this->dispatch('update-chart-prediction');

                // debug
                // dd($data);

                $this->alert('success', 'Prediction Ready', [
                    'position' => 'top-end',
                    'timer' => 6000,
                    'toast' => true,
                    'text' => 'Prediction Complete. Click View Prediction Report to see the results.',
                    'showCancelButton' => false,
                    'showConfirmButton' => false,
                ]);
            }
        } catch (\Exception $e) {
            $this->notify('error', 'Prediction failed', 'Prediction failed, Please try again later, maybe the server is downs');
        }

        // dd($response);

        // $this->alert('success', 'This is a success message', [
        //     'position' => 'top-end',
        //     'timer' => 3000,
        //     'toast' => true,
        //     'text' => 'This is a success message',
        //     'showCancelButton' => false,
        //     'showConfirmButton' => false,
        // ]);
        //
    }

    #[Computed]
    public function calculateAccuracy($actual, $predicted, $method = 'mae'): float|int
    {
        if (! is_numeric($actual) || ! is_numeric($predicted)) {
            throw new InvalidArgumentException('Both actual and predicted values must be numeric.');
        }

        $actual = floatval($actual);
        $predicted = floatval($predicted);

        if ($method === 'mae') {
            $absoluteDifference = abs($actual - $predicted);
            // Calculate percentage for MAE

            return ($absoluteDifference / $actual) * 100;
        } elseif ($method === 'mse') {
            // MSE doesn't directly translate to percentage accuracy. Consider alternative metrics like MAPE.
            throw new InvalidArgumentException('MSE calculation doesn\'t directly translate to percentage accuracy. Consider MAPE or alternative approaches.');
        } else {
            throw new InvalidArgumentException('Invalid accuracy method. Choose "mae" or "mse".');
        }
    }

    public function generate_onedshot_prediction($productID)
    {
        $product = DB::table('purchase_items as p')
            ->select(
                DB::raw('SUM(p.quantity) as quantity'),
                'p.created_at',
                DB::raw('COUNT(CASE WHEN c.sentiment = 1 THEN 1 END) as positive'),
                DB::raw('COUNT(CASE WHEN c.sentiment = 0 THEN 1 END) as negative')
            )
            ->join('comments as c', 'c.id', '=', 'p.comment_id')
            ->where('p.product_id', $productID)
            ->groupBy('p.created_at')
            ->get();

        $predict_interval = 'daily';
        $predict_range = 1;
        $custom_range = 1;

        try {
            // send the data to the API with the following parameters, change the link to the correct API endpoint
            $response = Http::timeout(300)->post('http://127.0.0.1:8484/api/v1/predict/oneshot', [
                'product_id' => $productID,
                'interval' => $predict_interval,
                'range' => $predict_range,
                'custom_range' => $custom_range,
                'data' => $product->toArray(),
            ]);

            if ($response->ok()) {

                $data = $response->json();

                // $future = $data['future_dates'];

                $accuracy_report = $data['accuracy_report'];

                $prediction_report = $data['prediction_report'];

                // commbine the two arrays
                return [
                    'accuracy_report' => $accuracy_report,
                    'prediction_report' => $prediction_report,
                ];

                // $this->alert('success', 'Prediction Ready', [
                //     'position' => 'top-end',
                //     'timer' => 3000,
                //     'toast' => true,
                //     'text' => 'Prediction Complete. Click View Prediction Report to see the results.',
                //     'showCancelButton' => false,
                //     'showConfirmButton' => false,
                // ]);

            }
        } catch (\Exception $e) {
            $this->notify('error', 'Prediction failed', 'Prediction not ready, Please try again later, maybe the server is down');
        }
    }

    public function identify_product_torestioc()
    {
        $this->dispatch('update-chart-prediction');
    }
}
