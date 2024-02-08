@extends('achievement.page')

@section('main')
    <x-form :action="route('achievement.update', $achievement)" method="put">
        @include('achievement.form')
        <x-form-actions />
    </x-form>
    {{-- TODO: badge(s) --}}
    {{--<x-input.image :model="$achievement" :attribute="badge"/>--}}
    {{-- TODO: promote/demote --}}
    {{-- TODO: points --}}
@endsection
