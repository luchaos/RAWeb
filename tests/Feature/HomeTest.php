<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Achievement;
use App\Models\Game;
use App\Models\StaticData;
use App\Models\System;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeTest extends TestCase
{
    use RefreshDatabase;

    public function testItRendersPageWithEmptyDatabase(): void
    {
        $this->get('/')->assertSuccessful();
    }

    public function testItRendersPageWithStaticData(): void
    {
        $user = User::factory()->create();
        $game = Game::factory()
            ->for(System::factory()->create())
            ->create();
        $achievement = Achievement::factory()->for($game)->create();

        dd($achievement);

        /** @var StaticData $staticData */
        StaticData::factory()
            ->usingGame($game)
            ->usingUser($user)
            ->usingAchievement($achievement)
            ->create();

        $this->get('/')->assertSuccessful()
            ->assertSee('Achievement of the Week')
            ->assertSee($game->Title)
            ->assertSee($achievement->Title);
    }

    public function testItRendersContactPage(): void
    {
        $this->get('/contact')->assertSuccessful();
    }

    public function testItRendersTermsPage(): void
    {
        $this->get('/terms')->assertSuccessful();
    }
}
