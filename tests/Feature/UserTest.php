<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function testItRendersUsersIndex(): void
    {
        $this->get('/users')->assertSuccessful();
    }

    public function testUserHasCanonicalAndPermalink(): void
    {
        $user = $this->seedUser();

        $this->get($user->canonicalUrl)->assertSuccessful();
        $this->get($user->permalink)->assertRedirect($user->canonicalUrl);
    }

    // public function testItRendersSettingsPageWithAuthUserContext()
    // {
    //     // $this->get('/settings')->assertSuccessful();
    // }
}
