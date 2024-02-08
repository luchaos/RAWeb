@extends('news.page')

@section('main')
    <x-section>
        <x-form :action="route('news.update', $news)" method="put">
            @include('news.form')
        </x-form>
    </x-section>
@endsection

