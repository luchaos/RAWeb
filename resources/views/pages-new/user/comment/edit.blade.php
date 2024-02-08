@extends('user.page', [
    'user' => $comment->commentable,
    'section' => 'comment'
])

@section('main')
    <x-section>
        <x-section-header>
            <x-slot name="title">
                <h2 class="mb-0">
                    <small class="text-secondary">{{ __('Edit') }}</small>
                    {{ __res('comment', 1) }}
                </h2>
            </x-slot>
            <x-slot name="actions">
                <x-button.delete :model="$comment" />
                <x-button.cancel :model="$comment->commentable" />
            </x-slot>
        </x-section-header>
    </x-section>
    <x-form :action="route('user.comment.update', $comment)" method="put">
        <x-comment.form :comment="$comment" />
        <x-form-actions />
    </x-form>
@endsection

