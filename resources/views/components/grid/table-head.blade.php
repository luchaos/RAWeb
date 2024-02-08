<?php
// TODO: fix this -> current sort query is not passed along
$resultsSortedBy = $results->sortBy ?? null;
$resultsSortDirection = $results->sortDirection ?? null;
$key = $column['key'] ?? null;
$displayColumn = empty($column['displayOnSort'])
    || $column['displayOnSort'] === true
    || $column['displayOnSort'] === $resultsSortedBy;
$columnSortBy = $column['sortBy'] ?? null;
$sortActive = $columnSortBy && $resultsSortedBy === $columnSortBy;
$columnDefaultSortDirection = $column['sortDirection'] ?? 'asc';
$sortIcon = $resultsSortDirection == $columnDefaultSortDirection ? '-down' : '-up';
$sortDirection = $sortActive ? $sortIcon : '';
$showLabel = isset($column['label']) && $column['label'] !== false;
$label = $column['label'] ?? __('validation.attributes.' . $key);
?>
@if ($displayColumn)
    <th class="{{ $column['class'] ?? '' }} {{ $sortActive ? 'active' : '' }}">
        @if(!empty($column['sortBy']))
            <a class="cursor-pointer" wire:click="sort('{{ $column['sortBy'] }}')">
                @if ($showLabel)
                    {{ __($label) }}
                @endif
                {{ svg('fas-sort' . $sortDirection, 'icon') }}
            </a>
        @else
            @if ($showLabel)
                {{ __($label) }}
            @endif
        @endif
    </th>
@endif
