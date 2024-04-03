<?php

namespace App\Console;

use App\Models\Product;
use App\Models\User;
use App\Notifications\SellerNotification;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function () {
            // 
            $user = User::where('name', 'kim_pc')->first();
            $products = $user->seller->products()->whereColumn('stock', '<=', 'reserve')->get();

            // check notifications table if low_stock notif exists
            // delete the low_stock notifs and create new
            foreach ($user->notifications as $key => $notification) {
                // delete low_stock notifications to avoid product duplication
                if ($notification->data['role'] == 'seller' && $notification->data['type'] == 'low_stock') {
                    DB::table('notifications')->where('id', $notification->id)->delete();
                }
            }
            foreach ($products as $key => $product) {
                Notification::send($user, new SellerNotification(
                    'seller',
                    'low_stock',
                    $product->id,
                    'Low Stock Alert',
                    'Product has reached a low stock threshold. Please restock to avoid shortages.'
                ));
            }
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
