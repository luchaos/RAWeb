<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\PlayerSession;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PlayerSessionPolicy
{
    use HandlesAuthorization;

    public function manage(User $user): bool
    {
        return false;
    }

    public function viewAny(?User $user, User $player): bool
    {
        if ($user && $user->is($player)) {
            return true;
        }

        /*
         * TODO: check user privacy settings
         */
        // $player->settings->games->public
        // return false;

        return true;
    }

    public function view(?User $user, PlayerSession $playerSession): bool
    {
        if (!$user) {
            return false;
        }

        return true;
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, PlayerSession $playerSession): bool
    {
        return false;
    }

    public function delete(User $user, PlayerSession $playerSession): bool
    {
        return false;
    }

    public function restore(User $user, PlayerSession $playerSession): bool
    {
        return false;
    }

    public function forceDelete(User $user, PlayerSession $playerSession): bool
    {
        return false;
    }
}
