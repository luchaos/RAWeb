@extends('system.page')

@section('main')
    <x-form :action="route('system.update', $system)" method="put">
        @include('system.form')
    </x-form>
@endsection
