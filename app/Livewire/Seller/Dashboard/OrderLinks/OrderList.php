<?php

namespace App\Livewire\Seller\Dashboard\OrderLinks;

use App\Models\Payment;
use App\Models\Purchase;
use App\Models\Seller;
use App\Models\Shipments;
use App\Models\User;
use App\Models\UserNotification;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
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

    public array $orderstatus_list;

    public $orderstatus_filter;

    public $paymentstatus_filter;

    public $paymenttype_filter;

    public $payment_status;

    public $purchase_status;

    public $quick_search_filter;

    public $clear_search;

    public $select_products = [];

    public $seller;

    public $search_method = 'title';

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function mount()
    {
        $this->seller = Seller::where('user_id', Auth::id())->get()->first();

        // query for purchased items of products from current seller
        $this->purchases = Purchase::where('purchases.seller_id', $this->seller->id);
        // dd($this->purchases->get());

        $this->orderstatus_list = ['pending', 'completed', 'to_ship', 'shipping', 'cancellation_request', 'cancellation_approved', 'failed_delivery'];
        // dd($this->orderstatus_list);

    }

    #[Computed]
    public function getTotalPurchaseCount()
    {
        $all = Purchase::where('seller_id', $this->seller->id);

        return count($all->get());
    }

    #[Computed]
    public function getTotalPendingCount()
    {
        $pending = Purchase::where('seller_id', $this->seller->id);

        return count($pending->where('purchase_status', 'pending')->get());
    }

    #[Computed]
    public function getTotalCompletedCount()
    {
        $completed = Purchase::where('seller_id', $this->seller->id);

        return count($completed->where('purchase_status', 'completed')->get());
    }

    #[Computed]
    public function getTotalToShipCount()
    {
        $to_ship = Purchase::where('seller_id', $this->seller->id);

        return count($to_ship->where('purchase_status', 'to_ship')->get());
    }

    #[Computed]
    public function getTotalShippingCount()
    {
        $shipping = Purchase::where('seller_id', $this->seller->id);

        return count($shipping->where('purchase_status', 'shipping')->get());
    }

    #[Computed]
    public function getTotalCancellationCount()
    {
        $cancellation = Purchase::where('seller_id', $this->seller->id);

        return count($cancellation->where('purchase_status', 'cancellation')->get());
    }

    // #[Computed]
    // public function getTotalReturnRefundCount()
    // {
    //     $returnrefund = Purchase::where('seller_id', $this->seller->id);
    //     return count($returnrefund->where('purchase_status', 'returnrefund')->get());
    // }

    #[Computed]
    public function getTotalFailedDeliveryCount()
    {
        $faileddelivery = Purchase::where('seller_id', $this->seller->id);

        return count($faileddelivery->where('purchase_status', 'failed_delivery')->get());
    }

    #[Computed]
    public function getPurchaseList()
    {
        // query for purchased items of products from current seller
        $this->purchases = Purchase::where('seller_id', $this->seller->id);
        // dd($test->paginate(10));

        //
        if ($this->orderstatus_filter) {

            return $this->purchases->where('purchase_status', '=', $this->orderstatus_filter)
                ->orderBy('updated_at', 'desc')
                ->paginate(10);
        }

        //
        if ($this->paymentstatus_filter) {

            return $this->purchases->whereHas('payment', function (Builder $query) {
                $query->where('payment_status', '=', $this->paymentstatus_filter);
            })->orderBy('updated_at', 'desc')->paginate(10);
        }

        //
        if ($this->paymenttype_filter) {

            return $this->purchases->whereHas('payment', function (Builder $query) {
                $query->where('payment_type', '=', $this->paymenttype_filter);
            })->orderBy('updated_at', 'desc')->paginate(10);
        }

        // add check to run rerender every time
        if ($this->quick_search_filter > 0) {

            $search = $this->purchases->where('reference_number', 'like', "%{$this->quick_search_filter}%")
                ->paginate(10);

            // dd($search);

            return $search;
        }
        //
        else {

            return $this->purchases->orderBy('updated_at', 'desc')->paginate(10);
        }

        return $this->purchases->paginate(10);
    }

    public function update_status(Request $request)
    {
        // dd($request->purchase_status);

        $this->seller = Seller::where('user_id', Auth::id())->get()->first();
        $this->payment_status = $request->payment_status;
        $this->purchase_status = $request->purchase_status;

        $purchase_id = $request->purchase_id;
        $user_id = $request->user_id;
        $payment_type = $request->payment_type;
        $user = User::find($user_id);

        // dd($item);
        // Purchase::where('id', $purchase_id)->update(['purchase_status' => $this->purchase_status]);

        // if ($payment_type != 'cod') {
        //     Payment::where('purchase_id', $purchase_id)->update([
        //         'payment_status' => $this->payment_status,
        //         'date_of_payment' => now(),
        //     ]);
        // } else {
        //     Payment::where('purchase_id', $purchase_id)->update([
        //         'payment_status' => $this->payment_status,
        //     ]);
        // }

        // set to to_ship
        if ($this->purchase_status == 'pending') {
            // dd('test');
            $shipment = new Shipments([
                'shipment_number' => random_int(10000000, 99999999),
                'purchase_id' => $purchase_id,
                'user_id' => $user->id,
                'seller_id' => $this->seller->id,
                'email' => $user->email,
                'phone_number' => $user->phone_number,
                'shipment_status' => 'to_ship',
                'street_address_1' => $user->street_address_1,
                'state_province' => $user->state_province,
                'city' => $user->city,
                'postal_code' => $user->postal_code,
                'country' => $user->country,
            ]);
            $shipment->save();

            Purchase::where('id', $purchase_id)->update(['purchase_status' => 'to_ship']);

            //notify from 'pending' to 'to_ship'
            $notification = new UserNotification([
                'user_id' => $user_id,
                'purchase_id' => $purchase_id,
                'tag' => 'to_ship',
                'title' => 'Purchase Confirmed',
                'message' => 'Purchase for order #'.$purchase_id.' has been confirmed and we have notified the seller. Kindly wait for your shipment.',
            ]);
            $notification->save();

            return redirect(route('order-list'));
        }

        // redirect to to_ship list
        elseif ($this->purchase_status == 'to_ship') {

            return redirect(route('shipment-list'));
        }

        // redirect to shipping list
        elseif ($this->purchase_status == 'shipping') {

            return redirect(route('shipment-list'));
        }

        // redirect to cancellation list
        elseif ($this->purchase_status == 'cancellation_pending') {

            return redirect(route('order-cancellations'));
        }

        // redirect to cancellation list
        elseif ($this->purchase_status == 'cancellation_approved') {

            return redirect(route('order-cancellations'));
        }

        //
        elseif ($this->purchase_status == 'failed_delivery' && $payment_type == 'cod') {

            // $notification = new UserNotification([
            //     'user_id' => $user_id,
            //     'purchase_id' => $purchase_id,
            //     'tag' => 'failed_delivery',
            //     'title' => 'Out for Delivery',
            //     'message' => 'Our logistics partner will attempt parcel delivery within the day. Keep your lines open and prepare exact payment for COD transaction.',
            // ]);
            // $notification->save();

            // Shipments::where('purchase_id', $purchase_id)->update(['shipment_status' => $this->purchase_status]);
        } elseif ($this->purchase_status == 'failed_delivery' && $payment_type == 'gcash') {

            // $notification = new UserNotification([
            //     'user_id' => $user_id,
            //     'purchase_id' => $purchase_id,
            //     'tag' => 'failed_delivery',
            //     'title' => 'Out for Delivery',
            //     'message' => 'Our logistics partner will attempt parcel delivery within the day.',
            // ]);
            // $notification->save();

            // Shipments::where('purchase_id', $purchase_id)->update(['shipment_status' => $this->purchase_status]);
        }
    }

    public function render()
    {
        return view('livewire..seller.dashboard.order-links.order-list');
    }

    public function massShip()
    {

    }
}
