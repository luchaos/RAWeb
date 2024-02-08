<div class="inline-flex" x-data>
    @if ($paginator->onFirstPage())
        <span class="btn disabled"><x-fas-angle-double-left /></span>
        <span class="btn disabled"><x-fas-angle-left /></span>
    @else
        <button
            class="btn btn-secondary"
            wire:click="gotoPage(1)"
            rel="first"
            x-on:click="scrollToGridTop($event)"
            data-toggle="tooltip"
            title="{{ __('First page') }}"
        >
            <x-fas-angle-double-left />
            <span class="sr-only">{{ __('First page') }}</span>
        </button>
        <button
            class="btn btn-secondary"
            wire:click="previousPage"
            rel="prev"
            x-on:click="scrollToGridTop($event)"
            data-toggle="tooltip"
            title="{{ __('Previous page') }}"
        >
            <x-fas-angle-left />
            <span class="sr-only">{{ __('Previous page') }}</span>
        </button>
    @endif
    @if ($paginator->hasMorePages())
        <button
            class="btn btn-secondary"
            wire:click="nextPage"
            rel="next"
            x-on:click="scrollToGridTop($event)"
            data-toggle="tooltip"
            title="{{ __('Next page') }}"
        >
            <x-fas-angle-right />
            <span class="sr-only">{{ __('Next page') }}</span>
        </button>
        <button
            class="btn btn-secondary"
            wire:click="gotoPage({{ $paginator->lastPage() }})"
            rel="last"
            x-on:click="scrollToGridTop($event)"
            data-toggle="tooltip"
            title="{{ __('Last page') }}"
        >
            <x-fas-angle-double-right />
            <span class="sr-only">{{ __('Last page') }}</span>
        </button>
    @else
        <span class="btn disabled"><x-fas-angle-right /></span>
        <span class="btn disabled"><x-fas-angle-double-right /></span>
    @endif
</div>
