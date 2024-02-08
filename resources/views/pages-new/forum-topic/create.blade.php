@extends('forum-topic.page')

@section('main')
    <x-form action="{{ route('forum.topic.store', $forum) }}">
        @include('forum-topic.form')
    </x-form>
@endsection

