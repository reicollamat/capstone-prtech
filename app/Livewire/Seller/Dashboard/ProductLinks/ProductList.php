<?php

namespace App\Livewire\Seller\Dashboard\ProductLinks;

use App\Models\Product;
use App\Models\Seller;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

//#[Lazy]
#[Layout('layouts.seller.seller-layout')]
class ProductList extends Component
{
    use WithPagination;

    //    protected $paginationTheme = 'bootstrap';

    //    public $totalProductCount;

    public array $categories;

    public $stock_filter;

    public $category_filter;

    public $brand_filter;

    public $quick_search_filter;

    public $select_products = [];

    public $seller;

    public $total_products_count;

    public $total_available_count;

    public $total_brandnew_count;

    public $total_used_count;

    public float $total_products_rating;

    //    public function paginationView()
    //    {
    //        return 'vendor.pagination.custom-pagination-links';
    //    }

    public function mount()
    {
        $this->seller = Seller::where('user_id', Auth::id())->get()->first();

        $this->total_products_count = Product::where('seller_id', $this->seller->id)->count() ?? 0;

        $this->total_available_count = Product::where('seller_id', $this->seller->id)->where('status', 'available')->count() ?? 0;

        $this->total_brandnew_count = Product::where('seller_id', $this->seller->id)->where('condition', 'brand_new')->count() ?? 0;

        $this->total_used_count = Product::where('seller_id', $this->seller->id)->where('condition', 'used')->count() ?? 0;

        // overall rating of all seller's products
        if ($this->total_products_count == 0) {
            $this->total_products_rating = 0;
        } else {
            $this->total_products_rating = Product::where('seller_id', $this->seller->id)->sum('rating') / $this->total_products_count;
            $this->total_products_rating = number_format((float) $this->total_products_rating, 2, '.', '');
        }

        // dd($this->total_products_rating);
    }

    #[Computed]
    public function getTotalProductCount()
    {
        return $totalProductCount = Product::count();
    }

    //    public function test()
    //    {
    //        $this->nextPage();
    //    }

    //    public function updatedPage($page)
    //    {
    //        //        $this->resetPage();
    //        $this->dispatch('page-updated');
    //    }

    //    public function updatedquick_search_filter()
    //    {
    //        dd('test');
    //    }
    public function updated($quick_search_filter)
    {
        // $property: The name of the current property that was updated

        $this->resetPage();
    }

    public function test()
    {
        sleep(1);
    }

    #[Computed]
    public function getProductList()
    {
        //        sleep(5);
        if ($this->category_filter) {
            return Product::where('category', '=', $this->category_filter)
                ->orderBy('id', 'asc')
                ->paginate(10);
            //            dd($this->category_filter);
        }
        // add check to run rerender every time
        if ($this->quick_search_filter > 1) {
            // return Product::where('title', 'ilike', "%{$this->quick_search_filter}%") // POSTGRES
            return Product::where(strtolower('title'), 'like', "%{$this->quick_search_filter}%") // POSTGRES
                ->orderBy('id', 'asc')
                ->paginate(10);
        } else {

            return Product::where('seller_id', $this->seller->id)
                ->orderBy('id', 'asc')
                ->paginate(10);
        }

        return Product::where('seller_id', $this->seller->id)->paginate(10);
    }

    public function render()
    {
        return view('livewire..seller.dashboard.product-links.product-list');
    }

    public function removeProduct($product_id)
    {
        // $product = Product::where('id', $product_id)->first();

        // dd($product);

        Product::destroy($product_id);

        $this->mount();
    }

    #[Computed]
    public function getMostBoughtProducts()
    {
        $all_products = Product::where('seller_id', $this->seller->id)
            ->where('purchase_count', '>=', 1)
            ->orderBy('purchase_count', 'desc')
            ->limit(10)
            ->get();

        return $all_products;
    }
}
