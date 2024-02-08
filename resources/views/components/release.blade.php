<div class="mb-3">
    <p class="mb-1">
        <x-fab-windows />
        <b>v{{ $release->version }} (
            <x-date :dateTime="$release->created_at" />
            )</b>
        @if($release->stable)
            <span class="badge badge-primary">stable</span>
        @else
            <span class="badge badge-info">beta</span>
        @endif
        <br>
    </p>
    @if(($showNotes ?? false) && $release->notes)
        <p class="mb-2">
            {!! parseShortcodes($release->notes) !!}
        </p>
    @endif
    @if(($showBuilds ?? false) && $release->hasMedia('build'))
        <div class="mb-2">
            <x-media.file :media="$release->getFirstMedia('build')" />
        </div>
    @endif
    @if(($showBuilds ?? false) && $release->hasMedia('build_x86'))
        <div class="mb-2">
            <x-media.file :media="$release->getFirstMedia('build_x86')" />
        </div>
    @endif
    @if(($showBuilds ?? false) && $release->hasMedia('build_x64'))
        <div class="mb-2">
            <x-media.file :media="$release->getFirstMedia('build_x64')" />
        </div>
    @endif
</div>
