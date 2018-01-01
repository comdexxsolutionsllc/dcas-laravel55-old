<?php

namespace App\Policies;

use App\User;
use App\Modules\SupportDesk\Models\Queue;
use Illuminate\Auth\Access\HandlesAuthorization;

class QueuePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the queue.
     *
     * @param  \App\User  $user
     * @param  \App\Modules\SupportDesk\Models\Queue  $queue
     * @return mixed
     */
    public function view(User $user, Queue $queue)
    {
        //
    }

    /**
     * Determine whether the user can create queues.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the queue.
     *
     * @param  \App\User  $user
     * @param  \App\Modules\SupportDesk\Models\Queue  $queue
     * @return mixed
     */
    public function update(User $user, Queue $queue)
    {
        //
    }

    /**
     * Determine whether the user can delete the queue.
     *
     * @param  \App\User  $user
     * @param  \App\Modules\SupportDesk\Models\Queue  $queue
     * @return mixed
     */
    public function delete(User $user, Queue $queue)
    {
        //
    }
}
