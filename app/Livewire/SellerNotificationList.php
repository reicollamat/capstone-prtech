<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\PurchaseItem;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\On;

#[lazy]
class SellerNotificationList extends Component
{
    public $user;

    public $seller_notifications = [];
    public $seller_unread_notifications = [];
    public $markread;

    public function placeholder()
    {
        return <<<'HTML'
            <div>
                <p1>loading</p1>
            </div>
            HTML;
    }

    public function mount()
    {
        if (Auth::user()) {
            $this->user = Auth::user();
            // dd($this->user);
            $this->seller_notifications = $this->user->notifications;
            $this->seller_unread_notifications = $this->user->unreadNotifications;
            // dd($this->seller_notifications);
        }
    }

    public function render()
    {
        $producttest = DB::table('purchase_items as p')
            ->select(
                DB::raw('SUM(p.quantity) as quantity'),
                'p.created_at',
                DB::raw('COUNT(CASE WHEN c.sentiment = 1 THEN 1 END) as positive'),
                DB::raw('COUNT(CASE WHEN c.sentiment = 0 THEN 1 END) as negative')
            )
            ->join('comments as c', 'c.id', '=', 'p.comment_id')
            ->where('p.product_id', 1451)
            ->groupBy('p.created_at')
            ->get();

        $product = DB::table('purchase_items')
            ->select(DB::raw('SUM(quantity) as quantity'), 'created_at')
            ->where('product_id', 1447)->groupBy('created_at')
            ->get();
        // dd($producttest); 
        return view('livewire.seller-notification-list');
    }

    public function mark_as_read($notification)
    {
        // dd($notification);
        $notification = DatabaseNotification::find($notification);
        $notification->markasread();
        // dd(DatabaseNotification::find($id));
        sleep(0.5);
        $this->mount();

        $this->dispatch('seller-notification-change');
    }

    public function delete_notif($notification)
    {
        // dd($notification);
        $notification = DatabaseNotification::find($notification);
        DatabaseNotification::destroy($notification->id);
        // dd(DatabaseNotification::find($id));
        sleep(0.5);
        $this->mount();
    }
}
