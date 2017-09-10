<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    protected $helpers = [
        // Add your helpers in here
    ];

    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        foreach ($this->helpers as $helper) {
            $helper_path = app_path() . '/DCAS/Helpers/' . $helper . '.php';

            if (\File::isFile($helper_path)) {
                require_once $helper_path;
            }
        }
    }
}