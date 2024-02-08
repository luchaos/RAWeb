<x-section>
    <x-section-header>
        <x-slot name="title">
            <h3>{{ __('Active Players') }}</h3>
        </x-slot>
        <x-slot name="actions">
            <x-button.refresh action="refresh" />
        </x-slot>
    </x-section-header>
    <div>
        <strong>{{ $playersOnline }}</strong> {{ __('players online') }}<br>
    </div>
</x-section>
