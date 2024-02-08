@extends('layouts.app', [
    'pageTitle' => __('Tools'),
])

@section('header')
    <x-page-header :large="false">
        <x-slot name="title">
            <h2>{{ __('Tools') }}</h2>
        </x-slot>
    </x-page-header>
@endsection

@section('main')
    <x-section>
        <a href="{{ route('game-hash.index') }}" class="btn btn-primary">
            {{ __res('game-hash') }}
        </a>
        <x-link class="btn btn-primary" link="https://github.com/Jamiras/RATools" target="_blank">Jamiras' RATools</x-link>
    </x-section>
@endsection
