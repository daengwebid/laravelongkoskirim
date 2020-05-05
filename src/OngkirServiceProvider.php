<?php

namespace Daengweb\OngkosKirim;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;

class OngkirServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('ruangApi', function()
        {
            return new RuangApi();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/ruangapi.php' => config_path().'/ruangapi.php',
        ]);
    }
}
