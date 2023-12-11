<?php

namespace App\Livewire\Seller\Dashboard;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\Seller;
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

        // $this->getTotalEarnings();

    }

    public function render()
    {

        $salesByDate = []; // Array to store aggregated sales by date

        $salesData = Purchase::where('seller_id', $this->seller_id)->where('purchase_status', 'completed')
            ->select(['total_amount', 'completion_date'])
            ->get();

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
}
