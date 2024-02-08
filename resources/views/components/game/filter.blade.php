<?php
$routeName ??= 'game.index';
?>
<x-section>
    <form action="{{ route($routeName, $routeParams ?? []) }}" method="get">
        <div class="flex flex-row flex-wrap items-center">
            <div>
                <x-input.search />
            </div>
            <div>
                <x-system.filter-list resource="game" :system="$system ?? null" />
            </div>
        </div>
    </form>
</x-section>
