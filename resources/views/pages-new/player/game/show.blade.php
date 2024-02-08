<?php
/** @var RA\Site\Models\User $user */
/** @var App\Models\Game $game */
?>

@extends('user.page', [
    'section' => 'game',
    'pageTitle' => $user->display_name . ' · ' . $game->title,
    'pageDescription' => $user->display_name . ' · ' . $game->title,
])

{{--TODO--}}

@section('breadcrumb')
    <li>
        <a href="{{ route('user.show', $user) }}">
            {{ $user->display_name }}
        </a>
    </li>
    <li>
        <a href="{{ route('user.game.index', $user) }}">
            {{ __('game') }}
        </a>
    </li>
    {{-- TODO: add system filter --}}
    <li>
        <a href="{{ route('user.game.show', [$user, $game]) }}">
            {{ $game->title }}
        </a>
    </li>
@endsection

@section('main')
    <x-section>
        <p>
            [remove this game from my library]
        </p>
        <p>
            [reset achievements for this game]
        </p>
        <p>
            [Achievements Version]
        </p>
        <p>
            [ROM Hashes used]
        </p>
    </x-section>
    <x-achievement.list :achievements="$playerGame->achievements" />
    {{--<x-section>--}}
    {{--@include('user.achievement.partial.index-list', ['playerGame' => $playerGame])--}}
    {{--</x-section>--}}
@endsection

@section('sidebar')
    <x-game.info :game="$game" />
@endsection
