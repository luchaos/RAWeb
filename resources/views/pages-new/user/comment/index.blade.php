@extends('user.page', [
    'section' => 'comment'
])

@section('main')
    <livewire:user.comments :userId="$user->id" />
@endsection
