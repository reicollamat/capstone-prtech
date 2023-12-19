<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

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

    //#create a function upon cliuckg search send a get request to search

    public $selected_category;

    public $search = '';

    public $search_return;

    public function mount()
    {
        $this->selected_category = 'all_products';
    }

    public function clearsearch()
    {
        $this->search = '';
    }

    public function placeholder(array $params = [])
    {
        return view('livewire.search.placeholder', $params);
    }

    public function render()
    {
        if (strlen($this->search) > 2) {
            if ($this->selected_category == 'all_products') {
                // $this->search_return = Product::where('title', 'ilike', "%{$this->search}%") // POSTGRES
                $this->search_return = Product::where(strtolower('title'), 'like', "%{$this->search}%")
                    ->get();
            } else {
                // $this->search_return = Product::where('title', 'ilike', "%{$this->search}%") // POSTGRES
                $this->search_return = Product::where(strtolower('title'), 'like', "%{$this->search}%")
                    ->where('category', $this->selected_category)
                    ->get();
            }
        } else {
            $this->search_return = '';
        }

        return view('livewire.searchbar');
    }

    public function submit()
    {
        $this->redirectRoute('index_shop', ['q' => $this->search]);
    }
}
