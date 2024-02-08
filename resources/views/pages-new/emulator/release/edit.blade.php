@extends('emulator.release.page')

@section('main')
    <x-section>
        <x-form :action="route('emulator.release.update', $release)" method="put">
            @include('emulator.release.form', ['release' => $release])
        </x-form>
    </x-section>
@endsection

