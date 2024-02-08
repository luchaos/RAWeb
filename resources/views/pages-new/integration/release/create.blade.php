@extends('integration.release.page')

@section('main')
    <x-form action="{{ route('integration.release.store') }}" method="post" enctype="multipart/form-data">
        @include('integration.release.form', ['release' => null])
    </x-form>
@endsection

