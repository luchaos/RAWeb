<x-section>
    @if($game->hasMedia('image-box-art'))
        <div class="mb-3">
            <a href="{{ $game->canonicalUrl }}" target="_blank">
                <img class="w-full" src="{{ asset($game->getFirstMediaUrl('image-box-art')) }}">
            </a>
        </div>
    @endif
    <h4>
        {{ $game->title }}
    </h4>
    <dl class="md:grid grid-flow-col gap-4">
        @if($game->system)
            <dt class="sm:col-span-1">System</dt>
            <dd class="sm:col-span-2">
                {{ $game->system->manufacturer }}
                <span class="badge embedded">{{ $game->system->name }}</span>
            </dd>
        @endif
        @if($game->release)
            <dt class="sm:col-span-1">Released</dt>
            <dd class="sm:col-span-2">{{ $game->release }}</dd>
        @endif
        @if($game->genre)
            <dt class="sm:col-span-1">Genre</dt>
            <dd class="sm:col-span-2">{{ $game->genre }}</dd>
        @endif
        @if($game->developer)
            <dt class="sm:col-span-1">Developer</dt>
            <dd class="sm:col-span-2">{{ $game->developer }}</dd>
        @endif
        @if($game->publisher)
            <dt class="sm:col-span-1">Publisher</dt>
            <dd class="sm:col-span-2">{{ $game->publisher }}</dd>
        @endif
        @if($game->achievements_total)
            <dt class="sm:col-span-1">Achievements</dt>
            <dd class="sm:col-span-2">{{ $game->achievements_total }}</dd>
        @endif
    </dl>
</x-section>
