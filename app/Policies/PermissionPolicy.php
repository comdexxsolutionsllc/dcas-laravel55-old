<?php

namespace App\Policies;

use App\User;
use App\Permission;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
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
     * Determine whether the user can view the permission.
     *
     * @param \App\User $user
     * @param \App\Permission $permission
     *
     * @return bool
     */
    public function view(User $user, Permission $permission): bool
    {
        return $user->may('view-permissions');
    }

    /**
     * Determine whether the user can create permissions.
     *
     * @param \App\User $user
     *
     * @return bool
     */
    public function create(User $user): bool
    {
        if ($user->isAdmin()) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can update the permission.
     *
     * @param \App\User $user
     * @param \App\Permission $permission
     *
     * @return bool
     */
    public function update(User $user, Permission $permission): bool
    {
        if ($user->isAdmin()) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the permission.
     *
     * @param \App\User $user
     * @param \App\Permission $permission
     *
     * @return bool
     */
    public function delete(User $user, Permission $permission): bool
    {
        return false;
    }
}
