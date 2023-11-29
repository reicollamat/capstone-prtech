<?php

namespace App\Livewire\Component\CategoryComponent;

use Livewire\Attributes\Reactive;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class VideoCardComponent extends Component
{
    use WithFileUploads;

    public $previewImage;

    #[Reactive]
    public $productName;

    #[Reactive]
    public $productSKU;

    #[Reactive]
    public $productSlug;

    #[Reactive]
    public $productDescription;

    #[Reactive]
    public $productCondition;

    #[Reactive]
    public $productStatus;

    #[Reactive]
    public $productCategory;

    #[Validate(['productImages.*' => 'image|max:5120'])]
    public $productImages = [];

    #[Validate('required', message: 'Please provide a brand')]
    public $brand;

    #[Validate('required', message: 'Please provide a price')]
    public $price;

    #[Validate('required', message: 'Please provide a selection')]
    public $gpu_chipset;

    #[Validate('required', message: 'Please provide an input')]
    public $gpu_vram;

    #[Validate('required', message: 'Please provide an input')]
    public $gpu_pcie;

    #[Validate('required', message: 'Please provide an input')]
    public $gpu_base;

    #[Validate('required', message: 'Please provide an input')]
    public $gpu_boost;

    #[Validate('required', message: 'Please provide an input')]
    public $gpu_size;

    #[Validate('required', message: 'Please provide stocks available')]
    public $stocks;

    #[Validate('required', message: 'Please provide a reserve stock if available')]
    public $reserve_stocks;

    public function mount($productName, $productSKU, $productSlug, $productDescription, $productCondition, $productStatus, $productCategory)
    {
        $this->productName = $productName;
        $this->productSKU = $productSKU;
        $this->productSlug = $productSlug;
        $this->productDescription = $productDescription;
        $this->productCondition = $productCondition;
        $this->productStatus = $productStatus;
        $this->productCategory = $productCategory;
    }

    public function render()
    {
        return view('livewire.component.category-component.video-card-component');
    }

    public function submit()
    {
        $validator = $this->validate ([
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
        'gpu_chipset' => 'required|not_in:Click to Select',
        'gpu_vram' => 'required|integer',
        'gpu_pcie' => 'required',
        'gpu_base' => 'required|integer',
        'gpu_boost' => 'required|integer',
        'gpu_size' => 'required',
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
