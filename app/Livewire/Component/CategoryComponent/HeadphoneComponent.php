<?php

namespace App\Livewire\Component\CategoryComponent;

use App\Models\Headphone;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class HeadphoneComponent extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public $previewImage;

    public $previewImageIndex;

    #[Validate('required', message: 'Please provide product name')]
    public $productName;

    // #[Validate('required', message: 'Please provide product SKU')]
    // public $productSKU;

    // #[Validate('required', message: 'Please provide product slug')]
    // public $productSlug;

    #[Validate('required', message: 'Please provide product description')]
    public $productDescription;

    #[Validate('required|not_in:Select Condition', message: 'Please provide product condition')]
    public $productCondition;

    #[Validate('required|not_in:Select Status', message: 'Please provide product status')]
    public $productStatus;

    #[Validate('required|numeric', message: 'Please provide product weight')]
    public $product_weight;

    public $productCategory;

    #[Validate(['productImages.*' => 'image|max:5120'])]
    public $productImages = [];

    #[Validate('required', message: 'Please provide a brand')]
    public $brand;

    #[Validate('required', message: 'Please provide a price')]
    public $price;

    #[Validate('required', message: 'Please provide headphone sensitivity')]
    public $sensitivity;

    #[Validate('required|not_in:Click to Select', message: 'Please provide headphone connection type')]
    public $headphone_connection_type;

    #[Validate('required|not_in:Click to Select', message: 'Please provide headphone noise control')]
    public $noise_control;

    #[Validate('required|not_in:Click to Select', message: 'Please provide headphone mic availability')]
    public $mic_availability;

    #[Validate('required', message: 'Please provide headphone color')]
    public $color;

    #[Validate('required|not_in:Click to Select', message: 'Please provide headphone enclosure type')]
    public $enclosure_type;

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
        return view('livewire.component.category-component.headphone-component');
    }

    public function submit()
    {
        $validator = $this->validate([
            'productName' => 'required',
            // 'productSKU' => 'required',
            // 'productSlug' => 'required',
            'productDescription' => 'required',
            'productCondition' => 'required|not_in:Select Condition',
            'productStatus' => 'required|not_in:Select Status',
            'product_weight' => 'required|numeric',
            'productCategory' => 'required',
            'productImages.*' => 'image|max:5120',
            'brand' => 'required',
            'price' => 'required|numeric',
            'sensitivity' => 'required|not_in:Click to Select',
            'headphone_connection_type' => 'required|not_in:Click to Select',
            'noise_control' => 'required|not_in:Click to Select',
            'mic_availability' => 'required|not_in:Click to Select',
            'color' => 'required',
            'enclosure_type' => 'required',
            'stocks' => 'required|integer',
            'reserve_stocks' => 'required|integer',
        ]);

        // dd($validator);
        //
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
                // 'slug' => $validator['productSlug'],
                // 'SKU' => $validator['productSKU'],
                'category' => $validator['productCategory'],
                'price' => $validator['price'],
                'stock' => $validator['stocks'],
                'reserve' => $validator['reserve_stocks'],
                // 'image' => implode(',', $storeas),
                // 'image' => count($storeas) > 0 ? $storeas : ['img/no-image-placeholder.png'],
                'condition' => $validator['productCondition'],
                'status' => $validator['productStatus'],
                'weight' => $validator['product_weight'],
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
            $headphone = Headphone::create([
                'product_id' => $product->id,
                'category' => $validator['productCategory'],
                'name' => $validator['productName'],
                'brand' => $validator['brand'],
                'price' => $validator['price'],
                'type' => $validator['enclosure_type'],
                'frequency_response' => $validator['sensitivity'],
                'connection_type' => $validator['headphone_connection_type'],
                'noise_control' => $validator['noise_control'],
                'microphone' => $validator['mic_availability'],
                'color' => $validator['color'],
                // 'enclosure_type' => $validator['enclosure_type'],
                'description' => $validator['productDescription'],
                'condition' => $validator['productCondition'],
            ]);

            // dd($headphone, $product);

            // CHECK IF BOTH QUERIES ARE SUCCESSFULL
            if ($product && $headphone) {
                // dd($product, $headphone);
                $this->alert('success', 'Product has been created successfully.', [
                    'position' => 'top-end',
                ]);
                $this->reset();
            } else {
                $this->alert('error', 'Product has not been created.', [
                    'position' => 'top-end',
                ]);
            }
        } else {
            $this->alert('error', 'Unkown error has occurred', [
                'position' => 'top-end',
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
