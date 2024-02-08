<?php

use RA\Site\Models\User;

/** @var User $user */
$user ??= $model ?? null;
?>
<tr>
    {{--@if ($grid->sortBy === 'points')
        <td class="text-right">
            <b>
                #<x-number :number="$grid->loopedRank($loop)"/>
            </b>
        </td>
    @endif--}}
    <td>
        <x-user.avatar :user="$user" display="icon" iconSize="sm" />
    </td>
    <td class="w-full">
        <x-user.avatar :user="$user" />
        {{--@if($user->unranked)
        <span class="badge badge-danger">
        Unranked
        </span>
        @endif--}}
    </td>
    <td class="text-right">
        @if($user->points_total)
            <x-number :number="$user->points_total" />
        @endif
    </td>
    <td class="text-right">
        @if($user->achievements_total)
            <x-number :number="$user->achievements_total" />
        @endif
    </td>
</tr>
