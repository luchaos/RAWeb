<x-comment.grid
        :defer="$defer"
        :results="$results"
        :pageSizes="$pageSizes"
        :take="$take"
>
    @if($user ?? null)
        <x-slot name="actions">
            @can('updateSettings', [$user, 'privacy'])
                <a class="btn btn-outline-secondary border-0"
                   href="{{ route('settings', 'privacy') }}"
                   data-toggle="tooltip" title="{{ __res('setting') }}">
                    <x-fas-cog/>
                </a>
            @endcan
        </x-slot>
        <x-slot name="create">
            @can('create', [App\Models\UserComment::class, $user])
                <x-comment.create :storeUrl="route('user.comment.store', $user)"/>
            @endcan
        </x-slot>
        <x-slot name="more">
            <x-button.more link="{{ route('user.comment.index', $user) }}"/>
        </x-slot>
    @endif
</x-comment.grid>
