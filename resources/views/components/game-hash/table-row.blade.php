<?php

use App\Models\GameHash;

/** @var GameHash $gameHash */
$gameHash ??= $model ?? null;
?>
<tr>
    <td>
        <x-game-hash.avatar :game-hash="$gameHash" />
    </td>
    <td>
        @if($gameHash->system)
            <div>
                {{ $gameHash->system->manufacturer }}
                <span class="badge embedded">
                    <x-system.avatar :system="$gameHash->system" />
                </span>
            </div>
        @endif
    </td>
    <td>
        @foreach($gameHash->gameHashSets as $gameHashSet)
            <div>
                <x-game.avatar :game="$gameHashSet->game" display="icon" iconSize="sm" />
                <x-game.avatar :game="$gameHashSet->game" />
            </div>
        @endforeach
    </td>
    <td>
        <x-datetime :date="$gameHash->created_at" />
    </td>
</tr>
