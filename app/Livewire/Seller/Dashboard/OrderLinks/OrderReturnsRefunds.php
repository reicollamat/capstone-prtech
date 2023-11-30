<?php

namespace App\Livewire\Seller\Dashboard\OrderLinks;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\Seller;
use App\Models\Shipments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

#[Layout('layouts.seller.seller-layout')]
class OrderReturnsRefunds extends Component
{
    use WithPagination;

    public $quick_search_filter;

    public $set_to_shipping;
    public $set_to_complete;

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
            ->join('purchases', 'purchase_items.purchase_id', '=', 'purchases.id')
            ->join('payments', 'purchases.id', '=', 'payments.purchase_id')
            ->where('seller_id', $this->seller->id);
        // dd($this->purchase_items->get());
    }


    #[Computed]
    public function getTotalReturnRefund()
    {
        $to_ship = Product::join('purchase_items', 'products.id', '=', 'purchase_items.product_id')
            ->join('purchases', 'purchase_items.purchase_id', '=', 'purchases.id')
            ->join('payments', 'purchases.id', '=', 'payments.purchase_id')
            ->where('seller_id', $this->seller->id);
        return count($to_ship->where('purchase_status', 'returnrefund')->get());
    }


    #[Computed]
    public function getReturnRefund()
    {
        // query for purchased items of products from current seller
        $this->purchase_items = Product::join('purchase_items', 'products.id', '=', 'purchase_items.product_id')
            ->join('purchases', 'purchase_items.purchase_id', '=', 'purchases.id')
            ->join('payments', 'purchases.id', '=', 'payments.purchase_id')
            ->where('seller_id', $this->seller->id)
            ->where('purchase_status', 'returnrefund');

        if ($this->set_to_shipping) {
            // dd($this->set_to_shipping);

            Purchase::where('id', $this->set_to_shipping)->update(['purchase_status' => 'shipping']);
            Shipments::where('purchase_id', $this->set_to_shipping)->update(['shipment_status' => 'shipping']);

            // return collection of purchased items of products from current seller
            return $this->purchase_items->orderBy('purchase_items.id', 'asc')->paginate(10);
        }

        // add check to run rerender every time
        if ($this->quick_search_filter > 0) {
            return $this->purchase_items
                ->where('purchases.id', 'ilike', "%{$this->quick_search_filter}%")
                ->orWhere('products.slug', 'ilike', "%{$this->quick_search_filter}%")
                ->where('purchases.purchase_status', 'to_ship')
                ->orderBy('purchase_items.id', 'asc')
                ->paginate(10);
        } else {
            // dd($this->purchase_items->get());
            // return collection of shipment items of products from current seller
            return $this->purchase_items->orderBy('purchase_items.id', 'asc')->paginate(10);
        }

        return $this->purchase_items->paginate(10);
    }


    public function render()
    {
        $this->orderstatus_options = ['pending', 'completed', 'to_ship', 'shipping'];

        $this->paymentstatus_options = ['paid', 'unpaid'];

        return view('livewire..seller.dashboard.order-links.order-returns-refunds');
    }
}
