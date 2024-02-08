<?php

use App\Models\Achievement;

$latestAchievements = Achievement::orderByDesc('created_at')
    ->with('game')
    ->take($take ?? 5)
    ->get();
?>
<x-section class="mb-5">
    <x-section-header class="mb-1">
        <x-slot name="title">
            <h4>
                {{ __('New Achievements') }}
            </h4>
        </x-slot>
    </x-section-header>
    @if($latestAchievements->isNotEmpty())
        <div class="table-responsive">
            <table class="table table-sm table-striped">
                <tbody>
                @foreach($latestAchievements as $achievement)
                    <tr class="{{ $loop->index % 2 == 0 ? '' : 'alt' }}">
                        <td>
                            <x-achievement.avatar :achievement="$achievement" display="icon" />
                        </td>
                        <td class="wrap w-50">
                            <div>
                                <x-achievement.avatar :achievement="$achievement" />
                            </div>
                            @if($achievement->description)
                                <div>
                                    {{ $achievement->description }}
                                </div>
                            @endif
                        </td>
                        <td class="wrap">
                            <x-game.avatar :game="$achievement->game" display="icon" />
                        </td>
                        <td class="wrap w-50">
                            <x-game.avatar :game="$achievement->game" />
                            <small class="badge embedded">
                                <x-system.avatar :system="$achievement->game->system" display="name_short" />
                            </small>
                        </td>
                        <td>
                            @if($achievement->created_at)
                                <x-datetime :dateTime="$achievement->created_at" />
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="text-center">
            <x-button.more link="{{ route('achievement.index') }}?sort=-created" />
        </div>
    @endif
</x-section>
