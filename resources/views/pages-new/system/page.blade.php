<?php
/** @var App\Models\System $system */
$section ??= null;
?>

@extends('layouts.app', [
    'pageTitle' => $system->name . ($section ? ' ' . __res($section) : ''),
    'pageDescription' => $system->name . ($section ? ' ' . __res($section) : ''),
    'pageImage' => asset($system->logo),
    'canonicalUrl' => $system->canonicalUrl,
    'permalink' => $system->permalink,
    'pageType' => 'system',
])

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
