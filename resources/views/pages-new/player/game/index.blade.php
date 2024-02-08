@extends('user.page', [
    'section' => 'game'
])

{{--@section('breadcrumb')
    <li>
        <a href="{{ route('user.show', $user) }}">
            {{ $user->display_name }}
        </a>
    </li>
    <li>
        <a href="{{ route('user.game.index', $user) }}">
            {{ __res('game') }}
        </a>
    </li>
@endsection--}}

@section('main')
    <x-section>
        <x-section-header>
            <x-slot name="title">
                <h3>{{ $system ? $system->name : '' }} {{ __res('game') }}</h3>
            </x-slot>
        </x-section-header>
    </x-section>
    {{--@component('grid.component.index', ['grid' => $grid, 'display' => 'table'])
        @slot('filter')
            @include('game.partials.filter', [
                'routeName' => $system ? 'system.game.index' : 'game.index',
                'routeParams' => $system ? [$system, Str::slug($system->name)] : null
            ])
        @endslot
        @slot('head')
            @foreach($grid->gridColumns() as $column)
                @include('grid.table-head', [
                    'grid' => $grid,
                    'column' => $column,
                    'routeName' => 'user.game.index',
                    'routeParams' => [$user]
                ])
            @endforeach
        @endslot
        @foreach ($grid as $playerGame)
            <tr>
                <td class="wrap">
                    @game($playerGame->game, 'icon')
                </td>
                <td class="wrap w-50">
                    @game($playerGame->game)
                </td>
                <td class=" w-25">
                    @system($playerGame->game->system)
                </td>
                <td class="text-right">
                    @if ($playerGame->achievements_count)
                        {{ number_format($playerGame->achievements_count) }}
                    @endif
                </td>
                <td class="text-right">
                    @if ($playerGame->achievements_unlocked)
                        {{ number_format($playerGame->achievements_unlocked) }}
                    @endif
                </td>
                <td class="text-right">
                    @if ($playerGame->game->points_total)
                        {{ number_format($playerGame->game->points_total) }}
                    @endif
                </td>
                <td class="text-right">
                    @if ($playerGame->game->points_weighted)
                        {{ number_format($playerGame->game->points_weighted) }}
                    @endif
                </td>
                <td class="text-right">
                    @if ($playerGame->last_unlock_at)
                        {{ $playerGame->last_unlock_at->format('j M Y') }}
                    @endif
                </td>
            </tr>
        @endforeach
        <x-player.game.list :games="$grid" />
    @endcomponent--}}
@endsection
