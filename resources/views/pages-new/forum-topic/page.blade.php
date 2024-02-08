<?php
$topic ??= null;
$forum ??= $topic->forum ?? null;
$category = $forum->category ?? null;
?>

@extends('layouts.app', [
    'pageTitle' =>  ($topic ? $topic->title . ' · ' : '') . ($forum ? $forum->title . ' · ' : '') . ($category ? $category->title . ' · ' : '') . __res('forum'),
    'canonicalUrl' => ($topic ? $topic->canonicalUrl : null),
    'permalink' => ($topic ? $topic->permalink : null),
])

@section('header')
    <x-page-header>
        <x-slot name="title">
            @if(Route::is('forum.topic.create'))
                <h2><small class="text-secondary">{{ __('Create') }}</small> {{ __res('forum-topic', 1) }}</h2>
            @else
                <h2>{{ $topic->title }}</h2>
            @endif
        </x-slot>
        <x-slot name="subTitle">
            @if(!Route::is('forum.topic.create'))
                {!! __('by :user on :date', ['user' => user_avatar($topic->user), 'date' => localized_date($topic->created_at)]) !!}
            @endif
        </x-slot>
        <x-slot name="actions">
            @if(Route::is('forum-topic.show'))
                <x-button.edit :model="$topic" />
            @endif
            @if(Route::is('forum.topic.create'))
                <x-button.cancel :link="$forum->canonicalUrl" />
            @endif
            @if(Route::is('forum-topic.edit'))
                <x-button.cancel :link="$forum->canonicalUrl" />
            @endif
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
                @if($forum)
                    <li>
                        <a href="{{ $forum->canonicalUrl }}">
                            {{ $forum->title }}
                        </a>
                    </li>
                @endif
                @if(Route::is('forum.topic.create'))
                    <li>
                        {{ __('Create') }}
                    </li>
                @endif
                @if(Route::is('forum-topic.edit'))
                    <li>
                        <a href="{{ $topic->canonicalUrl }}">
                            {{ $topic->title }}
                        </a>
                    </li>
                    <li>
                        {{ __('Edit') }}
                    </li>
                @endif
            </x-breadcrumb>
        </x-slot>
    </x-page-header>
    {{--
    <x-slot name="subTitle">
        <x-comment :comment="$topic" :user="$topic->user"/>
    </x-slot>
    <x-slot name="stats">
    </x-slot>
    <x-slot name="actions">
        <x-button.edit :model="$topic"/>
    </x-slot>
    --}}
@endsection

{{--
// TODO: Report offensive content
// TODO: Subscribe to this topic
// TODO: Make top-post wiki
--}}
