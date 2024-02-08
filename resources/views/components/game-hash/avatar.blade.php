@if($gameHash->name)
    <div>
        <b>{{ $gameHash->name ?? null }}</b>
    </div>
@endif
<div>
    <span class="badge embedded">
        <x-system.avatar :system="$gameHash->system" />
    </span>
    @if($gameHash->source)
        <span class="badge badge-info">
            {{ $gameHash->source }}
        </span>
    @endif
    @if($gameHash->source_status)
        <span class="badge badge-{{ $gameHash->source_status == 'verified' ? 'success' : 'warning' }}">
            {{ $gameHash->source_status }}
        </span>
    @endif
</div>
<div>
    <a href="{{ route('game-hash.show', $gameHash) }}" class="text-monospace text-secondary">{{ $gameHash->hash }}</a>
</div>
