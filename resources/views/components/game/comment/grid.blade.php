<x-comment.grid
        :defer="$defer"
        :results="$results"
        :pageSizes="$pageSizes"
        :take="$take"
>
    @if($game ?? null)
        <x-slot name="create">
            @can('create', [App\Models\GameComment::class, $game])
                <x-comment.create :storeUrl="route('game.comment.store', $game)"/>
            @endcan
        </x-slot>
        <x-slot name="more">
            <x-button.more link="{{ route('game.comment.index', $game) }}"/>
        </x-slot>
    @endif
</x-comment.grid>
