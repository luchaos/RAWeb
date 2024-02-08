<x-app-layout :page-title="__('Downloads')">
    <x-slot name="header">
        <x-page-header :large="false" class="py-5">
            <x-slot name="title">
                <h2>{{ __('Downloads') }}</h2>
            </x-slot>
        </x-page-header>
    </x-slot>

    <x-slot name="sidebar">
        @if($integrationReleases->isNotEmpty())
            <x-integration.releases :releases="$integrationReleases" />
        @endif
        <x-section>
            @include('content.legal')
        </x-section>
        @include('content.free-roms')
        @include('content.source-code')
    </x-slot>

    {{--<x-section>
        <x-section-header>
            <x-slot name="title">
                <h3 class="mb-0">
                    {{ __res('emulator') }}
                </h3>
            </x-slot>
            <x-slot name="actions">
                @can('manage', App\Models\EmulatorRelease::class)
                    <div class="btn-group">
                        <a href="{{ route('emulator.index') }}" class="btn btn-outline-secondary border-0">
                            <x-fas-cogs/>
                        </a>
                    </div>
                @endcan
            </x-slot>
        </x-section-header>
    </x-section>--}}
    @foreach($emulators as $emulator)
        <x-section>
            <div class="flex items-start">
                <div class="mr-3">
                    <x-emulator.avatar :emulator="$emulator" display="icon" iconSize="sm" />
                </div>
                <div class="flex-1">
                    <x-section-header>
                        <x-slot name="title">
                            <h3 id="{{ $emulator->getMorphClass() . '-' . $emulator->id }}" class="mb-1 text-nowrap">
                                <x-emulator.avatar :emulator="$emulator" display="handle" />
                            </h3>
                        </x-slot>
                        <x-slot name="actions">
                            <x-button.edit :model="$emulator" />
                        </x-slot>
                    </x-section-header>
                    <div class="md:grid grid-flow-col gap-4">
                        <div class="{{ $emulator->latestRelease ? 'lg:col-6' : 'col-12' }}">
                            @if($emulator->description)
                                <p class="mb-2">
                                    {!! $emulator->description !!}
                                </p>
                            @endif
                            @if($emulator->link)
                                <p class="mb-3">
                                    <a href="{{ $emulator->link }}" target="_blank">
                                        {{ __('Documentation') }}
                                        <x-fas-external-link-alt />
                                    </a>
                                </p>
                            @endif
                            @if($emulator->systems_count)
                                {{--<b>{{ __res('system') }}</b>--}}
                                <div class="flex flex-wrap justify-between mb-2 w-full">
                                    @foreach($emulator->systems as $system)
                                        <div class="pr-1 pb-1 w-50 text-nowrap">
                                            {{ $system->manufacturer }}
                                            {{--<a href="{{ $system->canonicalUrl }}" class="badge embedded">--}}
                                            <span class="badge embedded">{{ $system->name_short }}</span>
                                            {{--</a>--}}
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        @if($emulator->latestRelease || $emulator->latestBetaRelease)
                            <div class="lg:col6">
                                <x-release :release="$emulator->latestRelease" :showBuilds="true" />
                                @if(
                                    $emulator->latestBetaRelease
                                    && $emulator->latestBetaRelease !== $emulator->latestRelease
                                    && version_compare($emulator->latestBetaRelease->version, $emulator->latestRelease->version, '>=')
                                )
                                    <x-release :release="$emulator->latestBetaRelease" :showBuilds="true" />
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </x-section>
    @endforeach
</x-app-layout>
