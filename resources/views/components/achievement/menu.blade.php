<?php

/** @var App\Models\Achievement $achievement */

use App\Models\AchievementComment;
use Illuminate\Support\Facades\Gate;

$menu = collect([
    [
        'label' => __('Overview'),
        'url' => route('achievement.show', $achievement),
        'active' => Route::is('achievement.show'),
    ],
    [
        'label' => __res('player'),
        'url' => route('achievement.player.index', $achievement),
        'active' => Route::is('achievement.player.index'),
        // 'visible' => Gate::allows('viewAny', Achievement::class)
    ],
    [
        'label' => __res('comment'),
        'url' => route('achievement.comment.index', $achievement),
        'active' => Route::is('achievement.comment.index'),
        'visible' => Gate::allows('viewAny', [AchievementComment::class, $achievement])
    ],
])->filter(fn ($menuItem) => $menuItem['visible'] ?? true);
?>
<x-navbar breakpoint="xl" class="navbar-borders p-0 bg-transparent">
    <ul class="navbar-nav">
        @foreach($menu as $menuItem)
            <li class="nav-item {{ $menuItem['active'] ? 'active' : '' }}">
                <a class="nav-link" href="{{ $menuItem['url'] }}">
                    {{ $menuItem['label'] }}
                    @if($menuItem['active'])
                        <span class="sr-only">(current)</span>
                    @endif
                </a>
            </li>
        @endforeach
    </ul>
</x-navbar>
