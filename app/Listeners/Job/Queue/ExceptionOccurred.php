<?php

namespace App\Listeners\Job\Queue;

use Illuminate\Queue\Events\JobExceptionOccurred;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ExceptionOccurred implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  JobExceptionOccurred $event
     * @return void
     */
    public function handle(JobExceptionOccurred $event)
    {
        // TODO
        // $event->connectionName
        // $event->job
        // $event->job->payload()

    }
}
