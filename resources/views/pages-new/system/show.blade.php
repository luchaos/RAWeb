@extends('system.page')

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
