@extends('achievement.page', [
    'section' => 'comment'
])

@section('main')
    <livewire:achievement.comments :achievementId="$achievement->id" />
@endsection
