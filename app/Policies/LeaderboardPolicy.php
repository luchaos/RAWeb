<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Leaderboard;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LeaderboardPolicy
{
    use HandlesAuthorization;

    public function manage(User $user): bool
    {
        return $user->hasAnyRole([
            Role::HUB_MANAGER,
            Role::DEVELOPER_STAFF,
            Role::DEVELOPER,
        ]);
    }

    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, Leaderboard $leaderboard): bool
    {
        return false;
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, Leaderboard $leaderboard): bool
    {
        return false;
    }

    public function delete(User $user, Leaderboard $leaderboard): bool
    {
        return false;
    }

    public function restore(User $user, Leaderboard $leaderboard): bool
    {
        return false;
    }

    public function forceDelete(User $user, Leaderboard $leaderboard): bool
    {
        return false;
    }
}
