@extends('user.page')

{{--@section('breadcrumb')
    <li>
        <a href="{{ route('user.index') }}">
            {{ __res('user') }}
        </a>
    </li>
    <li>
        <a href="{{ route('user.show', $user) }}">
            {{ $user->display_name }}
        </a>
    </li>
    <li>
        {{ __('Edit') }}
    </li>
@endsection--}}

@section('main')
    <x-section>
        <x-section-header>
            <x-slot name="title">
                <h3>
                    {{ __('validation.attributes.roles') }}
                </h3>
            </x-slot>
        </x-section-header>
        <x-form :action="route('user.update', $user)" method="put">
            @include('user.form')
            <x-form-actions />
        </x-form>
    </x-section>
@endsection

@section('sidebar')
    <x-section>
        <x-section-header>
            <x-slot name="title"><h3>{{ __('validation.attributes.avatar') }}</h3></x-slot>
            @if($user->hasMedia('avatar'))
                <x-slot name="actions">
                    <x-button.form
                        class="btn btn-outline-warning border-0"
                        :action="route('user.avatar.destroy', $user)"
                        :confirm="__('Are you sure?')"
                    >
                        <x-fas-times /> {{ __('Clear') }} {{ __('validation.attributes.avatar') }}
                    </x-button.form>
                </x-slot>
            @endif
        </x-section-header>
        @if($user->hasMedia('avatar'))
            <x-media.image :media="$user->getFirstMedia('avatar')" />
        @else
            <i>{{ __('not set') }}</i>
        @endif
    </x-section>

    <x-section>
        <x-section-header>
            <x-slot name="title"><h3>{{ __('validation.attributes.motto') }}</h3></x-slot>
            @if($user->motto)
                <x-slot name="actions">
                    <x-button.form
                        class="btn btn-outline-warning border-0"
                        :action="route('user.motto.destroy', $user)"
                        :confirm="__('Are you sure?')"
                    >
                        <x-fas-times /> {{ __('Clear') }} {{ __('validation.attributes.motto') }}
                    </x-button.form>
                </x-slot>
            @endif
        </x-section-header>
        @if($user->motto)
            <p class="code embedded p-2 mb-2">
                {{ $user->motto }}
            </p>
        @else
            <i>{{ __('not set') }}</i>
        @endif
    </x-section>

    @can('rank', $user)
        <x-section>
            <x-section-header>
                <x-slot name="title"><h3>{{ __('Rank') }}</h3></x-slot>
            </x-section-header>
            <div>
                @if($user->unranked_at)
                    <x-button.form
                        class="btn btn-outline-warning border-0"
                        :action="route('user.rank', $user)"
                        :confirm="__('Are you sure?')"
                    >
                        <x-fas-stopwatch /> {{ __('Rank :resource', ['resource' => __res('user', 1)]) }}
                    </x-button.form>
                @else
                    <x-button.form
                        class="btn btn-outline-danger border-0"
                        :action="route('user.unrank', $user)"
                        :confirm="__('Are you sure?')"
                    >
                        <x-fas-stopwatch /> {{ __('Unrank :resource', ['resource' => __res('user', 1)]) }}
                    </x-button.form>
                @endif
            </div>
        </x-section>
    @endcan

    @can('mute', $user)
        <x-section>
            <x-section-header>
                <x-slot name="title"><h3>{{ __('Mute') }}</h3></x-slot>
            </x-section-header>
            <div>
                @if($user->muted_until)
                    <x-button.form
                        class="btn btn-outline-warning border-0"
                        :action="route('user.mute', $user)"
                        :confirm="__('Are you sure?')"
                    >
                        <x-fas-volume-mute /> {{ __('Unmute :resource', ['resource' => __res('user', 1)]) }}
                    </x-button.form>
                @else
                    <x-button.form
                        class="btn btn-outline-danger border-0"
                        :action="route('user.mute', $user)"
                        :confirm="__('Are you sure?')"
                    >
                        <x-fas-volume-mute /> {{ __('Mute :resource', ['resource' => __res('user', 1)]) }}
                    </x-button.form>
                @endif
            </div>
        </x-section>
    @endcan

    @can('ban', $user)
        <x-section>
            <x-section-header>
                <x-slot name="title"><h3>{{ __('Ban') }}</h3></x-slot>
            </x-section-header>
            <div>
                @if($user->banned_at)
                    <x-button.form
                        class="btn btn-outline-warning border-0"
                        :action="route('user.unban', $user)"
                        :confirm="__('Are you sure?')"
                    >
                        <x-fas-ban /> {{ __('Unban :resource', ['resource' => __res('user', 1)]) }}
                    </x-button.form>
                @else
                    <x-button.form
                        class="btn btn-outline-danger border-0"
                        :action="route('user.ban', $user)"
                        :confirm="__('Are you sure?')"
                    >
                        <x-fas-ban /> {{ __('Ban :resource', ['resource' => __res('user', 1)]) }}
                    </x-button.form>
                @endif
            </div>
        </x-section>
    @endcan

    @can('delete', $user)
        <x-section>
            <x-section-header>
                <x-slot name="title"><h3>{{ __('Delete') }}</h3></x-slot>
            </x-section-header>
            <div>
                <x-button.delete :model="$user">{{ __('Delete :resource', ['resource' => __res('user', 1)]) }}</x-button.delete>
            </div>
        </x-section>
    @endcan

@endsection

