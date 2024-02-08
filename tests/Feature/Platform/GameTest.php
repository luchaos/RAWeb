<?php

declare(strict_types=1);

namespace Tests\Feature\Server;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GameTest extends TestCase
{
    use RefreshDatabase;

    public function testItRendersGamesIndex(): void
    {
        $this->get(route('game.index'))->assertSuccessful();
    }

    public function testGameHasCanonicalAndPermalink(): void
    {
        $game = $this->seedGame();

        $this->get($game->canonicalUrl)->assertSuccessful();
        $this->get($game->permalink)->assertRedirect($game->canonicalUrl);
    }

    public function testGameCannotBeEditedWithoutPermission(): void
    {
        $game = $this->seedGame();

        $this->get('/game/' . $game->id . '/edit')->assertRedirect(route('login'));

        $this->actingAs($this->seedUser())
            ->get('/game/' . $game->id . '/edit')
            ->assertStatus(403);
    }

    // test('game can be edited', function () {
    //     $this->actingAs($this->seedUser(Role::DEVELOPER))
    //         ->get('/game/' . $this->seedGame()->id . '/edit')
    //         ->assertSuccessful();
    // });
}
