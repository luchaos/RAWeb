<x-section>
    <div class="flex items-start">
        <div class="mr-2">
            <x-game.avatar :game="$user->lastGame" display="icon" />
        </div>
        <div class="flex-1">
            <div class="lh-1">{{ $user->rich_presence ?? 'Last Played' }}</div>
            <x-game.avatar :game="$user->lastGame" />
        </div>
    </div>
</x-section>
