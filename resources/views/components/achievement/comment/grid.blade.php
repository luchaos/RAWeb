<x-comment.grid
        :defer="$defer"
        :results="$results"
        :pageSizes="$pageSizes"
        :take="$take"
>
    @if($achievement ?? null)
        <x-slot name="create">
            @can('create', [App\Models\AchievementComment::class, $achievement])
                <x-comment.create :storeUrl="route('achievement.comment.store', $achievement)"/>
            @endcan
        </x-slot>
        <x-slot name="more">
            <x-button.more link="{{ route('achievement.comment.index', $achievement) }}"/>
        </x-slot>
    @endif
</x-comment.grid>
