<x-section>
    {{--<h4>Played {{ $gamesPlayedCount }} {{ Str::plural('game', $gamesPlayedCount) }}</h4>--}}
    {{--<h4>Recently Played</h4>--}}
    {{--<x-section-header>
        <x-slot name="title">
            <h3 class="mb-0">Recently Played</h3>
        </x-slot>
    </x-section-header>--}}
    <x-player.game.list :games="$games" :user="$user" />
    @if($games->count())
        <div class="text-right">
            <a class="btn btn-sm embedded" href="{{ route('user.game.index', $user) }}">
                {{--All {{ $gamesPlayedCount }} played {{ __res('game') }}&hellip;--}}
            </a>
        </div>
    @endif
</x-section>
