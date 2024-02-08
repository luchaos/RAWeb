<?php

declare(strict_types=1);

namespace Tests\Feature\Server;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GameHashTest extends TestCase
{
    use RefreshDatabase;

    public function testItRendersGameHashIndexForGuests(): void
    {
        $this->get(route('game-hash.index'))->assertSuccessful();
    }

    public function testItRenderGameHashIndexForAuthenticatedUsers(): void
    {
        $this->actingAs($this->seedUser())->get(route('game-hash.index'))->assertSuccessful();
    }

    public function testGameAssetsCanBeAccessed(): void
    {
        $this->get(route('game.asset.index', $this->seedGame()))->assertSuccessful();
    }
}
