<?php

use App\Models\Emulator;

/** @var Emulator $emulator */
$emulator ??= $model ?? null;

$class ??= '';
$display ??= 'name';
$iconSize ??= 'sm';
$link ??= $emulator->canonicalUrl ?? null;
$tooltip ??= true;

$iconSizeClass = 'icon-' . $iconSize;
?>
<x-avatar
    :class="$class"
    :display="$display"
    :link="$link"
    :model="$emulator"
    resource="emulator"
    :tooltip="$tooltip"
>
    @if($emulator ?? null)
        @if($display === 'icon')
            @if($emulator->hasMedia('logo'))
                <img src="{{ $emulator->getFirstMediaUrl('logo') }}" class="icon-{{ $iconSize }}" loading="lazy"
                     width="{{ $iconWidth }}" height="{{ $iconHeight }}" alt="{{ $emulator->name }}">
            @else
                <x-fas-play-circle class="{{ $iconSizeClass }}" />
            @endif
        @endif
        @if($display === 'id'){{ $emulator->id }}@endif
        @if($display === 'name'){{ $emulator->name }}@endif
        @if($display === 'handle'){{ $emulator->handle }}@endif
    @endif
</x-avatar>
