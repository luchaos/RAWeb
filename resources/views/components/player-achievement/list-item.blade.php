<?php

use App\Models\PlayerAchievement;

/** @var PlayerAchievement $playerAchievement */
$playerAchievement ??= $model ?? null;
?>
<div class="md:grid grid-flow-col gap-4 items-center mb-2">
    <div class="col-sm">
        <x-user.avatar :user="$playerAchievement->user" display="icon" iconSize="sm" />
        <x-user.avatar :user="$playerAchievement->user" display="name" />
    </div>
    <div class="col-sm">
        <div>
            @if ($playerAchievement->unlocked_hardcore_at)
            <span>{{ __('Hardcore') }}</span>
            @endif
        </div>
    </div>
    <div class="col-sm">
        <div>
            <x-datetime :dateTime="$playerAchievement->unlocked_hardcore_at ?? $playerAchievement->unlocked_at" />
        </div>
    </div>
</div>
