<?php
$moreLink ??= null;
?>
<x-section>
    <h4>{{ __('Recent Forum Posts') }}</h4>
    @foreach($comments as $comment)
        <div class="mb-2">
            <x-user.avatar :user="$comment->user" display="icon" iconSize="sm" />
            <small>
                <x-datetime :dateTime="$comment->created_at" />
            </small>
            in
            <a href="{{ $comment->canonicalUrl }}">
                <span class="">{{ $comment->title }}</span>
            </a>:
            <span class="text-secondary">
                {{ substr($comment->body, 0, 120) }}&hellip;
            </span>
        </div>
    @endforeach
    @if($moreLink)
        <div class="text-center">
            <x-button.more link="{{ $moreLink }}" />
        </div>
    @endif
</x-section>
