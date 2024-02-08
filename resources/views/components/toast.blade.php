<?php
$status ??= null;
if ($status) {
    $textColor = 'text-' . $status;
    $borderColor = 'border-' . $status;
}
?>
<div class="toast {{ $borderColor ?? '' }}" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-body flex flex-row justify-between align-content-start">
        <div class="flex items-center {{ $textColor ?? '' }}">
            <div class="icon flex flex-column justify-center items-center">
                {{ $icon ?? null }}
            </div>
            <div class="flex-1 lh-1-2 ml-2">
                {{ $slot }}
            </div>
        </div>
        {{ $actions ?? null }}
        <button class="btn btn-lg p-2 btn-outline-secondary border-0 ml-2 mb-1" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">
                <x-fas-times />
            </span>
        </button>
    </div>
</div>
