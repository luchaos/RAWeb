<?php

use App\Models\Leaderboard;

/** @var Leaderboard $leaderboard */
?>

@extends('layouts.app', [
    'pageTitle' => $leaderboard->game->title . ' (' . $leaderboard->game->system->name . ')',
    'pageDescription' => $leaderboard->game->title . ' (' . $leaderboard->game->system->name . ')',
    'pageImage' => asset($leaderboard->game->getFirstMediaUrl('icon', '64')),
    'canonicalUrl' => $leaderboard->canonicalUrl,
    'permalink' => $leaderboard->permalink,
    'pageType' => 'leaderboard',
])

@section('header')
    <x-page-header :large="Route::is('game.show')">
        <x-slot name="avatar">
            <x-game.avatar :game="$leaderboard->game" :tooltip="false" display="icon" :iconSize="Route::is('game.show') ? '2xl': 'md'" />
        </x-slot>
        <x-slot name="title">
            <h1 class="mb-0">
                <b>
                    <x-game.avatar :game="$leaderboard->game" :tooltip="false" />
                </b>
            </h1>
        </x-slot>
        <x-slot name="subTitle">
            <span>{{ $leaderboard->game->system->manufacturer }}</span>
            <span class="badge embedded mr-2">{{ $leaderboard->game->system->name }}</span>
            {{--@foreach($user->roles->filter(function($role) { return $role->display; })->sortBy('display') as $role)
                <span class="badge embedded">{{ __('permission.role.'.$role->name) }}</span>
            @endforeach
            @if($user->created_at)
                <span>&middot; {{ __('playing since :date', ['date' => localized_date($user->created_at) ]) }}</span>
            @endif--}}
        </x-slot>
        <x-slot name="navigation">
            <x-game.menu :game="$leaderboard->game" />
        </x-slot>
        <x-slot name="stats">
            <x-page-header-stat :label="__res('player')" :value="$leaderboard->game->players_count" />
            <x-page-header-stat :label="__res('achievement')" :value="$leaderboard->game->achievements_count" />
        </x-slot>
        <x-slot name="actions">
            @if(Route::is('leaderboard.show'))
                <x-button.permalink :link="$leaderboard->game->permalink" />
                <x-button.edit :model="$leaderboard->game" />
            @endif
            @if(Route::is('leaderboard.create'))
                <x-button.cancel :link="route('game.show', $leaderboard->game)" />
            @endif
            @if(Route::is('leaderboard.edit'))
                <x-button.cancel :link="route('game.show', $leaderboard->game)" />
            @endif
            @if(Route::is('game.index'))
                <x-button.create :resource="$resource" />
            @endif
        </x-slot>
    </x-page-header>
@endsection

