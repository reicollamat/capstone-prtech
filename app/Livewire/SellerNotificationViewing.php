<?php

namespace App\Livewire;

use App\Notifications\SellerNotification;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Livewire\Attributes\Computed;
use Livewire\Component;

class SellerNotificationViewing extends Component
{
    use AuthorizesRequests;

    public $user;

    public $seller_notifications = [];

    public $seller_unread_notifications;
    public $markread;


    public function placeholder()
    {
        return <<<'HTML'
        <div>
            <!-- Loading spinner... -->
            <button class="btn outline-remove position-relative" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                     class="bi bi-cart"
                     viewBox="0 0 16 16">
                    <path
                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                <span
                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-light border border-info-subtle text-black text-xs">
                            0
                            <span class="visually-hidden">seller notification count</span>
                          </span>
            </button>
        </div>
        HTML;
    }

    public function render()
    {
        $seller = Auth::user()->seller;
        $products = $seller->products()->whereColumn('stock', '<=', 'reserve')->get();

        // dd($products);

        return view('livewire.seller-notification-viewing');
    }

    public function markasread($id)
    {
        $notification = DatabaseNotification::find($id);
        $notification->markasread();
        // dd(DatabaseNotification::find($id));
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
