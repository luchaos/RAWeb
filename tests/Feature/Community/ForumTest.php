<?php

declare(strict_types=1);

namespace Tests\Feature\Community;

use App\Community\Models\Forum;
use App\Community\Models\ForumCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ForumTest extends TestCase
{
    use RefreshDatabase;

    public function testForumCategoryHasCanonicalAndPermalink(): void
    {
        $this->seed(\Database\Seeders\ForumTableSeeder::class);

        /** @var ForumCategory $category */
        $category = ForumCategory::find(1);

        $this->get($category->canonicalUrl)->assertSuccessful();
        $this->get($category->permalink)->assertRedirect($category->canonicalUrl);
    }

    public function testForumHasCanonicalAndPermalink(): void
    {
        $this->seed(\Database\Seeders\ForumTableSeeder::class);

        /** @var ForumCategory $category */
        $category = ForumCategory::find(1);

        /** @var Forum $forum */
        $forum = $category->forums()->first();

        $this->get($forum->canonicalUrl)->assertSuccessful();
        $this->get($forum->permalink)->assertRedirect($forum->canonicalUrl);
    }
}
