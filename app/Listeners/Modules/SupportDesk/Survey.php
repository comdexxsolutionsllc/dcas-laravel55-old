<?php

namespace App\Listeners\Modules\SupportDesk;

use App\Events\Modules\SupportDesk\TicketClosed;
use Illuminate\Contracts\Queue\ShouldQueue;

class Survey implements ShouldQueue
{
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
     * @param  TicketClosed $event
     * @return void
     */
    public function handle(TicketClosed $event)
    {
        //
    }

    /**
     * Handle a job failure.
     *
     * @param  TicketClosed $event
     * @param  \Exception $exception
     * @return void
     */
    public function failed(TicketClosed $event, $exception)
    {
        //
    }
}
