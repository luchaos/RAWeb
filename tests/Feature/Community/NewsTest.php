<?php

declare(strict_types=1);

namespace Tests\Feature\Community;

use App\Community\Models\News;
use Database\Seeders\NewsTableSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NewsTest extends TestCase
{
    use RefreshDatabase;

    public function testItRendersNewsIndex(): void
    {
        $this->seed(NewsTableSeeder::class);
        $this->get(route('news.index'))->assertSuccessful();
    }

    public function testNewsArticleHasCanonicalAndPermalink(): void
    {
        $this->seed(NewsTableSeeder::class);

        /** @var News $news */
        $news = News::first();

        $this->get($news->permalink)->assertRedirect($news->canonicalUrl);
        $this->get($news->canonicalUrl)->assertSuccessful();
    }
}
