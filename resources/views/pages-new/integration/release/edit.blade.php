@extends('integration.release.page')

@section('main')
    <x-form action="{{ route('integration.release.update', $release) }}" method="put">
        @include('integration.release.form', ['release' => $release])
    </x-form>
@endsection

