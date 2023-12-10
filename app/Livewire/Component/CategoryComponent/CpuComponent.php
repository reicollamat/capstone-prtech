<?php

namespace App\Livewire\Component\CategoryComponent;

use App\Models\Cpu;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

use function Livewire\store;

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

    #[Validate(['productImages.*' => 'image|max:2048'])]
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
        $this->productCategory = $productCategory;
    }

    public function render()
    {
        return view('livewire.component.category-component.cpu-component');
    }

    public function submit()
    {
        // dd($validator);
        // dd('test');
        // VALIDATE THE INPUT VALUES ACCORDING TO THE VALIDATION RULES
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
                // 'image' => count($storeas) > 0 ? $storeas : ['img/no-image-placeholder.png'],
                'condition' => $validator['productCondition'],
            ]);

            // loop through the images from the file upload
            // if there are many images in the array loop it and  create a row in db
            if (count($storeas) > 0) {
                foreach ($storeas as $image) {
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image_paths' => $image,
                    ]);
                }
            // else if there is only one image in the array create a row in db with no image
            } else {
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_paths' => 'img/no-image-placeholder.png',
                ]);
            }

            // $images = ProductImage::create([
            //     'image_paths' => count($storeas) > 0 ? $storeas : ['img/no-image-placeholder.png'],
            // ]);

            // 'COLUMN NAME IN DATABASE' => $validator['VALUE']
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
            // CHECK IF BOTH QUERIES ARE SUCCESSFULL
            if ($product && $cpu) {
                // dd($product, $cpu);
                $this->alert('success', 'Product has been created successfully.', [
                    'position' => 'top-end']);
                $this->reset();
            } else {
                $this->alert('error', 'Product has not been created.', [
                    'position' => 'top-end']);
            }

        } else {
            $this->alert('error', 'Unkown error has occurred', [
                'position' => 'top-end']);
        }
    }

    /**
     * Sets the image URL and index for the preview image.
     *
     * @param  string  $imageurl The URL of the image.
     * @param  int  $imageindex The index of the image.
     *
     * @throws \Exception
     */
    public function setImage($imageurl, $imageindex): void
    {
        $this->previewImage = $imageurl;
        $this->previewImageIndex = $imageindex;
    }

    /**
     * Removes a photo from the productImages array at the specified index.
     *
     * @param  int  $imageindex The index of the photo to remove.
     *
     * @throws \Exception If the index is out of bounds.
     */
    public function removePhoto($imageindex): void
    {
        array_splice($this->productImages, $imageindex, 1);
    }
}
