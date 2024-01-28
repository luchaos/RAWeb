<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\AchievementSetClaim;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AchievementSetClaimPolicy
{
    use HandlesAuthorization;

    public function manage(User $user): bool
    {
        return $user->hasAnyRole([
            Role::MODERATOR,
        ]);
    }

    public function view(User $user, AchievementSetClaim $achievementSetClaim): bool
    {
        return false;
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, AchievementSetClaim $achievementSetClaim): bool
    {
        return false;
    }

    public function delete(User $user, AchievementSetClaim $achievementSetClaim): bool
    {
        return false;
    }

    public function restore(User $user, AchievementSetClaim $achievementSetClaim): bool
    {
        return false;
    }

    public function forceDelete(User $user, AchievementSetClaim $achievementSetClaim): bool
    {
        return false;
    }
}
