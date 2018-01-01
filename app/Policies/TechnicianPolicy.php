<?php

namespace App\Policies;

use App\User;
use Modules\SupportDesk\Models\Technician;
use Illuminate\Auth\Access\HandlesAuthorization;

class TechnicianPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the technician.
     *
     * @param  \App\User  $user
     * @param  \Modules\SupportDesk\Models\Technician  $technician
     * @return mixed
     */
    public function view(User $user, Technician $technician)
    {
        //
    }

    /**
     * Determine whether the user can create technicians.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the technician.
     *
     * @param  \App\User  $user
     * @param  \Modules\SupportDesk\Models\Technician  $technician
     * @return mixed
     */
    public function update(User $user, Technician $technician)
    {
        //
    }

    /**
     * Determine whether the user can delete the technician.
     *
     * @param  \App\User  $user
     * @param  \Modules\SupportDesk\Models\Technician  $technician
     * @return mixed
     */
    public function delete(User $user, Technician $technician)
    {
        //
    }
}
