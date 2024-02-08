<?php
?>
<div class="embedded p-3">
    <h5 class="mb-1">
        My Stats
    </h5>
    <div class="md:grid grid-flow-col gap-4">
        <div class="md:col-span-2">
            <div class="flex items-start">
                <div class="flex-1">
                    <p class="mb-0">
                        Unlocked <b class="text-unlocked-hardcore">{{ $playerGame->achievements_unlocked_hardcore }} hardcore</b> /
                        <b class="text-unlocked-casual">{{ $playerGame->achievements_unlocked }} casual</b> achievements
                    </p>
                </div>
            </div>
        </div>
        <div class="md:col-span-1">
            <div>
            </div>
        </div>
    </div>
</div>
