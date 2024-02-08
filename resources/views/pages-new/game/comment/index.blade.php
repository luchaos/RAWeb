@extends('game.page', [
    'section' => 'comment'
])

@section('main')
    <livewire:game.comments :gameId="$game->id" />
@endsection
