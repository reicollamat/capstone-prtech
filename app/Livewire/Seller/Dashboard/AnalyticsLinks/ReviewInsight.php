<?php

namespace App\Livewire\Seller\Dashboard\AnalyticsLinks;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.seller.seller-layout')]
class ReviewInsight extends Component
{
    public function render()
    {
        return view('livewire..seller.dashboard.analytics-links.review-insight');
    }
}
