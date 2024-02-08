@extends('layouts.app', [
    'pageTitle' => __('Search'),
])

@section('main')
    <x-section>
        <x-section-header>
            <x-slot name="title">
                <h2 class="mb-0">
                    {{ __('Search') }}
                </h2>
            </x-slot>
        </x-section-header>
    </x-section>
    <x-section>
        <livewire:supersearch inputId="supersearch-page" autoFocus updateQuery />
    </x-section>
@endsection

