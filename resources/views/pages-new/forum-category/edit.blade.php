@extends('forum-category.page')

@section('main')
    <x-form :action="route('forum-category.update', $category)" method="put">
        @include('forum-category.form')
    </x-form>
@endsection
