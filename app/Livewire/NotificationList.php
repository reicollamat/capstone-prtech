<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\UserNotification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NotificationList extends Component
{
    public $user_id;
    public $notifications = [];
    public $notifications_count = 0;

    public function mount()
    {

        if (Auth::check()) {
            $this->user_id = Auth::id();

            // if (count(UserNotification::where('user_id', $this->user_id)->get())) {
            //     dd(UserNotification::where('user_id', $this->user_id)->get());
            // }
            // dd(UserNotification::where('user_id', $this->user_id)->get());
            $this->notifications = UserNotification::where('user_id', $this->user_id)->orderBy('id', 'desc')->get();

            $this->notifications_count = count($this->notifications);

            // dd($this->notifications);
        }
    }

    public function to_review($purchase_id)
    {
        // dd($purchase_id);
        $this->dispatch('purchase_id', $purchase_id);
        $this->redirect(LeaveReview::class, navigate: true);
    }

    public function clear_notifs()
    {
        $user = User::find($this->user_id);

        foreach ($user->notification as $key => $notif) {
            $notif->truncate();
        }

        sleep(0.5);
        $this->mount();
    }

    public function render()
    {
        return view('livewire.notification-list');
    }
}
