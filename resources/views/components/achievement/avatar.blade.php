<?php

use App\Models\Achievement;

/** @var Achievement $achievement */
$achievement ??= $model ?? null;

$class ??= '';
$display ??= 'name';
$iconSize ??= 'md';
$link ??= $achievement->canonicalUrl ?? null;
$tooltip ??= true;

$unlockState ??= false;

$iconUrl = $unlockState && !$achievement->unlocked_at ? $achievement->badgeLockedUrl : $achievement->badgeUrl;
$iconWidth = config('media.icon.' . $iconSize . '.width');
$iconHeight = config('media.icon.' . $iconSize . '.height');
?>
<x-avatar
    :class="$class"
    :display="$display"
    :link="$link"
    :model="$achievement"
    resource="achievement"
    :tooltip="$tooltip"
>
    @if($achievement ?? null)
        @if($display === 'icon')
            <img src="{{ asset($iconUrl) }}" class="icon-{{ $iconSize }}" loading="lazy"
                 width="{{ $iconWidth }}" height="{{ $iconHeight }}" alt="{{ $achievement->title }}">
            {{--{{ $unlockState ? 'unlocked' : 'locked' }}--}}
        @endif
        @if($display === 'id'){{ $achievement->id }}@endif
        @if($display === 'name'){{ $achievement->title }}@endif
    @endif
</x-avatar>
