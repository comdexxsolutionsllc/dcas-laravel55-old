<?php

namespace App\Policies;

use App\User;
use Modules\SupportDesk\Models\Queue;
use Illuminate\Auth\Access\HandlesAuthorization;

class QueuePolicy
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
     * Determine whether the user can view the queue.
     *
     * @param  \App\User $user
     * @param  \Modules\SupportDesk\Models\Queue $queue
     * @return bool
     */
    public function view(User $user, Queue $queue): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create queues.
     *
     * @param  \App\User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->may('create-queues');
    }

    /**
     * Determine whether the user can update the queue.
     *
     * @param  \App\User $user
     * @param  \Modules\SupportDesk\Models\Queue $queue
     * @return bool
     */
    public function update(User $user, Queue $queue): bool
    {
        return $user->may('update-queues');
    }

    /**
     * Determine whether the user can delete the queue.
     *
     * @param  \App\User $user
     * @param  \Modules\SupportDesk\Models\Queue $queue
     * @return bool
     */
    public function delete(User $user, Queue $queue): bool
    {
        return $user->may('delete-queues');
    }
}
