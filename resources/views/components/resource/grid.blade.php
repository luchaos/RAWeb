<x-section>
    <div @if($defer ?? false)wire:init="ready" @endif x-data="{filtersOpen: location.hash || false}">
        @includeIf('components.'.$resource.'.filter')
        <div
            wire:loading.class="block"
            class="hidden"
            style="{{ ($results ?? null) && $results->isNotEmpty() ? '' : 'height:200px' }}"
        >
            <div class="background flex flex-row justify-center"
                 style="z-index: 5; background-color: rgba(0,0,0,0); cursor: wait">
                <div class="flex flex-col justify-center" style="height:200px">
                    <x-loader class="mb-3" size="sm" />
                </div>
            </div>
        </div>
        <div wire:loading.remove>
            @if(($results ?? null) && $results->isEmpty())
                <x-resource.empty :resource="$resource" />
            @endif
        </div>
        @if(($results ?? null) && $results->total())
            @if($results->isNotEmpty())
                <x-grid.pagination :paginator="$results" :pageSizes="$pageSizes" />
                @if($display === 'cards')
                    <x-section class="mb-3">
                        <x-grid.cards
                            :columns="$columns"
                            :resource="$resource"
                            :results="$results"
                        />
                    </x-section>
                @endif
                @if($display === 'list')
                    <x-section class="mb-3">
                        <x-grid.list
                            :columns="$columns"
                            :resource="$resource"
                            :results="$results"
                        />
                    </x-section>
                @endif
                @if($display === 'table')
                    <x-section class="mb-0">
                        <x-grid.table
                            :columns="$columns"
                            :resource="$resource"
                            :results="$results"
                        />
                    </x-section>
                @endif
                <x-grid.pagination :paginator="$results" />
            @endif
        @endif
    </div>
</x-section>
{{--@push('scripts')
    <script type="text/javascript">
        // document.addEventListener('DOMContentLoaded', function () {
        //     // Get the value of the "count" property
        //     var someValue = @this.get('count')
        //
        //     // Set the value of the "count" property
        //     @this.set('count', 5)
        //
        //     // Call the increment component action
        //     // @this.call('increment')
        //
        //     // Run a callback when an event ("foo") is emitted from this component
        //     @this.on('foo', () => {})
        // });
    </script>
@endpush--}}
