<x-app-layout
    :page-title="__res('news')"
>
    @slot('header')
        <x-page-header :large="false">
            <x-slot name="title">
                <h2>{{ __res('news') }}</h2>
            </x-slot>
            <x-slot name="actions">
                <x-button.create resource="news" />
            </x-slot>
        </x-page-header>
    @endslot

    <livewire:news-grid />

    @slot('sidebar')
        <x-event.teaser />
    @endslot
</x-app-layout>
