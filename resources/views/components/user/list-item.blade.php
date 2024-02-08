<?php

use RA\Site\Models\User;

/** @var User $user */
$user ??= $model ?? null;
?>
<div class="flex items-center">
    <div class="mr-1">
        <x-user.avatar :user="$user" display="icon" iconSize="sm" />
    </div>
    <div class="flex-1 lh-1">
        <div>
            <x-user.avatar :user="$user" />
        </div>
    </div>
</div>
