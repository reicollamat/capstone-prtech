<?php

namespace App\Livewire\Seller\Dashboard\OrderLinks;

use App\Models\Payment;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseItem;
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
use Livewire\Attributes\On;

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
        $this->purchase_items = Product::join('purchase_items', 'products.id', '=', 'purchase_items.product_id')
            ->join('purchases', 'purchase_items.purchase_id', '=', 'purchases.id')
            ->join('payments', 'purchases.id', '=', 'payments.purchase_id')
            ->where('seller_id', $this->seller->id);
        // dd($this->purchase_items->get());

        $this->orderstatus_list = ['pending', 'completed', 'to_ship', 'shipping', 'cancellation', 'returnrefund', 'failed_delivery'];
        // dd($this->orderstatus_list);

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

        $this->resetPage();
    }



    #[Computed]
    public function getPurchaseItemList()
    {
        // query for purchased items of products from current seller
        $this->purchase_items = Product::join('purchase_items', 'products.id', '=', 'purchase_items.product_id')
            ->join('purchases', 'purchase_items.purchase_id', '=', 'purchases.id')
            ->join('payments', 'purchases.id', '=', 'payments.purchase_id')
            ->where('seller_id', $this->seller->id);


        //
        if ($this->orderstatus_filter) {

            return $this->purchase_items->where('purchase_status', '=', $this->orderstatus_filter)
                ->orderBy('purchase_items.id', 'asc')
                ->paginate(10);
        }

        //
        if ($this->paymentstatus_filter) {

            return $this->purchase_items->where('payment_status', '=', $this->paymentstatus_filter)
                ->orderBy('purchase_items.id', 'asc')
                ->paginate(10);
        }

        //
        if ($this->paymenttype_filter) {

            return $this->purchase_items->where('payment_type', '=', $this->paymenttype_filter)
                ->orderBy('purchase_items.id', 'asc')
                ->paginate(10);
        }

        // add check to run rerender every time
        if ($this->quick_search_filter > 0) {
            if ($this->search_method == 'title') {

                $search = Product::where('seller_id', $this->seller->id)->whereHas('purchase_items', function (Builder $query) {
                    $query->where('slug', 'ilike', "%{$this->quick_search_filter}%");
                })->join('purchase_items', 'products.id', '=', 'purchase_items.product_id')
                    ->join('purchases', 'purchase_items.purchase_id', '=', 'purchases.id')
                    ->join('payments', 'purchases.id', '=', 'payments.purchase_id')
                    ->orderBy('purchase_items.id', 'asc')
                    ->paginate(10);

                // dd($search);

                return $search;
            } elseif ($this->search_method == 'purchase_id') {
                return $this->purchase_items->where('purchases.id', 'ilike', "%{$this->quick_search_filter}%")
                    ->orderBy('purchase_items.id', 'asc')
                    ->paginate(10);
            }
        }
        //
        else {

            return $this->purchase_items->orderBy('purchase_items.id', 'asc')->paginate(10);
        }

        return $this->purchase_items->paginate(10);
    }


    public function update_status(Request $request)
    {
        // dd($request->purchase_status);

        $this->payment_status = $request->payment_status;
        $this->purchase_status = $request->purchase_status;

        $purchase_id = $request->purchase_id;
        $user_id = $request->user_id;
        $payment_type = $request->payment_type;
        $user = User::find($user_id);


        // dd($item);
        Purchase::where('id', $purchase_id)->update(['purchase_status' => $this->purchase_status]);

        if ($payment_type != 'cod') {
            Payment::where('purchase_id', $purchase_id)->update([
                'payment_status' => $this->payment_status,
                'date_of_payment' => now(),
            ]);
        } else {
            Payment::where('purchase_id', $purchase_id)->update([
                'payment_status' => $this->payment_status,
            ]);
        }

        if (!Shipments::where('purchase_id', $purchase_id)->exists()) {
            // dd('test');
            $shipment = new Shipments([
                'purchase_id' => $purchase_id,
                'user_id' => $user->id,
                'email' => $user->email,
                'phone_number' => $user->phone_number,
                'shipment_status' => 'to_ship',
                'referenceId' => random_int(100000, 999999),
                // 'shippeddate' => now(),
                'street_address_1' => $user->street_address_1,
                'state_province' => $user->state_province,
                'city' => $user->city,
                'postal_code' => $user->postal_code,
                'country' => $user->country,
            ]);
            $shipment->save();
        }


        if ($this->purchase_status == 'completed') {

            $notification = new UserNotification([
                'user_id' => $user_id,
                'purchase_id' => $purchase_id,
                'tag' => 'completed',
                'title' => 'Share your feedback! click here',
                'message' => 'Order #' . $purchase_id . ' is completed. Your feedback matters to others! Rate the products by date',
            ]);
            $notification->save();

            Shipments::where('purchase_id', $purchase_id)->update([
                'shipment_status' => $this->purchase_status,
                'shippeddate' => now(),
            ]);
            Payment::where('purchase_id', $purchase_id)->update([
                'payment_status' => 'paid',
                'date_of_payment' => now(),
            ]);
        } elseif ($this->purchase_status == 'to_ship') {

            $notification = new UserNotification([
                'user_id' => $user_id,
                'purchase_id' => $purchase_id,
                'tag' => 'to_ship',
                'title' => 'Payment Confirmed',
                'message' => 'Payment for order #' . $purchase_id . ' has been confirmed and we have notified the seller. Kindly wait for your shipment.',
            ]);
            $notification->save();

            Shipments::where('purchase_id', $purchase_id)->update(['shipment_status' => $this->purchase_status]);
        } elseif ($this->purchase_status == 'shipping') {

            $notification = new UserNotification([
                'user_id' => $user_id,
                'purchase_id' => $purchase_id,
                'tag' => 'shipping',
                'title' => 'Shipped Out',
                'message' => 'Parcel parcel no for your order
                #' . $purchase_id . ' has been shipped out by shop name via courier/logistics partner. Click here to see order details and track your parcel.',
            ]);
            $notification->save();

            Shipments::where('purchase_id', $purchase_id)->update(['shipment_status' => $this->purchase_status]);
        } elseif ($this->purchase_status == 'failed_delivery' && $payment_type == 'cod') {

            $notification = new UserNotification([
                'user_id' => $user_id,
                'purchase_id' => $purchase_id,
                'tag' => 'failed_delivery',
                'title' => 'Out for Delivery',
                'message' => 'Our logistics partner will attempt parcel delivery within the day. Keep your lines open and prepare exact payment for COD transaction.',
            ]);
            $notification->save();

            Shipments::where('purchase_id', $purchase_id)->update(['shipment_status' => $this->purchase_status]);
        } elseif ($this->purchase_status == 'failed_delivery' && $payment_type == 'gcash') {

            $notification = new UserNotification([
                'user_id' => $user_id,
                'purchase_id' => $purchase_id,
                'tag' => 'failed_delivery',
                'title' => 'Out for Delivery',
                'message' => 'Our logistics partner will attempt parcel delivery within the day.',
            ]);
            $notification->save();

            Shipments::where('purchase_id', $purchase_id)->update(['shipment_status' => $this->purchase_status]);
        }

        return redirect(route('order-list'));
    }


    public function render()
    {
        $this->orderstatus_options = ['pending', 'to_ship', 'shipping', 'completed', 'failed_delivery'];

        $this->paymentstatus_options = ['paid', 'unpaid'];

        return view('livewire..seller.dashboard.order-links.order-list');
    }
}
