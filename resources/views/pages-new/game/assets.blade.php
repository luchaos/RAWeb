@extends('game.page')

@section('main')
    @foreach($game->gameHashSets as $gameHashSet)
        <x-section>
            <h2>
                <small class="text-secondary">{{ __res('game-hash') }}</small>
                {{ __($gameHashSet->compatible ? 'Compatible' : 'Incompatible') }}
            </h2>
            <x-game-hash.list :game-hashes="$gameHashSet->hashes" />
        </x-section>

        <x-section>
            <h2>
                <small class="text-secondary">{{ __('Patches') }}</small>
            </h2>
        </x-section>
    @endforeach
@endsection
