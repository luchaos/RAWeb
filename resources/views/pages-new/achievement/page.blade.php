<?php

use App\Models\Achievement;

/** @var Achievement $achievement */
?>

@extends('layouts.app', [
    'pageTitle' => $achievement->title,
    'pageDescription' => $achievement->title . ($achievement->game ? ' in ' . $achievement->game->title . ' (' . $achievement->game->system->name . ')' : ''),
    'pageImage' => asset($achievement->badge),
    'canonicalUrl' => $achievement->canonicalUrl,
    'permalink' => $achievement->permalink,
    'pageType' => 'achievement',
])

{{--@section('breadcrumb')
    @if($achievement->game)
        @if($achievement->game->system)
            <li>
                <a href="{{ $achievement->game->system->gamesLink }}">
                    {{ $achievement->game->system->name }}
                </a>
            </li>
        @endif
        <li>
            <a href="{{ $achievement->game->canonicalUrl }}">
                {{ $achievement->game->title }}
            </a>
        </li>
    @else
        <li>
            <a href="{{ route('achievement.index') }}">
                {{ __res('achievement') }}
            </a>
        </li>
    @endif
    <li>
        <a href="{{ $achievement->canonicalUrl }}">
            {{ $achievement->title }}
        </a>
    </li>
@endsection--}}

@section('header')
    <x-page-header :large="Route::is('achievement.show')" :background="asset($achievement->badgeUrl)">
        <x-slot name="avatar">
            <x-achievement.avatar :achievement="$achievement" :tooltip="false" display="icon"
                                  :iconSize="Route::is('achievement.show') ? '2xl': 'md'" />
        </x-slot>
        <x-slot name="title">
            <h1 class="mb-0">
                <b>
                    <x-achievement.avatar :achievement="$achievement" :tooltip="false" />
                </b>
            </h1>
        </x-slot>
        <x-slot name="subTitle">
            @if($achievement->description)
                <div class="mb-3">
                    {{ $achievement->description }}
                </div>
            @endif
            {{--@foreach($user->roles->filter(function($role) { return $role->display; })->sortBy('display') as $role)
                <span class="badge embedded">{{ __('permission.role.'.$role->name) }}</span>
            @endforeach
            @if($user->created_at)
                <span>&middot; {{ __('playing since :date', ['date' => localized_date($user->created_at) ]) }}</span>
            @endif--}}
        </x-slot>
        <x-slot name="titleActivity">
            <x-game.card :game="$achievement->game" iconSize="lg" />
        </x-slot>
        <x-slot name="navigation">
            <x-achievement.menu :achievement="$achievement" />
            {{--<x-section>--}}
            {{--    <dl class="md:grid grid-flow-col gap-4">--}}
            {{--        <dt class="col-3">Trigger</dt>--}}
            {{--        <dd class="col-9"><code>{{ $achievement->trigger }}</code></dd>--}}
            {{--        <dt class="col-3">Mem explained</dt>--}}
            {{--        <dd class="col-9">--}}
            {{--            <code>{!! explain_memory($achievement->trigger, $achievement->game->memoryNotes) !!}</code>--}}
            {{--        </dd>--}}
            {{--    </dl>--}}
            {{--</x-section>--}}
        </x-slot>
        <x-slot name="stats">
            <x-page-header-stat :label="__res('point')" :value="$achievement->points" />
        </x-slot>
        <x-slot name="actions">
            @if(Route::is('achievement.show'))
                <x-button.permalink :model="$achievement" />
                <x-button.edit :model="$achievement" />
            @endif
            {{--@if(Route::is('achievement.create'))
                <x-button.cancel :link="route('achievement.index')"/>
            @endif--}}
            @if(Route::is('achievement.edit'))
                <x-button.delete :model="$achievement" />
                <x-button.cancel :link="route('achievement.index')" />
            @endif
            {{--@if(Route::is('achievement.index'))
                <x-button.create resource="achievement"/>
            @endif--}}
            {{--@can('create', RA\Site\Models\AchievementTicket::class)
                <a class="btn btn-outline-warning md:float-right"
                   data-toggle="tooltip"
                   href="{{ route('achievement.ticket.create', $achievement) }}" title="Report an issue">
                    <x-fas-exclamation-triangle/>
                </a>
            @endcan--}}
            {{--<x-button.delete :model="$achievement"/>--}}
        </x-slot>
    </x-page-header>
@endsection
