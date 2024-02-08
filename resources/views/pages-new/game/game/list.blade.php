@foreach($games as $playerGame)
    <div class="flex items-start mb-3">
        <div class="flex-1">
            <h4>
                <a href="{{ route('user.game.show', [$user, $playerGame->game]) }}">
                    {{ $playerGame->game->title }}
                </a>
            </h4>
            <p>
                Unlocked
                <x-number :value="$playerGame->achievements_unlocked" />
                of
                <x-number :value="$playerGame->achievements_count" />
                achievements
            </p>
            <x-achievement.mosaic :achievements="$playerGame->achievements" />
        </div>
    </div>
@endforeach
