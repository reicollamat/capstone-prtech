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

    public $refund_option;
    public $seller;

    public $return_product_complete;
    public $replacement_arrived;
    public $ship_replacement_item;
    public $pay_partial_refund;
    public $pay_full_refund;

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
        // query for return/refund items of products from current seller
        $this->returnrefund_items = ItemReturnrefundInfo::where('seller_id', $this->seller->id)
            ->where('status', 'returnrefund-pending')
            ->orWhere('status', 'returnrefund-agreement');

        return $this->returnrefund_items->orderBy('status', 'desc')->paginate(10);
    }

    #[Computed]
    public function getReturnrefundReturnProduct()
    {
        // query for return/refund items of products from current seller
        $this->returnrefund_items = ItemReturnrefundInfo::where('seller_id', $this->seller->id)
            ->where('status', 'returnrefund-approved')
            ->orWhere('status', 'returnrefund-shipping');

        if ($this->return_product_complete) {

            $return_item = ItemReturnrefundInfo::find($this->return_product_complete);

            $return_item->update([
                'status' => 'returnrefund-completed',
                'returned_date' => now(),
                'completion_date' => now(),
            ]);

            session()->flash('notification-livewire', 'Return product completed!');

            return $this->returnrefund_items->orderBy('status', 'desc')->paginate(10);
        }
        //
        else {
            return $this->returnrefund_items->orderBy('status', 'desc')->paginate(10);
        }
    }

    #[Computed]
    public function getReturnrefundPartialRefund()
    {
        // query for return/refund items of products from current seller
        $this->returnrefund_items = ItemReturnrefundInfo::where('seller_id', $this->seller->id)
            ->where('status', 'returnrefund-approved');

        if ($this->pay_partial_refund) {

            $return_item = ItemReturnrefundInfo::find($this->pay_partial_refund);

            $return_item->update([
                'status' => 'returnrefund-completed',
                'completion_date' => now(),
            ]);

            session()->flash('notification-livewire', 'Partial refund completed!');

            return $this->returnrefund_items->orderBy('status', 'desc')->paginate(10);
        }
        //
        else {
            return $this->returnrefund_items->orderBy('status', 'desc')->paginate(10);
        }
    }

    #[Computed]
    public function getReturnrefundFullRefund()
    {
        // query for return/refund items of products from current seller
        $this->returnrefund_items = ItemReturnrefundInfo::where('seller_id', $this->seller->id)
            ->where('status', 'returnrefund-approved');

        if ($this->pay_full_refund) {

            $return_item = ItemReturnrefundInfo::find($this->pay_full_refund);

            $return_item->update([
                'status' => 'returnrefund-completed',
                'completion_date' => now(),
            ]);

            session()->flash('notification-livewire', 'Full refund completed!');

            return $this->returnrefund_items->orderBy('status', 'desc')->paginate(10);
        }
        //
        else {
            return $this->returnrefund_items->orderBy('status', 'desc')->paginate(10);
        }
    }

    #[Computed]
    public function getReturnrefundReplacement()
    {
        // query for return/refund items of products from current seller
        $this->returnrefund_items = ItemReturnrefundInfo::where('seller_id', $this->seller->id)
            ->where('status', 'returnrefund-approved')
            ->orWhere('status', 'returnrefund-shipping')
            ->orWhere('status', 'returnrefund-inspection')
            ->orWhere('status', 'returnrefund-shipping_replace');

        if ($this->replacement_arrived) {

            $replacement_item = ItemReturnrefundInfo::find($this->replacement_arrived);

            $replacement_item->update([
                'status' => 'returnrefund-inspection',
                'returned_date' => now(),
            ]);

            session()->flash('notification-livewire', 'Replacement product arrived!');

            return $this->returnrefund_items->orderBy('status', 'desc')->paginate(10);
        }
        if ($this->ship_replacement_item) {

            $replacement_item = ItemReturnrefundInfo::find($this->ship_replacement_item);

            $replacement_item->update([
                'status' => 'returnrefund-shipping_replace',
            ]);

            session()->flash('notification-livewire', 'Replacement product shipped to customer!');

            return $this->returnrefund_items->orderBy('status', 'desc')->paginate(10);
        }
        //
        else {
            return $this->returnrefund_items->orderBy('status', 'desc')->paginate(10);
        }
    }

    #[Computed]
    public function getReturnrefundRecords()
    {
        // query for return/refund items of products from current seller
        $this->returnrefund_items = ItemReturnrefundInfo::where('seller_id', $this->seller->id)
            ->where('status', 'returnrefund-completed');

        return $this->returnrefund_items->orderBy('completion_date', 'desc')->paginate(10);
    }




    public function seller_agree($refund_item_id)
    {
        $refund_item = ItemReturnrefundInfo::find($refund_item_id);
        $refund_option = $this->refund_option;
        // dd($refund_option);

        // update return/refund item
        $refund_item->status = 'returnrefund-agreement';
        $refund_item->refund_option = $refund_option;
        $refund_item->save();

        session()->flash('notification-livewire', 'Return/Refund request approved');
        return $this->redirect(route('order-returns'));
    }

    // reject return/refund request
    public function reject_request($refund_item_id)
    {
        $refund_item = ItemReturnrefundInfo::find($refund_item_id);
        // dd($refund_item);

        $refund_item->update([
            'status' => 'returnrefund-rejected',
            'refund_otion' => $this->refund_option,
        ]);

        session()->flash('notification-livewire', 'Return/Refund request rejected');
        return $this->redirect(route('order-returns'));
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

        return view('livewire..seller.dashboard.order-links.order-returns-refunds');
    }
}
