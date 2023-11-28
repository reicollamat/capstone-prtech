<?php

namespace App\Livewire\Component;

use App\Livewire\Seller\Dashboard\OrderLinks\OrderList;
use App\Models\CaseFan;
use App\Models\ComputerCase;
use App\Models\Cpu;
use App\Models\CpuCooler;
use App\Models\ExtStorage;
use App\Models\Headphone;
use App\Models\IntStorage;
use App\Models\Keyboard;
use App\Models\Memory;
use App\Models\Monitor;
use App\Models\Motherboard;
use App\Models\Mouse;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Psu;
use App\Models\Purchase;
use App\Models\Speaker;
use App\Models\UserNotification;
use App\Models\VideoCard;
use App\Models\Webcam;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class OrderListComponent extends Component
{
    public Model $item;

    public Model $itemproductinfo;

    public $payment_status;
    public $purchase_status;

    public function mount(Model $item)
    {
        $this->purchase_status = $item->purchase_status;

        $this->payment_status = $item->payment_status;
    }

    public function update_status($item)
    {
        // dd($item);
        Purchase::where('id', $item['purchase_id'])->update(['purchase_status' => $this->purchase_status]);
        Payment::where('purchase_id', $item['purchase_id'])->update(['payment_status' => $this->payment_status]);

        if ($this->purchase_status == 'completed') {
            $notification = new UserNotification([
                'user_id' => $item['user_id'],
                'purchase_id' => $item['purchase_id'],
                'tag' => 'completed',
                'title' => 'Share your feedback! click here',
                'message' => 'Order #' . $item['purchase_id'] . ' is completed. Your feedback matters to others! Rate the products by date',
            ]);
            $notification->save();
        } elseif ($this->purchase_status == 'to_ship') {
            $notification = new UserNotification([
                'user_id' => $item['user_id'],
                'purchase_id' => $item['purchase_id'],
                'tag' => 'to_ship',
                'title' => 'Payment Confirmed',
                'message' => 'Payment for order #' . $item['purchase_id'] . ' has been confirmed and we have notified the seller. Kindly wait for your shipment.',
            ]);
            $notification->save();
        } elseif ($this->purchase_status == 'shipping') {
            $notification = new UserNotification([
                'user_id' => $item['user_id'],
                'purchase_id' => $item['purchase_id'],
                'tag' => 'shipping',
                'title' => 'Shipped Out',
                'message' => 'Parcel parcel no for your order
                #' . $item['purchase_id'] . ' has been shipped out by shop name via courier/logistics partner. Click here to see order details and track your parcel.',
            ]);
            $notification->save();
        } elseif ($this->purchase_status == 'failed_delivery' && $item['payment_type'] == 'cod') {
            $notification = new UserNotification([
                'user_id' => $item['user_id'],
                'purchase_id' => $item['purchase_id'],
                'tag' => 'failed_delivery',
                'title' => 'Out for Delivery',
                'message' => 'Our logistics partner will attempt parcel delivery within the day. Keep your lines open and prepare exact payment for COD transaction.',
            ]);
            $notification->save();
        } elseif ($this->purchase_status == 'failed_delivery' && $item['payment_type'] == 'gcash') {
            $notification = new UserNotification([
                'user_id' => $item['user_id'],
                'purchase_id' => $item['purchase_id'],
                'tag' => 'failed_delivery',
                'title' => 'Out for Delivery',
                'message' => 'Our logistics partner will attempt parcel delivery within the day.',
            ]);
            $notification->save();
        }

        $this->redirect(OrderList::class);
    }

    public function render()
    {
        $this->orderstatus_options = ['pending', 'to_ship', 'shipping', 'completed', 'failed_delivery'];

        $this->paymentstatus_options = ['paid', 'unpaid'];

        return view('livewire.component.order-list-component');
    }
}
