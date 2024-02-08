<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PagesTest extends TestCase
{
    use RefreshDatabase;

    public function testItRendersHome(): void
    {
        $this->get('/')->assertSuccessful();
        // $this->get('/developers')->assertSuccessful();
        // $this->get('/rss')->assertSuccessful();
        // $this->get('/rss-activity')->assertSuccessful();
        // $this->get('/rss-forum')->assertSuccessful();
        // $this->get('/rss-newachievements')->assertSuccessful();
        // $this->get('/rss-news')->assertSuccessful();
    }

    public function testItRendersDownloads(): void
    {
        $this->get('/downloads')->assertSuccessful();
    }

    public function testItRendersRssOverview(): void
    {
        $this->get('/rss')->assertSuccessful();
    }
}
