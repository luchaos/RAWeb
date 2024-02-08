<?php

use App\Models\Game;

/** @var Game $system */
$system ??= $model ?? null;
?>
<div class="flex items-start">
    <div class="mr-1">
        <x-system.avatar :system="$system" display="icon" iconSize="sm" />
    </div>
    <div class="flex-1 lh-1">
        <div>
            <x-system.avatar :system="$system" />
        </div>
        <small>{{ $system->manufacturer }}</small>
    </div>
</div>
