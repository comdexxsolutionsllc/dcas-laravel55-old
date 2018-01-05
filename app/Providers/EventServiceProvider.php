<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        // When -> Then
        'App\Events\Modules\SupportDesk\TicketClosed' => [
            'App\Listeners\Modules\SupportDesk\Survey@send'
        ],
        'Illuminate\Auth\Events\Lockout' => [
            'App\Listeners\UserEventSubscriber@onUserLockout',
        ],
        'Illuminate\Auth\Events\Login' => [
            'App\Listeners\UserEventSubscriber@onUserLogin',
        ],
        'Illuminate\Auth\Events\Logout' => [
            'App\Listeners\UserEventSubscriber@onUserLogout',
        ],
        'Illuminate\Queue\Events\JobExceptionOccurred' => [
            'App\Listeners\Job\Queue\ExceptionOccurred'
        ],
        'Illuminate\Queue\Events\JobFailed' => [
            'App\Listeners\Job\Queue\Failed'
        ],
        'Illuminate\Queue\Events\JobProcessed' => [
            'App\Listeners\Job\Queue\Processed'
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot()
    {
        parent::boot();

        Event::listen('revisionable.*', function ($model, $revisions) {
            //dd($model, $revisions);
        });
    }
}
