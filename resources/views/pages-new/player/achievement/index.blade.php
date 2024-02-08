@extends('user.page', [
    'section' => 'achievement'
])

{{--@section('breadcrumb')
    <li>
        <a href="{{ route('user.show', $user) }}">
            {{ $user->display_name }}
        </a>
    </li>
    <li>
        <a href="{{ route('user.badge.index', $user) }}">
            {{ __res('achievement') }}
        </a>
    </li>
@endsection--}}

@section('main')
    <x-section>
        <x-section-header>
            <x-slot name="title">
                <h3>{{ __res('achievement') }}</h3>
            </x-slot>
        </x-section-header>
    </x-section>
@endsection
