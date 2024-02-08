<?php

use App\Models\System;

/** @var System $system */
?>

@extends('system.page', [
    'section' => 'game',
])

@section('main')
    <livewire:game-grid :systemId="$system->id" />
@endsection
