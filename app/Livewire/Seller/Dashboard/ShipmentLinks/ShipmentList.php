<?php

namespace App\Livewire\Seller\Dashboard\ShipmentLinks;

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
class ShipmentList extends Component
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
        $this->shipment_items = Shipments::join('purchases', 'shipments.purchase_id', '=', 'purchases.id')
            ->join('purchase_items', 'purchases.id', '=', 'purchase_items.purchase_id')
            ->join('products', 'purchase_items.product_id', '=', 'products.id')
            ->join('payments', 'purchases.id', '=', 'payments.purchase_id')
            ->where('seller_id', $this->seller->id);
        // dd($this->shipment_items->get());
    }

    #[Computed]
    public function getTotalShipmentCount()
    {
        $all = Shipments::join('purchases', 'shipments.purchase_id', '=', 'purchases.id')
            ->join('purchase_items', 'purchases.id', '=', 'purchase_items.purchase_id')
            ->join('products', 'purchase_items.product_id', '=', 'products.id')
            ->join('payments', 'purchases.id', '=', 'payments.purchase_id')
            ->where('seller_id', $this->seller->id);
        return count($all->get());
    }

    // for Delivered shipment
    #[Computed]
    public function getTotalCompletedCount()
    {
        $completed = Shipments::join('purchases', 'shipments.purchase_id', '=', 'purchases.id')
            ->join('purchase_items', 'purchases.id', '=', 'purchase_items.purchase_id')
            ->join('products', 'purchase_items.product_id', '=', 'products.id')
            ->join('payments', 'purchases.id', '=', 'payments.purchase_id')
            ->where('seller_id', $this->seller->id);
        return count($completed->where('shipment_status', 'completed')->get());
    }

    #[Computed]
    public function getTotalToShipCount()
    {
        $to_ship = Shipments::join('purchases', 'shipments.purchase_id', '=', 'purchases.id')
            ->join('purchase_items', 'purchases.id', '=', 'purchase_items.purchase_id')
            ->join('products', 'purchase_items.product_id', '=', 'products.id')
            ->join('payments', 'purchases.id', '=', 'payments.purchase_id')
            ->where('seller_id', $this->seller->id);
        return count($to_ship->where('shipment_status', 'to_ship')->get());
    }

    #[Computed]
    public function getTotalShippingCount()
    {
        $shipping = Shipments::join('purchases', 'shipments.purchase_id', '=', 'purchases.id')
            ->join('purchase_items', 'purchases.id', '=', 'purchase_items.purchase_id')
            ->join('products', 'purchase_items.product_id', '=', 'products.id')
            ->join('payments', 'purchases.id', '=', 'payments.purchase_id')
            ->where('seller_id', $this->seller->id);
        return count($shipping->where('shipment_status', 'shipping')->get());
    }

    #[Computed]
    public function getTotalFailedDeliveryCount()
    {
        $faileddelivery = Shipments::join('purchases', 'shipments.purchase_id', '=', 'purchases.id')
            ->join('purchase_items', 'purchases.id', '=', 'purchase_items.purchase_id')
            ->join('products', 'purchase_items.product_id', '=', 'products.id')
            ->join('payments', 'purchases.id', '=', 'payments.purchase_id')
            ->where('seller_id', $this->seller->id);
        return count($faileddelivery->where('shipment_status', 'failed_delivery')->get());
    }

    public function update_paymentpurchase($purchase_id, $payment_status)
    {
        dd($payment_status);
        // Purchase::where('id', 3)->update(['title' => 'Updated title']);

        $this->seller = Seller::where('user_id', Auth::id())->get()->first();
        // query for purchased items of products from current seller
        $this->shipment_items = Product::join('purchase_items', 'products.id', '=', 'purchase_items.product_id')
            ->join('purchases', 'purchase_items.purchase_id', '=', 'purchases.id')
            ->join('payments', 'purchases.id', '=', 'payments.purchase_id')
            ->where('seller_id', $this->seller->id);

        // dd('ydiyu');
        $this->resetPage();
    }


    #[Computed]
    public function getToShipList()
    {
        // query for purchased items of products from current seller
        $this->shipment_items = Shipments::join('purchases', 'shipments.purchase_id', '=', 'purchases.id')
            ->join('purchase_items', 'purchases.id', '=', 'purchase_items.purchase_id')
            ->join('products', 'purchase_items.product_id', '=', 'products.id')
            ->join('payments', 'purchases.id', '=', 'payments.purchase_id')
            ->where('seller_id', $this->seller->id)
            ->where('shipments.shipment_status', 'to_ship');

        if ($this->set_to_shipping) {
            // dd($this->set_to_shipping);

            Purchase::where('id', $this->set_to_shipping)->update(['purchase_status' => 'shipping']);
            Shipments::where('purchase_id', $this->set_to_shipping)->update(['shipment_status' => 'shipping']);

            // return collection of purchased items of products from current seller
            return $this->shipment_items->orderBy('purchase_items.id', 'asc')->paginate(10);
        }

        // add check to run rerender every time
        if ($this->quick_search_filter > 0) {
            return $this->shipment_items
                ->where('purchases.id', 'ilike', "%{$this->quick_search_filter}%")
                ->orWhere('products.slug', 'ilike', "%{$this->quick_search_filter}%")
                ->where('purchases.purchase_status', 'to_ship')
                ->orderBy('purchase_items.id', 'asc')
                ->paginate(10);
        } else {
            // dd($this->shipment_items->get());
            // return collection of shipment items of products from current seller
            return $this->shipment_items->orderBy('purchase_items.id', 'asc')->paginate(10);
        }

        return $this->shipment_items->paginate(10);
    }

    #[Computed]
    public function getShippingList()
    {
        // query for purchased items of products from current seller
        $this->shipment_items = Shipments::join('purchases', 'shipments.purchase_id', '=', 'purchases.id')
            ->join('purchase_items', 'purchases.id', '=', 'purchase_items.purchase_id')
            ->join('products', 'purchase_items.product_id', '=', 'products.id')
            ->join('payments', 'purchases.id', '=', 'payments.purchase_id')
            ->where('seller_id', $this->seller->id)
            ->where('shipments.shipment_status', 'shipping');



        if ($this->set_to_complete) {
            // dd($this->set_to_complete);

            Purchase::where('id', $this->set_to_complete)->update(['purchase_status' => 'completed']);
            Shipments::where('purchase_id', $this->set_to_complete)->update([
                'shipment_status' => 'completed',
                'shippeddate' => now(),
            ]);


            // return collection of purchased items of products from current seller
            return $this->shipment_items->orderBy('purchase_items.id', 'asc')->paginate(10);
        }

        // add check to run rerender every time
        if ($this->quick_search_filter > 0) {
            return $this->shipment_items
                ->where('purchases.id', 'ilike', "%{$this->quick_search_filter}%")
                ->orWhere('products.slug', 'ilike', "%{$this->quick_search_filter}%")
                ->where('purchases.purchase_status', 'shipping')
                ->orderBy('purchase_items.id', 'asc')
                ->paginate(10);
        } else {

            // return collection of purchased items of products from current seller
            return $this->shipment_items->orderBy('purchase_items.id', 'asc')->paginate(10);
        }

        return $this->shipment_items->paginate(10);
    }

    #[Computed]
    public function getDeliveredList()
    {
        // query for purchased items of products from current seller
        $this->shipment_items = Shipments::join('purchases', 'shipments.purchase_id', '=', 'purchases.id')
            ->join('purchase_items', 'purchases.id', '=', 'purchase_items.purchase_id')
            ->join('products', 'purchase_items.product_id', '=', 'products.id')
            ->join('payments', 'purchases.id', '=', 'payments.purchase_id')
            ->where('seller_id', $this->seller->id)
            ->where('shipments.shipment_status', 'completed');

        // add check to run rerender every time
        if ($this->quick_search_filter > 0) {
            return $this->shipment_items
                ->where('purchases.id', 'ilike', "%{$this->quick_search_filter}%")
                ->orWhere('products.slug', 'ilike', "%{$this->quick_search_filter}%")
                ->where('purchases.purchase_status', 'completed')
                ->orderBy('purchase_items.id', 'asc')
                ->paginate(10);
        } else {

            // return collection of purchased items of products from current seller
            return $this->shipment_items->orderBy('purchase_items.id', 'asc')->paginate(10);
        }

        return $this->shipment_items->paginate(10);
    }


    public function render()
    {
        $this->orderstatus_options = ['pending', 'completed', 'to_ship', 'shipping'];

        $this->paymentstatus_options = ['paid', 'unpaid'];

        return view('livewire..seller.dashboard.shipment-links.shipment-list');
    }
}
