<?php

namespace App\Policies;

use App\User;
use App\Consumer;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConsumerPolicy
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
     * Determine whether the user can view the consumer.
     *
     * @param  \App\User $user
     * @param  \App\Consumer $consumer
     * @return bool
     */
    public function view(User $user, Consumer $consumer): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create consumers.
     *
     * @param  \App\User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->may('create-consumers');
    }

    /**
     * Determine whether the user can update the consumer.
     *
     * @param  \App\User $user
     * @param  \App\Consumer $consumer
     * @return bool
     */
    public function update(User $user, Consumer $consumer): bool
    {
        return $user->may('update-consumers');
    }

    /**
     * Determine whether the user can delete the consumer.
     *
     * @param  \App\User $user
     * @param  \App\Consumer $consumer
     * @return bool
     */
    public function delete(User $user, Consumer $consumer): bool
    {
        return $user->may('delete-consumers');
    }
}
