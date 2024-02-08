@extends('layouts.app', [
    'pageTitle' => ($category ? $category->title . ' · ' : null) . __res('forum'),
])

@section('header')
    <x-page-header>
        <x-slot name="title">
            <h2>{{ $category->title }}</h2>
        </x-slot>
        <x-slot name="subTitle">
            {{ $category->description }}
        </x-slot>
        <x-slot name="stats">
            <x-breadcrumb>
                <li>
                    {{ __res('forum') }}
                </li>
                <li>
                    <a href="{{ $category->canonicalUrl }}">
                        {{ $category->title }}
                    </a>
                </li>
                @if(Route::is('forum-category.create'))
                    <li>
                        {{ __('Create') }}
                    </li>
                @endif
                @if(Route::is('forum-category.edit'))
                    <li>
                        {{ __('Edit') }}
                    </li>
                @endif
            </x-breadcrumb>
            {{--<x-page-header-stat :label="__res('forum')" :value="$forums->total()"/>--}}
        </x-slot>
        <x-slot name="actions">
            @if(Route::is('forum-category.show'))
                <x-button.edit :model="$category" />
            @endif
            @if(Route::is('forum-category.edit'))
                <x-button.cancel :link="route('forum-category.show', $category)" />
            @endif
        </x-slot>
    </x-page-header>
@endsection
