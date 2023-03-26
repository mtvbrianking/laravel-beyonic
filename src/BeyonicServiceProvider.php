<?php

namespace Bmatovu\Beyonic;

use Illuminate\Support\ServiceProvider;

/**
 * @see  https://apidocs.beyonic.com
 */
class BeyonicServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/beyonic.php' => base_path('config/beyonic.php'),
            ], 'beyonic-config');
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/beyonic.php', 'beyonic');
    }
}
