<?php

namespace App\Livewire\Seller\Dashboard\OrderLinks;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\ItemReturnrefundInfo;
use App\Models\Seller;
use App\Models\Shipments;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

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
        $this->returnrefund_items = ItemReturnrefundInfo::where('seller_id', $this->seller->id);
    }


    #[Computed]
    public function getReturnrefundPending()
    {
        // query for purchased items of products from current seller
        $this->returnrefund_items = ItemReturnrefundInfo::where('seller_id', $this->seller->id)
            ->where('status', 'returnrefund_pending');

        if ($this->set_to_shipping) {
            // dd($this->set_to_shipping);

            Purchase::where('id', $this->set_to_shipping)->update(['purchase_status' => 'shipping']);
            Shipments::where('purchase_id', $this->set_to_shipping)->update(['shipment_status' => 'shipping']);

            // return collection of purchased items of products from current seller
            return $this->returnrefund_items->orderBy('purchase_items.id', 'asc')->paginate(10);
        }
        //
        else {
            // dd($this->returnrefund_items->get());
            // return collection of shipment items of products from current seller
            return $this->returnrefund_items->orderBy('request_date', 'desc')->paginate(10);
        }

        return $this->returnrefund_items->paginate(10);
    }

    #[Computed]
    public function getReturnProduct()
    {
        // query for purchased items of products from current seller
        $this->return_products = ItemReturnrefundInfo::where('seller_id', $this->seller->id)
            ->where('status', 'returnrefund_approved')
            ->where('status', 'return_product_shipping');

        if ($this->set_to_shipping) {
            // dd($this->set_to_shipping);

            Purchase::where('id', $this->set_to_shipping)->update(['purchase_status' => 'shipping']);
            Shipments::where('purchase_id', $this->set_to_shipping)->update(['shipment_status' => 'shipping']);

            // return collection of purchased items of products from current seller
            return $this->return_products->orderBy('purchase_items.id', 'asc')->paginate(10);
        }
        //
        else {
            // dd($this->return_products->get());
            // return collection of shipment items of products from current seller
            return $this->return_products->orderBy('request_date', 'desc')->paginate(10);
        }

        return $this->return_products->paginate(10);
    }

    public function render()
    {
        $this->orderstatus_options = ['pending', 'completed', 'to_ship', 'shipping'];

        $this->paymentstatus_options = ['paid', 'unpaid'];

        return view('livewire..seller.dashboard.order-links.order-returns-refunds');
    }
}
