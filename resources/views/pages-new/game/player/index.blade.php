@extends('game.page')

@section('main')
    @livewire('game-player-grid', ['gameId' => $game->id ?? null])
@endsection
