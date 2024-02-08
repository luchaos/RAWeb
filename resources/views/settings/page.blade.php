<x-app-layout
    :page-title="(($title ?? null) ? $title . ' · ' : '') . __res('setting')"
>
    <x-slot name="header">
        <x-page-header :large="false">
            <x-slot name="title">
                <h2>{{ __res('setting') }}</h2>
            </x-slot>
            <x-slot name="navigation">
                <x-settings.menu :section="$section" />
            </x-slot>
        </x-page-header>
    </x-slot>
</x-app-layout>
