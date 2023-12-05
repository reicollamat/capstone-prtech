<?php

namespace App\Livewire\Component\CategoryComponent;

use App\Models\User;
use App\Models\Memory;
use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class MemoryComponent extends Component
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

    #[Validate('required', message: 'Please provide a selection')]
    public $mem_gen;

    #[Validate('required', message: 'Please provide how many memory modules')]
    public $modules;

    #[Validate('required', message: 'Please provide memory capacity')]
    public $mem_cap;

    #[Validate('required', message: 'Please provide memory speed')]
    public $mem_speed;

    #[Validate('required', message: 'Please provide memory (CAS) latency')]
    public $mem_latency;

    #[Validate('required', message: 'Please provide a color')]
    public $mem_color;

    #[Validate('required', message: 'Please provide a selection')]
    public $mem_rgb;

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
        return view('livewire.component.category-component.memory-component');
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
            'mem_gen' => 'required|not_in:Click to Select',
            'modules' => 'required',
            'mem_cap' => 'required|integer',
            'mem_speed' => 'required|integer',
            'mem_latency' => 'required|integer',
            'mem_color' => 'required',
            'mem_rgb' => 'required|not_in:Click to Select',
            'stocks' => 'required|integer',
            'reserve_stocks' => 'required|integer',
        ]);

        // dd($validator);

        // CREATE A ARRAY TO STORE THE IMAGE PATH
        $storeas = [];

        if ($validator) {
            // create a array of image filename and store in ain storage/app/product-image-uploads
            foreach ($this->productImages as $image) {
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
                'stock' => $validator['stocks'],
                'reserve' => $validator['reserve_stocks'],
                // 'image' => implode(',', $storeas),
                'image' => count($storeas) > 0 ? $storeas : ['img/no-image-placeholder.png'],
                'condition' => $validator['productCondition'],
            ]);
            // 'COLUMN NAME IN DATABASE' => $validator['VALUE']
            $memory = Memory::create([
                'product_id' => $product->id,
                'category' => $validator['productCategory'],
                'name' => $validator['productName'],
                'brand' => $validator['brand'],
                'price' => $validator['price'],
                'speed' => $validator['mem_speed'],
                'cas_latency' => $validator['mem_latency'],
                'modules' => $validator['modules'],
                'color' => $validator['mem_color'],
                // 'smt' => $value->smt,
                'description' => $validator['productDescription'],
                'condition' => $validator['productCondition'],
            ]);

            // dd($memory, $product);

            // CHECK IF BOTH QUERIES ARE SUCCESSFULL
            if ($product && $memory) {
                // dd($product, $cpu);
                $this->alert('success', 'Product has been created successfully.', [
                    'position' => 'top-end'
                ]);
                $this->reset();
            } else {
                $this->alert('error', 'Product has not been created.', [
                    'position' => 'top-end'
                ]);
            }
        } else {
            $this->alert('error', 'Unkown error has occurred', [
                'position' => 'top-end'
            ]);
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
