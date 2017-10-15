<?php

namespace App\Listeners;

use App\User;
use Cache;
use Carbon\Carbon;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;

class UserEventSubscriber
{
    /**
     * Handle user login events.
     *
     * @param Login $event
     */
    public function onUserLogin(Login $event)
    {
        if (auth()->check()) {
            $expiresAt = Carbon::now()->addMinutes(5);
            $userId = auth()->user()->id;

            Cache::put('user-is-online-' . $userId, true, $expiresAt);

            $user = User::find($userId);

            $user->is_active = 1;

            $user->save();
        }
    }


    /**
     * Handle user logout events.
     *
     * @param Logout $event
     */
    public function onUserLogout(Logout $event)
    {
        $userId = auth()->user()->id;

        Cache::delete('user-is-online-' . $userId);

        $user = User::find($userId);

        $user->is_active = 0;

        $user->save();
    }
}
