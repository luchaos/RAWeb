<?php
/** @var ?App\Models\ForumTopicComment $topic */
$topic = $comment->commentable ?? null;
/** @var ?App\Models\Forum $topic */
$forum ??= $topic->forum ?? null;
/** @var ?App\Models\ForumCategory $topic */
$category = $forum->category ?? null;
?>

@extends('layouts.app', [
    'pageTitle' => ($topic ? $topic->title . ' · ' : '') . ($forum ? $forum->title . ' · ' : '') . ($category ? $category->title . ' · ' : '') . __res('forum'),
    'pageDescription' => null,
    'pageImage' => null,
    'canonicalUrl' => null,
    'permalink' => null,
    'pageType' => null,
])

@section('header')
    <x-page-header>
        <x-slot name="title">
            <h2>{{ $topic->title }}</h2>
        </x-slot>
        <x-slot name="subTitle">
            {!! __('by :user on :date', ['user' => user_avatar($topic->user, 'icon', 'xs') . user_avatar($topic->user), 'date' => localized_date($topic->created_at)]) !!}
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
                <li>
                    <a href="{{ $topic->canonicalUrl }}">
                        {{ $topic->title }}
                    </a>
                </li>
                <li>
                    {{ __res('comment', 1) }}
                </li>
                @if(Route::is('forum.edit'))
                    <li>
                        {{ __('Edit') }}
                    </li>
                @endif
            </x-breadcrumb>
            <x-page-header-stat :label="__res('forum-topic.comment')" :value="$topic->comments_count" />
        </x-slot>
        <x-slot name="actions">
            @if(Route::is('forum-topic.comment.edit'))
                <x-button.cancel :model="$topic" />
            @endif
        </x-slot>
    </x-page-header>
@endsection
