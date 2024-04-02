<?php

namespace App\Livewire;

use App\Models\Product;
use App\Notifications\SellerNotification;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Livewire\Attributes\Computed;
use Livewire\Component;

class SellerNotificationViewing extends Component
{
    public $user;
    public $seller_notifications;
    public $seller_unread_notifications;
    public $markread;

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

    #[Computed]
    public function getTotalUnreadSellerNotifications()
    {
        return count($this->seller_unread_notifications);
    }

    #[Computed]
    public function getSellerNotifications()
    {
        $this->user = Auth::user();
        $this->seller_notifications = $this->user->notifications;

        if ($this->markread) {
            // dd($this->markread);
            $notification = DatabaseNotification::find($this->markread);
            $notification->markasread();

            sleep(0.5);
            $this->mount();

            return $this->seller_notifications;
        }

        return $this->seller_notifications;
    }

    public function markasread($id)
    {
        $notification = DatabaseNotification::find($id);
        $notification->markasread();
        // dd(DatabaseNotification::find($id));
    }

    public function render()
    {
        $seller = Auth::user()->seller;
        $products = $seller->products()->whereColumn('stock', '<=', 'reserve')->get();

        // dd($products);

        return view('livewire.seller-notification-viewing');
    }

    public function testnotif()
    {
        $user = Auth::user();

        // dd($user->notifications);
        foreach ($user->notifications as $key => $notification) {
            // DB::table('notifications')->where('id', $notification->id)->delete();
            // dd($notification);
            $prdct = Product::find($notification->data['product_id']);
            // dd($prdct->reserve);
        }
        $products = $user->seller->products()->whereColumn('stock', '<=', 'reserve')->get();

        foreach ($products as $key => $product) {
            // Notification::send($user, new SellerNotification($product->title));
        }
    }
}
