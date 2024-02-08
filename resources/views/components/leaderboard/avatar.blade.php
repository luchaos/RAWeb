<?php

use App\Models\Leaderboard;

/** @var Leaderboard $leaderboard */
$leaderboard ??= $model ?? null;

$class ??= '';
$display ??= 'name';
$iconSize ??= 'sm';
$link ??= $leaderboard->canonicalUrl ?? null;
$tooltip ??= true;

$iconWidth = config('media.icon.' . $iconSize . '.width');
$iconHeight = config('media.icon.' . $iconSize . '.height');
?>
<x-avatar
    :class="$class"
    :display="$display"
    :link="$link"
    :model="$leaderboard"
    resource="leaderboard"
    :tooltip="$tooltip"
>
    @if($leaderboard ?? null)
        @if($display === 'icon')
            <img src="{{ asset($game->getFirstMediaUrl('icon')) }}" class="icon-{{ $iconSize }}" loading="lazy"
                 width="{{ $iconWidth }}" height="{{ $iconHeight }}" alt="{{ $leaderboard->title }}">
        @endif
        @if($display === 'id'){{ $leaderboard->id }}@endif
        @if($display === 'name'){{ $leaderboard->title }}@endif
    @endif
</x-avatar>
