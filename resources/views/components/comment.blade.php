<?php
$commentable = $comment->commentable ?? null;
$commentId = "comment-" . $comment->id;
if (!$commentable) {
    $commentId = $comment->getMorphClass() . '-' . $comment->id;
}
$class ??= null;
$bodyClass ??= null;
$user = $comment->user ?? null;

$smallActionButtons ??= false;

$highlighted = request('highlight') === $commentId;
?>
<x-section
    id="{{ $commentId }}"
    class="p-2 relative sm:w-full sm:mx-0 rounded mt-1 odd:bg-embed bg-embed-highlight {{ $class }} {{ $highlighted ? 'highlight' : '' }}"
>
    <div class="flex items-start mb-3">
        <div class="mr-2">
            <x-user.avatar :user="$user" display="icon" iconSize="sm" />
        </div>
        <div class="flex-1 text-break">
            <x-section-header :hoverActions="true" class="mb-1">
                <x-slot name="title">
                    <div class="mb-0">
                        <b>
                            <x-user.avatar :user="$user" />
                        </b>
                        <span class="text-secondary block sm:inline-block sm:ml-1">
                            <x-datetime :dateTime="$comment->created_at" />
                        </span>
                    </div>
                </x-slot>
                <x-slot name="actions">
                    <div class="inline-flex gap-1">
                        {{--<x-button.delete :model="$comment" :link="$comment->deleteLink"/>--}}
                        <x-button.permalink :model="$comment" class="{{ $smallActionButtons ? 'p-1 text-xs' : '' }}" />
                        <x-button.edit :model="$comment" class="{{ $smallActionButtons ? 'p-1 text-xs' : '' }}" />
                    </div>
                </x-slot>
            </x-section-header>
            {{--@if($comment->title)
                <h2>
                    {{ $comment->title }}
                </h2>
            @endif--}}
            @if($comment->deleted_at)
                @can('manage', $comment)
                    <div class="alert alert-warning">
                        This message was deleted. Do not share its contents publicly - mind the user's privacy.
                    </div>
                    <div class="{{ $bodyClass }} text-secondary mt-3" style="text-decoration: line-through">
                        {!! App\Support\Shortcode\Shortcode::render($comment->body) !!}<br>
                    </div>
                @else
                    <i>{{ __('Deleted comment') }}</i>
                @endcan
            @else
                <div class="{{ $bodyClass }}">
                    <div class="table-responsive">
                        {!! App\Support\Shortcode\Shortcode::render($comment->body) !!}<br>
                    </div>
                </div>
            @endif
            @if($comment->updated_at && $comment->updated_at != $comment->created_at)
                <div class="text-secondary mt-2">
                    <small><i>{{ __('Edited') }}
                            <x-datetime :dateTime="$comment->updated_at" />
                        </i></small>
                </div>
            @endif
        </div>
    </div>
</x-section>
