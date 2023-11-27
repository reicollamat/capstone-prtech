<?php

namespace App\Livewire\Seller\Dashboard\OrderLinks;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\Seller;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.seller.seller-layout')]
class OrderList extends Component
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


    //    public function paginationView()
    //    {
    //        return 'vendor.pagination.custom-pagination-links';
    //    }

    public function mount()
    {
        $this->seller = Seller::where('user_id', Auth::id())->get()->first();

        // query for purchased items of products from current seller
        $this->purchase_items = Product::join('purchase_items', 'products.id', '=', 'purchase_items.product_id')
            ->join('payments', 'purchase_items.id', '=', 'payments.purchase_item_id')
            ->join('purchases', 'purchase_items.purchase_id', '=', 'purchases.id')
            ->where('seller_id', $this->seller->id);
        //        $p = (Product::find(2));
        //
        //        dd($p->slug);

        // $this->categories = Helper::categoryList();

        //        dd($this->categories->array_keys());
    }

    #[Computed]
    public function getTotalProductCount()
    {
        return $totalProductCount = Product::count();
    }

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
    public function getPurchaseItemList()
    {
        //        sleep(5);
        if ($this->category_filter) {
            return Product::where('category', '=', $this->category_filter)
                ->select('id', 'category', 'condition', 'slug', 'SKU', 'stock', 'reserve', 'rating', 'status', 'image')
                ->orderBy('id', 'asc')
                ->paginate(10);
        }
        // add check to run rerender every time
        if ($this->quick_search_filter > 1) {
            return Product::where('title', 'ilike', "%{$this->quick_search_filter}%")
                ->select('id', 'category', 'condition', 'slug', 'SKU', 'stock', 'reserve', 'rating', 'status', 'image')
                ->orderBy('id', 'asc')
                ->paginate(10);
        } else {

            // return collection of purchased items of products from current seller
            return $this->purchase_items->orderBy('purchase_items.id', 'asc')
                ->paginate(10);
        }

        return $this->purchase_items->paginate(10);
    }

    #[Computed]
    public function getTotalPurchaseCount()
    {
        return count($this->purchase_items->get());
    }

    #[Computed]
    public function getTotalPendingCount()
    {
        return count($this->purchase_items->where('purchase_status', 'pending')->get());
    }

    #[Computed]
    public function getTotalCompletedCount()
    {
        return count($this->purchase_items->where('purchase_status', 'completed')->get());
    }

    #[Computed]
    public function getTotalToShipCount()
    {
        return count($this->purchase_items->where('purchase_status', 'to_ship')->get());
    }

    #[Computed]
    public function getTotalShippingCount()
    {
        return count($this->purchase_items->where('purchase_status', 'shipping')->get());
    }

    #[Computed]
    public function getTotalCancellationCount()
    {
        return count($this->purchase_items->where('purchase_status', 'cancellation')->get());
    }

    #[Computed]
    public function getTotalReturnRefundCount()
    {
        return count($this->purchase_items->where('purchase_status', 'returnrefund')->get());
    }

    #[Computed]
    public function getTotalFailedDeliveryCount()
    {
        return count($this->purchase_items->where('purchase_status', 'failed_delivery')->get());
    }

    public function render()
    {
        return view('livewire..seller.dashboard.order-links.order-list');
    }
}
