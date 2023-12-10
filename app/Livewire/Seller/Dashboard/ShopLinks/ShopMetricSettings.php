<?php

namespace App\Livewire\Seller\Dashboard\ShopLinks;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('layouts.seller.seller-layout')]
class ShopMetricSettings extends Component
{
    #[Validate('required')]
    public $targetSales;

    public $currentTargetSales;

    public function mount()
    {
        $shopMetrics = User::findOrFail(Auth::user()->id)->seller->shopMetrics->first() ?? 0;

        // dd($shopMetrics->target_sales);
        $this->currentTargetSales = $shopMetrics->target_sales ?? 0;
    }

    public function render()
    {
        return view('livewire.seller.dashboard.shop-links.shop-metric-settings');
    }

    public function submit()
    {
        $validator = $this->validate([
            'targetSales' => 'required',
        ]);
        dd($validator);
    }
}
