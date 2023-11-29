<?php

namespace App\Livewire\Component\CategoryComponent;

use Livewire\Attributes\Reactive;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CpuComponent extends Component
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

    #[Validate('required', message: 'Please provide a CPU Name')]
    public $cpu_name;

    #[Validate('required', message: 'Please provide a price')]
    public $price;

    #[Validate('required', message: 'Please provide a CPU Clock')]
    public $base_clock;

    #[Validate('required', message: 'Please provide a CPU Clock')]
    public $boost_clock;

    #[Validate('required', message: 'Please provide a CPU TDP')]
    public $tdp;

    #[Validate('required', message: 'Please provide a CPU IGPU if available')]
    public $igpu;

    #[Validate('required', message: 'Please provide a CPU Unlocked if available')]
    public $oc_unlocked;

    #[Validate('required', message: 'Please provide stocks available')]
    public $stocks;

    #[Validate('required', message: 'Please provide a CPU Reserve Stock if available')]
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
        return view('livewire.component.category-component.cpu-component');
    }

    public function submit()
    {
        $this->dispatch('on-save');

        $validator = $this->validate([
            'productName' => 'required',
            'productSKU' => 'required',
            'productSlug' => 'required',
            'productDescription' => 'required',
            'productCondition' => 'required|not_in:Select Condition',
            'productStatus' => 'required|not_in:Select Status',
            'productCategory' => 'required',
            'productImages.*' => 'image|max:5120',
            'cores_threads' => 'required',
            'cpu_name' => 'required',
            'price' => 'required|integer',
            'base_clock' => 'required',
            'boost_clock' => 'required',
            'tdp' => 'required',
            'igpu' => 'required|not_in:Click to Select',
            'oc_unlocked' => 'required|not_in:Click to Select',
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
