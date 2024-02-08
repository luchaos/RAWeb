<?php

use App\Models\Achievement;

/** @var Achievement $achievement */
$achievement ??= $model ?? null;
?>
<tr>
    <td>
        <x-achievement.avatar
            :achievement="$achievement"
            :unlockState="!empty($playerGame)"
            display="icon"
        />
    </td>
    {{--<td class="wrap align-top">--}}
    <td class="wrap w-50">
        <div class="mb-1 lh-1">
            <x-achievement.avatar
                :achievement="$achievement"
                :unlockState="!empty($playerGame)"
            />
        </div>
        <div class="mb-0">
            {{ $achievement->description }}
        </div>
    </td>
    <td class="text-right">
        @if($achievement->points)
            <x-number :number="$achievement->points" /> {{ __res('point', $achievement->points) }}
        @endif
    </td>
    <td>
        @if($achievement->game)
            <x-game.avatar class="avatar" :game="$achievement->game" display="icon" />
        @endif
    </td>
    <td class="w-50">
        @if($achievement->game)
            <x-game.avatar class="avatar" :game="$achievement->game" />
            @if($achievement->game->system)
                <div>
                    {{ $achievement->game->system->manufacturer }}
                    <span class="badge embedded">
                        <x-system.avatar :system="$achievement->game->system" />
                    </span>
                </div>
            @endif
        @endif
    </td>
    <td>
        @if($achievement->created_at)
            <x-date :dateTime="$achievement->created_at" />
        @endif
    </td>
</tr>
