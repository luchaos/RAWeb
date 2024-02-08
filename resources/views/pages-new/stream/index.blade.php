@extends('layouts.app', [
    'pageTitle' => __res('stream'),
])

@section('header')
    <x-page-header :large="false">
        <x-slot name="title">
            <h2>{{ __res('stream') }}</h2>
        </x-slot>
    </x-page-header>
@endsection
