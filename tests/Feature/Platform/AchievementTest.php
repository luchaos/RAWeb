<?php

declare(strict_types=1);

namespace Tests\Feature\Platform;

use App\Models\Achievement;
use App\Models\Game;
use App\Models\Role;
use App\Platform\Enums\AchievementFlag;
use App\Platform\Enums\AchievementPoints;
use App\Platform\Enums\AchievementType;
use App\Platform\Events\AchievementCreated;
use App\Platform\Events\AchievementMoved;
use App\Platform\Events\AchievementPointsChanged;
use App\Platform\Events\AchievementPublished;
use App\Platform\Events\AchievementTypeChanged;
use App\Platform\Events\AchievementUnpublished;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class AchievementTest extends TestCase
{
    use RefreshDatabase;

    public function testItRendersListWithEmptyDatabase(): void
    {
        $this->get('achievementList.php')->assertSuccessful();
    }

    public function testItDispatchedModelEventsOnSpecificAttributeChanges(): void
    {
        Event::fake([
            AchievementCreated::class,
            AchievementPublished::class,
            AchievementUnpublished::class,
            AchievementPointsChanged::class,
            AchievementTypeChanged::class,
            AchievementMoved::class,
        ]);

        $game = Game::factory()->create();

        $achievement = Achievement::factory()->for($game)->create([
            'Points' => 0,
        ]);
        Event::assertDispatched(AchievementCreated::class);

        $achievement->Flags = AchievementFlag::OfficialCore;
        $achievement->save();
        Event::assertDispatched(AchievementPublished::class);

        $achievement->Flags = AchievementFlag::Unofficial;
        $achievement->save();
        Event::assertDispatched(AchievementUnpublished::class);

        $achievement->Points = AchievementPoints::cases()[4];
        $achievement->save();
        Event::assertDispatched(AchievementPointsChanged::class);

        $achievement->type = AchievementType::Progression;
        $achievement->save();
        Event::assertDispatched(AchievementTypeChanged::class);

        $achievement->type = AchievementType::WinCondition;
        $achievement->save();
        Event::assertDispatched(AchievementTypeChanged::class);

        $game2 = Game::factory()->create();
        $achievement->GameID = $game2->id;
        $achievement->save();
        Event::assertDispatched(AchievementMoved::class);
    }

    public function testItRendersAchievementsIndex(): void
    {
        $this->seedAchievements();

        $this->get(route('achievement.index'))->assertSuccessful();
    }

    public function testAchievementHasCanonicalAndPermalink(): void
    {
        $achievement = $this->seedAchievement();

        $this->get($achievement->canonicalUrl)->assertSuccessful();
        $this->get($achievement->permalink)->assertRedirect($achievement->canonicalUrl);
    }

    public function testAchievementCannotBeEditedWithoutPermissions(): void
    {
        $achievement = $this->seedAchievement();

        $this->get($achievement->getPermalinkAttribute() . '/edit')
            ->assertRedirect(route('login'));

        $this->actingAs($this->seedUser())
            ->get($achievement->getPermalinkAttribute() . '/edit')
            ->assertForbidden();
    }

    public function testAchievementCanBeEdited(): void
    {
        $achievement = $this->seedAchievement();

        $this->actingAs($this->seedUser(Role::DEVELOPER))
            ->get($achievement->getPermalinkAttribute() . '/edit')
            ->assertSuccessful();
    }

    // public function testAchievementCanBeMovedToGame(): void
    // {
    //     upsert achievement_set
    //     upsert badge
    //       - add title & description from achievement as default
    //       - add media to badge
    //     upsert badge_set
    // }
}
