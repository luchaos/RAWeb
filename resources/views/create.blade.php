@extends('layouts.app', [
    'pageTitle' => __('Create'),
])

@section('header')
    <x-page-header :large="false">
        <x-slot name="title">
            <h2>{{ __('Create') }}</h2>
        </x-slot>
    </x-page-header>
@endsection

@section('main')
    <x-section>
        @can('develop')
            <p>You are a creator...</p>
            <p>TBD Dashboard style overview: currently working on, open tasks/issues</p>
            <p>TBD Tutorial Journey Progress</p>
            <p>TBD Opt-out</p>
        @else
            <p>Become a creator...</p>
            <p>Landing page, interstitials, ...</p>
            <p>TBD Opt-in</p>
        @endcan
    </x-section>
@endsection
