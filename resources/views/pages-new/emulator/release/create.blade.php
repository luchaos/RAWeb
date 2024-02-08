@extends('emulator.release.page')

@section('main')
    <x-section>
        <x-form :action="route('emulator.release.store', $emulator)">
            @include('emulator.release.form')
        </x-form>
    </x-section>
@endsection

