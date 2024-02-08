<?php

declare(strict_types=1);

namespace Tests\Feature\Connect;

use App\Models\Role;
use App\Models\User;
use App\Platform\Models\Achievement;
use App\Platform\Models\IntegrationRelease;
use Carbon\Carbon;
use Database\Seeders\EmulatorsTableSeeder;
use Database\Seeders\ReleaseTablesSeeder;
use Database\Seeders\SystemsTableSeeder;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Session\Middleware\StartSession;
use Tests\TestCase;

/*
 * Connect legacy routes respond with V1 formatted data by default
 * Allows to request V2 format, too
 */

class LegacyCompatProxyTest extends TestCase
{
    use RefreshDatabase;

    protected string $connectUrl = '/dorequest.php';

    protected string $loginUrl = '/login_app.php';

    protected array $headers = ['HTTP_USER_AGENT' => 'RALibRetro/1.99'];

    public function setUp(): void
    {
        parent::setUp();

        // avoid "Session store not set on request" error
        // https://github.com/laravel/framework/issues/9632
        $kernel = app(Kernel::class);
        $kernel->pushMiddleware(StartSession::class);
    }

    public function testItRespondsToLatestIntegrationHtmlRequest(): void
    {
        IntegrationRelease::firstOrCreate([
            'version' => 1,
            'minimum' => 1,
            'stable' => true,
        ]);

        $integrationRelease = IntegrationRelease::stable()->minimum()->latest()->first();

        $this->get('/LatestIntegration.html')
            ->assertSuccessful()
            ->assertSee($integrationRelease->version);
    }

    public function testItRespondsToLatestIntegrationRequest(): void
    {
        $this->seed(SystemsTableSeeder::class);
        $this->seed(EmulatorsTableSeeder::class);
        $this->seed(ReleaseTablesSeeder::class);

        $integrationRelease = IntegrationRelease::stable()->minimum()->latest()->first();

        $this->json('POST', $this->connectUrl, ['r' => 'latestintegration'], $this->headers)
            ->assertSuccessful()
            ->assertJsonFragment([
                'Success' => true,
                'LatestVersion' => $integrationRelease->version,
                'MinimumVersion' => $integrationRelease->version,
                'LatestVersionUrl' => '',
                'LatestVersionUrlX64' => '',
            ]);
    }

    public function testItSupportsLoginWithUsernamePassword(): void
    {
        $user = $this->seedUser();

        $payload = [
            'r' => 'login',
            'u' => $user->username,
            'p' => $user->username,
        ];

        $expected = [
            'Success' => true,
            'User' => $user->username,
            'DisplayName' => $user->display_name,
            'Token' => $user->connect_token,
            'Score' => $user->points_total,
            'Messages' => $user->unread_messages_count,
        ];

        $this->json('GET', $this->connectUrl, $payload, $this->headers)->assertSuccessful()->assertJson($expected);
        $this->json('POST', $this->connectUrl, $payload, $this->headers)->assertSuccessful()->assertJson($expected);
        $this->json('POST', $this->loginUrl, $payload, $this->headers)->assertSuccessful()->assertJson($expected);
    }

    public function testItSupportsLoginWithToken(): void
    {
        $user = $this->seedUser();

        $payload = [
            'r' => 'login',
            'u' => $user->username,
            't' => $user->connect_token,
        ];

        $expected = [
            'Success' => true,
            'User' => $user->username,
            'DisplayName' => $user->display_name,
            'Token' => $user->connect_token,
            'Score' => $user->points_total,
            'Messages' => $user->unread_messages_count,
        ];

        $this->json('GET', $this->connectUrl, $payload, $this->headers)->assertSuccessful()->assertJson($expected);
        $this->json('POST', $this->connectUrl, $payload, $this->headers)->assertSuccessful()->assertJson($expected);
        $this->json('POST', $this->loginUrl, $payload, $this->headers)->assertSuccessful()->assertJson($expected);
    }

    public function testItRejectsLoginOverGet(): void
    {
        // login_app.php never accepted get params
        $this->json('GET', $this->loginUrl, [], $this->headers)
            ->assertStatus(405)
            ->assertJson([
                'Success' => false,
                'Error' => 'Method not allowed',
                'Code' => 'method-not-allowed',
            ]);
    }

    public function testItRespondsToUnlock(): void
    {
        $user = $this->seedUser();
        $pointsBefore = $user->points_total;

        $game = $this->seedGame(achievements: 10);
        /** @var Achievement $achievement */
        $achievement = $game->achievements()->first();
        $achievement->points = 5;
        $achievement->save();

        // make request
        $payload = [
            'r' => 'awardachievement',
            'u' => $user->username,
            't' => $user->connect_token,
            'a' => $achievement->id,
            'h' => 1,
            'm' => $game->gameHashSets()->first()->hashes()->first()->hash,
            'v' => $achievement->unlockValidationHash($user, 1),
        ];

        $this->json('POST', $this->connectUrl, $payload, $this->headers)
            ->assertSuccessful()
            ->assertJson([
                'Success' => true,
                'AchievementID' => $achievement->id,
                'AchievementsRemaining' => 9,
                'Score' => $pointsBefore + 10, // points for hardcore and non-hardcore
            ])
            ->assertDontSee('Error');

        // validate the unlock was registered
        $user = $user->fresh();
        $unlock = $user->playerAchievements()->where('achievement_id', $achievement->id)->first();
        $this->assertIsObject($unlock);
        $this->assertNotNull($unlock->unlocked_hardcore_at);
        $this->assertNotNull($unlock->unlocked_at);
        $this->assertNull($unlock->unlocked_by_user_id);

        $now = Carbon::now();
        $this->assertGreaterThan($now->subMinute(), $unlock->unlocked_hardcore_at);
        $this->assertGreaterThan($now->subMinute(), $unlock->unlocked_at);

        // validate user was awarded points
        $this->assertEquals($pointsBefore + 10, $user->points_total);
    }

    public function testItDoesNotProcessCorruptedUnlockRequests(): void
    {
        $user = $this->seedUser(Role::DEVELOPER);

        // "GET /dorequest.php?r=awardachievement&u=username&t=***&a=7096<?7?1 HTTP/1.1" 200 62 "-" "RetroArch/1.8.5 ..."
        $this->json(
            'GET',
            $this->connectUrl,
            [
                't' => $user->connect_token,
                'u' => $user->username,
                'r' => 'awardachievement',
                'a' => '7096<?7?1',
                'h' => 1,
            ],
            $this->headers
        )
            ->assertJsonValidationErrors(['a'], 'Errors')
            ->assertJsonFragment([
                'Success' => false,
                'Code' => 'bad-request',
            ])
            ->assertStatus(400);
    }
}
