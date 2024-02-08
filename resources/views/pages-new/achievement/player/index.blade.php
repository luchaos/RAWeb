@extends('achievement.page')

@section('main')
    <x-section>
        <h3>Players</h3>
        <p>
            Unlocked by <b>{{ $numWinners }}</b> of <b>{{ $numPossibleWinners }}</b> players ({{ $winnerPercent }}%)
        </p>
    </x-section>
    @livewire('achievement-player-grid', ['achievementId' => $achievement->id ?? null])
@endsection
