<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Modelable;
use Livewire\Component;

class SellerNotificationItem extends Component
{
    #[Modelable]
    public $notification = [];

    public $user;
    public $seller_notifications;
    public $seller_unread_notifications;
    public $markread;

    public function placeholder()
    {
        return <<<'HTML'
            <div>
                <div class="spinner-border spinner-border-sm" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        HTML;
    }

    public function mount($notification)
    {
        if (Auth::user()) {
            $this->user = Auth::user();
            // dd($this->user);
            $this->notification = $notification;
            $this->seller_unread_notifications = $this->user->unreadNotifications;
            // dd($this->seller_notifications);
        }
    }

    public function render()
    {
        return view('livewire.seller-notification-item');
    }
}
