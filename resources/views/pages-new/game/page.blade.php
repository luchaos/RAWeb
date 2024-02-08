<?php

use App\Models\Game;

/** @var Game $game */
?>

@extends('layouts.app', [
    'pageTitle' => $game->title . ' (' . $game->system->name . ')',
    'pageDescription' => $game->title . ' (' . $game->system->name . ')',
    'pageImage' => asset($game->getFirstMediaUrl('icon', '2xl')),
    'canonicalUrl' => $game->canonicalUrl,
    'permalink' => $game->permalink,
    'pageType' => 'game',
])

@section('header')
    <x-page-header :large="Route::is('game.show')">
        <x-slot name="avatar">
            <x-game.avatar :game="$game" :tooltip="false" display="icon" :iconSize="Route::is('game.show') ? '2xl': 'md'" />
        </x-slot>
        <x-slot name="title">
            <h1 class="mb-0">
                <b>
                    <x-game.avatar :game="$game" :tooltip="false" />
                </b>
                @if(!Route::is('game.show'))
                    <small>
                        <span class="badge embedded mr-2">{{ $game->system->name }}</span>
                    </small>
                @endif
            </h1>
        </x-slot>
        <x-slot name="subTitle">
            <span>{{ $game->system->manufacturer }}</span>
            <span class="badge embedded mr-2">{{ $game->system->name }}</span>
            {{--@foreach($user->roles->filter(function($role) { return $role->display; })->sortBy('display') as $role)
                <span class="badge embedded">{{ __('permission.role.'.$role->name) }}</span>
            @endforeach
            @if($user->created_at)
                <span>&middot; {{ __('playing since :date', ['date' => localized_date($user->created_at) ]) }}</span>
            @endif--}}
        </x-slot>
        <x-slot name="navigation">
            <x-game.menu :game="$game" />
        </x-slot>
        <x-slot name="stats">
            <x-page-header-stat :label="__res('player')" :value="$game->players_count" />
            <x-page-header-stat :label="__res('achievement')" :value="$game->achievements_count" />
            <x-page-header-stat :label="__res('point')" :value="$game->achievements_sum_points" />
        </x-slot>
        <x-slot name="actions">
            @if(Route::is('game.show'))
                <x-button.permalink :link="$game->permalink" />
                <x-button.edit :model="$game" />
            @endif
            @if(Route::is('game.create'))
                <x-button.cancel :link="route('game.show', $game)" />
            @endif
            @if(Route::is('game.edit'))
                <x-button.cancel :link="route('game.show', $game)" />
            @endif
            @if(Route::is('game.index'))
                <x-button.create :resource="$resource" />
            @endif
        </x-slot>
    </x-page-header>
@endsection

