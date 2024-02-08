@extends('forum.page')

@section('main')
    <x-form :action="route('forum.update', $forum)" method="put">
        @include('forum.form')
    </x-form>
@endsection
