<?php

namespace App\Livewire;

use App\Models\Product;
use App\Notifications\SellerNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class SellerNotificationViewing extends Component
{
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

        Notification::send($user, new SellerNotification('seller', 'low_stock', 1));


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
