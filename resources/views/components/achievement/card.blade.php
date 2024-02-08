<?php

use App\Models\Achievement;

/** @var Achievement $achievement */
$achievement ??= $model ?? null;

$iconSize ??= 'xl';
?>
<div class="flex items-start tooltip-media tooltip-media-achievement">
    <div class="mr-3">
        <x-achievement.avatar :achievement="$achievement" display="icon" :iconSize="$iconSize" :tooltip="false" unlocked />
    </div>
    <div class="flex-1">
        <h5 class="mt-1">
            <x-achievement.avatar :achievement="$achievement" :tooltip="false" />
        </h5>
        @if($achievement->description)
            <div class="mb-1">
                {{ $achievement->description }}
            </div>
        @endif
        @if($achievement->game)
            <div class="mb-1">
                <x-game.avatar :game="$achievement->game" :tooltip="false" />
                @if($achievement->game->system)
                    <span class="badge embedded">
                        <x-system.avatar :system="$achievement->game->system" display="name_short" :tooltip="false" />
                    </span>
                @endif
            </div>
        @endif
    </div>
</div>
