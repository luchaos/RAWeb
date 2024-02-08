<?php

use App\Models\Game;

/** @var Game $game */
$game ??= $model ?? null;

$iconSize ??= 'xl';
?>
<div class="flex items-start tooltip-media tooltip-media-game">
    <div class="mr-3">
        <x-game.avatar :game="$game" display="icon" :iconSize="$iconSize" :tooltip="false" />
    </div>
    <div class="flex-1">
        <h5 class="mt-1">
            <x-game.avatar :game="$game" :tooltip="false" />
        </h5>
        @if($game->relationLoaded('system'))
            <div class="mb-1">
                @if($game->system->name_short)
                    <span class="badge embedded">
                        <x-system.avatar :system="$game->system" display="name_short" :tooltip="false" />
                    </span>
                @endif
                @if($game->system->manufacturer)
                    {{ $game->system->manufacturer }}
                @endif
            </div>
        @endif
        {{ $slot ?? null }}
    </div>
</div>
