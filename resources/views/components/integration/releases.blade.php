<x-section>
    <x-section-header class="mb-4">
        <x-slot name="title">
            <h3>
                RAIntegration
            </h3>
        </x-slot>
        <x-slot name="actions">
            @can('viewAny', App\Models\IntegrationRelease::class)
                <div class="btn-group">
                    <a href="{{ route('integration.release.index') }}" class="btn btn-outline-secondary border-0">
                        <x-fas-cogs/>
                    </a>
                </div>
            @endcan
        </x-slot>
    </x-section-header>
    @if($releases->count())
        @foreach($releases as $release)
            <x-release :release="$release" :showBuilds="true" :showNotes="true"/>
        @endforeach
    @else
        <x-resource.empty resource="integration.release"/>
    @endif
</x-section>
