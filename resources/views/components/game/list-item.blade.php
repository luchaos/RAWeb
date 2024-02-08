<?php

use App\Models\Game;

/** @var Game $game */
$game ??= $model ?? null;
?>
<div class="flex items-start">
    <div class="mr-1">
        <x-game.avatar :game="$game" display="icon" iconSize="sm" />
    </div>
    <div class="flex-1 lh-1">
        <div>
            <x-game.avatar :game="$game" />
        </div>
        @if($game->system)
            <small><span class="badge"><x-system.avatar :system="$game->system" /></span></small>
        @endif
    </div>
</div>
