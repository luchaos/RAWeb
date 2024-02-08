<x-comment.grid
        :defer="$defer"
        :results="$results"
        :pageSizes="$pageSizes"
        :take="$take"
>
    @if($news ?? null)
        <x-slot name="create">
            @can('create', [App\Models\NewsComment::class, $news])
                <x-comment.create :storeUrl="route('news.comment.store', $news)"/>
            @endcan
        </x-slot>
        <x-slot name="more">
            <x-button.more link="{{ route('news.comment.index', $news) }}"/>
        </x-slot>
    @endif
</x-comment.grid>
