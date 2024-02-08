<?php

use App\Models\UserComment;
use App\Models\PlayerAchievement;
use App\Models\PlayerBadge;
use App\Models\PlayerGame;
use Illuminate\Support\Facades\Gate;

/** @var RA\Site\Models\User $user */
$menu = collect([
    [
        'label' => __res('profile', 1),
        'url' => route('user.show', $user),
        'active' => Route::is('user.show'),
    ],
    // [
    //     'label' => __res('report'),
    //     'url' => route('user.show', $user),
    //     'active' => Route::is('user.show'),
    //     'visible' => Gate::allows('view', $user)
    // ],
    [
        'label' => __res('library', 1),
        'url' => route('user.game.index', $user),
        'active' => Route::is('user.game.index'),
        'visible' => Gate::allows('viewAny', [PlayerGame::class, $user]),
    ],
    [
        'label' => __res('achievement'),
        'url' => route('user.achievement.index', $user),
        'active' => Route::is('user.achievement.index'),
        'visible' => Gate::allows('viewAny', [PlayerAchievement::class, $user]),
    ],
    [
        'label' => __res('badge'),
        'url' => route('user.badge.index', $user),
        'active' => Route::is('user.badge.index'),
        'visible' => Gate::allows('viewAny', [PlayerBadge::class, $user]),
    ],
    [
        'label' => __res('friend'),
        'url' => route('user.friend.index', $user),
        'active' => Route::is('friends*') || Route::is('user.friend.index'),
        'visible' => Gate::allows('viewFriends', $user),
    ],
    [
        'label' => __res('comment'),
        'url' => route('user.comment.index', $user),
        'active' => Route::is('user.comment.index'),
        'visible' => Gate::allows('viewAny', [UserComment::class, $user]),
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
