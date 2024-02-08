@extends('layouts.app', [
    'pageTitle' => (($title ?? null) ? $title . ' · ' : '') . __('Inbox'),
])

{{--@section('breadcrumb')
    <li>
        <a href="{{ auth()->user()->canonicalUrl }}">
            {{ auth()->user()->display_name }}
        </a>
    </li>
    <li>
        <a href="{{ route('inbox') }}">
            Inbox
        </a>
    </li>
    @if($title ?? null)
        <li>
            {{ $title }}
        </li>
    @endif
@endsection--}}

@section('header')
    <x-page-header :large="false">
        <x-slot name="title">
            <h2>{{ __('Inbox') }}</h2>
        </x-slot>
        <x-slot name="navigation">
            <x-inbox.menu :section="$section ?? 'inbox'" />
        </x-slot>
    </x-page-header>
    {{--<x-section class="pt-5">
        <x-section-background/>
        <div class="container">
            <h2>{{ __('Inbox') }}</h2>
            <x-inbox.menu :section="$section ?? 'inbox'"/>
        </div>
    </x-section>--}}
@endsection
