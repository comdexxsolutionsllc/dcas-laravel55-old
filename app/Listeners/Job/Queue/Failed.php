<?php

namespace App\Listeners\Job\Queue;

use Illuminate\Queue\Events\JobFailed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class Failed implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        // TODO
        // $event->connectionName
        // $event->job
        // $event->job->payload()

    }

    /**
     * Handle the event.
     *
     * @param  JobFailed $event
     * @return void
     */
    public function handle(JobFailed $event)
    {
        //
    }
}
