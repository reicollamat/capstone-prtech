<?php

namespace App\Livewire\Seller\Dashboard\AnalyticsLinks;

use App\Models\Seller;
use Illuminate\Support\Facades\Auth;
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

    public $searchquery;

    public $predictinterval;

    public $predictrange;

    public $test_a;

    public $test_b;

    #[Locked]
    public $seller;

    public function mount()
    {
        $this->seller = Seller::where('user_id', Auth::id())->get()->first();

        $this->summary = 'Monthly';

        $this->test_a_func();

        $this->test_b_func();

    }

    public function test_a_func()
    {
        $this->test_a = ['2024-01-01',
            '2024-01-02',
            '2024-01-03',
            '2024-01-04',
            '2024-01-05',
            '2024-01-06',
            '2024-01-07',
            '2024-01-08',
            '2024-01-09',
            '2024-01-10',
            '2024-01-11',
            '2024-01-12',
            '2024-01-13',
            '2024-01-14',
            '2024-01-15',
            '2024-01-16',
            '2024-01-17',
            '2024-01-18',
            '2024-01-19',
            '2024-01-20',
            '2024-01-21',
            '2024-01-22',
            '2024-01-23',
            '2024-01-24',
            '2024-01-25',
            '2024-01-26',
            '2024-01-27',
            '2024-01-28',
            '2024-01-29',
            '2024-01-30',
            '2024-01-31',
        ];
    }

    public function test_b_func()
    {
        $this->test_b = [
            5,
            15,
            2,
            12,
            12,
            11,
            3,
            9,
            7,
            4,
            16,
            20,
            8,
            19,
            19,
            16,
            3,
            13,
            3,
            10,
            13,
            8,
            5,
            7,
            18,
            15,
            20,
            12,
            18,
            4,
            5,
        ];
    }

    public function render()
    {
        return view('livewire..seller.dashboard.analytics-links.analytics-model-report');
    }
}
