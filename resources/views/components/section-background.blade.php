<div class="{{ ($border ?? true) ? 'border-b border-neutral-700' : '' }}"
     style="position:absolute;bottom:{{ $bottom ?? 0 }}px;top:0;left:0;right:0;z-index:{{ $zIndex ?? -1 }}"
>
    @if($image ?? null)
        <x-background :image="$image" />
    @endif
    @if($scanlines ?? true)
        <x-background-texture :image="'assets/images/textures/scanlines.webp'" />
    @endif
</div>
