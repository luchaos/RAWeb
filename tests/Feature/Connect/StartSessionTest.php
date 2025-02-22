<?php

declare(strict_types=1);

namespace Tests\Feature\Connect;

use App\Platform\Models\Achievement;
use App\Platform\Models\Game;
use App\Platform\Models\PlayerSession;
use App\Platform\Models\System;
use App\Site\Enums\Permissions;
use App\Site\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Tests\Feature\Platform\Concerns\TestsPlayerAchievements;
use Tests\TestCase;

class StartSessionTest extends TestCase
{
    use BootstrapsConnect;
    use RefreshDatabase;
    use TestsPlayerAchievements;

    public function testStartSession(): void
    {
        $now = Carbon::create(2020, 3, 4, 16, 40, 13); // 4:40:13pm 4 Mar 2020
        Carbon::setTestNow($now);

        /** @var System $system */
        $system = System::factory()->create();
        /** @var Game $game */
        $game = Game::factory()->create(['ConsoleID' => $system->ID]);
        /** @var Achievement $achievement1 */
        $achievement1 = Achievement::factory()->published()->create(['GameID' => $game->ID]);
        /** @var Achievement $achievement2 */
        $achievement2 = Achievement::factory()->published()->create(['GameID' => $game->ID]);
        /** @var Achievement $achievement3 */
        $achievement3 = Achievement::factory()->published()->create(['GameID' => $game->ID]);
        /** @var Achievement $achievement4 */
        $achievement4 = Achievement::factory()->published()->create(['GameID' => $game->ID]);

        $unlock1Date = $now->clone()->subMinutes(65);
        $this->addHardcoreUnlock($this->user, $achievement1, $unlock1Date);
        $unlock2Date = $now->clone()->subMinutes(22);
        $this->addHardcoreUnlock($this->user, $achievement2, $unlock2Date);
        $unlock3Date = $now->clone()->subMinutes(1);
        $this->addSoftcoreUnlock($this->user, $achievement3, $unlock3Date);

        // ----------------------------
        // game with unlocks
        $this->get($this->apiUrl('startsession', ['g' => $game->ID]))
            ->assertExactJson([
                'Success' => true,
                'HardcoreUnlocks' => [
                    [
                        'ID' => $achievement1->ID,
                        'When' => $unlock1Date->timestamp,
                    ],
                    [
                        'ID' => $achievement2->ID,
                        'When' => $unlock2Date->timestamp,
                    ],
                ],
                'Unlocks' => [
                    [
                        'ID' => $achievement3->ID,
                        'When' => $unlock3Date->timestamp,
                    ],
                ],
                'ServerNow' => Carbon::now()->timestamp,
            ]);

        // player session created
        $playerSession = PlayerSession::where([
            'user_id' => $this->user->id,
            'game_id' => $achievement3->game_id,
        ])->first();
        $this->assertModelExists($playerSession);
        $this->assertEquals(1, $playerSession->duration);
        $this->assertEquals('Playing ' . $game->title, $playerSession->rich_presence);

        /** @var User $user1 */
        $user1 = User::firstWhere('User', $this->user->User);
        $this->assertEquals($game->ID, $user1->LastGameID);
        $this->assertEquals("Playing " . $game->Title, $user1->RichPresenceMsg);

        // ----------------------------
        // non-existant game
        $this->get($this->apiUrl('startsession', ['g' => 999999]))
            ->assertExactJson([
                'Success' => false,
                'Error' => 'Unknown game',
            ]);

        // no player session
        $playerSession = PlayerSession::where([
            'user_id' => $this->user->id,
            'game_id' => 999999,
        ])->first();
        $this->assertNull($playerSession);

        // ----------------------------
        // game with no unlocks
        /** @var Game $game2 */
        $game2 = Game::factory()->create(['ConsoleID' => $system->ID]);
        Achievement::factory()->published()->count(6)->create(['GameID' => $game->ID]);

        $this->get($this->apiUrl('startsession', ['g' => $game2->ID]))
            ->assertExactJson([
                'Success' => true,
                'ServerNow' => Carbon::now()->timestamp,
            ]);

        // player session created
        $playerSession = PlayerSession::where([
            'user_id' => $this->user->id,
            'game_id' => $game2->id,
        ])->first();
        $this->assertModelExists($playerSession);
        $this->assertEquals(1, $playerSession->duration);
        $this->assertEquals('Playing ' . $game2->title, $playerSession->rich_presence);

        $user1 = User::firstWhere('User', $this->user->User);
        $this->assertEquals($game2->ID, $user1->LastGameID);
        $this->assertEquals("Playing " . $game2->Title, $user1->RichPresenceMsg);

        // ----------------------------
        // recently active session is extended
        Carbon::setTestNow($now->addMinutes(8));
        $this->get($this->apiUrl('startsession', ['g' => $game2->ID]))
            ->assertExactJson([
                'Success' => true,
                'ServerNow' => Carbon::now()->timestamp,
            ]);

        // player session created
        $playerSession2 = PlayerSession::where([
            'user_id' => $this->user->id,
            'game_id' => $game2->id,
        ])->orderByDesc('id')->first();
        $this->assertModelExists($playerSession2);
        $this->assertEquals($playerSession->id, $playerSession2->id);
        $this->assertEquals(8, $playerSession2->duration);
        $this->assertEquals('Playing ' . $game2->title, $playerSession2->rich_presence);

        // ----------------------------
        // new session created after long absence
        Carbon::setTestNow($now->addHours(4));
        $this->get($this->apiUrl('startsession', ['g' => $game2->ID]))
            ->assertExactJson([
                'Success' => true,
                'ServerNow' => Carbon::now()->timestamp,
            ]);

        // player session created
        $playerSession2 = PlayerSession::where([
            'user_id' => $this->user->id,
            'game_id' => $game2->id,
        ])->orderByDesc('id')->first();
        $this->assertModelExists($playerSession2);
        $this->assertNotEquals($playerSession->id, $playerSession2->id);
        $this->assertEquals(1, $playerSession2->duration);
        $this->assertEquals('Playing ' . $game2->title, $playerSession2->rich_presence);
    }

