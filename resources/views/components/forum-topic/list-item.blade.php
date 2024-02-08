<?php
/** @var ?ForumTopic $topic */

use App\Models\ForumTopic;

$topic ??= $model ?? null;
?>
<x-section class="mb-4">
    <div class="flex items-start">
        <x-far-comment class="icon-sm mr-3" />
        <div class="flex-1">
            <div>
                <a href="{{ $topic->canonicalUrl }}">
                    <span class="text-large lh-1-2">
                        {{ $topic->title }}
                    </span>
                </a>
            </div>
            <div class="text-secondary">
                <x-user.avatar :user="$topic->user" />
                <small>
                    <x-datetime :dateTime="$topic->created_at" />
                </small>
                @if($topic->updated_at)
                    <small>( {{ __('Edited') }}
                        <x-datetime :dateTime="$topic->updated_at" />
                        )</small>
                @endif
            </div>
            <div>
                {{ strip_tags(parseShortcodes(Illuminate\Support\Str::words($topic->body, 12))) }}
            </div>
        </div>
        <div class="ml-3">
            @if($topic->latestComment)
                <span data-toggle="tooltip" style="cursor: help"
                      title="{{ __('Latest reply by :user on :timestamp', ['user' => $topic->latestComment->user->username, 'timestamp' => localized_date($topic->latestComment->created_at)]) }}">
                    {{ $topic->latestComment->created_at->diffForHumans() }}
                </span>
            @else
                <span data-toggle="tooltip" style="cursor: help"
                      title="{{ __('Posted by :user on :timestamp', ['user' => $topic->user->username, 'timestamp' => localized_date($topic->created_at)]) }}">
                    {{ $topic->created_at->diffForHumans() }}
                </span>
            @endif
        </div>
        <div class="ml-3 text-right {{ $topic->comments_count > 0 ? '' : 'text-secondary' }}">
            <b class="text-larger" style="cursor: help" data-toggle="tooltip" title="{{ $topic->comments_count }} {{ __res('reply', $topic->comments_count) }}">
                <x-far-comments />
                {{ $topic->comments_count }}
            </b>
        </div>
    </div>
</x-section>
