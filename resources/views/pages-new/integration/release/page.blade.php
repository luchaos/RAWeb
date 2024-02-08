@extends('layouts.app')

{{--@section('breadcrumb')
    <li>
        <a href="{{ route('integration.release.index') }}">
            {{ __res('integration.release') }}
        </a>
    </li>
    <li>
        <a href="{{ route('integration.release.edit', $release) }}">
            {{ $release->handle . ($release->name != $release->handle ? ' ('. $release->name . ')': '') }}
        </a>
    </li>
@endsection--}}

@section('header')
    <x-page-header :large="Route::is('integration.release.index')">
        <x-slot name="title">
            <h2>
                <small class="text-secondary">{{ __res('release') }}</small>
                {{ __res('integration', 1) }}
            </h2>
        </x-slot>
        <x-slot name="titleActivity">
        </x-slot>
        <x-slot name="actions">
            @if(Route::is('integration.release.create'))
                <x-button.cancel :link="route('integration.release.index')" />
            @endif
            @if(Route::is('integration.release.edit'))
                <x-button.delete :model="$release" />
                <x-button.cancel :link="route('integration.release.index')" />
            @endif
            @if(Route::is('integration.release.index'))
                <x-button.create resource="integration.release">{{ __res('release', 1) }}</x-button.create>
            @endif
        </x-slot>
        <x-slot name="navigation">
        </x-slot>
        <x-slot name="stats">
            <x-release-versions :minimum="$minimum ?? null" :stable="$stable ?? null" :beta="$beta ?? null" />
        </x-slot>
    </x-page-header>
@endsection
