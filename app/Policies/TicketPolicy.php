<?php

namespace App\Policies;

use App\User;
use Modules\SupportDesk\Models\Ticket;
use Illuminate\Auth\Access\HandlesAuthorization;

class TicketPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the ticket.
     *
     * @param  \App\User $user
     * @param  \Modules\SupportDesk\Models\Ticket $ticket
     * @return mixed
     */
    public function view(User $user, Ticket $ticket)
    {
        //
    }

    /**
     * Determine whether the user can create tickets.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the ticket.
     *
     * @param  \App\User $user
     * @param  \Modules\SupportDesk\Models\Ticket $ticket
     * @return mixed
     */
    public function update(User $user, Ticket $ticket)
    {
        //
    }

    /**
     * Determine whether the user can delete the ticket.
     *
     * @param  \App\User $user
     * @param  \Modules\SupportDesk\Models\Ticket $ticket
     * @return mixed
     */
    public function delete(User $user, Ticket $ticket)
    {
        //
    }
}