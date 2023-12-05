<?php

namespace App\Livewire\Component\CategoryComponent;

use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class MonitorComponent extends Component
{
    use WithFileUploads;

    public $previewImage;

    public $previewImageIndex;

    #[Validate('required', message: 'Please provide a CPU Name')]
    public $productName;

    #[Validate('required', message: 'Please provide a CPU SKU')]
    public $productSKU;

    #[Validate('required', message: 'Please provide a CPU Slug')]
    public $productSlug;

    #[Validate('required', message: 'Please provide a CPU Description')]
    public $productDescription;

    #[Validate('required|not_in:Select Condition', message: 'Please provide a CPU Condition')]
    public $productCondition;

    #[Validate('required|not_in:Select Status', message: 'Please provide a CPU Status')]
    public $productStatus;

    public $productCategory;

    #[Validate(['productImages.*' => 'image|max:5120'])]
    public $productImages = [];

    #[Validate('required', message: 'Please provide a brand')]
    public $brand;

    #[Validate('required', message: 'Please provide a price')]
    public $price;

    #[Validate('required', message: 'Please provide a selection')]
    public $native_resolution;

    #[Validate('required', message: 'Please provide a selection')]
    public $input_signal;

    #[Validate('required', message: 'Please provide a selection')]
    public $refresh_rate;

    #[Validate('required', message: 'Please provide a selection')]
    public $screen_size;

    #[Validate('required', message: 'Please provide a color')]
    public $monitor_color;

    #[Validate('required', message: 'Please provide stocks available')]
    public $stocks;

    #[Validate('required', message: 'Please provide a reserve stock if available')]
    public $reserve_stocks;

    public function mount($productCategory)
    {

        $this->productCategory = $productCategory;
    }

    public function render()
    {
        return view('livewire.component.category-component.monitor-component');
    }

    public function submit()
    {
        $validator = $this->validate([
            'productName' => 'required',
            'productSKU' => 'required',
            'productSlug' => 'required',
            'productDescription' => 'required',
            'productCondition' => 'required|not_in:Select Condition',
            'productStatus' => 'required|not_in:Select Status',
            'productCategory' => 'required',
            'productImages.*' => 'image|max:5120',
            'brand' => 'required',
            'price' => 'required|integer',
            'native_resolution' => 'required|not_in:Click to Select',
            'input_signal' => 'required|not_in:Click to Select',
            'refresh_rate' => 'required|not_in:Click to Select',
            'screen_size' => 'required|integer',
            'monitor_color' => 'required',
            'stocks' => 'required|integer',
            'reserve_stocks' => 'required|integer',
        ]);

        if ($validator) {

            dd($validator);
        }

        // if ($validator) {
        //     dd($validator);
        // }
        // dd($validator);

        // $links = [];
        // $storeas = [];
        // foreach ($this->productImages as $image) {
        //     $links[] = $image->temporaryUrl();
        //     $path = $image->store('product-image-uploads');
        //
        //     $storeas[] = $path;
        // }
        // dd($storeas);
    }
}
