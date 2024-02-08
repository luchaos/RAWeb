<?php

declare(strict_types=1);

namespace Tests\Feature\Server;

use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SystemTest extends TestCase
{
    use RefreshDatabase;

    public function testItRendersSystemsIndex(): void
    {
        $this->get(route('system.index'))->assertSuccessful();
    }

    public function testSystemHasCanonicalAndPermalink(): void
    {
        $system = $this->seedSystem();

        $this->get($system->canonicalUrl)->assertSuccessful();
        $this->get($system->permalink)->assertRedirect($system->canonicalUrl);
    }

    public function testSystemCannotBeEditedWithoutPermissions(): void
    {
        $system = $this->seedSystem();

        $this->get($system->permalink . '/edit')->assertRedirect(route('login'));

        $this->actingAs($this->seedUser())
            ->get($system->permalink . '/edit')
            ->assertStatus(403);
    }

    public function testSystemCanBeEdited(): void
    {
        $this->actingAs($this->seedUser(Role::HUB_MANAGER))
            ->get($this->seedSystem()->permalink . '/edit')
            ->assertSuccessful();
    }
}
