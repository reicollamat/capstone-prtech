<?php

namespace App\Console;

use App\Models\Product;
use App\Models\User;
use App\Notifications\SellerNotification;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Auth;
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
            // dd(Auth::user()->seller->products()->whereColumn('stock', '<=', 'reserve')->get());
            $user = User::where('name', 'kim_pc')->first();
            $products = $user->seller->products()->whereColumn('stock', '<=', 'reserve')->get();

            foreach ($products as $key => $product) {
                Notification::send($user, new SellerNotification($product->title));
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
