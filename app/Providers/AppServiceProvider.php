<?php

namespace App\Providers;

use App\Models\PurchaseOrder;
use App\Observers\PurchaseOrderObserver;
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
        Paginator::useBootstrapFive();
        PurchaseOrder::observe(PurchaseOrderObserver::class);
    }

    protected $observers = [
        PurchaseOrder::class => [PurchaseOrderObserver::class],
    ];

}
