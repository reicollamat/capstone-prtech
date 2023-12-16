<?php

namespace App\Livewire\Seller\Dashboard\AnalyticsLinks;

use App\Models\Product;
use App\Models\Seller;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.seller.seller-layout')]
class AnalyticsModelReport extends Component
{

    public $seller;

    public function mount()
    {
        $this->seller = Seller::where('user_id', Auth::id())->get()->first();
    }

    #[Computed]
    public function getTopProducts()
    {
        // query for purchased items of products from current seller
        $this->top_products = Product::where('seller_id', $this->seller->id);

        // dd($this->top_products->get());

        // return collection of shipment items of products from current seller
        return $this->top_products->orderBy('rating', 'desc')->take(10)->get();
    }


    public function shopEngagement()
    {
    }

    public function shopSentiment()
    {
    }

    public function render()
    {
        return view('livewire..seller.dashboard.analytics-links.analytics-model-report');
    }
}
