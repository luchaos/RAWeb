@extends('achievement.page')

{{--@section('breadcrumb')
    @if($achievement->game)
        @if($achievement->game->system)
            <li>
                <a href="{{ $achievement->game->system->games_link }}">
                    {{ $achievement->game->system->name }}
                </a>
            </li>
        @endif
        <li>
            <a href="{{ $achievement->game->canonicalUrl }}">
                {{ $achievement->game->title }}
            </a>
        </li>
    @else
        <li>
            <a href="{{ route('achievement.index') }}">
                Achievements
            </a>
        </li>
    @endif
    <li>
        {{ $achievement->title }}
    </li>
@endsection--}}

@section('main')
    @can('viewAny', [App\Models\AchievementComment::class, $achievement])
        <livewire:achievement.comments :achievementId="$achievement->id" :take="5"/>
    @endCan
@endsection

@section('sidebar')
    @if($achievement->game)
        <x-game.info :game="$achievement->game"/>
    @endif
@endsection
