<?php

use App\Models\Achievement;

/** @var Achievement $achievement */
$achievement ??= $model ?? null;
$players ??= null;
$iconSize ??= 'sm';
$showPoints ??= false;

if ($players !== null) {
    // TODO: this causes a query for each achievement being displayed
    //       there should be a way to generate the data with a groupby
    $achievement->loadCount([
        'playerAchievements',
        'playerAchievements as player_achievements_hardcore_count' => function($query) {
            $query->whereNull('unlocked_hardcore_at');
        },
    ]);

    if ($players == 0) {
        $nonhardcore_width = $hardcore_width = 0;
    } else {
        $nonhardcore_width = round($achievement->player_achievements_count * 100 / $players, 2);
        $hardcore_width = round($achievement->player_achievements_hardcore_count * 100 / $players, 2);
    }
}

?>
<div class="md:grid grid-flow-col gap-4 mb-2 items-center">
    <div class="mr-2">
        <x-achievement.avatar :achievement="$achievement" display="icon" iconSize="$iconSize" unlockState />
    </div>
    <div class="flex-1">
        <p class="mb-0">
            <x-achievement.avatar :achievement="$achievement" unlockState />
            @if ($showPoints)
            <span>({{$achievement->points}})</span>
            @endif
        </p>
        <p class="">{{ $achievement->description }}</p>
    </div>
    @if ($players !== null)
    <div class="ml-2">
        <div class='embedded' style='width:140px; height:4px; line-height:1.2em'>
            <div class='completion-unlocked' style='width:{{$nonhardcore_width}}%; height:4px'>
            <div class='completion-unlocked-hardcore' style='width:{{$hardcore_width}}%; height:4px'>&nbsp;</div>
            </div>
        </div>
        <div class="m-1" style='font-size:smaller; text-align:center'>
            {{ $achievement->player_achievements_count }} ({{ $achievement->player_achievements_hardcore_count }}) of {{$players}}
            <div style='font-size:smaller'>({{$nonhardcore_width}}%)</div>
        </div>
    </div>
    @endif
</div>
