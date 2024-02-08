@extends('integration.release.page')

@section('main')
    {{-- TODO: <livewire:integration-release-grid/> --}}
    <div class="table-responsive">
        <table class="table table-sm">
            <thead>
            <tr>
                <th>Version</th>
                <th class="text-center">Stability</th>
                <th>Build x86</th>
                <th>Build x64</th>
                <th>Released</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($releases as $release)
                <tr>
                    <td class="{{ $release->deleted_at ? 'text-secondary text-del' : '' }}">
                        @if($release->deleted_at)
                            {{ $release->version }}
                        @else
                            <a href="{{ route('integration.release.edit', $release) }}">
                                <b>{{ $release->version }}</b>
                            </a>
                        @endif
                    </td>
                    <td class="text-center {{ $release->deleted_at ? 'text-secondary text-del' : '' }}">
                        @if($release->stable)
                            @if($release->is($stable) && $release->is($minimum))
                                <span class="badge badge-primary">Stable</span>
                                <span class="badge badge-success">Minimum</span>
                            @elseif($release->is($stable) && $release->minimum)
                                <span class="badge badge-primary">Stable</span>
                                <span class="badge badge-secondary">Minimum</span>
                            @elseif($release->is($stable))
                                <span class="badge badge-primary">Stable</span>
                            @elseif($release->stable && $release->is($minimum))
                                <span class="badge badge-primary">Stable</span>
                                <span class="badge badge-success">Minimum</span>
                            @elseif($release->stable && $release->minimum)
                                <span class="badge badge-secondary">Stable</span>
                                <span class="badge badge-secondary">Minimum</span>
                            @elseif($release->stable)
                                <span class="badge badge-secondary">Stable</span>
                            @endif
                        @endif
                        @if(!$release->stable)
                            @if($release->is($beta))
                                <span class="badge badge-info">Beta</span>
                            @else
                                <span class="badge badge-secondary">Beta</span>
                            @endif
                        @endif
                    </td>
                    <td class=" {{ $release->deleted_at ? 'text-secondary' : '' }}">
                        @if($release->hasMedia('build_x86'))
                            <x-media.file :media="$release->getFirstMedia('build_x86')" />
                        @endif
                    </td>
                    <td class=" {{ $release->deleted_at ? 'text-secondary' : '' }}">
                        @if($release->hasMedia('build_x64'))
                            <x-media.file :media="$release->getFirstMedia('build_x64')" />
                        @endif
                    </td>
                    <td class="">
                        <x-datetime :dateTime="$release->created_at" />
                    </td>
                    <td class="text-right">
                        <span class="btn-group btn-group-sm">
                            @if($release->deleted_at)
                                @can('restore', $release)
                                    <a class="btn btn-primary" href="{{ route('integration.release.restore', $release) }}">
                                        <x-fas-undo />
                                        {{ __('Restore') }}
                                    </a>
                                @endcan
                                {{--@can('forceDelete', $release)
                                    <button type="button" class="btn btn-outline-danger"
                                            data-delete="Are you sure?"
                                            data-url="{{ route('emulator.release.force-destroy', $release) }}">
                                        <x-fas-trash/>
                                        {{ __('Delete') }}
                                    </button>
                                @endcan--}}
                            @else
                                <x-button.edit :model="$release" />
                            @endif
                        </span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
