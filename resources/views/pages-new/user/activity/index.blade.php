@extends('layouts.app', [
    'pageTitle' => __('User Activities'),
])

@push('head')
    {{--<link rel="alternate" type="application/rss+xml" title="Global Feed"
          href="http://retroachievements.org/rss-activity">--}}
@endpush

@section('header')
    <x-page-header>
        <x-slot name="title">
            <h2>{{ __('Activity') }}</h2>
        </x-slot>
    </x-page-header>
@endsection

@section('main')
    <livewire:user-activity-feed />
@endsection

@section('sidebar')
    <x-twitch-stream />
@endsection
