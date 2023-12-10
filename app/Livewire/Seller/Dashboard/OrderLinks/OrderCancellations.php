<?php

namespace App\Livewire\Seller\Dashboard\OrderLinks;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseCancellationInfo;
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
class OrderCancellations extends Component
{
    use WithPagination;

    public $quick_search_filter;

    public $set_to_cancellation_approved;

    public $seller;

    //    public function paginationView()
    //    {
    //        return 'vendor.pagination.custom-pagination-links';
    //    }

    public function mount()
    {
        $this->seller = Seller::where('user_id', Auth::id())->get()->first();

        // query for purchased items of products from current seller
        $this->cancellations = Purchase::where('purchases.seller_id', $this->seller->id)
            ->where('purchase_status', 'cancellation_pending');
        // dd($this->cancellations->get());
    }


    #[Computed]
    public function getCancellationPending()
    {
        // query for purchased items of products from current seller
        $this->cancellations = Purchase::where('purchases.seller_id', $this->seller->id)
            ->where('purchase_status', 'cancellation_pending');

        if ($this->set_to_cancellation_approved) {
            dd($this->set_to_cancellation_approved);

            Purchase::where('id', $this->set_to_cancellation_approved)->update(['purchase_status' => 'cancellation_approved']);
            PurchaseCancellationInfo::where('purchase_id', $this->set_to_cancellation_approved)->update(['status' => 'cancellation_approved']);

            // return collection of purchased items of products from current seller
            return $this->cancellations->orderBy('purchase_items.id', 'asc')->paginate(10);
        }

        // add check to run rerender every time
        if ($this->quick_search_filter > 0) {
            return $this->cancellations
                ->where('purchases.id', 'ilike', "%{$this->quick_search_filter}%")
                ->orWhere('products.slug', 'ilike', "%{$this->quick_search_filter}%")
                ->where('purchases.purchase_status', 'to_ship')
                ->orderBy('purchase_items.id', 'asc')
                ->paginate(10);
        } else {
            // dd($this->cancellations->get());
            // return collection of shipment items of products from current seller
            return $this->cancellations->orderBy('id', 'asc')->paginate(10);
        }

        return $this->cancellations->paginate(10);
    }


    public function render()
    {
        return view('livewire..seller.dashboard.order-links.order-cancellations');
    }
}
