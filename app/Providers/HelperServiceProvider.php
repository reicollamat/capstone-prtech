<?php

namespace App\Providers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // $files = glob(app_path('Helpers').'/*.php');
        // foreach ($files as $key => $file) {
        //     require_once $file;
        //     Log::channel('stderr')->info("Loaded $file\n");
        // }

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

    }
}
