<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //         Paginator::defaultView('views.vendor.pagination.tailwind');
        //        Paginator::useTailwind();
        //        Paginator::defaultView('pagination::bootstrap-5');
    }
}
