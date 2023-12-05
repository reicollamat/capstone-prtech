<?php

namespace App\Livewire\Component\CategoryComponent;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CaseFanComponent extends Component
{
    use LivewireAlert;
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

    #[Validate('required', message: 'Please provide a fan size')]
    public $fan_size;

    #[Validate('required', message: 'Please provide a fan CFM')]
    public $fan_cfm;

    #[Validate('required', message: 'Please provide a fan RPM')]
    public $fan_rpm;

    #[Validate('required', message: 'Please provide a classification')]
    public $fan_rgb;

    #[Validate('required', message: 'Please provide a classification')]
    public $fan_connection;

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
        return view('livewire.component.category-component.case-fan-component');
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
            'fan_size' => 'required|integer',
            'fan_cfm' => 'required|integer',
            'fan_rpm' => 'required|integer',
            'fan_rgb' => 'required|not_in:Click to Select',
            'fan_connection' => 'required|not_in:Click to Select',
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
