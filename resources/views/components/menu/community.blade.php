<?php

use App\Models\ForumCategory;

$communityForumCategory = ForumCategory::find(1);
?>
@if($mobile)
    @if($communityForumCategory)
        <x-nav-item :link="$communityForumCategory->canonicalUrl" :active="request()->routeIs(['forums.*', 'forum-category.*', 'forum-category.*'])">
            {{ __res('forum') }}
        </x-nav-item>
    @endif
    {{--<x-nav-item :link="route('user.index')">{{ __res('user') }}</x-nav-item>--}}
@else
    <x-nav-dropdown :active="request()->routeIs(['user*', 'forums.*', 'forum-category.*', 'forum-category.*'])">
        <x-slot name="trigger">{{ __('Community') }}</x-slot>
        @if($communityForumCategory)
            <x-dropdown-header>{{ __res('forum') }}</x-dropdown-header>
            {{--<a class="dropdown-item" href="{{ route('forum.index') }}">All Forums</a>--}}
            <x-dropdown-item :link="$communityForumCategory->canonicalUrl" :active="request()->routeIs('forum-category.show') ? 'active' : ''">
                {{ __('Community') }}
            </x-dropdown-item>
            {{--TODO: replace with category/forum link
            TODO: fetch those automatically --}}
            {{--<a class="dropdown-item" href="{{ route('forum.show', 25) }}">Competitions</a>--}}
            {{--<a class="dropdown-item" href="{{ RA\Forum\Models\ForumCategory::find(7)->canonicalUrl }}">Developers</a>
            <a class="dropdown-item" href="{{ route('forum-topic.index') }}">Recent Topics</a>--}}
            {{--<a class="dropdown-item" href="{{ route('developer.index') }}">Developers</a>--}}
            <div class="dropdown-divider"></div>
        @endif
        <h6 class="dropdown-header">{{ __('People') }}</h6>
        @if(config('services.twitch.channel'))
            <x-dropdown-item :link="route('stream.index')">{{ __res('stream') }}</x-dropdown-item>
        @endif
        <x-dropdown-item :link="route('user.index')">{{ __res('user') }}</x-dropdown-item>
        {{--<a class="dropdown-item" href="{{ route('user.index') }}">Team</a>--}}
        <div class="dropdown-divider"></div>
        <x-dropdown-item :link="route('news.index')" :active="request()->routeIs('news.*')">{{ __res('news') }}</x-dropdown-item>
        <div class="dropdown-divider"></div>
        @if(config('services.patreon.user_id'))
            <x-dropdown-item :link="'https://www.patreon.com/bePatron?u='.config('services.patreon.user_id')">Patreon</x-dropdown-item>
        @endif
        @if(config('services.discord.invite_id'))
            <x-dropdown-item :link="'https://discordapp.com/invite/'.config('services.discord.invite_id')">Discord</x-dropdown-item>
        @endif
    </x-nav-dropdown>
@endif
