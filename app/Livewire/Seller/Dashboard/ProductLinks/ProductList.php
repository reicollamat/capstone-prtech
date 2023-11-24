<?php

namespace App\Livewire\Seller\Dashboard\ProductLinks;

use App\Http\Helper;
use App\Models\Product;
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

    //    public function paginationView()
    //    {
    //        return 'vendor.pagination.custom-pagination-links';
    //    }

    public function mount()
    {
        //        $p = (Product::find(2));
        //
        //        dd($p->slug);

        $this->categories = Helper::categoryList();

        //        dd($this->categories->array_keys());
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
                ->select('id', 'category', 'condition', 'slug', 'SKU', 'stock', 'reserve', 'rating', 'status', 'image')
                ->orderBy('id', 'asc')
                ->paginate(10);
            //            dd($this->category_filter);
        }
        // add check to run rerender every time
        if ($this->quick_search_filter > 1) {
            return Product::where('title', 'ilike', "%{$this->quick_search_filter}%")
                ->select('id', 'category', 'condition', 'slug', 'SKU', 'stock', 'reserve', 'rating', 'status', 'image')
                ->orderBy('id', 'asc')
                ->paginate(10);

        } else {

            return Product::select('id', 'category', 'condition', 'slug', 'SKU', 'stock', 'reserve', 'rating', 'status', 'image')
                ->orderBy('id', 'asc')
                ->paginate(10);
        }

        return Product::select('id', 'category', 'condition', 'slug', 'SKU', 'stock', 'reserve', 'rating', 'status', 'image')->paginate(10);

    }

    public function render()
    {
        return view('livewire..seller.dashboard.product-links.product-list');
    }
}
