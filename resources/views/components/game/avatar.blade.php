<?php
use App\Models\Game;

/** @var Game $game */
$game ??= $model ?? null;

$class ??= '';
$display ??= 'name';
$iconSize ??= 'md';
$link ??= $game->canonicalUrl ?? null;

$tooltip ??= true;

$iconWidth = config('media.icon.' . $iconSize . '.width');
$iconHeight = config('media.icon.' . $iconSize . '.height');
?>
<x-avatar
    :class="$class"
    :display="$display"
    :link="$link"
    :model="$game"
    resource="game"
    :tooltip="$tooltip"
>
    @if($game ?? null)
        @if($display === 'icon')
            <img src="{{ asset($game->getFirstMediaUrl('icon')) }}" class="icon-{{ $iconSize }}" loading="lazy"
                 width="{{ $iconWidth }}" height="{{ $iconHeight }}" alt="{{ $game->title }}">

            <img src="{{ asset($game->ImageIcon) }}" class="icon-{{ $iconSize }}" loading="lazy"
                 width="{{ $iconWidth }}" height="{{ $iconHeight }}" alt="{{ $game->title }}">
        @endif
        @if($display === 'id'){{ $game->id }}@endif
        @if($display === 'name'){{ $game->title }}@endif
    @endif
</x-avatar>
