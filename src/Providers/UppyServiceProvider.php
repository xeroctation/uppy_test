<?php

namespace Xeroctation\Uppy\Providers;

use Illuminate\Support\ServiceProvider;

class UppyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->publishes([
            __DIR__ . '/../resources/views/components/' => base_path('resources/views/components'),
            __DIR__ . '/../View/Components/' => base_path('app/View/Components'),
            __DIR__.'/../config/uppy.php' => config_path('uppy.php'),
        ]);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
