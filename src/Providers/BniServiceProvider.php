<?php

namespace Aslam\Bni\Providers;

use Aslam\Bni\Bni;
use Illuminate\Support\ServiceProvider;

class BniServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {

            $this->publishes([
                __DIR__ . '/../../config/bank-bni.php' => config_path('bank-bni.php'),
            ]);
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/bank-bni.php', 'bank-bni');

        $this->app->singleton('BniAPI', function () {
            return new Bri();
        });
    }
}
