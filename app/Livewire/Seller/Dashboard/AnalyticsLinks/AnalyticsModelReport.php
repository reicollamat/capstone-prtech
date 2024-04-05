<?php

namespace App\Livewire\Seller\Dashboard\AnalyticsLinks;

use App\Helpers\DateGenerator;
use App\Models\Product;
use App\Models\Seller;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.seller.seller-layout')]
class AnalyticsModelReport extends Component
{
    use WithPagination;

    public $summary;

    public $productselected;

    public $productselectedprice;

    public $searchquery;

    public $predictinterval;

    public $predictrange;

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

    #[Locked]
    public $seller;

    public function mount()
    {
        $this->seller = Seller::where('user_id', Auth::id())->get()->first();

        $this->summary = 'Monthly';

        $this->test = 0;

        $this->ending_date = date('Y-m-d');

        $this->userEndingDate = date('Y-m-d');

        $this->userStartingDate = Carbon::now()->subDays(30)->format('Y-m-d');

        // $this->test_a_func();
        //
        // $this->test_b_func();

        $this->combinedArray = ['2024-01-01' => 5, '2024-01-02' => 15, '2024-01-03' => 2, '2024-01-04' => 12, '2024-01-05' => 12, '2024-01-06' => 11, '2024-01-07' => 3, '2024-01-08' => 9, '2024-01-09' => 7, '2024-01-10' => 4, '2024-01-11' => 16, '2024-01-12' => 20, '2024-01-13' => 8, '2024-01-14' => 19, '2024-01-15' => 19, '2024-01-16' => 16, '2024-01-17' => 3, '2024-01-18' => 13, '2024-01-19' => 3, '2024-01-20' => 10, '2024-01-21' => 13, '2024-01-22' => 8, '2024-01-23' => 5, '2024-01-24' => 7, '2024-01-25' => 18, '2024-01-26' => 15, '2024-01-27' => 20, '2024-01-28' => 12, '2024-01-29' => 18, '2024-01-30' => 4, '2024-01-31' => 5];

        $this->combinedArray2 = [
            '2024-02-01' => 2,
            '2024-02-02' => 3,
            '2024-02-03' => 5,
            '2024-02-04' => 0,
            '2024-02-05' => 5,
            '2024-02-06' => 3,
            '2024-02-07' => 6,
            '2024-02-08' => 8,
            '2024-02-09' => 5,
            '2024-02-10' => 7,
            '2024-02-11' => 5,
            '2024-02-12' => 3,
            '2024-02-13' => 6,
            '2024-02-14' => 7,
            '2024-02-15' => 0,
        ];
        // dd(DateGenerator::generateDates('2024-01-01', 7));

        // dd(array_values($combinedArray));

        $this->restock_now();

    }

    public function selectProduct($product): void
    {
        $this->productselected = $product;

        $_product = Product::findOrFail($product);

        $this->productselected = $_product->title;
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

    #[Computed]
    public function restock_now()
    {
        return Product::where('seller_id', $this->seller->id)
            ->whereColumn('stock', '<=', 'reserve')
            ->orderBy('stock', 'asc')
            ->get();
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

        $this->makeChart($this->productselected);

        $this->dispatch('update-chart');
        // dd($this->user_starting_date, $this->user_ending_date);
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

    public function test_a_func()
    {
        $this->test_a = ['2024-01-01', '2024-01-02', '2024-01-03', '2024-01-04', '2024-01-05', '2024-01-06', '2024-01-07', '2024-01-08', '2024-01-09', '2024-01-10', '2024-01-11', '2024-01-12', '2024-01-13', '2024-01-14', '2024-01-15', '2024-01-16', '2024-01-17', '2024-01-18', '2024-01-19', '2024-01-20', '2024-01-21', '2024-01-22', '2024-01-23', '2024-01-24', '2024-01-25', '2024-01-26', '2024-01-27', '2024-01-28', '2024-01-29', '2024-01-30', '2024-01-31'];
    }

    public function test_b_func()
    {
        $this->test_b = [5, 15, 2, 12, 12, 11, 3, 9, 7, 4, 16, 20, 8, 19, 19, 16, 3, 13, 3, 10, 13, 8, 5, 7, 18, 15, 20, 12, 18, 4, 5];
    }

    public function render()
    {
        return view('livewire..seller.dashboard.analytics-links.analytics-model-report');
    }

    #[Computed]
    public function restock_soon()
    {
        return Product::where('seller_id', $this->seller->id)
            ->whereColumn('stock', '<', DB::raw('reserve + 10'))
            ->whereColumn('stock', '>', 'reserve')
            ->orderBy('stock', 'asc')
            ->get();
    }
}
