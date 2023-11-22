<?php

namespace App\Livewire\Seller\Dashboard\ProductLinks;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.seller.seller-layout')]
class ProductAdd extends Component
{
    // default view
    public $view = 'component.category-component.placeholder-component';

    public array $categoryViewMap = [
        'storage' => 'component.category-component.placeholder-component',
        'ext_storage' => 'component.category-component.ext-storage-component',
        'int_storage' => 'component.category-component.int-storage-component',
        'cpu' => 'component.category-component.cpu-component',
        'video_card' => 'component.category-component.video-card-component',
        'motherboard' => 'component.category-component.motherboard-component',
        'memory' => 'component.category-component.memory-component',
        'psu' => 'component.category-component.psu-component',
        'computer_case' => 'component.category-component.computer-case-component',
        'case_fan' => 'component.category-component.case-fan-component',
        'cpu_cooler' => 'component.category-component.cpu-cooler-component',
        'monitor' => 'component.category-component.monitor-component',
        'keyboard' => 'component.category-component.keyboard-component',
        'mouse' => 'component.category-component.mouse-component',
        'speaker' => 'component.category-component.speaker-component',
        'headphone' => 'component.category-component.headphone-component',
        'webcam' => 'component.category-component.webcam-component',
        'other_peripherals' => 'component.category-component.placeholder-component',
    ];

    public $productCategory;

    public function changeCategoryView($category)
    {
        if ($category != $this->productCategory) {
            $this->productCategory = $category;
            $this->view = $this->categoryViewMap[$category];
        }

    }

    public function mount()
    {
        //        $this->view = 'test';
    }

    public function render()
    {
        return view('livewire..seller.dashboard.product-links.product-add');
    }
}
