<?php

namespace UserModule\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class UserModuleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {

    }
    public function boot(): void
    {
        Route::middleware('web')
            ->group(base_path('Modules/UserModule/routes/web.php'));
        Route::middleware('api')
            ->prefix('api')
            ->group(base_path('Modules/UserModule/routes/api.php'));
        $this->publishes([
            __DIR__.'/../config/appUserModule.php' => config_path('appUserModule.php'),
        ]);
    }
}
