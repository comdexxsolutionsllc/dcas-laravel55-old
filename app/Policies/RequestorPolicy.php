<?php

namespace App\Policies;

use App\User;
use Modules\SupportDesk\Models\Requestor;
use Illuminate\Auth\Access\HandlesAuthorization;

class RequestorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the requestor.
     *
     * @param  \App\User  $user
     * @param  \Modules\SupportDesk\Models\Requestor  $requestor
     * @return mixed
     */
    public function view(User $user, Requestor $requestor)
    {
        //
    }

    /**
     * Determine whether the user can create requestors.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the requestor.
     *
     * @param  \App\User  $user
     * @param  \Modules\SupportDesk\Models\Requestor  $requestor
     * @return mixed
     */
    public function update(User $user, Requestor $requestor)
    {
        //
    }

    /**
     * Determine whether the user can delete the requestor.
     *
     * @param  \App\User  $user
     * @param  \Modules\SupportDesk\Models\Requestor  $requestor
     * @return mixed
     */
    public function delete(User $user, Requestor $requestor)
    {
        //
    }
}