    public function testStartSessionDelegated(): void
    {
        $now = Carbon::create(2020, 3, 4, 16, 40, 13); // 4:40:13pm 4 Mar 2020
        Carbon::setTestNow($now);

        /** @var System $standalonesSystem */
        $standalonesSystem = System::factory()->create(['ID' => 102]);
        /** @var Game $gameOne */
        $gameOne = Game::factory()->create(['ConsoleID' => $standalonesSystem->ID]);

        /** @var User $integrationUser */
        $integrationUser = User::factory()->create(['Permissions' => Permissions::Registered, 'appToken' => Str::random(16)]);
        /** @var User $delegatedUser */
        $delegatedUser = User::factory()->create(['Permissions' => Permissions::Registered, 'appToken' => Str::random(16)]);

        // The integration user is the sole author of all the set's achievements.
        $achievements = Achievement::factory()->published()->count(6)->create(['GameID' => $gameOne->id, 'Author' => $integrationUser->User]);

        $unlock1Date = $now->clone()->subMinutes(65);
        $this->addHardcoreUnlock($delegatedUser, $achievements->get(0), $unlock1Date);
        $unlock2Date = $now->clone()->subMinutes(22);
        $this->addHardcoreUnlock($delegatedUser, $achievements->get(1), $unlock2Date);
        $unlock3Date = $now->clone()->subMinutes(1);
        $this->addSoftcoreUnlock($delegatedUser, $achievements->get(2), $unlock3Date);

        $params = [
            'u' => $integrationUser->User,
            't' => $integrationUser->appToken,
            'r' => 'startsession',
            'g' => $gameOne->id,
            'k' => $delegatedUser->User,
        ];

        // ----------------------------
        // game with unlocks
        $requestUrl = sprintf('dorequest.php?%s', http_build_query($params));
        $this->post($requestUrl)
            ->assertExactJson([
                'Success' => true,
                'HardcoreUnlocks' => [
                    [
                        'ID' => $achievements->get(0)->ID,
                        'When' => $unlock1Date->timestamp,
                    ],
                    [
                        'ID' => $achievements->get(1)->ID,
                        'When' => $unlock2Date->timestamp,
                    ],
                ],
                'Unlocks' => [
                    [
                        'ID' => $achievements->get(2)->ID,
                        'When' => $unlock3Date->timestamp,
                    ],
                ],
                'ServerNow' => Carbon::now()->timestamp,
            ]);

        // player session created
        $playerSession = PlayerSession::where([
            'user_id' => $delegatedUser->id,
            'game_id' => $achievements->get(2)->game_id,
        ])->first();
        $this->assertModelExists($playerSession);
        $this->assertEquals(1, $playerSession->duration);
        $this->assertEquals('Playing ' . $gameOne->title, $playerSession->rich_presence);

        $this->assertEquals($gameOne->id, $delegatedUser->LastGameID);
        $this->assertEquals("Playing " . $gameOne->Title, $delegatedUser->RichPresenceMsg);

        // While delegating, updates are made on behalf of username `k`.
        $this->assertDatabaseMissing((new PlayerSession())->getTable(), [
            'user_id' => $integrationUser->id,
            'game_id' => $gameOne->id,
        ]);

        // Next, try to delegate on a non-standalone game.
        // This is not allowed and should fail.
        /** @var System $normalSystem */
        $normalSystem = System::factory()->create(['ID' => 1]);
        /** @var Game $gameTwo */
        $gameTwo = Game::factory()->create(['ConsoleID' => $normalSystem->ID]);

        $params['g'] = $gameTwo->id;

        $requestUrl = sprintf('dorequest.php?%s', http_build_query($params));
        $this->post($requestUrl)
            ->assertStatus(403)
            ->assertExactJson([
                "Success" => false,
                "Error" => "You do not have permission to do that.",
                "Code" => "access_denied",
                "Status" => 403,
            ]);

        // Next, try to delegate on a game with no achievements authored by the integration user.
        // This is not allowed and should fail.
        /** @var Game $gameThree */
        $gameThree = Game::factory()->create(['ConsoleID' => $standalonesSystem->ID]);
        Achievement::factory()->published()->count(6)->create(['GameID' => $gameThree->id]);
        $params['g'] = $gameThree->id;

        $this->post($requestUrl)
            ->assertStatus(403)
            ->assertExactJson([
                "Success" => false,
                "Error" => "You do not have permission to do that.",
                "Code" => "access_denied",
                "Status" => 403,
            ]);

        $params = [
            'u' => $integrationUser->User,
            't' => $integrationUser->appToken,
            'r' => 'startsession',
            'g' => $gameOne->id,
            'k' => $delegatedUser->User,
        ];

        // Next, try a GET call, which should be blocked.
        $requestUrl = sprintf('dorequest.php?%s', http_build_query($params));
        $this->get($requestUrl)
            ->assertStatus(405)
            ->assertJson([
                "Success" => false,
                "Error" => "Access denied.",
                "Status" => 405,
            ]);
    }
}
