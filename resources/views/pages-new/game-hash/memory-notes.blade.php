@extends('layouts.app')

@push('head')
@endpush

@section('main')
    <x-section>
        <x-game-hash.memory-notes :memoryNotes="" />
    </x-section>
@endsection

