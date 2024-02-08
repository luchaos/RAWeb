@extends('forum-category.page')

@section('main')
    <x-section>
        <x-forum.list :forums="$forums" />
    </x-section>
@endsection
