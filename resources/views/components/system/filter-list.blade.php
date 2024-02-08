<?php

use App\Models\System;

$systems = System::active()
    // ->withCount('games')
    // ->has('games', '>', 0)
    ->orderBy('name')
    ->get()
    ->keyBy('id');
$activeSystem = request('system', $system ?? null);

$params = http_build_query(array_filter([
    'sort' => request('sort'),
    'order' => request('order'),
]));
?>
@if($systems->count())
    <x-dropdown dropdownClass="dropdown-menu-left" class="dropdo" :triggerClass="$activeSystem ? 'active' : ''">
        <x-slot name="trigger">
            @if($activeSystem)
                {{ $activeSystem->name }}
            @else(!$activeSystem)
                {{ __res('system') }}
            @endif
        </x-slot>
        <x-dropdown-item :link="route($resource.'.index') . ($params ? '?'.$params : '')" :active="!$activeSystem">
            {{ __('All') }} {{ __res('system') }}
        </x-dropdown-item>
        <div class="flex flex-row">
            @foreach($systems->split(2) as $systems)
                <div class="">
                    @foreach($systems as $system)
                        <x-dropdown-item :link="route('system.'.$resource.'.index', [$system->id, $system->slug]).($params ? '?'.$params : '')" :active="$activeSystem && $activeSystem->id == $system->id">
                            {{ $system->name }}
                            {{--({{ $system->games_count }})--}}
                        </x-dropdown-item>
                    @endforeach
                </div>
            @endforeach
        </div>
    </x-dropdown>
@endif
