<?php
/** @var ?App\Models\News $news */
$news ??= null;
?>
<x-app-layout
    :page-title="($news ? $news->title . '  ' : null) . __res('news')"
>
    @slot('header')
        <x-page-header :background="$news ? $news->getFirstMediaUrl('image') : null">
            <x-slot name="title">
                @if(Route::is('news.create'))
                    <h2>
                        {{ __res('news') }}
                    </h2>
                @endif
                @if($news)
                    <h2>
                        <a href="{{ route('news.show', $news) }}">
                            {{ $news->title }}
                        </a>
                    </h2>
                    <p class="mb-0">
                        {!! __('by :user on :date', ['user' => user_avatar($news->user), 'date' => localized_date($news->created_at)]) !!}
                    </p>
                @endif
            </x-slot>
            <x-slot name="stats">
                <x-breadcrumb>
                    <li>
                        <a href="{{ route('news.index') }}">
                            {{ __res('news') }}
                        </a>
                    </li>
                    @if(Route::is('news.create'))
                        <li>
                            {{ __('Create') }}
                        </li>
                    @else
                        <li>
                            <a href="{{ $news->canonicalUrl }}">
                                {{ $news->title }}
                            </a>
                        </li>
                        @if(Route::is('news.edit'))
                            <li>
                                {{ __('Edit') }}
                            </li>
                        @endif
                    @endif
                </x-breadcrumb>
            </x-slot>
            <x-slot name="actions">
                @if(Route::is('news.show'))
                    <x-button.edit :model="$news" />
                @endif
                @if(Route::is('news.create'))
                    <x-button.cancel :link="route('news.index')" />
                @endif
                @if(Route::is('news.edit'))
                    <x-button.delete :model="$news" />
                    <x-button.cancel :model="$news" />
                @endif
                @if(Route::is('news.index'))
                    <x-button.create resource="news" />
                @endif
            </x-slot>
        </x-page-header>
    @endslot

    @yield('main')

    @slot('sidebar')
        @yield('sidebar')
    @endslot
</x-app-layout>
