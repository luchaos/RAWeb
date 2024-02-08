<?php

use RA\Site\Models\User;

/** @var User $user */
$user ??= $model ?? null;

$iconSize ??= 'xl';
?>
<div class="flex">
    <div class="mr-3">
        <x-user.avatar :user="$user" display="icon" :iconSize="$iconSize" :tooltip="false" />
    </div>
    <div class="flex-1">
        <h5 class="mt-1">
            <x-user.avatar :user="$user" :tooltip="false" />
        </h5>
        <div>
            <small>
                <span>{{ $user->display_name }}</span>
                @foreach($user->roles->filter(function($role) { return $role->display; })->sortBy('display') as $role)
                    <span class="badge embedded">{{ __('permission.role.'.$role->name) }}</span>
                @endforeach
                @if($user->created_at)
                    <div>{{ __('playing since :date', ['date' => localized_date($user->created_at, null, IntlDateFormatter::MEDIUM, IntlDateFormatter::NONE) ]) }}</div>
                @endif
                @if($user->last_activity_at)
                    <div>
                        {{ __('last seen') }}
                        @if($user->last_activity_at)
                            <x-date :dateTime="$user->last_activity_at" :shortDate="false" :time="true" />
                        @endif
                    </div>
                @endif
            </small>
        </div>
        {{--@if($user->motto)
            <p class="mb-2">
                <x-fas-quote-left/>
                {{ $user->motto }}
            </p>
        @endif--}}
    </div>
</div>
