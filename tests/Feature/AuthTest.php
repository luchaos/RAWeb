<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function testItRendersLogin(): void
    {
        $this->get(route('login'))->assertSuccessful();
    }

    public function testCannotLogoutWithGetRequest(): void
    {
        $this->get('/logout')->assertStatus(405);
    }

    public function testItRendersPasswordReset(): void
    {
        $this->get('/password/reset')->assertSuccessful();
    }

    public function testItRendersRegistration(): void
    {
        /*
         * Note:registration can be turned on and off -> tested in SettingsTest
         */
        $this->get('/register')->assertSuccessful();
    }
}
