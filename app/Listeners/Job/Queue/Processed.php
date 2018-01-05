<?php

namespace App\Listeners\Job\Queue;

use Illuminate\Queue\Events\JobProcessed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class Processed implements ShouldQueue
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
     * @param  JobProcessed $event
     * @return void
     */
    public function handle(JobProcessed $event)
    {
        //
    }
}
