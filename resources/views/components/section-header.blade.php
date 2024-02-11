<div class="flex justify-between {{ $class ?? null }}">
    {{--<div class="w-full">--}}{{-- width 100% to have navigations not extend out of viewport --}}
    <div class="">
        <div class="">
            {{ $title ?? null }}
        </div>
        @if(trim($slot))
            <div>
                {{ $slot }}
            </div>
        @endif
    </div>
    <div class="actions-container">
        @if(trim($actions ?? null))
            <div class="actions {{ $actionsClass ?? null }}">
                <div class="flex gap-1 justify-end">
                    {{ $actions }}
                </div>
            </div>
        @endif
    </div>
</div>
