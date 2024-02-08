@extends('layouts.app', [
    'pageTitle' => (($title ?? null) ? $title . ' · ' : '') . __res('setting'),
])

{{--@section('breadcrumb')
    <li>
        <a href="{{ auth()->user()->canonicalUrl }}">
            {{ auth()->user()->display_name }}
        </a>
    </li>
    <li>
        <a href="{{ route('settings') }}">
            {{ __res('setting') }}
        </a>
    </li>
    @if($title ?? null)
        <li>
            {{ __($title) }}
        </li>
    @endif
@endsection--}}

@section('header')
    <x-page-header :large="false">
        <x-slot name="title">
            <h2>{{ __res('setting') }}</h2>
        </x-slot>
        <x-slot name="navigation">
            <x-settings.menu :section="$section" />
        </x-slot>
    </x-page-header>
@endsection
