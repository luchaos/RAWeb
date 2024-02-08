@extends('news.page')

@section('main')
    <x-section>
        <x-form :action="route('news.store')">
            @include('news.form')
        </x-form>
    </x-section>
@endsection

