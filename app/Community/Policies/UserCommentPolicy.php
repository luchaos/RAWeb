<?php

declare(strict_types=1);

namespace App\Community\Policies;

use App\Community\Models\UserComment;
use App\Site\Models\Role;
use App\Site\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserCommentPolicy
{
    use HandlesAuthorization;

    public function manage(User $user): bool
    {
        return $user->hasAnyRole([
            Role::MODERATOR,
        ]);
    }

    public function viewAny(?User $user, User $commentable): bool
    {
        /*
         * check guests first
         */
        if (!$user) {
            /*
             * TODO: check user privacy settings instead of wall_active flag
             */
            // $commentable->preferences->wall
            // return false;

            return true;
        }

        if ($user->hasAnyRole([
            Role::MODERATOR,
            // Role::ADMINISTRATOR,
        ])) {
            return true;
        }

        /*
         * TODO: check user privacy settings instead of wall_active flag
         */
        // $commentable->preferences->wall
        // return false;

        return true;
    }

    public function view(User $user, UserComment $comment): bool
    {
        return true;
    }

    public function create(User $user, ?User $commentable): bool
    {
        // if (!$commentable->wall_active) {
        //     return false;
        // }

        if ($user->isMuted()) {
            return false;
        }

        if (!$user->hasVerifiedEmail()) {
            return false;
        }

        /*
         * user wants to comment on themselves (profile comments)
         */
        if ($user->is($commentable)) {
            return true;
        }

        /*
         * TODO: check user privacy setting
         */

        return true;
    }

    public function update(User $user, UserComment $comment): bool
    {
        /*
         * users can edit their own comments
         */
        return $user->is($comment->user);
    }

    public function delete(User $user, UserComment $comment): bool
    {
        if ($user->hasAnyRole([
            Role::MODERATOR,
        ])) {
            return true;
        }

        /*
         * it's the user's own comment
         */
        return $user->is($comment->commentable);
    }

    public function restore(User $user, UserComment $comment): bool
    {
        return false;
    }

    public function forceDelete(User $user, UserComment $comment): bool
    {
        return false;
    }
}
