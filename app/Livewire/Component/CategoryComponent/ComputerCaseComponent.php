<?php

namespace App\Livewire\Component\CategoryComponent;

use Livewire\Attributes\Reactive;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class ComputerCaseComponent extends Component
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

    public $brand;

    public $price;

    public $size;

    public $dimensions_lwh;

    public $case_color;

    public $sidepanel;

    public $ssd_bays;

    public $hdd_bays;

    public $length_psu;

    public $length_gpu;

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
        return view('livewire.component.category-component.computer-case-component');
    }

    public function submit()
    {
        $validator = $this->validate([
            'productImages.*' => 'image|max:5120',
            'brand' => 'required',
            'price' => 'required|integer',
            'size' => 'required',
            'dimensions_lwh' => 'required',
            'case_color' => 'required',
            'sidepanel' => 'required|not_in:Click to Select',
            'ssd_bays' => 'required|integer',
            'hdd_bays' => 'required|integer',
            'length_psu' => 'required|integer',
            'length_gpu' => 'required|integer',
        ]);

        dd($validator);

        $links = [];
        $storeas = [];
        foreach ($this->productImages as $image) {
            $links[] = $image->temporaryUrl();
            $path = $image->store('product-image-uploads');

            $storeas[] = $path;
        }
        dd($storeas);
    }
}
