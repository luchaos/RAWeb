<div @if($defer ?? false)wire:init="ready" @endif wire:poll.30s="render">
    <?php
    $filteredByFriends = ($filter['users'] ?? null) === 'friends';
    ?>
    <x-section>
        <x-section-header>
            <x-slot name="title">
                <h3>{{ __('Activity') }}</h3>
            </x-slot>
            <x-slot name="actions">
                <x-button.refresh action="render" />
                @auth
                    <div class="btn-group btn-group-sm btn-group-toggle" data-toggle="buttons">
                        <button class="btn btn-outline-secondary {{ $filteredByFriends ? '' : 'active' }}"
                                wire:click="resetFilters">
                            {{ __('Global') }}
                        </button>
                        <button class="btn btn-outline-secondary {{ $filteredByFriends ? 'active' : '' }}"
                                wire:click="filterByFriends">
                            {{ __res('friend') }}
                        </button>
                    </div>
                @endauth
            </x-slot>
        </x-section-header>
        <?php
        $previousActivity = null;
        ?>
        @if($results)
            @foreach($results as $userActivity)
                @if($loop->first)
                    <div class="flex py-2 mb-2 items-center feed-item justify-end">
                        <x-date :dateTime="$userActivity->created_at" />
                    </div>
                @endif
                @if($previousActivity && $previousActivity->created_at->tz(session('timezone'))->format('Y-m-d') !== $userActivity->created_at->tz(session('timezone'))->format('Y-m-d'))
                    <div class="flex py-2 mb-1 mt-1 items-center feed-item justify-end">
                        <x-date :dateTime="$userActivity->created_at" />
                    </div>
                @endif
                <div class="flex py-1 mb-0 items-center feed-item {{ $userActivity->class ? 'feed-item-'.$userActivity->class : '' }}">
                    <div class="mr-2">
                        @if($userActivity->isGameActivity())
                            <x-game.avatar :game="$userActivity->game" display="icon" iconSize="sm" />
                        @elseif($userActivity->isAchievementActivity())
                            <x-achievement.avatar :achievement="$userActivity->achievement" display="icon" iconSize="sm" />
                        @else
                            @if($userActivity->icon)
                                <img src="{{ asset($userActivity->icon) }}" style="width:32px;height:32px;" alt="Act">
                            @endif
                        @endif
                    </div>
                    <div class="mr-2">
                        <x-user.avatar :user="$userActivity->user" display="icon" />
                    </div>
                    <div class="flex-1">
                        <x-user.avatar :user="$userActivity->user" />
                        {{ __('user-activity.'.$userActivity->type) }}
                        @if($userActivity->isGameActivity())
                            {{-- TODO: add user context --}}
                            :
                            <x-game.avatar :game="$userActivity->game" />
                        @elseif($userActivity->isAchievementActivity())
                            {{-- TODO: add user context --}}
                            :
                            <x-achievement.avatar :achievement="$userActivity->achievement" />
                            (
                            <x-game.avatar :game="$userActivity->achievement->game" />
                            )
                        @endif
                    </div>
                    <div class="ml-2 text-right text-secondary">
                        <x-time :dateTime="$userActivity->created_at" />
                    </div>
                </div>
                <?php
                $previousActivity = $userActivity;
                ?>
            @endforeach
            @if($results->hasPages())
                @if($take)
                    <div class="text-center">
                        <x-button.more link="{{ route('activity') }}?filter[users]={{ $filteredByFriends ? 'friends' : '' }}" />
                    </div>
                @else
                    <x-grid.pagination :paginator="$results" />
                @endif
            @endif
        @endif
    </x-section>
</div>
