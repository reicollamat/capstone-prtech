<?php

namespace App\Livewire\Component\CategoryComponent;

use Livewire\Attributes\Reactive;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class WebcamComponent extends Component
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

    public $webcam_connection_type;

    public $resolution;

    public $webcam_fps;

    public $audio_support;

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
        return view('livewire.component.category-component.webcam-component');
    }

    public function submit()
    {
        $validator = $this->validate ([
        'productImages.*' => 'image|max:5120',
        'brand' => 'required',
        'price' => 'required|integer',
        'webcam_connection_type' => 'required|not_in:Click to Select',
        'resolution' => 'required|not_in:Click to Select',
        'webcam_fps' => 'required|integer',
        'audio_support' => 'required|not_in:Click to Select',
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
