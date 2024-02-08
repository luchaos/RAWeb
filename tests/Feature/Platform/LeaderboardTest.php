<?php

declare(strict_types=1);

namespace Tests\Feature\Server;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LeaderboardTest extends TestCase
{
    use RefreshDatabase;

    public function testItRendersLeaderboardIndex(): void
    {
        $this->get(route('leaderboard.index'))->assertSuccessful();
    }
}
