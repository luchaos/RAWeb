@extends('layouts.app', [
    'pageTitle' => $emulator->handle . ' · ' . __res('release'),
])

{{--@section('breadcrumb')
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
    <li>
        <a href="{{ route('emulator.release.index', $emulator) }}">
            {{ __res('release') }}
        </a>
    </li>
@endsection--}}

@section('header')
    <x-page-header :large="false">
        <x-slot name="title">
            <h2>
                <a href="{{ route('emulator.edit', $emulator) }}">
                    {{ $emulator->handle }}
                </a>
            </h2>
        </x-slot>
        <x-slot name="titleActivity">
        </x-slot>
        <x-slot name="actions">
            @if(Route::is('emulator.release.create'))
                <x-button.cancel :link="route('emulator.release.index', $emulator)" />
            @endif
            @if(Route::is('emulator.release.edit'))
                <x-button.delete :model="$release" />
                <x-button.cancel :link="route('emulator.release.index', $emulator)" />
            @endif
            @if(Route::is('emulator.release.index'))
                <x-button.create resource="emulator.release" :model="$emulator">{{ __res('release', 1) }}</x-button.create>
            @endif
        </x-slot>
        <x-slot name="navigation">
            <x-emulator.menu :emulator="$emulator" />
        </x-slot>
        <x-slot name="stats">
            <x-page-header-stat :label="__res('release')" :value="$emulator->releases_count" />
            <x-page-header-stat :label="__res('system')" :value="$emulator->systems_count" />
            <x-release-versions :minimum="$minimum ?? null" :stable="$stable ?? null" :beta="$beta ?? null" />
        </x-slot>
    </x-page-header>
@endsection
