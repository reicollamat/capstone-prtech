<?php

namespace App\Livewire;

use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;
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
