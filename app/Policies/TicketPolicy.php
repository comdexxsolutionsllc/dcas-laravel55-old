<?php

namespace App\Policies;

use App\User;
use Modules\SupportDesk\Models\Ticket;
use Illuminate\Auth\Access\HandlesAuthorization;

class TicketPolicy
{
    use HandlesAuthorization;

    /**
     * Authorize all actions for the given model to Admins.
     *
     * @param \App\User $user
     * @param $ability
     *
     * @return bool
     */
    public function before($user, $ability): bool
    {
        if ($user->isAdmin()) return true;
    }

    /**
     * Determine whether the user can view the ticket.
     *
     * @param \App\User $user
     * @param \Modules\SupportDesk\Models\Ticket $ticket
     *
     * @return bool
     */
    public function view(User $user, Ticket $ticket): bool
    {
        return $user->may('view-tickets') && ($user->id === $ticket->user_id);
    }

    /**
     * Determine whether the user can create tickets.
     *
     * @param \App\User $user
     *
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->may('create-tickets');
    }

    /**
     * Determine whether the user can update the ticket.
     *
     * @param \App\User $user
     * @param \Modules\SupportDesk\Models\Ticket $ticket
     *
     * @return bool
     */
    public function update(User $user, Ticket $ticket): bool
    {
        return $user->may('update-tickets') && ($user->id === $ticket->user_id);
    }

    /**
     * Determine whether the user can delete the ticket.
     *
     * @param \App\User $user
     * @param \Modules\SupportDesk\Models\Ticket $ticket
     *
     * @return bool
     */
    public function delete(User $user, Ticket $ticket): bool
    {
        return $user->may('delete-tickets') && ($user->id === $ticket->user_id);
    }
}
