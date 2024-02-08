<?php

use App\Models\Game;

/** @var Game $game */
$game ??= $model ?? null;
?>
<tr>
    <td>
        <x-game.avatar :game="$game" display="icon" iconSize="sm" />
    </td>
    <td class="w-full">
        <x-game.avatar :game="$game" />
        @if($game->system)
            <div>
                {{ $game->system->manufacturer }}
                <span class="badge embedded">
                    <x-system.avatar :system="$game->system" />
                </span>
            </div>
        @endif
    </td>
    <td class="text-right">
        @if($game->achievements_count)
            <x-number :value="$game->achievements_count" />
        @endif
    </td>
    <td class="text-right">
        @if($game->leaderboards_count)
            <x-number :value="$game->leaderboards_count" />
        @endif
    </td>
</tr>
