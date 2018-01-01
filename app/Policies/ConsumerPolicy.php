<?php

namespace App\Policies;

use App\User;
use App\App\Consumer;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConsumerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the consumer.
     *
     * @param  \App\User  $user
     * @param  \App\App\Consumer  $consumer
     * @return mixed
     */
    public function view(User $user, Consumer $consumer)
    {
        //
    }

    /**
     * Determine whether the user can create consumers.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the consumer.
     *
     * @param  \App\User  $user
     * @param  \App\App\Consumer  $consumer
     * @return mixed
     */
    public function update(User $user, Consumer $consumer)
    {
        //
    }

    /**
     * Determine whether the user can delete the consumer.
     *
     * @param  \App\User  $user
     * @param  \App\App\Consumer  $consumer
     * @return mixed
     */
    public function delete(User $user, Consumer $consumer)
    {
        //
    }
}
