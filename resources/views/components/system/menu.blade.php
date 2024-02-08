<?php

use App\Models\Game;
use Illuminate\Support\Facades\Gate;

/** @var App\Models\System $system */
$menu = collect([
    [
        'label' => __('Overview'),
        'url' => route('system.show', $system),
        'active' => Route::is('system.show'),
    ],
    [
        'label' => __res('game'),
        'url' => route('system.game.index', [$system, $system->slug]),
        'active' => Route::is('system.game.index'),
        'visible' => Gate::allows('viewAny', [Game::class, $system])
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
