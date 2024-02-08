<?php
/** @var App\Models\System $system */
$section ??= null;
?>
<x-app-layout
    :pageTitle="$system->name . ($section ? ' ' . __res($section) : '')",
    :pageDescription="$system->name . ($section ? ' ' . __res($section) : '')",
    :pageImage="asset($system->logo)",
    :canonicalUrl="$system->canonicalUrl",
    :permalink="$system->permalink",
    :pageType="'system'",
>
{{--
@section('breadcrumb')
    <li>
        <a href="{{ route('system.index') }}">
            {{ __res('system') }}
        </a>
    </li>
    <li>
        {{ $system->name }}
    </li>
@endsection
--}}

@section('header')
    <x-page-header :large="Route::is('system.show')">
        <x-slot name="avatar">
            <x-system.avatar :system="$system" :tooltip="false" display="icon" :iconSize="Route::is('system.show') ? '2xl': 'md'" />
        </x-slot>
        <x-slot name="title">
            <h1>
                <b>
                    <x-system.avatar :system="$system" :tooltip="false" />
                </b>
            </h1>
        </x-slot>
        <x-slot name="subTitle">
            <div>
                <span>{{ $system->manufacturer }}</span>
            </div>
        </x-slot>
        <x-slot name="navigation">
            <x-system.menu :system="$system" />
        </x-slot>
        {{--<x-slot name="titleActivity">
        </x-slot>--}}
        <x-slot name="stats">
            <x-page-header-stat :label="__res('game')" :value="$system->games_count" />
            {{--<x-page-header-stat :label="__res('game')" :value="$user->games_count"/>
            <x-page-header-stat :label="__res('badge')" :value="$user->badges_count"/>
            <x-page-header-stat :label="__res('achievement')" :value="$user->achievements_count"/>
            <x-page-header-stat :label="__res('point')" :value="$user->points_total"/>
            <x-page-header-stat :label="__('stat.average-completion-short')" :value="$user->completion_percentage_average" type="percent"/>
            <x-page-header-stat :label="__('stat.rank')" :value="$user->rank"/>--}}
        </x-slot>
        <x-slot name="actions">
            <x-button.edit :model="$system" />
        </x-slot>
    </x-page-header>
@endsection

@section('main')
    {{--<div class="grid grid-flow-col gap-4">
        <div class="xl:col-6">
            <h3>Compatible Emulators &amp; Cores</h3>
        </div>
        <div class="xl:col-6">
            <h3>Active Players</h3>
        </div>
    </div>--}}
    <div class="md:grid grid-flow-col gap-4">
        <div class="xl:col-6">
            @if($system->games_count)
                <x-section>
                    <x-section-header>
                        <x-slot name="title">
                            <h3 class="mb-3">
                                Recently Updated Games
                            </h3>
                        </x-slot>
                    </x-section-header>
                    @foreach($games as $game)
                        <x-game.card :game="$game" iconSize="lg" />
                    @endforeach
                    <div class="text-right">
                        <a href="{{ $system->games_link }}">
                            {{ $system->games_count }} {{ __res('game') }}
                        </a>
                    </div>
                </x-section>
            @endif
        </div>
    </div>

    {{--<x-system.comments/>--}}
@endsection

@section('sidebar')
    {{--@if($system->emulators_count)
        @include('content.sidebar-links')
        <x-section>
            <h3>{{ $system->emulators_count }} {{ Str::plural('Emulator', $system->emulators_count) }}</h3>
            <p>
                Play {{ $system->name }} games with
                <a href="{{ route('download.index') }}">
                    @foreach($system->emulators as $emulator)
                        @if($emulator->latestRelease)
                            --}}{{-- TODO: get attached file, display size, date and hash --}}{{--
                            <a href="" class="btn embedded">
                                Download {{ $emulator->name }} v{{ $emulator->latestRelease->version }} for Windows
                            </a>
                        @else
                            {{ $emulator->name }}
                            @if(!$loop->last), @endif
                        @endif
                    @endforeach
                </a>
            </p>
        </x-section>
    @endif--}}
@endsection
</x-app-layout>
