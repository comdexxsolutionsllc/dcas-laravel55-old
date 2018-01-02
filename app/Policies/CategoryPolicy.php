<?php

namespace App\Policies;

use App\User;
use Modules\SupportDesk\Models\Category;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
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
     * Determine whether the user can view the category.
     *
     * @param \App\User $user
     * @param \Modules\SupportDesk\Models\Category $category
     *
     * @return bool
     */
    public function view(User $user, Category $category): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create categories.
     *
     * @param \App\User $user
     *
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->may('create-categories');
    }

    /**
     * Determine whether the user can update the category.
     *
     * @param \App\User $user
     * @param \Modules\SupportDesk\Models\Category $category
     *
     * @return bool
     */
    public function update(User $user, Category $category): bool
    {
        return $user->may('update-categories');
    }

    /**
     * Determine whether the user can delete the category.
     *
     * @param \App\User $user
     * @param \Modules\SupportDesk\Models\Category $category
     *
     * @return bool
     */
    public function delete(User $user, Category $category): bool
    {
        return $user->may('delete-categories');
    }
}
