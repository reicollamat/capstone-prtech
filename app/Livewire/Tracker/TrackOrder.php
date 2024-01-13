<?php

namespace App\Livewire\Tracker;

use App\Models\Purchase;
use App\Models\User;
use Livewire\Component;

class TrackOrder extends Component
{
    public $reference;

    public $email;

    public $message;

    public $order;

    public function mount()
    {
        // dd('test');
    }

    public function render()
    {
        return view('livewire..tracker.track-order');
    }

    public function submit()
    {
        // dd('test');
        // sleep(10);
        $user = User::where('email', $this->email)->first();

        // dd($user);
        if (! $user) {
            $this->message = 'Email not found.';

            return;
        }

        $purchase_order = User::find($user->id)->purchase->where('reference_number', $this->reference)->first();

        if (! $purchase_order) {
            $this->message = 'This order does not exist in this account.';

            return;
        }

        $order = Purchase::where('reference_number', $this->reference)->get();

        // dd($order);

        if (! $order) {
            $this->message = 'Order not found.';

            return;
        }

        if ($user && $purchase_order && $order) {
            $this->message = 'Order found.';
            $this->order = $order;
        }

        // dd($order);
    }
}
