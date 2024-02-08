<?php
$routeName ??= 'achievement.index';
?>
<x-section>
    <form action="{{ route($routeName, $routeParams ?? []) }}" method="get">
        <div class="flex flex-row flex-wrap items-center">
            <div>
                <x-input.search />
            </div>
            {{--<div>
                <x-system.filter-list resource="achievement" />
            </div>--}}
        </div>
    </form>
</x-section>
