<?php

namespace App\Livewire\Seller\Dashboard\ShipmentLinks;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\Seller;
use App\Models\Shipments;
use App\Models\UserNotification;
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

    public $total_shipment = 0;
    public $total_completed_count = 0;
    public $total_to_ship_count = 0;
    public $total_shipping_count = 0;
    public $total_failed_delivery_count = 0;

    public $seller;

    //    public function paginationView()
    //    {
    //        return 'vendor.pagination.custom-pagination-links';
    //    }

    public function mount()
    {
        $this->seller = Seller::where('user_id', Auth::id())->get()->first();


        $this->total_shipment = count(Shipments::where('seller_id', $this->seller->id)
            ->get());

        $this->total_completed_count = count(Shipments::where('seller_id', $this->seller->id)
            ->where('shipment_status', 'completed')
            ->get());

        $this->total_to_ship_count = count(Shipments::where('seller_id', $this->seller->id)
            ->where('shipment_status', 'to_ship')
            ->get());

        $this->total_shipping_count = count(Shipments::where('seller_id', $this->seller->id)
            ->where('shipment_status', 'shipping')
            ->get());

        $this->total_failed_delivery_count = count(Shipments::where('seller_id', $this->seller->id)
            ->where('shipment_status', 'failed_delivery')
            ->get());
    }


    #[Computed]
    public function getToShipList()
    {
        // query for purchased items of products from current seller
        $this->shipment_items = Shipments::where('seller_id', $this->seller->id)
            ->where('shipment_status', 'to_ship');

        if ($this->set_to_shipping) {

            $shipment = Shipments::find($this->set_to_shipping);

            $shipment->purchase->update(['purchase_status' => 'shipping']);
            $shipment->update([
                'shipment_status' => 'shipping',
                'start_date' => now(),
            ]);

            //notify from 'to_ship' to 'shipping'
            $notification = new UserNotification([
                'user_id' => $shipment->purchase->user->id,
                'purchase_id' => $shipment->purchase->id,
                'tag' => 'shipping',
                'title' => 'Shipped Out',
                'message' => 'Parcel parcel no for your order
                #' . $shipment->purchase->id . ' has been shipped out by shop name via courier/logistics partner. Click here to see order details and track your parcel.',
            ]);
            $notification->save();

            sleep(0.5);
            $this->mount();
            // return collection of shipment items of products from current seller
            return $this->shipment_items->orderBy('id', 'desc')->paginate(10);
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

            // return collection of shipment items of products from current seller
            return $this->shipment_items->orderBy('id', 'desc')->paginate(10);
        }

        return $this->shipment_items->paginate(10);
    }

    #[Computed]
    public function getShippingList()
    {
        // query for purchased items of products from current seller
        $this->shipment_items = Shipments::where('seller_id', $this->seller->id)
            ->where('shipment_status', 'shipping');

        if ($this->set_to_complete) {

            $shipment = Shipments::find($this->set_to_complete);
            // dd($shipment);

            $shipment->purchase->update([
                'purchase_status' => 'completed',
                'completion_date' => now(),
            ]);
            $shipment->update([
                'shipment_status' => 'completed',
                'shipped_date' => now(),
            ]);

            if ($shipment->purchase->payment->payment_type == "cod") {
                $shipment->purchase->payment->update([
                    'payment_status' => 'paid',
                    'date_of_payment' => now(),
                ]);
            }

            //notify from 'shipping' to 'completed'
            $notification = new UserNotification([
                'user_id' => $shipment->purchase->user->id,
                'purchase_id' => $shipment->purchase->id,
                'tag' => 'completed',
                'title' => 'Share your feedback! click here',
                'message' => 'Order #' . $shipment->purchase->id . ' is completed. Your feedback matters to others! Rate the products by date',
            ]);
            $notification->save();

            sleep(0.5);
            $this->mount();
            // return collection of shipment items of products from current seller
            return $this->shipment_items->orderBy('id', 'desc')->paginate(10);
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

            // return collection of shipment items of products from current seller
            return $this->shipment_items->orderBy('id', 'desc')->paginate(10);
        }

        return $this->shipment_items->paginate(10);
    }

    #[Computed]
    public function getDeliveredList()
    {
        // query for purchased items of products from current seller
        $this->shipment_items = Shipments::where('seller_id', $this->seller->id)
            ->where('shipment_status', 'completed');

        // add check to run rerender every time
        if ($this->quick_search_filter > 0) {
            return $this->shipment_items
                ->where('purchases.id', 'ilike', "%{$this->quick_search_filter}%")
                ->orWhere('products.slug', 'ilike', "%{$this->quick_search_filter}%")
                ->where('purchases.purchase_status', 'completed')
                ->orderBy('purchase_items.id', 'asc')
                ->paginate(10);
        } else {

            // return collection of shipment items of products from current seller
            return $this->shipment_items->orderBy('id', 'desc')->paginate(10);
        }

        return $this->shipment_items->paginate(10);
    }


    public function render()
    {
        return view('livewire..seller.dashboard.shipment-links.shipment-list');
    }
}
