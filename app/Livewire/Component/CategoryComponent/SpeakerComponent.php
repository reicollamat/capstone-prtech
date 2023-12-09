<?php

namespace App\Livewire\Component\CategoryComponent;

use App\Models\User;
use App\Models\Product;
use App\Models\Speaker;
use Livewire\Component;
use App\Models\ProductImage;
use Livewire\Attributes\Reactive;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class SpeakerComponent extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public $previewImage;
    public $previewImageIndex;

    #[Validate('required', message: 'Please provide product name')]
    public $productName;

    #[Validate('required', message: 'Please provide product SKU')]
    public $productSKU;

    #[Validate('required', message: 'Please provide product slug')]
    public $productSlug;

    #[Validate('required', message: 'Please provide product description')]
    public $productDescription;

    #[Validate('required|not_in:Select Condition', message: 'Please provide product condition')]
    public $productCondition;

    #[Validate('required|not_in:Select Status', message: 'Please provide product status')]
    public $productStatus;

    public $productCategory;

    #[Validate(['productImages.*' => 'image|max:5120'])]
    public $productImages = [];

    #[Validate('required', message: 'Please provide a brand')]
    public $brand;

    #[Validate('required', message: 'Please provide a price')]
    public $price;

    #[Validate('required', message: 'Please provide a selection')]
    public $compatibility;

    #[Validate('required', message: 'Please provide a selection')]
    public $speaker_connectivity;

    #[Validate('required', message: 'Please provide a color')]
    public $speaker_color;

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
        return view('livewire.component.category-component.speaker-component');
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
            'compatibility' => 'required|not_in:Click to Select',
            'speaker_connectivity' => 'required|not_in:Click to Select',
            'speaker_color' => 'required',
            'stocks' => 'required|integer',
            'reserve_stocks' => 'required|integer',
        ]);

        // dd($validator);

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
            $speaker = Speaker::create([
                'product_id' => $product->id,
                'category' => $validator['productCategory'],
                'name' => $validator['productName'],
                'brand' => $validator['brand'],
                'price' => $validator['price'],
                'compatibility' => $validator['compatibility'],
                'speaker_connectivity' => $validator['speaker_connectivity'],
                'color' => $validator['speaker_color'],
                'description' => $validator['productDescription'],
                'condition' => $validator['productCondition'],
            ]);

            // dd($speaker, $product);

            // CHECK IF BOTH QUERIES ARE SUCCESSFULL
            if ($product && $speaker) {
                // dd($product, $speaker);
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
