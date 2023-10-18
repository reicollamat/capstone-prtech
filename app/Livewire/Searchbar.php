<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
class Searchbar extends Component
{
    public array $categories = [
        'storage' => '1 Storage',
        'external_storage' => '1.1 External Storage',
        'internal_storage' => '1.2 Internal Storage',
        'processor_cpu' => 'Processor(CPU)',
        'graphics_card' => 'Graphics Card',
        'motherboard' => 'Motherboard',
        'memory_ram' => 'Memory (RAM)',
        'power_supply_unit_psu' => 'Power Supply Unit (PSU)',
        'computer_case' => 'Computer Case',
        'case_fan' => 'Case Fan',
        'cpu_cooler' => 'CPU Cooler',
        'monitor' => 'Monitor',
        'keyboard' => 'Keyboard',
        'mouse' => 'Mouse',
        'other_peripherals' => '2 Other Peripherals',
        'speaker' => '2.1 Speaker',
        'headphone' => '2.2 Headphone',
        'webcam' => '2.3 Webcam',
    ];

    protected function queryString()
    {
        return [
            'search' => [
                'as' => 'q',
            ],
        ];
    }
    public $selected_category;


    public $search = '';
    public $search_return;
    public function mount(){
        $this->categories;
        $this->selected_category ='all_products';
//        $this->reset();
    }
    public function clearsearch(){
        $this->search = '';
    }
    public function placeholder()
    {
        return <<<'HTML'
        <div>
            <p1>loading</p1>
        </div>
        HTML;
    }

//    public function search($search){
//        $search = '%' . $this->search . '%';
//        $this->search_return = Product::where('title', 'ilike', $search)
//            ->limit(5)
//            ->get();
//    }
    public function render()
    {
        if (strlen($this->search) > 2) {
            $this->search_return = Product::where('title', 'ilike', "%{$this->search}%")
                ->limit(5)
                ->get();
        }else{
            $this->search_return = '';
        }
        return view('livewire.searchbar');
    }
}
