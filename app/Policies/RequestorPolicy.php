<?php

namespace App\Policies;

use App\User;
use Modules\SupportDesk\Models\Requestor;
use Illuminate\Auth\Access\HandlesAuthorization;

class RequestorPolicy
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
     * Determine whether the user can view the requestor.
     *
     * @param  \App\User $user
     * @param  \Modules\SupportDesk\Models\Requestor $requestor
     * @return bool
     */
    public function view(User $user, Requestor $requestor): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create requestors.
     *
     * @param  \App\User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->may('create-requestors');
    }

    /**
     * Determine whether the user can update the requestor.
     *
     * @param  \App\User $user
     * @param  \Modules\SupportDesk\Models\Requestor $requestor
     * @return bool
     */
    public function update(User $user, Requestor $requestor): bool
    {
        return $user->may('update-requestors');
    }

    /**
     * Determine whether the user can delete the requestor.
     *
     * @param  \App\User $user
     * @param  \Modules\SupportDesk\Models\Requestor $requestor
     * @return bool
     */
    public function delete(User $user, Requestor $requestor): bool
    {
        return $user->may('delete-requestors');
    }
}
