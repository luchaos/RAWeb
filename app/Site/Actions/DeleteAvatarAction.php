<?php

declare(strict_types=1);

namespace App\Site\Actions;

use App\Site\Models\User;

class DeleteAvatarAction
{
    public function __construct(
        private LinkLatestAvatarAction $linkLatestAvatarAction
    ) {
    }

    public function execute(User $user): void
    {
        /*
         * remove local entry
         */
        if ($user->hasMedia('avatar')) {
            $user->getMedia('avatar')->last()->delete();
        }

        /*
         * link the now latest avatar
         */
        $this->linkLatestAvatarAction->execute($user);
    }
}
