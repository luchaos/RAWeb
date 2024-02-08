<?php /** @var Illuminate\Pagination\Paginator $paginator */ ?>

<div class="pl-3 {{ $class ?? '' }} mb-3">
    <x-section-header class="items-center">
        <x-slot name="title">
            <div class="h6 mb-0">
                {{ __('pagination.resource-label', ['firstItem' => localized_number($paginator->firstItem()), 'lastItem' => localized_number($paginator->lastItem()), 'total' => localized_number($paginator->total()), 'resource' => __res($resource ?? 'resource')]) }}
            </div>
        </x-slot>
        <x-slot name="actions">
            @if(!empty($pageSizes))
                <x-dropdown triggerClass="">
                    <x-slot name="trigger">
                        {{ $paginator->perPage() }} {{ __res('resource') }}
                    </x-slot>
                    @foreach($pageSizes as $pageSize)
                        <div class="dropdown-item cursor-pointer {{ $paginator->perPage() === $pageSize ? 'active' : '' }}"
                             wire:click="pageSize({{ $pageSize }})">{{ $pageSize }}</div>
                    @endforeach
                </x-dropdown>
            @endif
            @if ($paginator->hasPages())
                {{ $paginator->links() }}
            @endif
        </x-slot>
    </x-section-header>
</div>
