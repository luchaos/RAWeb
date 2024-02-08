@extends('user.page', [
    'section' => 'badge',
])

{{--@section('breadcrumb')
    <li>
        <a href="{{ route('user.show', $user) }}">
            {{ $user->display_name }}
        </a>
    </li>
    <li>
        <a href="{{ route('user.badge.index', $user) }}">
            {{ __res('badge') }}
        </a>
    </li>
@endsection--}}

@section('main')
    <x-section>
        <x-section-header>
            <x-slot name="title">
                <h3>{{ __res('badge') }}</h3>
            </x-slot>
        </x-section-header>
    </x-section>
@endsection
