@if($mobile)
    <x-nav-item :link="route('create')">{{ __('Create') }}</x-nav-item>
@else
    <x-nav-item :link="route('create')">{{ __('Create') }}</x-nav-item>
@endif
