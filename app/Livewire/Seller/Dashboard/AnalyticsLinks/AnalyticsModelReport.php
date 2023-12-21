<?php

namespace App\Livewire\Seller\Dashboard\AnalyticsLinks;

use App\Models\Product;
use App\Models\Seller;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.seller.seller-layout')]
class AnalyticsModelReport extends Component
{
    use WithPagination;

    #[Locked]
    public $seller;

    public $restock_amounts;

    public function mount()
    {
        $this->seller = Seller::where('user_id', Auth::id())->get()->first();

        // dd($this->seller->id);

        $this->restock_amounts = [
            ['future_predictions_plot0' => 8],
            ['future_predictions_plot1' => 67],
            ['future_predictions_plot2' => 6],
            ['future_predictions_plot3' => 14],
            ['future_predictions_plot4' => 47],
            ['future_predictions_plot5' => 40],
            ['future_predictions_plot6' => 10],
            ['future_predictions_plot7' => 15],
            ['future_predictions_plot8' => 19],
            ['future_predictions_plot9' => 10],
            ['future_predictions_plot10' => 12],
            ['future_predictions_plot11' => 38],
            ['future_predictions_plot12' => 8],
            ['future_predictions_plot13' => 5],
            ['future_predictions_plot14' => 54],
            ['future_predictions_plot15' => 9],
            ['future_predictions_plot16' => 54],
            ['future_predictions_plot17' => 39],
            ['future_predictions_plot18' => 12],
            ['future_predictions_plot19' => 12],
            ['future_predictions_plot20' => 6],
            ['future_predictions_plot21' => 25],
            ['future_predictions_plot22' => 3],
            ['future_predictions_plot23' => 16],
            ['future_predictions_plot24' => 4],
            ['future_predictions_plot25' => 20],
            ['future_predictions_plot26' => 12],
            ['future_predictions_plot27' => 30],
            ['future_predictions_plot28' => 14],
            ['future_predictions_plot29' => 20],
            ['future_predictions_plot30' => 46],
            ['future_predictions_plot31' => 30],
            ['future_predictions_plot32' => 25],
            ['future_predictions_plot33' => 10],
            ['future_predictions_plot34' => 18],
            ['future_predictions_plot35' => 10],
            ['future_predictions_plot36' => 40],
            ['future_predictions_plot37' => 12],
        ];
    }

    #[Computed]
    public function getTopProducts()
    {
        // query for purchased items of products from current seller
        $this->top_products = Product::has('purchase_items')->where('seller_id', $this->seller->id);

        // dd($this->top_products->get());

        // return collection of shipment items of products from current seller
        return $this->top_products->orderBy('rating', 'desc')->take(10)->get();
    }

    #[Computed]
    public function getMostPositiveReviewedProducts()
    {
        // dd($this->seller->id);

        $all_products = Product::where('seller_id', $this->seller->id)
            ->where('rating', '>=', 3)
            ->orderBy('rating', 'desc')
            ->get();

        return $all_products;

    }

    #[Computed]
    public function getMostBoughtProducts()
    {
        $all_products = Product::where('seller_id', $this->seller->id)
            ->where('purchase_count', '>=', 1)
            ->orderBy('purchase_count', 'desc')
            ->get();

        return $all_products;
    }

    #[Computed]
    public function getMostNegativeReviewedProducts()
    {
        $all_products = Product::where('seller_id', $this->seller->id)
            ->where('rating', '<=', 2)
            ->orderBy('rating', 'desc')
            ->get();

        return $all_products;
    }

    public function render()
    {
        return view('livewire..seller.dashboard.analytics-links.analytics-model-report');
    }
}
