<?php

declare(strict_types=1);

namespace App\Platform\Policies;

use App\Platform\Models\IntegrationRelease;
use App\Site\Models\Role;
use App\Site\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class IntegrationReleasePolicy
{
    use HandlesAuthorization;

    public function manage(User $user): bool
    {
        return $user->hasAnyRole([
            Role::RELEASE_MANAGER,
        ]);
    }

    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole([
            Role::RELEASE_MANAGER,
        ]);
    }

    public function view(User $user, IntegrationRelease $integrationRelease): bool
    {
        return $user->hasAnyRole([
            Role::RELEASE_MANAGER,
        ]);
    }

    public function create(User $user): bool
    {
        return $user->hasAnyRole([
            Role::RELEASE_MANAGER,
        ]);
    }

    public function update(User $user, IntegrationRelease $integrationRelease): bool
    {
        return $user->hasAnyRole([
            Role::RELEASE_MANAGER,
        ]);
    }

    public function delete(User $user, IntegrationRelease $integrationRelease): bool
    {
        return $user->hasAnyRole([
            Role::RELEASE_MANAGER,
        ]);
    }

    public function restore(User $user, IntegrationRelease $integrationRelease): bool
    {
        return $user->hasAnyRole([
            Role::RELEASE_MANAGER,
        ]);
    }

    public function forceDelete(User $user, IntegrationRelease $integrationRelease): bool
    {
        return $user->hasAnyRole([
            Role::RELEASE_MANAGER,
        ]);
    }
}
