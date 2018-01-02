<?php

namespace App\Policies;

use App\User;
use Modules\SupportDesk\Models\Comment;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
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
     * Determine whether the user can view the comment.
     *
     * @param \App\User $user
     * @param \Modules\SupportDesk\Models\Comment|Comment $comment
     *
     * @return bool
     */
    public function view(User $user, Comment $comment): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create comments.
     *
     * @param \App\User $user
     *
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->may('create-comments');
    }

    /**
     * Determine whether the user can update the comment.
     *
     * @param \App\User $user
     * @param \Modules\SupportDesk\Models\Comment $comment
     *
     * @return bool
     */
    public function update(User $user, Comment $comment): bool
    {
        return $user->may('update-comments') && ($user->id === $comment->user_id);
    }

    /**
     * Determine whether the user can delete the comment.
     *
     * @param \App\User $user
     * @param \Modules\SupportDesk\Models\Comment $comment
     *
     * @return bool
     */
    public function delete(User $user, Comment $comment): bool
    {
        return $user->may('delete-comments');
    }
}
