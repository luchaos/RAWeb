<?php

use Illuminate\Support\Facades\Gate;

/** @var App\Models\Emulator $emulator */
$menu = collect([
    [
        'label' => __('Edit'),
        'url' => route('emulator.edit', $emulator),
        'active' => Route::is('emulator.edit'),
    ],
    [
        'label' => __res('release'),
        'url' => route('emulator.release.index', $emulator),
        'active' => Route::is('emulator.release*') || Route::is('emulator.release*'),
        'visible' => Gate::allows('viewAny', App\Models\EmulatorRelease::class)
    ],
])->filter(fn ($menuItem) => $menuItem['visible'] ?? true);
?>
<x-navbar breakpoint="xl" class="navbar-borders p-0 bg-transparent">
    <ul class="navbar-nav">
        @foreach($menu as $menuItem)
            <li class="nav-item {{ $menuItem['active'] ? 'active' : '' }}">
                <a class="nav-link" href="{{ $menuItem['url'] }}">
                    {{ $menuItem['label'] }}
                    @if($menuItem['active'])
                        <span class="sr-only">(current)</span>
                    @endif
                </a>
            </li>
        @endforeach
    </ul>
</x-navbar>
