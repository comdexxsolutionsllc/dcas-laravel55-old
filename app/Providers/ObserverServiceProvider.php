<?php

namespace App\Providers;

use App\Profile;
use App\User;
use App\Vendor;
use DCAS\Observers\ProfileObserver;
use DCAS\Observers\UserObserver;
use DCAS\Observers\VendorObserver;
use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Profile::observe(ProfileObserver::class);
        User::observe(UserObserver::class);
        Vendor::observe(VendorObserver::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
