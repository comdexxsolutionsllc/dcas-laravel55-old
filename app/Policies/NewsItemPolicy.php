<?php

namespace App\Policies;

use App\User;
use App\NewsItem;
use Illuminate\Auth\Access\HandlesAuthorization;

class NewsItemPolicy
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
     * Determine whether the user can view the newsItem.
     *
     * @param  \App\User $user
     * @param  \App\NewsItem $newsItem
     * @return bool
     */
    public function view(User $user, NewsItem $newsItem): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create newsItems.
     *
     * @param  \App\User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->may('create-newsitems');
    }

    /**
     * Determine whether the user can update the newsItem.
     *
     * @param  \App\User $user
     * @param  \App\NewsItem $newsItem
     * @return bool
     */
    public function update(User $user, NewsItem $newsItem): bool
    {
        return $user->may('update-newsitems');
    }

    /**
     * Determine whether the user can delete the newsItem.
     *
     * @param  \App\User $user
     * @param  \App\NewsItem $newsItem
     * @return bool
     */
    public function delete(User $user, NewsItem $newsItem): bool
    {
        return $user->may('delete-newsitems');
    }
}
