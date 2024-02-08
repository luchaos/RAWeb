@extends('forum-topic.page')

@section('main')
    <x-form :action="route('forum-topic.update', $topic)" method="put">
        @include('forum-topic.form')
    </x-form>
@endsection

