@extends('user.page')

{{--@section('main')
    @if($games->count())
        <x-player.game.recent :games="$games" :user="$user"/>
    @endif

    @can('viewAny', [App\Models\UserComment::class, $user])
        <livewire:user.comments :userId="$user->id" :take="5"/>
    @endCan
@endsection

@section('sidebar')
    @if($user->motto)
        <x-section>
            <x-section-header>
                <x-slot name="title">
                    <h4>{{ __('About Me') }}</h4>
                </x-slot>
            </x-section-header>
            <x-fas-quote-left class="text-secondary"/>
            {{ $user->motto }}
        </x-section>
    @endif
    --}}{{--<x-section>
        <x-section-header>
            <x-slot name="title">
                <h4>[Last Game]</h4>
            </x-slot>
        </x-section-header>
    </x-section>--}}{{--
    @if($user->lastGame)
        @if($user->currentlyPlaying)
            <x-player.game.last :game="$user->lastGame"/>
        @endif
        --}}{{--@include('game.partials.info', ['game' => $user->lastGame])--}}{{--
    @endif
    &nbsp;
    --}}{{--<x-section>
        <h4>[History Chart]</h4>
    </x-section>--}}{{--
    --}}{{--@include('user.partials.history-chart')--}}{{--
    --}}{{--<x-section>
        <h4>Friends</h4>
    </x-section>--}}{{--
    --}}{{--
    @include('user.partials.games-completed', ['games' => $userCompletedGamesList])
    @auth
        @include('leaderboard.partials.leaderboard', ['friendsOnly' => true])
    @endauth--}}{{--
@endsection
--}}
