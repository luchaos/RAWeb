<?php
$minimum ??= null;
$stable ??= null;
$beta ??= null;
?>
@if($minimum || $stable || $beta)
    <div class="md:grid grid-flow-col gap-4 text-center">
        @if($minimum)
            <div class="col text-nowrap">
                <b><span class="text-primary">Minimum</span> {{ $minimum->version }}</b>
            </div>
        @endif
        @if($stable)
            <div class="col text-nowrap">
                <b><span class="text-success">Stable</span> {{ $stable->version }}</b>
            </div>
        @endif
        @if($beta)
            <div class="col text-nowrap">
                <b><span class="text-info">Beta</span> {{ $beta->version }}</b>
            </div>
        @endif
    </div>
@endif
