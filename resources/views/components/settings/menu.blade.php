<?php
$menu = collect([
    'profile' => __res('profile', 1),
    'library' => __res('library', 1),
    'notifications' => __res('notification'),
    'site' => __('Site'),
    'privacy' => __('Privacy'),
    'account' => __res('account', 1),
    'connect' => __('Connect'),
    'applications' => __res('application'),
    'root' => __('Root'),
])
    ->map(fn ($item, $key) => [
        'key' => $key,
        'label' => $item,
        'url' => route('settings', $key === 'profile' ? null : $key),
        'visible' => auth()->user()->can('updateSettings', $key),
    ])
    ->filter(fn ($menuItem) => $menuItem['visible'] ?? false);

$section = $menu->firstWhere('key', $section ?? 'profile')['key'] ?? 'profile';
?>
<x-navbar breakpoint="lg" class="navbar-borders p-0 bg-transparent">
    <ul class="navbar-nav">
        @foreach($menu as $menuItem)
            <li class="nav-item {{ $section === $menuItem['key'] ? 'active' : '' }}">
                <a class="nav-link" href="{{ $menuItem['url'] }}">
                    {{ $menuItem['label'] }}
                    @if($section === $menuItem['key'])
                        <span class="sr-only">(current)</span>
                    @endif
                </a>
            </li>
        @endforeach
    </ul>
</x-navbar>
