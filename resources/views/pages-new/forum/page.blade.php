<?php
/** @var ?App\Models\Forum $forum */
$category = $forum->category ?? null;
?>

@extends('layouts.app', [
    'pageTitle' => $forum->title . ' · ' . ($category ? $category->title . ' · ' : null) . __res('forum'),
])

@section('header')
    <x-page-header>
        <x-slot name="title">
            <h2>{{ $forum->title }}</h2>
        </x-slot>
        <x-slot name="subTitle">
            {{ $forum->description }}
        </x-slot>
        <x-slot name="stats">
            <x-breadcrumb>
                <li>
                    {{ __res('forum') }}
                </li>
                @if($category)
                    <li>
                        <a href="{{ $category->canonicalUrl }}">
                            {{ $category->title }}
                        </a>
                    </li>
                @endif
                <li>
                    <a href="{{ $forum->canonicalUrl }}">
                        {{ $forum->title }}
                    </a>
                </li>
                @if(Route::is('forum.create'))
                    <li>
                        {{ __('Create') }}
                    </li>
                @endif
                @if(Route::is('forum.edit'))
                    <li>
                        {{ __('Edit') }}
                    </li>
                @endif
            </x-breadcrumb>
            <x-page-header-stat :label="__res('forum-topic')" :value="$forum->topics_count" />
        </x-slot>
        <x-slot name="actions">
            @if(Route::is('forum.show'))
                <x-button.create resource="forum.topic" :model="$forum">{{ __res('forum-topic', 1) }}</x-button.create>
                <x-button.edit :model="$forum" />
            @endif
            @if(Route::is('forum.create'))
                <x-button.cancel :link="route('forum.index')" />
            @endif
            @if(Route::is('forum.edit'))
                <x-button.cancel :model="$forum" />
            @endif
            @if(Route::is('forum.index'))
                <x-button.create resource="forum.topic" :model="$forum">{{ __res('forum-topic', 1) }}</x-button.create>
            @endif
        </x-slot>
    </x-page-header>
@endsection
