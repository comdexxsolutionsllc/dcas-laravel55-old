<?php

namespace App\Policies;

use App\User;
use Modules\SupportDesk\Models\Technician;
use Illuminate\Auth\Access\HandlesAuthorization;

class TechnicianPolicy
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
     * Determine whether the user can view the technician.
     *
     * @param  \App\User $user
     * @param  \Modules\SupportDesk\Models\Technician $technician
     * @return bool
     */
    public function view(User $user, Technician $technician): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create technicians.
     *
     * @param  \App\User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->may('create-technicians');
    }

    /**
     * Determine whether the user can update the technician.
     *
     * @param  \App\User $user
     * @param  \Modules\SupportDesk\Models\Technician $technician
     * @return bool
     */
    public function update(User $user, Technician $technician): bool
    {
        return $user->may('update-technicians');
    }

    /**
     * Determine whether the user can delete the technician.
     *
     * @param  \App\User $user
     * @param  \Modules\SupportDesk\Models\Technician $technician
     * @return bool
     */
    public function delete(User $user, Technician $technician): bool
    {
        return $user->may('delete-technicians');
    }
}
