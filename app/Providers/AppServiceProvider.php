<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // This app's front controller (index.php) and public assets (assets/, uploads/)
        // live at the project root instead of public/, matching its Hostinger deployment.
        // Rebinding path.public here makes public_path() -- and therefore `php artisan serve`,
        // which always uses public_path() as its document root -- resolve to the project root.
        $this->app->bind('path.public', function () {
            return base_path();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
