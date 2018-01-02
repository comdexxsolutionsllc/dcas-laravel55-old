<?php

namespace App\Policies;

use App\User;
use App\Page;
use Illuminate\Auth\Access\HandlesAuthorization;

class PagePolicy
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
     * Determine whether the user can view the page.
     *
     * @param  \App\User $user
     * @param  \App\Page $page
     * @return bool
     */
    public function view(User $user, Page $page): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create pages.
     *
     * @param  \App\User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->may('create-pages');
    }

    /**
     * Determine whether the user can update the page.
     *
     * @param  \App\User $user
     * @param  \App\Page $page
     * @return bool
     */
    public function update(User $user, Page $page): bool
    {
        return $user->may('update-pages');
    }

    /**
     * Determine whether the user can delete the page.
     *
     * @param  \App\User $user
     * @param  \App\Page $page
     * @return bool
     */
    public function delete(User $user, Page $page): bool
    {
        return $user->may('delete-pages');
    }
}
