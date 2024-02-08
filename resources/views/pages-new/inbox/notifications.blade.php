@extends('inbox.page', [
    'section' => 'notifications',
    'title' => __res('notification'),
])

{{--@section('breadcrumb')
    <li>
        <a href="{{ route('user.index') }}">
            {{ __('Users') }}
        </a>
    </li>
    <li>
        <a href="{{ auth()->user()->canonicalUrl }}">
            {{ auth()->user()->display_name }}
        </a>
    </li>
    <li>
        <a href="{{ route('inbox') }}">
            {{ __('Inbox') }}
        </a>
    </li>
    <li>
        {{ __res('notification') }}
    </li>
@endsection--}}

@section('main')
    <x-section>
        <h3>{{ __res('notification') }}</h3>
    </x-section>
@endsection
