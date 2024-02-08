@extends('layouts.app', [
    'pageTitle' => __res($resource ?? null)
])

@section('header')
    <x-page-header :large="Route::is(Str::plural($resource).'.index')">
        <x-slot name="title">
            <h2>
                {{ __res($resource) }}
            </h2>
        </x-slot>
        <x-slot name="actions">
        </x-slot>
    </x-page-header>
@endsection
