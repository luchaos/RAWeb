<div class="text-right {{ $class ?? null }}" style="width: 300px">
    <div>
        <small class="uppercase">{{ __('last seen') }} / {{ __('currently playing') }}</small>
    </div>
    @if($user->lastActivity)
        <x-date :dateTime="$user->lastActivity->created_at" :shortDate="false" :time="true" />
    @endif
</div>
