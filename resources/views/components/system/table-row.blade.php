<?php

use App\Models\System;

/** @var System $system */
$system ??= $model ?? null;
?>
<tr>
    <td>
        <x-system.avatar :system="$system" display="icon" iconSize="sm" />
    </td>
    <td class="w-full">
        @if($system->manufacturer)
            {{ $system->manufacturer }}
        @endif
        <x-system.avatar :system="$system" />
    </td>
    <td class="text-right">
        @if($system->achievements_count)
            {{ $system->achievements_count }}
        @endif
    </td>
    <td class="text-right">
        @if($system->games_count)
            {{ $system->games_count }}
        @endif
    </td>
    <td class="text-right">
        @if($system->emulators_count)
            {{ $system->emulators_count }}
        @endif
    </td>
</tr>
