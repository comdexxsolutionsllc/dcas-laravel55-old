<?php

namespace App\Policies;

use App\User;
use App\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
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
     * Determine whether the user can view the role.
     *
     * @param \App\User $user
     * @param \App\Role $role
     *
     * @return bool
     */
    public function view(User $user, Role $role): bool
    {
        if ($user->isAdmin()) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can create roles.
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
     * Determine whether the user can update the role.
     *
     * @param \App\User $user
     * @param \App\Role $role
     *
     * @return bool
     */
    public function update(User $user, Role $role): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the role.
     *
     * @param \App\User $user
     * @param \App\Role $role
     *
     * @return bool
     */
    public function delete(User $user, Role $role): bool
    {
        return false;
    }
}
