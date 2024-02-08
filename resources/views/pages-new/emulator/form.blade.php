<div class="2xl:grid grid-flow-col gap-4">
    <div class="2xl:col-6">
        <x-input.text :model="$emulator" attribute="integration_id"
                      :disabled="!request()->routeIs('emulator.create')"
                      :required="request()->routeIs('emulator.create')"
                      help="Integration internal ID" />
        <x-input.text :model="$emulator" attribute="handle"
                      :disabled="!request()->routeIs('emulator.create')"
                      :required="request()->routeIs('emulator.create')"
                      help="Used as filename for the archive download" />
        <x-input.text :model="$emulator" attribute="name" required help="Name of the original emulator that RA integrates with" />
        <x-input.checkbox :model="$emulator" attribute="active" help="Display publicly" />
        <x-input.textarea :model="$emulator" attribute="description" />
        <x-input.text :model="$emulator" attribute="link" help="Documentation link" />
    </div>
    <div class="2xl:col-6">
        {{--{{ $emulator->systems }}--}}
    </div>
</div>
<div class="2xl:grid grid-flow-col gap-4">
    <div class="2xl:col-6">
        <x-form-actions />
    </div>
</div>
