<?php

use App\Models\System;

/** @var ?System $system */
$system ??= $model ?? null;
?>
<div class="flex items-start tooltip-media tooltip-media-system">
    <x-system.avatar class="ml-2 my-1" :system="$system" display="icon" iconSize="xl" :tooltip="false" />
    {{--<img class="mr-2 icon-xl"
         src="{{ asset($system->logo) }}"
         alt="{{ $system->title }}">--}}
    <div class="flex-1">
        <p class="mb-1 mt-1">
            <b class="h5">
                {{ $system->name }}
            </b>
        </p>
        @if($system->manufacturer)
            <p>
                <b>{{ $system->manufacturer }}</b>
            </p>
        @endif
    </div>
</div>
