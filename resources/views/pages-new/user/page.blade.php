<?php

use RA\Site\Models\User;

$section ??= null;
$resource ??= null;
/** @var User $user */
?>
<x-app-layout
    :pageTitle="$pageTitle ?? ($user->display_name . ($resource ? ' · ' . __res($resource) : ''))"
    :pageDescription="$pageTitle ?? ($user->display_name . ($resource ? ' · ' . __res($resource) : ''))"
    :pageImage="asset($user->avatarUrl)"
    :canonicalUrl="$user->canonicalUrl"
    :permalink="$user->permalink"
    pageType="user"
>
    yooo
</x-app-layout>

{{--
@extends('layouts.app', [
    'pageTitle' => $pageTitle ?? ($user->display_name . ($resource ? ' · ' . __res($resource) : '')),
    'pageDescription' => $pageTitle ?? ($user->display_name . ($resource ? ' · ' . __res($resource) : '')),
    'pageImage' => asset($user->avatarUrl),
    'canonicalUrl' => $user->canonicalUrl,
    'permalink' => $user->permalink,
    'pageType' => 'user',
])

@section('header')
    <x-page-header :large="Route::is('user.show')" :background="asset($user->avatarUrl)">
        <x-slot name="avatar">
            <x-user.avatar :user="$user" :tooltip="false" display="icon" :iconSize="Route::is('user.show') ? '2xl': 'md'" />
        </x-slot>
        <x-slot name="title">
            <h1 class="mb-0">
                <b>
                    <x-user.avatar :user="$user" :tooltip="false" />
                </b>
            </h1>
        </x-slot>
        <x-slot name="subTitle">
            <div>
                <small>
                    --}}
{{--<span>{{ $user->display_name }}</span>--}}{{--

                    @if($user->country)
                        <x-flag :country="$user->country" />
                    @endif
                    @foreach($user->roles->filter(function($role) { return $role->display; })->sortBy('display') as $role)
                        <span class="badge embedded">{{ __('permission.role.'.$role->name) }}</span>
                    @endforeach
                    @if($user->created_at)
                        <span>&middot; {{ __('playing since :date', ['date' => localized_date($user->created_at, null, IntlDateFormatter::MEDIUM, IntlDateFormatter::NONE) ]) }}</span>
                    @endif
                </small>
            </div>
        </x-slot>
        <x-slot name="titleActivity">
            <x-user.last-activity :user="$user" class="hidden xl:block" />
        </x-slot>
        <x-slot name="navigation">
            <x-user.menu :user="$user" />
        </x-slot>
        <x-slot name="stats">
            <x-page-header-stat :label="__res('game')" :value="$user->games_count" />
            <x-page-header-stat :label="__res('badge')" :value="$user->badges_count" />
            <x-page-header-stat :label="__res('achievement')" :value="$user->achievements_count" />
            <x-page-header-stat :label="__res('point')" :value="$user->points_total" />
            <x-page-header-stat :label="__('Avg. Completion')" :value="$user->completion_percentage_average" type="percent" />
            <x-page-header-stat :label="__('Rank')" :value="$user->rank" />
        </x-slot>
        <x-slot name="actions">
            --}}
{{-- Community Features --}}{{--

            --}}
{{--<x-user.actions.report :user="$user"/>--}}{{--

            <x-user.actions.friend :user="$user" />
            <x-user.actions.message :user="$user" />
            --}}
{{-- Site Features--}}{{--

            <x-user.actions.settings :user="$user" />
            @if(Route::is('user.show'))
                <x-button.permalink :model="$user" />
                <x-button.edit :model="$user" />
            @endif
            @if(Route::is('user.edit'))
                <x-button.cancel :link="route('user.show', $user)" />
            @endif
        </x-slot>
    </x-page-header>
@endsection
--}}
