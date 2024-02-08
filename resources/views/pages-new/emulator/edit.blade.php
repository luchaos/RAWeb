@extends('emulator.page')

@section('main')
    <x-form :action="route('emulator.update', $emulator)" method="put">
        @include('emulator.form')
    </x-form>
@endsection
