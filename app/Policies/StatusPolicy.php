<?php

namespace App\Policies;

use App\User;
use Modules\SupportDesk\Models\Status;
use Illuminate\Auth\Access\HandlesAuthorization;

class StatusPolicy
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
     * Determine whether the user can view the status.
     *
     * @param  \App\User $user
     * @param  \Modules\SupportDesk\Models\Status $status
     * @return bool
     */
    public function view(User $user, Status $status): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create statuses.
     *
     * @param  \App\User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->may('create-statuses');
    }

    /**
     * Determine whether the user can update the status.
     *
     * @param  \App\User $user
     * @param  \Modules\SupportDesk\Models\Status $status
     * @return bool
     */
    public function update(User $user, Status $status): bool
    {
        return $user->may('update-statuses');
    }

    /**
     * Determine whether the user can delete the status.
     *
     * @param  \App\User $user
     * @param  \Modules\SupportDesk\Models\Status $status
     * @return bool
     */
    public function delete(User $user, Status $status): bool
    {
        return $user->may('delete-statuses');
    }
}
