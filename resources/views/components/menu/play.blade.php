@if($mobile)
    <x-nav-item :link="route('game.index')">{{ __res('game') }}</x-nav-item>
    <x-nav-item :link="route('achievement.index')">{{ __res('achievement') }}</x-nav-item>
@else
    <x-nav-dropdown :active="request()->routeIs(['achievement*', 'game.*', 'system.*', 'badge.*'])">
        <x-slot name="trigger">{{ __('Play') }}</x-slot>
        <x-dropdown-item :link="route('achievement.index')" :active="request()->routeIs('achievement.index', 'system.achievements')">{{ __res('achievement') }}</x-dropdown-item>
        <x-dropdown-item :link="route('leaderboard.index')">{{ __res('leaderboard') }}</x-dropdown-item>
        <x-dropdown-item :link="route('system.index')" :active="request()->routeIs('system*') && !(request()->routeIs('system.game*') || request()->routeIs('system.achievements*'))">{{ __res('system') }}</x-dropdown-item>
        <x-dropdown-item :link="route('game.index')" :active="request()->routeIs('game.index', 'system.game.index')">{{ __res('game') }}</x-dropdown-item>
    </x-nav-dropdown>
@endif
