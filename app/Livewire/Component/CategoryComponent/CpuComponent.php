<?php

namespace App\Livewire\Component\CategoryComponent;

use App\Models\Cpu;
use App\Models\Product;
use App\Models\Seller;
use App\Models\User;
use Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CpuComponent extends Component
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

    #[Validate('required|not_in:Click to Select', message: 'Please provide a CPU IGPU if available')]
    public $igpu;

    #[Validate('required|not_in:Click to Select', message: 'Please provide a CPU Unlocked if available')]
    public $oc_unlocked;

    #[Validate('required', message: 'Please provide stocks available')]
    public $stocks;

    #[Validate('required', message: 'Please provide a CPU Reserve Stock if available')]
    public $reserve_stocks;

    public function mount($productCategory)
    {
        // $this->productName = $productName;
        // $this->productSKU = $productSKU;
        // $this->productSlug = $productSlug;
        // $this->productDescription = $productDescription;
        // $this->productCondition = $productCondition;
        // $this->productStatus = $productStatus;
        $this->productCategory = $productCategory;
    }

    public function render()
    {
        return view('livewire.component.category-component.cpu-component');
    }

    public function submit()
    {
        $this->dispatch('on-save');

        $this->alert('success', 'Product has been created successfully.', [
            'position' => 'top-end']);

        // dd('test');

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

        // dd($validator);

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
                'stock' => $validator['stocks'],
                'reserve' => $validator['reserve_stocks'],
                // 'image' => implode(',', $storeas),
                'image' => $storeas,
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
                $this->alert('success', 'Product has been created successfully.', [
                    'position' => 'top-end']);
                $this->reset();
            } else {
                $this->alert('error', 'Product has not been created.', [
                    'position' => 'top-end']);
            }

            // dd(User::find(Auth::user()->id)->seller->id);
        }

    }

    public function setImage($imageurl, $imageindex): void
    {
        $this->previewImage = $imageurl;
        $this->previewImageIndex = $imageindex;
    }

    public function removePhoto($imageindex): void
    {
        array_splice($this->productImages, $imageindex, 1);
    }

    public function tryAlert()
    {
        // $this->dispatch('product-saved');
        // $this->alert('success', 'Successssssssssssssssssssssss', [
        //     'position' => 'top-end']);
        // $this->alert('error', 'Success', [
        //     'position' => 'top-end']);
        // $this->alert('success', 'Success is approaching!');
        // dd('tse');
    }
}
