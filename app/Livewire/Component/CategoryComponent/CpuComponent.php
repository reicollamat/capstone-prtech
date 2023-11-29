<?php

namespace App\Livewire\Component\CategoryComponent;

use App\Models\Cpu;
use App\Models\Product;
use App\Models\Seller;
use App\Models\User;
use Auth;
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

    #[Validate('required', message: 'Please provide a CPU Core / Threads Count')]
    public $cpu_core_threads;

    #[Validate('required', message: 'Please provide a CPU Price')]
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
            'cpu_core_threads' => 'required',
            'price' => 'required|integer',
            'base_clock' => 'required',
            'boost_clock' => 'required',
            'tdp' => 'required',
            'igpu' => 'required|not_in:Click to Select',
            'oc_unlocked' => 'required|not_in:Click to Select',
            'stocks' => 'required|integer',
            'reserve_stocks' => 'required|integer',
        ]);

        // $links = [];
        $storeas = [];

        if ($validator) {
            // create a array of image filename and store in ain storage/app/product-image-uploads
            foreach ($this->productImages as $image) {
                // $links[] = $image->temporaryUrl();
                $path = $image->store('product-image-uploads', 'real_public');
                $storeas[] = $path;
            }

            // 'COLUMN NAME IN DATABASE' => $validator['VALUE']
            $product = Product::create([
                'seller_id' => User::find(Auth::user()->id)->seller->id,
                'title' => $validator['productName'],
                'slug' => $validator['productSlug'],
                'SKU' => $validator['productSKU'],
                'category' => $validator['productCategory'],
                'price' => $validator['price'],
                // 'rating' => 0,
                'stocks' => $validator['stocks'],
                'reserve' => $validator['reserve_stocks'],
                'image' => implode(',', $storeas),
                // 'image' => ($storeas),
                'condition' => $validator['productCondition'],
            ]);
            $cpu = Cpu::create([
                'product_id' => $product->id,
                'category' => $validator['productCategory'],
                'name' => $validator['productName'],
                'price' => $validator['price'],
                'core_count' => $validator['cpu_core_threads'],
                'core_clock' => $validator['base_clock'],
                'boost_clock' => $validator['boost_clock'],
                'tdp' => $validator['tdp'],
                'graphics' => $validator['igpu'],
                // 'smt' => $value->smt,
                'description' => $validator['productDescription'],
                'condition' => $validator['productCondition'],
            ]);
            if ($product && $cpu) {
                $this->dispatch('product-saved');
                $this->reset();
                dd($cpu);
            }

            // dd(User::find(Auth::user()->id)->seller->id);
        }

        // if ($validator) {
        //     dd($validator);
        // }
        // dd($validator);

        // dd($storeas, $path);
    }
}
