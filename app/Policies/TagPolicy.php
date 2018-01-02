<?php

namespace App\Policies;

use App\User;
use Modules\SupportDesk\Models\Tag;
use Illuminate\Auth\Access\HandlesAuthorization;

class TagPolicy
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
     * Determine whether the user can view the tag.
     *
     * @param  \App\User $user
     * @param  \Modules\SupportDesk\Models\Tag $tag
     * @return bool
     */
    public function view(User $user, Tag $tag): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create tags.
     *
     * @param  \App\User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->may('create-tags');
    }

    /**
     * Determine whether the user can update the tag.
     *
     * @param  \App\User $user
     * @param  \Modules\SupportDesk\Models\Tag $tag
     * @return bool
     */
    public function update(User $user, Tag $tag): bool
    {
        return $user->may('update-tags');
    }

    /**
     * Determine whether the user can delete the tag.
     *
     * @param  \App\User $user
     * @param  \Modules\SupportDesk\Models\Tag $tag
     * @return bool
     */
    public function delete(User $user, Tag $tag): bool
    {
        return $user->may('delete-tags');
    }
}
