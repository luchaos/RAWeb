@extends('layouts.app', [
    'pageTitle' => $emulator->handle,
])

@section('header')
    <x-page-header :large="Route::is('emulator.edit')">
        <x-slot name="title">
            <h2>
                <a href="{{ route('emulator.edit', $emulator) }}">
                    {{ $emulator->handle }}
                </a>
            </h2>
        </x-slot>
        <x-slot name="titleActivity">
            @if($emulator->latestRelease)
                <div>
                    <div>
                        <small class="uppercase">{{ __('latest release') }}</small>
                    </div>
                    <x-release :release="$emulator->latestRelease" />
                </div>
            @endif
        </x-slot>
        <x-slot name="navigation">
            <x-emulator.menu :emulator="$emulator" />
        </x-slot>
        <x-slot name="actions">
            @if(Route::is('emulator.create'))
                <x-button.cancel :link="route('emulator.index')" />
            @endif
            @if(Route::is('emulator.edit'))
                {{--<x-button.delete :model="$emulator"/>--}}
                <x-button.cancel :link="route('emulator.index')" />
            @endif
            @if(Route::is('emulator.index'))
                <x-button.create resource="emulator" />
            @endif
        </x-slot>
        <x-slot name="stats">
            {{--<x-breadcrumb>
                <li>
                    <a href="{{ route('emulator.index') }}">
                        {{ __res('emulator') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('emulator.edit', $emulator) }}">
                        {{ $emulator->handle . ($emulator->name != $emulator->handle ? ' ('. $emulator->name . ')': '') }}
                    </a>
                </li>
            </x-breadcrumb>--}}
            <x-page-header-stat :label="__res('release')" :value="$emulator->releases_count" />
            <x-page-header-stat :label="__res('system')" :value="$emulator->systems_count" />
        </x-slot>
    </x-page-header>
@endsection
