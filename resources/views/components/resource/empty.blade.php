<div class="container container-xs">
    <div class="text-center">
        @if($showStatusIcon ?? false)
            <x-status-icon class="mb-3" size="lg" />
        @endif
        <p class="lead text-secondary font-italic">{{ __('resource.empty', ['resource' => __res($resource ?? 'resource')]) }}</p>
    </div>
</div>
