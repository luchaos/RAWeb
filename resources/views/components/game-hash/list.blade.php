<?php

use Illuminate\Support\Collection;

/** @var Collection $gameHashes */
?>
<x-section>
    <div class="text-small">
        @if($gameHashes->count())
            <?php
            [$known, $unknown] = $gameHashes->partition(fn($gameHash) => $gameHash->description ?? false);
            if ($known->count()) {
                $parentIds = $known->pluck('parent_id')->unique();
            }
            ?>
            @foreach($known->sortBy('description') as $gameHash)
                <div class="p-1 mb-2">
                    <x-game-hash.list-item :game-hash="$gameHash" />
                </div>
            @endforeach
            @foreach($unknown->sortBy('rom_md5') as $gameHash)
                <div class="p-1 mb-2">
                    <x-game-hash.list-item :game-hash="$gameHash" />
                </div>
            @endforeach
        @endif
    </div>
</x-section>
