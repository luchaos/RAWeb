<?php

$menu = collect([
    [
        'label' => __res('notification'),
        'url' => route('notification.index'),
        'active' => Route::is('notification.index'),
    ],
    [
        'label' => __res('message'),
        'url' => route('message.index'),
        'active' => Route::is('message.index'),
    ],
])->filter(fn ($menuItem) => $menuItem['visible'] ?? true);
?>
<x-navbar breakpoint="lg" class="navbar-borders p-0 bg-transparent">
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
