@extends('news.page', [
    'section' => 'comment'
])

@section('main')
    <livewire:news.comments :newsId="$news->id" />
@endsection
