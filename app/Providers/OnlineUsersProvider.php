<?php

namespace App\Providers;

use App\User;
use Cache;
use Illuminate\Support\ServiceProvider;

class OnlineUsersProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->getOnlineUsersCount();
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

    /**
     * Get online user count.
     */
    private function getOnlineUsersCount()
    {
        view()->composer('partials.user-online', function ($view) {
            $users = User::all()->where('is_active', 1); // To help server load, I only target users that are active. In my case my app changes this field for users that haven't logged in for over a week.

            $onlineUsersCount = 0;

            foreach ($users as $user) {
                if (Cache::has('user-is-online-' . $user->id)) {
                    $onlineUsersCount++;
                }
            }

            $view->with(compact(['onlineUsersCount']));
        });

    }
}
