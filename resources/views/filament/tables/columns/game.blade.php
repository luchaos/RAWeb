<div class="fi-ta-text flex gap-2 items-center w-full whitespace-normal gap-y-1 px-3 py-4 text-sm">
    {{-- {{ $getRecord()->name }} --}}
    <x-game.avatar :game="$getState()" :link="false" display="icon" />
    <x-game.avatar :game="$getState()" :link="false" />
</div>
