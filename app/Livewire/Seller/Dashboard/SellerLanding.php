<?php

namespace App\Livewire\Seller\Dashboard;

use App\Models\Product;
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
        return view('livewire..seller.dashboard.seller-landing');
    }

    #[Computed]
    public function getTotalEarnings()
    {
        // dd($this->seller_id);
        $metrics = Seller::find($this->seller_id)->shopMetrics->first();

        return $metrics;
    }

    #[Computed]
    public function getTotalOrders()
    {
        // dd($this->seller_id);
        // $metrics =

        $orders = Product::join('purchase_items', 'products.id', '=', 'purchase_items.product_id')
            ->join('purchases', 'purchase_items.purchase_id', '=', 'purchases.id')
            ->where('seller_id', $this->seller_id)
            ->groupBy('purchase_id')->count();

        // dd($orders);

        return $orders;
    }
}
