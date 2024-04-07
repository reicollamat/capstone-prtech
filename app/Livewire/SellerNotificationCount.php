<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class SellerNotificationCount extends Component
{
    public $seller_notifications = 0;
    public int $seller_unread_notification_count = 0;

    #[On('seller-notification-change')]
    public function mount()
    {
        if (Auth::user()) {
            $this->user = Auth::user();
            // dd($this->user);
            $this->seller_notifications = $this->user->notifications;
            $this->seller_unread_notification_count = $this->user->unreadNotifications->count();
            // dd($this->seller_notifications);
        }
    }

    public function render()
    {
        return view('livewire.seller-notification-count');
    }
}
