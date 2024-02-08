<div id="comments" @if($defer ?? false)wire:init="ready" @endif>
    @if($showHeader ?? true)
        <x-section class="mb-1">
            <x-section-header>
                <x-slot name="title">
                    <h3 class="mb-0">{{ __res('comment') }}</h3>
                </x-slot>
                <x-slot name="actions">
                    {{ $actions ?? null }}
                </x-slot>
            </x-section-header>
        </x-section>
    @endif
    @if(!($createBelow ?? false))
        <x-section wire:loading.remove>
            {{ $create ?? null }}
        </x-section>
    @endif
    <x-section>
        <div
            wire:loading.class="block"
            class="hidden"
            style="{{ ($results ?? null) && $results->isNotEmpty() ? '' : 'height:200px' }}"
        >
            <div class="background flex flex-row justify-center"
                 style="z-index: 5; background-color: rgba(0,0,0,0); cursor: wait">
                <div class="flex flex-column justify-center" style="height:200px">
                    <x-loader class="mb-3" size="lg" />
                </div>
            </div>
        </div>
        <div wire:loading.remove>
            @if(($results ?? null) && $results->isEmpty())
                <x-resource.empty resource="comment" :showStatusIcon="false" />
            @endif
        </div>
        @if(($results ?? null) && $results->total())
            @if($results->isNotEmpty())
                @if($results->hasPages())
                    @if(!$take)
                        <x-grid.pagination :paginator="$results" :pageSizes="$pageSizes" />
                    @endif
                @endif
                @foreach ($results as $comment)
                    <x-comment :comment="$comment" smallActionButtons />
                @endforeach
                @if($results->hasPages())
                    @if(!$take)
                        <x-grid.pagination :paginator="$results" />
                    @endif
                    @if($take)
                        <div class="text-center">
                            {{ $more ?? null }}
                        </div>
                    @endif
                @endif
            @endif
        @endif
    </x-section>
    @if($createBelow ?? false)
        <x-section wire:loading.remove>
            {{ $create ?? null }}
        </x-section>
    @endif
</div>
