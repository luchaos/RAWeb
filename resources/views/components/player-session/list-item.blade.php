<?php

use App\Models\PlayerSession;

/** @var PlayerSession $session */
$session ??= $model ?? null;
?>
<div class="md:grid grid-flow-col gap-4 items-center mb-2">
    <div class="col-sm">
        <x-user.avatar :user="$session->user" display="icon" iconSize="sm" />
        <x-user.avatar :user="$session->user" display="name" />
    </div>
    <div class="col-sm">
        <div>
            <x-datetime :dateTime="$session->rich_presence_updated_at" />
        </div>
    </div>
    <div class="lg:col-span-2">
        <div>
            <span>{{ $session->rich_presence }}</span>
        </div>
    </div>
</div>
