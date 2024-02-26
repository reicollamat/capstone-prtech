<?php

namespace App\Livewire\Seller\Dashboard\AnalyticsLinks;

use App\Helpers\DateGenerator;
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

    public $combinedArray;

    public int $test;

    #[Locked]
    public $seller;

    public function mount()
    {
        $this->seller = Seller::where('user_id', Auth::id())->get()->first();

        $this->summary = 'Monthly';

        $this->test = 0;

        // $this->test_a_func();
        //
        // $this->test_b_func();

        $this->combinedArray = [
            '2024-01-01' => 5,
            '2024-01-02' => 15,
            '2024-01-03' => 2,
            '2024-01-04' => 12,
            '2024-01-05' => 12,
            '2024-01-06' => 11,
            '2024-01-07' => 3,
            '2024-01-08' => 9,
            '2024-01-09' => 7,
            '2024-01-10' => 4,
            '2024-01-11' => 16,
            '2024-01-12' => 20,
            '2024-01-13' => 8,
            '2024-01-14' => 19,
            '2024-01-15' => 19,
            '2024-01-16' => 16,
            '2024-01-17' => 3,
            '2024-01-18' => 13,
            '2024-01-19' => 3,
            '2024-01-20' => 10,
            '2024-01-21' => 13,
            '2024-01-22' => 8,
            '2024-01-23' => 5,
            '2024-01-24' => 7,
            '2024-01-25' => 18,
            '2024-01-26' => 15,
            '2024-01-27' => 20,
            '2024-01-28' => 12,
            '2024-01-29' => 18,
            '2024-01-30' => 4,
            '2024-01-31' => 5,
        ];

        // dd(DateGenerator::generateDates('2024-01-01', 7));

        // dd(array_values($combinedArray));

    }

    public function summaryChange(string $summary)
    {
        $this->summary = $summary;
        if ($summary == 'Weekly') {
            $this->combinedArray = array_slice($this->combinedArray, -7);
        } else {
            $this->combinedArray = array_slice($this->combinedArray, 30);
        }

        $this->test = rand(1, 30);

        $this->dispatch('update-chart');
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
