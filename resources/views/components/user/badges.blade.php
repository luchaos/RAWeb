<x-section>
    <x-section-header>
        <x-slot name="title">
            <h4>badges</h4>
        </x-slot>
    </x-section-header>
    <div class="flex md:flex-wrap justify-center">
        @foreach($badges as $badge)
            <x-badge.avatar :badge="$badge" />
        @endforeach
    </div>
</x-section>
