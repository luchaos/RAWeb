<?php

use App\Models\Emulator;

/** @var Emulator $emulator */
$emulator ??= $model ?? null;
?>
<tr>
    <td class="wrap">
        <x-emulator.avatar
            display="icon"
            :emulator="$emulator"
            :link="route('emulator.edit', $emulator)"
        />
    </td>
    <td class="w-25">
        <x-emulator.avatar
            display="handle"
            :emulator="$emulator"
            :link="route('emulator.edit', $emulator)"
        />
    </td>
    <td class="w-25">
        {{ $emulator->name }}
    </td>
    <td class="w-25 text-center">
        @if ($emulator->releases_count)
            <a href="{{ route('emulator.release.index', $emulator) }}">
                <x-fas-file-archive />
                <b>
                    {{ number_format($emulator->releases_count) }}
                </b>
            </a>
        @endif
    </td>
    <td class="w-25 text-center">
        @if ($emulator->systems_count)
            <x-fas-play-circle />
            <b>
                {{ number_format($emulator->systems_count) }}
            </b>
        @endif
    </td>
    <td class="text-center">
        @if($emulator->integration_id !== null)
            <code>
                #{{ $emulator->integration_id }}
            </code>
        @endif
    </td>
    {{-- <td class="text-right">
         <div class="btn-group btn-group-sm">
             <x-button.edit :model="$emulator"/>
             --}}{{--<x-button.create resource="emulator.release" :model="$emulator">{{ __res('release', 1) }}</x-button.create>--}}{{--
         </div>
     </td>--}}
</tr>
