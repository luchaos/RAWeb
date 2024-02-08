<x-comment.grid
        :defer="$defer"
        :results="$results"
        :pageSizes="$pageSizes"
        :take="$take"
        :showHeader="false"
        :createBelow="true"
>
    @if($topic ?? null)
        <x-slot name="create">
            @can('create', [App\Models\ForumTopicComment::class, $topic])
                <x-comment.create :storeUrl="route('forum-topic.comment.store', $topic)"/>
            @endcan
        </x-slot>
    @endif
</x-comment.grid>
