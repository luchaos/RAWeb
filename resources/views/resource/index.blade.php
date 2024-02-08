@extends('resource.page', ['resource' => $resource])

@section('main')
    @livewire("{$resource}-grid")
@endsection
