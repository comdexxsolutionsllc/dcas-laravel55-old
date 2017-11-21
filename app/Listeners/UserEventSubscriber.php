<?php

namespace App\Listeners;

use App\User;
use Cache;
use Carbon\Carbon;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Log;

class UserEventSubscriber
{
    /**
     * Handle user lockout events.
     *
     * @param Lockout $event
     */
    public function onUserLockout(Lockout $event)
    {
        $this->logLockout($event);
    }

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

            $user->is_logged_in = 1;

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

        $user->is_logged_in = 0;

        $user->save();
    }

    /**
     * @param Lockout $event
     */
    protected function logLockout(Lockout $event)
    {
        $username = $event->request->username;
        $time = Carbon::now();
        $message = $username . ' has been locked out at ' . $time;

        Log::notice($message);
    }
}
