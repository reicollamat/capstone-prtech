<?php

namespace App\Livewire\Seller\Dashboard\OrderLinks;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

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

    protected $listeners = ['refreshComponent' => '$refresh'];

    //    public function paginationView()
    //    {
    //        return 'vendor.pagination.custom-pagination-links';
    //    }

    public function mount()
    {
        $this->seller = Seller::where('user_id', Auth::id())->get()->first();

        // query for purchased items of products from current seller
        $this->purchase_items = Product::join('purchase_items', 'products.id', '=', 'purchase_items.product_id')
            ->join('purchases', 'purchase_items.purchase_id', '=', 'purchases.id')
            ->join('payments', 'purchases.id', '=', 'payments.purchase_id')
            ->where('seller_id', $this->seller->id);
        // dd($this->purchase_items->get());
    }

    #[Computed]
    public function getTotalProductCount()
    {
        return $totalProductCount = Product::count();
    }

    #[Computed]
    public function getTotalPurchaseCount()
    {
        $all = Product::join('purchase_items', 'products.id', '=', 'purchase_items.product_id')
            ->join('purchases', 'purchase_items.purchase_id', '=', 'purchases.id')
            ->join('payments', 'purchases.id', '=', 'payments.purchase_id')
            ->where('seller_id', $this->seller->id);
        return count($all->get());
    }

    #[Computed]
    public function getTotalPendingCount()
    {
        $pending = Product::join('purchase_items', 'products.id', '=', 'purchase_items.product_id')
            ->join('purchases', 'purchase_items.purchase_id', '=', 'purchases.id')
            ->join('payments', 'purchases.id', '=', 'payments.purchase_id')
            ->where('seller_id', $this->seller->id);
        return count($pending->where('purchase_status', 'pending')->get());
    }

    #[Computed]
    public function getTotalCompletedCount()
    {
        $completed = Product::join('purchase_items', 'products.id', '=', 'purchase_items.product_id')
            ->join('purchases', 'purchase_items.purchase_id', '=', 'purchases.id')
            ->join('payments', 'purchases.id', '=', 'payments.purchase_id')
            ->where('seller_id', $this->seller->id);
        return count($completed->where('purchase_status', 'completed')->get());
    }

    #[Computed]
    public function getTotalToShipCount()
    {
        $to_ship = Product::join('purchase_items', 'products.id', '=', 'purchase_items.product_id')
            ->join('purchases', 'purchase_items.purchase_id', '=', 'purchases.id')
            ->join('payments', 'purchases.id', '=', 'payments.purchase_id')
            ->where('seller_id', $this->seller->id);
        return count($to_ship->where('purchase_status', 'to_ship')->get());
    }

    #[Computed]
    public function getTotalShippingCount()
    {
        $shipping = Product::join('purchase_items', 'products.id', '=', 'purchase_items.product_id')
            ->join('purchases', 'purchase_items.purchase_id', '=', 'purchases.id')
            ->join('payments', 'purchases.id', '=', 'payments.purchase_id')
            ->where('seller_id', $this->seller->id);
        return count($shipping->where('purchase_status', 'shipping')->get());
    }

    #[Computed]
    public function getTotalCancellationCount()
    {
        $cancellation = Product::join('purchase_items', 'products.id', '=', 'purchase_items.product_id')
            ->join('purchases', 'purchase_items.purchase_id', '=', 'purchases.id')
            ->join('payments', 'purchases.id', '=', 'payments.purchase_id')
            ->where('seller_id', $this->seller->id);
        return count($cancellation->where('purchase_status', 'cancellation')->get());
    }

    #[Computed]
    public function getTotalReturnRefundCount()
    {
        $returnrefund = Product::join('purchase_items', 'products.id', '=', 'purchase_items.product_id')
            ->join('purchases', 'purchase_items.purchase_id', '=', 'purchases.id')
            ->join('payments', 'purchases.id', '=', 'payments.purchase_id')
            ->where('seller_id', $this->seller->id);
        return count($returnrefund->where('purchase_status', 'returnrefund')->get());
    }

    #[Computed]
    public function getTotalFailedDeliveryCount()
    {
        $faileddelivery = Product::join('purchase_items', 'products.id', '=', 'purchase_items.product_id')
            ->join('purchases', 'purchase_items.purchase_id', '=', 'purchases.id')
            ->join('payments', 'purchases.id', '=', 'payments.purchase_id')
            ->where('seller_id', $this->seller->id);
        return count($faileddelivery->where('purchase_status', 'failed_delivery')->get());
    }

    // #[On('resetPage')]
    public function update_paymentpurchase($purchase_id, $payment_status)
    {
        dd($payment_status);
        // Purchase::where('id', 3)->update(['title' => 'Updated title']);

        $this->seller = Seller::where('user_id', Auth::id())->get()->first();
        // query for purchased items of products from current seller
        $this->purchase_items = Product::join('purchase_items', 'products.id', '=', 'purchase_items.product_id')
            ->join('purchases', 'purchase_items.purchase_id', '=', 'purchases.id')
            ->join('payments', 'purchases.id', '=', 'payments.purchase_id')
            ->where('seller_id', $this->seller->id);

        // dd('ydiyu');
        $this->resetPage();
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
        // sleep(5);
        if ($this->category_filter) {
            return $this->purchase_items->where('payment_status', '=', 'paid')
                ->orderBy('purchase_items.id', 'asc')
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
            return $this->purchase_items->orderBy('purchase_items.id', 'asc')->paginate(10);
        }

        return $this->purchase_items->paginate(10);
    }


    public function render()
    {
        $this->orderstatus_options = ['pending', 'completed', 'to_ship', 'shipping'];

        $this->paymentstatus_options = ['paid', 'unpaid'];

        return view('livewire..seller.dashboard.order-links.order-list');
    }
}
