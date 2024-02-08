<?php

use App\Models\System;

/** @var System $system */
$system ??= $model ?? null;

$class ??= '';
$display ??= 'name';
$iconSize ??= 'sm';
$link ??= $system->canonicalUrl ?? null;
$tooltip ??= true;

$iconSizeClass = 'icon-' . $iconSize;
?>
<x-avatar
    :class="$class"
    :display="$display"
    :link="$link"
    :model="$system"
    resource="system"
    :tooltip="$tooltip"
>
    @if($system ?? null)
        @if($display === 'icon')
            @if($system->hasMedia('logo'))
                <img src="{{ $emulator->getFirstMediaUrl('logo') }}" class="icon-{{ $iconSize }}" loading="lazy"
                     width="{{ $iconWidth }}" height="{{ $iconHeight }}" alt="{{ $system->name }}">
            @else
                <x-fas-play-circle class="{{ $iconSizeClass }}" />
            @endif
        @endif
        @if($display === 'id'){{ $system->id }}@endif
        @if($display === 'name'){{ $system->name }}@endif
        @if($display === 'name_short'){{ $system->name_short }}@endif
    @endif
</x-avatar>
