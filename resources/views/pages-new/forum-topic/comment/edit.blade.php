@extends('forum-topic.comment.page')

@section('main')
    <x-form :action="route('forum-topic.comment.update', $comment)" method="put">
        <x-comment.form :comment="$comment" :rows="10" />
        <x-form-actions />
    </x-form>
@endsection

