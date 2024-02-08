<?php

/** @var App\Models\Game $game */

use App\Models\GameComment;
use Illuminate\Support\Facades\Gate;

$menu = collect([
    [
        'label' => __('Overview'),
        'url' => route('game.show', $game),
        'active' => Route::is('game.show'),
    ],
    [
        'label' => __res('badge'),
        'url' => route('game.badge.index', $game),
        'active' => Route::is('game.badge.index'),
    ],
    [
        'label' => __('Files'),
        'url' => route('game.asset.index', $game),
        'active' => Route::is('game.asset.index'),
    ],
    [
        'label' => __res('player'),
        'url' => route('game.player.index', $game),
        'active' => Route::is('game.player.index'),
    ],
    [
        'label' => __res('comment'),
        'url' => route('game.comment.index', $game),
        'active' => Route::is('game.comment.index'),
        'visible' => Gate::allows('viewAny', [GameComment::class, $game])
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
